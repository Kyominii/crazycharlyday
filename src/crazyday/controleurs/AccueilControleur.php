<?php
namespace crazyday\controleurs;

use crazyday\vues as vues;

class AccueilControleur
{
    function renderAccueil(){
        $vue = new vues\AccueilVue();
        return $vue->render("DEFAUT");
    }
}