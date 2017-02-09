<?php

namespace crazyday\vues;


class UtilisateurVue
{
    private $pbc;

    function __construct($fromController=null){
        $this->pbc = $fromController;
    }

    private function htmlListUsers(){

        $html="<div class='row'>";

        foreach ($this->pbc as $users){

			
			$html.='<div class="col-sm-6 col-md-4"><div class="thumbnail">' . "<img src='assets/user/$users->id.jpg'/>
			<div class=\"caption\"> 
				<h3 align=\"center\">$users->nom</h3> 
			</div> 
			</div></div>";
            

            

        }

        $html .= "</div>";

        return $html;
    }

	
	function render($selecteur){

        $content = "";
        switch ($selecteur){
            case "LIST_USERS":
                $content = $this->htmlListUsers();
				$racine = "./";
                break;
            case "DETAILED_USER":
                $html = $this->htmlDetailedUser();
                break;
            case "NO_USER":
                $html = "<h1>Aucun utilisateur ne correspond à cette URL !</h1>";
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
			<link href="{$racine}assets/css/plus.css" rel="stylesheet" media="all" type="text/css">
		</head>
		<body style="background-color:#333333">
		
			<div class="container">
			<nav class="navbar navbar-inverse">
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
				  <li><a href="#">Accueil</a></li>
				  <li><a href="#about">Les logements</a></li>
				  <li><a href="{$racine}users">Utilisateurs</a></li>
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