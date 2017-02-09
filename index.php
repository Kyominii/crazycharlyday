<?php
session_start();
require_once ("vendor/autoload.php");
use Illuminate\Database\Capsule\Manager as DB;
use crazyday\controleurs as controleurs;

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

//Page de connexion des utilisateurs
$app->get('/connexion',function(){
	$controleurConnexion = new controleurs\ConnexionControleur();
	$controleurConnexion->afficher();
})->setName('ConnexionGET');

$app->post('/connexion',function(){
	$s = \Slim\Slim::getInstance();
	$controleurConnexion = new controleurs\ConnexionControleur();
	$controleurConnexion->connexion($s->request->post('pseudo'),$s->request->post('mp'));
})->setName('ConnexionPOST');

//Page de liste des utilisateurs
$app->get('/users', function(){
    $controleur = new controleurs\UtilisateurControleur();
    echo $controleur->renderListUsers();
})->setName('UsersGET');

//Lancement du micro-framework
$app->run();

