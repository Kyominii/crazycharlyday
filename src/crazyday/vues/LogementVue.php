<?php

namespace crazyday\vues;


class LogementVue
{
    private $pbc;

    function __construct($fromController=null){
        $this->pbc = $fromController;
    }

    private function htmlListLogement(){
		$html="<div class='row'>";

        foreach ($this->pbc as $logements){

			
			$html.='<div class="col-sm-6 col-md-4"><a href="logement/' . $logements->id . '" style="text-decoration:none"><div class="thumbnail">' . "<img src='assets/apart/$logements->id.jpg' style=\"height:300px;\"/>
			<div class=\"caption\"> 
				<h3 align=\"center\">$logements->places places</h3> 
			</div> 
			</div></a></div>";
            

        }

        $html .= "</div>";
       
        return $html;
    }

    private function htmlDetailedUser(){
		return '<div class="jumbotron" style="background-color:#999999">
		<p align="center"><img src="./../assets/apart/' . $this->pbc->id . '.jpg"/></p>
        <h2 align="center">Logement '.$this->pbc->places.' places</h2>
        </div>';

    }

    function render($selecteur){

        switch ($selecteur){
            case "LIST_LOGEMENT":
                $content = $this->htmlListLogement();
				$racine="";
                break;
            case "DETAILED_LOGEMENT":
                $content = $this->htmlDetailedUser();
				$racine="./../";
                break;
            case "NO_LOGEMENT":
                $content = "<h1>Aucun logement ne correspond à cette URL !</h1>";
				$racine="./../";
                break;
            default:
                $html = "<h1>Erreur : mauvais selecteur !!!</h1>";
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
				  <li><a href="{$racine}">Accueil</a></li>
				  <li><a href="{$racine}logements">Les logements</a></li>
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