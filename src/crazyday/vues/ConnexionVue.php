<?php
namespace crazyday\vues;
class ConnexionVue {
	
	public function render($i) {
		//$app = \Slim\Slim::getInstance();
		$content ="";
		switch ($i) {
			case 1: {
				$content = '<form method="POST" action="/connexion">
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
					
					</br></br>

					</p1>';
					
				break;
			}
			case 2: {
				$content = '<form method="POST" action="/connexion">
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
					
					</br></br>
					</p1>';
					break;
			}
			case 3: {
				$p = $_SESSION['pseudo'];
				$content = '<form method="POST" action="/">
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
</html>';
  
		return $html;
	}
}