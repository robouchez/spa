<?php
namespace Vendor\Database;

class Database {

    private $dbUser = "root";
    private $dbPass = "root";
    private $host = "localhost:3306";
    private $dbName = "db_php8";
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbName", $this->dbUser, $this->dbPass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }
    /**
     * Méthode magique appelée à la destruction de la classe
     *
     * @return void
     */
    public function __destruct()
    {
        $this->pdo = null;
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}