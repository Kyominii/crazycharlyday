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
	$controleurConnexion = new controleurs\ConnexionControleur();
	$controleurConnexion->connexion($_POST['pseudo'], $_POST['mp']);
})->setName('ConnexionPOST');

$app->get('/inscription',function(){
	$Inscription = new controleurs\InscriptionControleur();
	$Inscription->afficher();
})->setName('InscriptionGET');

$app->post('/inscription',function(){
	$Inscription = new controleurs\InscriptionControleur();
	$Inscription->inscription($_POST['pseudo_inscrit'],$_POST['mp_inscrit'],$_POST['cmp_inscrit']);
})->setName('InscriptionPOST');

$app->get('/deconnexion', function(){
    unset($_SESSION['pseudo']);
    unset($_SESSION['mp']);
})->setName("DeconnexionGET");

//Page de liste des utilisateurs
$app->get('/users', function($request, $response, $args){
    if(!controleurs\ConnexionControleur::checkConnexion($_SESSION['pseudo'], $_SESSION['mp']))
        return $response->withRedirect("/");
    $controleur = new controleurs\UtilisateurControleur();
    echo $controleur->renderListUsers();
})->setName('UsersGET');

//Page de détail pour un utilisateur
$app->get('/user/{id}', function($request, $response, $args){
    if(!controleurs\ConnexionControleur::checkConnexion($_SESSION['pseudo'], $_SESSION['mp']))
        return $response->withRedirect("/");
    $controleur = new controleurs\UtilisateurControleur();
    echo $controleur->renderUser($args['id']);
})->setName("UserGET");

//Page de liste des appartements
$app->get('/logements', function($request, $response, $args){
    if(!controleurs\ConnexionControleur::checkConnexion($_SESSION['pseudo'], $_SESSION['mp']))
        return $response->withRedirect("/");
    $controleur = new controleurs\LogementControleur();
    echo $controleur->renderListLogement();
})->setName('LogementsGET');

//Page de détail pour un utilisateur
$app->get('/logement/{id}', function($request, $response, $args){
    if(!controleurs\ConnexionControleur::checkConnexion($_SESSION['pseudo'], $_SESSION['mp']))
        return $response->withRedirect("/");
    $controleur = new controleurs\LogementControleur();
    echo $controleur->renderLogement($args['id']);
})->setName("LogementGET");

$app->get('/createGroup', function($request, $response, $args){
    if(!controleurs\ConnexionControleur::checkConnexion($_SESSION['pseudo'], $_SESSION['mp']))
        return $response->withRedirect("/");
    $controleur = new controleurs\GroupeControleur();
    echo $controleur->createGroup();
})->setName("CreateGroupGET");

//Lancement du micro-framework
$app->run();

