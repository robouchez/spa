<?php

namespace App\Entity;

#[ClassAttribute]
class Animals {

    #[PropertyAttribute]
    private int $id;

    #[PropertyAttribute]
    private bool $booked;

    #[PropertyAttribute]
    private string $name;

    #[PropertyAttribute]
    private string $species;

    #[PropertyAttribute]
    private string $breed;

    #[PropertyAttribute]
    private string $colour;

    // Je voulais utiliser la syntaxe php8 (eg. public bool $booked = false) en argument du constructeur, mais les fetchs de PDO ne marchaient plus
    public function __construct()
    {
    }

    public function hydrate (array $animal)
    {
        foreach ($animal as $key => $value) {
            $method = "set". ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of booked
     */ 
    public function getBooked()
    {
        return $this->booked;
    }

    /**
     * Get the value of booked, converted into tinyint for PDO
     * pas vraiment utile maintenant que les appels PDO fonctionnent (voir constructeur de Animals) mais comme ça j'ai une utilisation de match() et un #[Deprecated]
     */ 
    #[Deprecated]
    public function getBookedPDO()
    {
        return match (gettype($this->booked)) {
            "boolean" => ($this->booked == false ? 0 : 1),
            "integer" => $this->booked
        };
    }

    /**
     * Set the value of booked
     *
     * @return  self
     */ 
    public function setBooked(bool $booked)
    {
        $this->booked = $booked;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of species
     */ 
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * Set the value of species
     *
     * @return  self
     */ 
    public function setSpecies(string $species)
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get the value of breed
     */ 
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set the value of breed
     *
     * @return  self
     */ 
    public function setBreed(string $breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get the value of colour
     */ 
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * Set the value of colour
     *
     * @return  self
     */ 
    public function setColour(string $colour)
    {
        $this->colour = $colour;

        return $this;
    }

}