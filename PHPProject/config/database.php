<?php

require_once 'definiciones.php';

class Database {

    private $host = host;
    private $user = user;
    private $pass = pass;
    private $db   = database;

    public $connection;   

    public function getConnection(){
        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host=" .$this->host. ";dbname=" .$this->db, $this->user, $this->pass);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exep) {
            echo 'Error: '.$exep->getMessage();
        }

        return $this->connection;
    }

}