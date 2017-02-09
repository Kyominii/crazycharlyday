<?php

namespace crazyday\vues;

class GroupeVue
{
    private $pbc;

    function __construct($fromController=null){
        $this->pbc = $fromController;
    }

    private function htmlCreatedGroup(){
        $html = '<h1 align = "center" style="color:#ffffff;">Gestion de groupe</h1>
		<h2 style="color:#aaaaaa;">Vous pouvez dès maintenant constituer un groupe afin d\'inviter d\'autres utilisateurs a vous rejoindre. Une fois que votre grope est constitué, vous pourrez candidater  pour obtenir un logement correspondant</h2>';
		$html.="<p style=\"font-size:18px;color:#aaaaaa\">Vous pouvez être propriétaires d'un groupe au maximum, cliquez<a href='/group/" . $this->pbc->url . "'> ici </a> pour gerer votre groupe courrant</p>";

        return $html;
    }

    private function htmlDetailGroup(){
        $html = "<h1 align=\"center\" style=\"color:#ffffff;\">Groupe n°" . $this->pbc['groupe']->id . "</h1>
        <div style=\"color:#aaaaaa;\"><ul>";

        foreach ($this->pbc['membres'] as $membre){
            if($membre[1] == 1)
                $html.="<li><i>" . $membre[0]->nom . "</i></li>";
            else
                $html.="<li>" . $membre[0]->nom . "</li>";
        }
        $html.="</ul></div><p style=\"font-size:#aaaaaa;\">Logement : ".$this->pbc['groupe']->id_logement."</p>";
        $html.="<p style=\"font-size:#aaaaaa;\">Description : " . $this->pbc['groupe']->description."</p>";

        return $html;
    }

    function render($selecteur){

        $content = "";

        switch ($selecteur){
            case "CREATE_GROUP":
                $content = $this->htmlCreatedGroup();
				$racine="./";
                break;
            case "NO_GROUP":
                $content = "<h1>Aucun groupe ne correspond à cette URL !</h1>";
            case "DETAIL_GROUP":
                $content = $this->htmlDetailGroup();
				$racine="./../";
                break;
            case "FORBIDDEN":
                $html = "<h1>Vous n'avez pas la permission d'acéder à ce groupe !</h1>";
                break;
            default:
                $content = "<h1>Erreur : mauvais selecteur !!!</h1>";
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
					  <li><a href="{$racine}deconnexion">Deconnexion</a></li>
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