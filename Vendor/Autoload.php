<?php
namespace Vendor;

class Autoload {
    
    /**
     * Méthode qui charge les class
     *
     * @param [type] $class
     * @return void
     */
    public static function autoloader ($class)
    {
        $class = str_replace("\\", "/", $class);
        require ROOT."/$class.php";
    }

    /**
     * spl_autoload_register permet un chargement automatique de la class autoloader 
     * à chaque fois qu'un appel à une class est passé dans le projet
     *
     * @return void
     */
    public static function register () 
    {
        spl_autoload_register(array(__CLASS__, "autoloader"));
    }
}