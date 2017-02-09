<?php
namespace crazyday\vues;
class InscriptionVue {
	public function render($i,$tab=null){
		$content='';
		switch($i){
			case 1: {
				$racine="";
				$content='<form method="POST" action="/inscription">
				Nom d\'utilisateur :';
						if (empty($tab['pseudo'])){
							$content.='<div style="width:230px; display:inline-block;">Votre nom : </div><input type="text" name="pseudo_inscrit" />Nom non valide</br>';
						}elseif (isset($tab['pseudo'])){
							$p = $tab['pseudo'];
							$content.='<div style="width:230px; display:inline-block;">Votre nom : </div><input type="text" name="pseudo_inscrit" value='.$p.' /></br>
							';
						}
						$content.='</div></div>
						</br>
						<div style="width:230px; display:inline-block;">Mot de passe: </div> <input type="password" name="mp_inscrit" />
						';
						if (empty($tab['mp'])){
							$content.='mot de passe non valide';
						}
						$content.='</div>
						</br></br>
						<div style="width:230px; display:inline-block;">Confirmer mot de passe</div><input type="password" name="cmp_inscrit" />
						</div></div>
						</br>
						</br>
						';
						
						$content.='
						<input class="btn btn-lg btn-default" type="submit" value="Inscription" />
						
						Pour retourner à l\'accueil, cliquez <a href="/">ici</a>
						</form>
						</br>
						</br>
						';

						
			}
			case 2: {
				$racine="";
				$content = '<div class="jumbotron" style="background-color:#999999">
						<h1>Merci de vous etre inscrit</h1>
						<p>Pour retourner à l\'accueil cliquez 
							<a href="/" style="text-decoration:none;">ici</a></p>
						</div>';
				$content='<p>
							Merci de vous êtes inscrit.</br>
							Pour retourner à l\'accueil cliquez 
							<a href="/">ici</a>
							</p>';
				break;
			}
			case 3: {
				$racine="";
				$content='<form method="POST" action="/inscription">';
				$content.='
					<div style="width:230px; display:inline-block; color:#aaaaaa">Votre nom : </div><input type="text" name="pseudo_inscrit" /></br></br>
					<div style="width:230px; display:inline-block; color:#aaaaaa">Mot de passe : </div><input type="password" name="mp_inscrit" /></br></br>
					<div style="width:230px; display:inline-block; color:#aaaaaa">Confirmer mot de passe :</div><input type="password" name="cmp_inscrit" /></br></br>
					<input class="btn btn-lg btn-default" type="submit" value="Inscription" />
						</form>';
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
				  <li><a href="#">Accueil</a></li>
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