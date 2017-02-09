<?php
session_start();
require_once ("vendor/autoload.php");

use crazyday\controleurs as controleurs;


//Création de l'objet du micro-framework
$app = new Slim\App();

//Cas où nous sommes à la racine du site
$app->get('/', function(){
	$controleurConnexion = new controleurs\ConnexionControleur();
    $controleurAccueil = new controleurs\AccueilControleur();

    echo $controleur->renderAccueil();
})->name('AcceuilGET');

//Lancement du micro-framework
$app->run();

