<?php
namespace Vendor\Manager;

use Vendor\Database\Database;
use Vendor\Interfaces\GlobalInterface;
use Vendor\Interfaces\ManagerInterface;

abstract class Manager implements ManagerInterface, GlobalInterface{

    protected $db;
    protected $table;


    public function __construct ()
    {
        $db = new Database();
        $this->db = $db->getPdo();
    }

    // public abstract function create($article);

    public function getList()
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE booked = 0");
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\\".ucfirst($this->table));
    }

    public function getTinyList()
    {
        $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 10");
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\\".ucfirst($this->table));
    }


    // public abstract function getOne();

    // public abstract function update();

    // public abstract function delete();
}