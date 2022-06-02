<?php

namespace App;

use PDO;
use PDOException;

class Connection {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'mywallet';
    
    public function open()
    {
        try{
            $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';', $this->user, $this->pass);

            $conn->exec('set charset set utf8');

            return $conn;

        }catch(PDOException $e){
            echo 'Error message: ' . $e->getMessage();
            die();
        }
    }
}