<?php

class user {

    private $login;
    private $psw;
    private $type; // (admin, user)
    private $status; // (actif, blocked)

    public function __construct($login, $psw){
        $this->login = $login;
        $this->psw = $psw;
        $this->type = "";
        $this->status = "";
    }

    public function getType(){
        return $this->type;
    }
    public function getStatus(){
        return $this->status;
    }

    public function checkIsFree(){
        global $conn;
        $sql = "SELECT login from user where login = '$this->login'";
        $result = $conn->query($sql);
        $i=0;
        while($row = $result-> fetch_assoc()) {$i++;}
        
        return ($i == 0)? true : false;
    }

    public function checkExists(){
        global $conn; 
        $sql = "SELECT login, type, status from user where login = '$this->login' and psw = sha1($this->psw) ";
        $result = $conn->query($sql);
        
        $i=0;
        while($row = $result-> fetch_assoc()) {
            $i++;
            $this->type = $row['type'];
            $this->status = $row['status'];
        }

        if($i == 0) return false;
        else {
            
            return true;
        }
    }
    
    public function insert($type, $status){
        global $conn;
        $stmt = $conn->prepare("INSERT INTO user (login, psw, type, status) VALUES (?, ?, ?, ?)");
        $stmt -> bind_param("ssss", $this->login, sha1($this->psw), $type, $status ); 
        $stmt ->execute();
        $stmt -> close();
    }
}