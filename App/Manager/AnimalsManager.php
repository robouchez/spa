<?php

namespace App\Manager;
use Vendor\Manager\Manager;

#[ClassAttribute]
class AnimalsManager extends Manager{

    protected $db;
    protected $table = "animals";

    /**
     * public function pour enregistrer un animal dans la bdd
     */
    public function create ($animal)
    {
        $statement = "INSERT INTO animals (booked, name, species, breed, colour) 
                        VALUES (:booked, :name, :species, :breed, :colour)";
        
        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":booked", $animal->getBookedPDO()) ;
        $prepare->bindValue(":name", $animal->getName()) ;
        $prepare->bindValue(":species", $animal->getSpecies()) ;
        $prepare->bindValue(":breed", $animal->getBreed()) ;
        $prepare->bindValue(":colour", $animal->getColour()) ;

        $prepare->execute();
    }

    /**
     * public function pour charger un animal (id=$id) de la base de donnée
     * @return  Animals
     */
    public function getOne($id)
    {
        $query = $this->db->query("SELECT * FROM animals WHERE id =".$id['id']);
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\Animals")[0];
    }

    /**
     * public function pour mettre à jour un animal dans la bdd
     */
    public function update($animal, $id)
    {
        $statement = "UPDATE animals SET booked = :booked, name = :name, species = :species, breed = :breed, colour = :colour WHERE id =".$id." ";

        $prepare = $this->db->prepare($statement);
        $prepare->bindValue(":booked", $animal->getBookedPDO()) ;
        $prepare->bindValue(":name", $animal->getName());
        $prepare->bindValue(":species", $animal->getSpecies());
        $prepare->bindValue(":breed", $animal->getBreed());
        $prepare->bindValue(":colour", $animal->getColour());

        $prepare->execute();
    }

    /**
     * public function pour supprimer un animal de la bdd
     */
    public function delete($id)
    {
        $query = $this->db->query("DELETE FROM animals WHERE id =".$id['id']);
    }

}