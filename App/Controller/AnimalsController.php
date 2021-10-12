<?php

namespace App\Controller;

use App\Entity\Animals;
use App\Manager\AnimalsManager;

#[ClassAttribute]
class AnimalsController {

    #[MethodAttribute]
    public function __construct()
    {
        $this->manager = new AnimalsManager;
    }

    #[MethodAttribute]
    public function home()
    {
        $animals = $this->manager->getTinyList();
        include ROOT."/templates/homeView.php";
    }

    #[MethodAttribute]
     public function animals()
    {
        $animals = $this->manager->getList();
        include ROOT."/templates/Animals/animalsView.php";
    }

    #[MethodAttribute]
    public function animal($id)
    {
        $animal = $this->manager->getOne($id);
        include ROOT."/templates/Animals/animalView.php";
    }

    #[MethodAttribute]
    public function addAnimal(/* $data */)
        {
            if (!empty($_POST)) {
                $animal = new Animals();
                $animal->hydrate($_POST);
                $this->manager->create($animal);
                header("Location:/spa/public/?page=animals");
            }
            
            include ROOT."/templates/Animals/addAnimal.php";
        }
        
    #[MethodAttribute]
    public function deleteAnimal($id)
    {
        $animal = $this->manager->delete($id);
        header("Location:/spa/public/?page=animals");
    }

    #[MethodAttribute]
    public function updateAnimal(/* $data */)
    {
        if (!empty($_POST)) {
            $animal = new Animals();
            $animal->hydrate($_POST);
            $id = $_GET['id'];
            $this->manager->update($animal, $id);
            header("Location:/spa/public/?page=animal&id=$id");
        }
        $id = $_GET['id'];
        $animal = $this->manager->getOne(['id'=>$id]);
        include ROOT."/templates/Animals/addAnimal.php";
    }

    #[MethodAttribute]
    public function bookAnimal($id)
    {
        $animal = $this->manager->getOne($id);
        $animal->setBooked(true);
        $id = $_GET['id'];

        $this->manager->update($animal, $id);
        header("Location:/spa/public/?page=animal&id=$id");
    }
}