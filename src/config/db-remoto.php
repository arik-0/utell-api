<?php
  class db{
    private $dbHost ='localhost';
    private $dbUser = 'grupophi_utell';
    private $dbPass = 'eNZ85-q5';
    private $dbName = 'grupophi_utell';
    //conección 
    public function conectDB(){
      $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
      $dbConnecion = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
      $dbConnecion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbConnecion;
    }
  }