<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Model\Repo;
use Cake\Http\Client;

/**
 *
 * This controller will render views from Template/Repos/
 */
class ReposController extends AppController
{

    /**
     * List the github repos
     */
    public function index() {
        
        $organization = 'symfony';

        $repos = $this->getRepos($organization);

        //set products data and pass to the view 
        $this->set('repos', $repos);
    }

    /**
     * Download repos as CSV
     */
    public function download() {
        
        $organization = 'symfony';

        $repos = $this->getRepos($organization);

        // Open temp file in write mode
        $file_path = TMP.'tmp.csv';
        $file = fopen($file_path, 'w');
        
        // Save repos as CSV
        foreach ($repos as $repo) {
            fwrite($file, $repo->toCSV());
        }

        fclose($file);

        // Add file to response to be downloaded
        $this->response->file($file_path, array(
            'download' => true,
            'name' => 'repos.csv',
        ));

        return $this->response;
    }

    /**
     * Retrieves the list of repos of the organization
     * 
     * @param organization
     */
    private function getRepos($organization){
        
        $http = new Client();

        // Fetch repos from github api
        $response = $http->get('https://api.github.com/orgs/'.$organization.'/repos');

        if (!$response->isOk()){
            throw new Exception("Error Processing Request");
        }

        $repos = array();

        foreach ($response->json as $r){
            $repo = new Repo();
            
            $repo->setOwner($r['owner']['login']);
            $repo->setName($r['full_name']);
            $repo->setURL($r['html_url']);
            $repo->setAvatar($r['owner']['avatar_url']);
            $repo->setDescription($r['description']);
            $repo->setStars($r['stargazers_count']);
            $repo->setForks($r['forks_count']);
            $repo->setOpenIssues($r['open_issues']);

            array_push($repos, $repo);
        }

        return $repos;
    }
}
