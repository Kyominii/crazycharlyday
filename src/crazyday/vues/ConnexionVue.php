<?php
namespace crazyday\vues;
class ConnexionVue {
	
	public function render($i) {
		//$app = \Slim\Slim::getInstance();
		$content ="";
		switch ($i) {
			case 1: {
				$racine="";
				$content = '<form method="POST" action="/connexion">
					
						<div style="width:230px; display:inline-block;color:#aaaaaa">Votre nom : </div>
					<input type="text" name="pseudo" /><br /><br />
						<div style="width:230px; display:inline-block;color:#aaaaaa">Mot de passe : </div>
					<input type="password" name="mp"/><br /><br />
					<input class="btn btn-lg btn-default" type="submit" value="Connexion">
					</br>
					
					</form>
	
					
					</br></br>';
					
				break;
			}
			case 2: {
				$content = '<form method="POST" action="/connexion">
					 <div style="width:230px; display:inline-block;color:#aaaaaa">Votre nom : </div>
					<input type="text" name="pseudo" /><br /><br />
						<div style="width:230px; display:inline-block;color:#aaaaaa">Mot de passe: </div>
					<input type="password" name="mp"/>
						Erreur mauvais pseudo/mot de passe  <br /><br />
					<input type="submit" class="btn btn-lg btn-default" value="Connexion">
					
					</form>
					
					<p style="font-size:18px;color:#aaaaaa>"Vous n\'êtes pas inscrit ? cliquez <a href="inscription" style="text-decoration:none">ici</a></p>
					
					</br></br>
					';
					break;
			}
			case 3: {
				$p = $_SESSION['pseudo'];
				$content = '<form method="GET" action="/">
								<p> 
								Bonjours '.$p.
								'<input type="submit" name="deco" value="Retourner a l\'accueil">
								</p>
								</br></br>';
			break;
			}
		}
		$html=<<<END
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Un toit pour tous</title>
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