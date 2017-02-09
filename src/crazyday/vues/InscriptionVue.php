<?php
namespace crazyday\vues;
class InscriptionVue {
	public function render($i,$tab=null){
		$content='';
		switch($i){
			case 1: {
				$content='<form method="POST" action="/inscription">
				pseudo :';
						if (empty($tab['pseudo'])){
							$content.='<input type="text" name="pseudo_inscrit" />pseudo non valide';
						}elseif (isset($tab['pseudo'])){
							$p = $tab['pseudo'];
							$content.='<input type="text" name="pseudo_inscrit" value='.$p.' />
							';
						}
						$content.='</div></div>
						</br>
						mot de passe: <input type="password" name="mp_inscrit" />
						';
						if (empty($tab['mp'])){
							$content.='mot de passe non valide';
						}
						$content.='</div>
						</br>
						confirmation mot de passe: <input type="password" name="cmp_inscrit" />
						</div></div>
						</br>
						</br>
						';
						
						$content.='
						<input type="submit" value="Inscription" />
						
						Pour retourner à l\'accueil, cliquez <a href="/">ici</a>
						</form>
						</br>
						</br>
						';

						break;
			}
			case 2: {
				$content='<p>
							Merci de vous êtes inscrit.</br>
							Pour retourner à l\'accueil cliquez 
							<a href="/">ici</a>
							</p>';
				break;
			}
			case 3: {
				$content='<form method="POST" action="/inscription">';
				$content.='<p>
					pseudo :<input type="text" name="pseudo_inscrit" /></br>
					mot de passe :<input type="password" name="mp_inscrit" /></br>
					confirmation mot de passe:<input type="password" name="cmp_inscrit" /></br>
					<input type="submit" value="Inscription" />
						';
			}
		}
		$html = <<<END
<!DOCTYPE html>
<html>
<body>

<div class="well">

		$content
</body>
</html>

END;

		
		return $html;
	}
}