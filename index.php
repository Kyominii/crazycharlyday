<?php
session_start();
require_once ("vendor/autoload.php");

//Création de l'objet du micro-framework
$app = new Slim\App();

//Cas où nous sommes à la racine du site
$app->get('/', function(){
    echo "Le commencement";
});


//Lancement du micro-framework
$app->run();

