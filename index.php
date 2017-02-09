<?php
session_start();
require_once ("vendor/autoload.php");

use crazyday\controleurs as controleurs;
use Illuminate\Database\Capsule\Manager as DB;

//Initialisation de la connexion
$db = new DB();

$config = parse_ini_file('src/conf/db.ini');

$db->addConnection( [
    'driver' => $config['driver'],
    'host' => $config['host'],
    'database' => $config['database'],
    'username' => $config['username'],
    'password' => $config['password'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
] );

$db->setAsGlobal();
$db->bootEloquent();

//Création de l'objet du micro-framework
$app = new Slim\App();

//Cas où nous sommes à la racine du site
$app->get('/', function(){
    $controleur = new controleurs\AccueilControleur();
    echo $controleur->renderAccueil();
})->setName('AcceuilGET');

//Page de liste des utilisateurs
$app->get('/users', function(){
    echo "test";
})->setName('UsersGET');

//Lancement du micro-framework
$app->run();

