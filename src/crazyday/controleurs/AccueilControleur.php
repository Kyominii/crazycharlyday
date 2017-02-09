<?php
namespace crazyday\controleurs;


use crazyday\vues as vues;

class AccueilControleur
{

    function renderAccueil(){
		 $vue = new vues\AccueilVue();
		if(!controleurs\ConnexionControleur::checkConnexion($_SESSION['pseudo'], $_SESSION['mp'])){
			return $vue->render("DEFAUT");
		}else{
			return $vue->render('LOGGE')
		}
       
        
    }
}