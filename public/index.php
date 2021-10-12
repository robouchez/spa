<?php

define("ROOT", dirname(__DIR__));

require ROOT."/Vendor/Autoload.php";

Vendor\Autoload::register();

include ROOT."/Routeur/routeur.php";