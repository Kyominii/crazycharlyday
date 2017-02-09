<?php

namespace crazyday\vues;

class AccueilVue
{

    private $pbc;

    function __construct($fromController=null)
    {
        $this->pbc = $fromController;
    }

    private function htmlDefaut(){
        return '<div class="inner cover" style="margin-top:250px;">
            <h1 align="center" style="color:#ffffff">Bienvenue sur UN TOIT POUR TOUS</h1>
            <p class="lead" align="center" style="font-size:25px; color:#aaaaaa">
			Vous êtes étudiant? Vous êtes à la recherche d\'un logement? Vous êtes interresser par la colocation? Alors notre site est fait pour vous! 
			Connectez vous afin de rejoindre ou créer un groupe de colocation et ainsi trouver votre nouvelle demeur.
			</p>
            <p class="lead" align="center">
              <a href="connexion" class="btn btn-lg btn-default">Connexion</a>
            </p>
          </div>';
    }

    function render($selecteur){

        $content = "";
        switch ($selecteur){
            case "DEFAUT":
                $content = $this->htmlDefaut();
				$racine = "./";
                break;
            default:
                $content = "<h1>Erreur : mauvais selecteur !!!</h1>";
				$racine="./";
        }
		$html=<<<END
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Un tois pour tous</title>
			<link href="{$racine}assets/css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css">
			<link href="{$racine}assets/css/bootstrap-theme.min.css" rel="stylesheet" media="all" type="text/css">
		</head>
		<body style="background-color:#333333">
			<div class="container">
			
			$content
			</div>
			
		<footer style="margin-top:100px;">
			<p align="center" style="color:#aaaaaa">Crazy Charly Day 2017 - Equipe RKO</p>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="{$racine}assets/js/bootstrap.min.js"></script>
		</body>

		</html>
END;
        return $html;
    }

}