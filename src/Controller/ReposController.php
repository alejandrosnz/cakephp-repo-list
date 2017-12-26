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

use Cake\Http\Client;

/**
 * Static content controller
 *
 * This controller will render views from Template/Repos/
 */
class ReposController extends AppController
{

    /**
     * Retrieves the github repos
     */
    public function index() {
        
        $http = new Client();

        //fetch repos from github api
        $response = $http->get('https://api.github.com/orgs/symfony/repos');

        $repos = $response->json;

        //set products data and pass to the view 
        $this->set('repos', $repos);
    }
}
