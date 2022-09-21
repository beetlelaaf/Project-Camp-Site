<?php

class db_connection
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect()
    {
        $this->servername = "136.144.179.61";
        $this->username = "root";
        $this->password = "WijZijnTeam@B2!";
        $this->dbname = "camping";
        $this->charset = "utf8mb4";
        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }catch(PDOException $error){
            echo "Connection failed: ".$error->getMessage();
        }
    }
}