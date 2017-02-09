<?php
namespace crazyday\controleurs;

use Illuminate\Database\Capsule\Manager as DB;
use crazyday\vues as vues;

class AccueilControleur
{

    function __construct(){
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
    }

    function renderAccueil(){
        $vue = new vues\AccueilVue();
        return $vue->render("DEFAUT");
    }
}