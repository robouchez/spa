<?php

$routes = [
    "home" => ["controller" => "AnimalsController", "method" => "home"],
    "animal" => ["controller" =>"AnimalsController", "method" => "animal", "param" => ["id" => $_GET['id']??'']],
    "animals" => ["controller" =>"AnimalsController", "method" => "animals"],
    
    "addAnimal" => ["controller" =>"AnimalsController", "method" => "addAnimal"],
    "updateAnimal" => ["controller" =>"AnimalsController", "method" => "updateAnimal", "param" => ["id" => $_GET['id']??'']],
    "deleteAnimal" => ["controller" =>"AnimalsController", "method" => "deleteAnimal", "param" => ["id" => $_GET['id']??'']],
    "bookAnimal" => ["controller" =>"AnimalsController", "method" => "bookAnimal", "param" => ["id" => $_GET['id']??'']],
];

if(isset($_GET["page"]) && array_key_exists($_GET["page"],$routes)){
    $case = $routes[$_GET["page"]];
    $caseController = "App\Controller\\".$case["controller"];
    $controller = new $caseController();
    $method = $case["method"];

    $param = null;
    if (isset($case["param"])) {
        $param = $case["param"];
    }
    
    $controller->$method($param);
} else {
    include "../templates/404View.php";
}