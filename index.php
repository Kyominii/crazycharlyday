<?php
session_start();
require_once ("vendor/autoload.php");

use crazyday\controleurs as controleurs;

//Création de l'objet du micro-framework
$app = new Slim\App();

//Cas où nous sommes à la racine du site
$app->get('/', function(){
    $controleur = new controleurs\AccueilControleur();
    echo $controleur->renderAccueil();
})->setName('AcceuilGET');

$app->get('/users', function(){
    echo "test";
})->setName('UsersGET');

//Lancement du micro-framework
$app->run();

