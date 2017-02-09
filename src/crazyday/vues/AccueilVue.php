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
              <a href="/connexion" class="btn btn-lg btn-default">Connexion</a>
            </p>
          </div>';
    }
	
	private function logge(){
		$content = '<nav class="navbar navbar-inverse">
			<div class="container">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Un toit pour tous</a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				  <li><a href="./">Accueil</a></li>
				  <li><a href="logements">Les logements</a></li>
				  <li><a href="users">Utilisateurs</a></li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon profil<span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="#">Page personnelle</a></li>
					  <li><a href="#">Invitations</a></li>
					  <li role="separator" class="divider"></li>
					  <li><a href="#">Deconnexion</a></li>
					</ul>
				  </li>
				</ul>
			  </div><!--/.nav-collapse -->
			</div>
			</nav>
			<h1 align="center" style="color:#ffffff">Bienvenue sur UN TOIT POUR TOUS</h1>
			
			<div class="row">
				<div class="col-md-6"><a href="logements/" style="text-decoration:none"><div class="thumbnail">' . "<img src='assets/apart/logement.jpg' style=\"height:500px; width:500px;\"/>
			<div class=\"caption\"> 
				<h3 align=\"center\">Découvrez nos logements</h3> 
			</div> 
			</div></a>
			</div>".
				'<div class="col-md-6"><a href="users/" style="text-decoration:none"><div class="thumbnail">' . "<img src='assets/connexion.jpg' style=\"height:500px; width:500px;\"/>
			<div class=\"caption\"> 
				<h3 align=\"center\">Voir nos utilisateurs</h3> 
			</div> 
			</div></a></div>
			</div></div>";
			return $content;
	}

    function render($selecteur){

        $content = "";
        switch ($selecteur){
            case "DEFAUT":
                $content = $this->htmlDefaut();
				$racine = "./";
                break;
			case "LOGGE":
				$content = $this->logge();
				$racine="";
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