<?php

class user_controller {

    private $user;

    /*
    public function __construct($login, $psw, $type, $status){
        $this->user = new user($login, $psw, $type, $status);
    }
    */
    public function __construct($login, $psw){
        $this->user = new user($login, $psw);
    }

    public function getType(){
        return $this->user->getType();
    }
    public function getStatus(){
        return $this->user->getStatus();
    }

    public function checkExists()
    {
        return $this->user->checkExists();
    }

    public function checkIsFree()
    {
        return $this->user->checkIsFree();
    }

    public function insert($type, $status)
    {
        $this->user->insert($type, $status);
    }
} 