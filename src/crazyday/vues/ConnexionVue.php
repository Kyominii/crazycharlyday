<?php
namespace giftbox\vues;
class ConnexionVue {
	
	public function render($i) {
		$app = \Slim\Slim::getInstance();
		switch ($i) {
			case 1: {
				$content = '<form method="POST" action="'.$app->urlFor("ConnexionPOST").'">
					<p> 
						Nom d\'utilisateur :
					<input type="text" name="pseudo" />
						Mot de passe :
					<input type="password" name="mp"/>
					<input type="submit" value="Connexion">
					</br>
					</p>
					</form>
					<p1>
					<a href="'.$app->urlFor('inscriptionGET').'">ici</a>
					</br></br>

					</p1>';
					
				break;
			}
			case 2: {
				$content = '<form method="POST" action="'.$app->urlFor("ConnexionPOST").'">
					<p> 
						Nom d\'utilisateur :
					<input type="text" name="pseudo" />
						Mot de passe :
					<input type="password" name="mp"/>
						Erreur mauvais pseudo/mot de passe  
					<input type="submit" value="Connexion">
					</p>
					</form>
					<p1>
					Vous n\'êtes pas inscrit ? cliquez 
					<a href="'.$app->urlFor('inscriptionGET').'">ici</a>
					</br></br>
					</p1>';
					break;
			}
			case 3: {
				$p = $_SESSION['pseudo'];
				$content = '<form method="POST" action="'.$app->urlFor("AccueilGET").'">
								<p> 
								Bonjours '.$p.
								'<input type="submit" name="deco" value="Retourner a l\'accueil">
								</p>
								</br></br>';
			break;
			}
		}
		$html = '
<!DOCTYPE html>
<html>
<div class="content">
	'.$content.'

</div>
</body>
</html>'
  }


		
		return $html;
	}
}