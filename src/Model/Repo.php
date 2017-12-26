<?php

namespace App\Model;

class Repo{
    
    private $owner;
    private $name;
    private $URL;
    private $avatar;
    private $description;
    private $stars;
    private $forks;
    private $openIssues;


    public function setOwner($owner){
        $this->owner = $owner;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setURL($URL){
        $this->URL = $URL;
    }
    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setStars($stars){
        $this->stars = $stars;
    }
    public function setForks($forks){
        $this->forks = $forks;
    }
    public function setOpenIssues($openIssues){
        $this->openIssues = $openIssues;
    }

    public function getOwner(){
        return $this->owner;
    }
    public function getName(){
        return $this->name;
    }
    public function getURL(){
        return $this->URL;
    }
    public function getAvatar(){
        return $this->avatar;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getStars(){
        return $this->stars;
    }
    public function getForks(){
        return $this->forks;
    }
    public function getOpenIssues(){
        return $this->openIssues;
    }

    public function toCSV(){
        return 
            $this->owner.';'.
            $this->name.';'.
            $this->URL.';'.
            $this->avatar.';'.
            $this->description.';'.
            $this->stars.';'.
            $this->forks.';'.
            $this->openIssues.';'.
            PHP_EOL;
    }
}
?>