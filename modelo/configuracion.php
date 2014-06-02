<?php

class Config {
    public $user;
    public $password;
    public $sid;
    public $puerto;
    public $host;
    public $bd;
    public $protocol;
    
    public function __construct() {
        $this->user = "jjara";
        $this->password = "TFSbOTBA";
        $this->host = "146.83.196.204";
        $this->sid = "ORCL";
        $this->puerto = "1521";
        $this->protocol = "TCP";
        
        $this->bd = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = $this->protocol)(HOST = $this->host)(PORT = $this->puerto)))(CONNECT_DATA=(SID=$this->sid)))"; 
    }
    
    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSid() {
        return $this->sid;
    }

    public function getPuerto() {
        return $this->puerto;
    }

    public function getHost() {
        return $this->host;
    }

    public function getBd() {
        return $this->bd;
    }

    public function getProtocol() {
        return $this->protocol;
    }
}   

?>
