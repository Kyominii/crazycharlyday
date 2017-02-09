<?php
namespace crazyday\vues;
class InscriptionVue {
	public function render($i,$tab=null){
		$content='';
		switch($i){
			case 1: {
				$content='<form method="POST" action="/inscription">';
						if (empty($tab['pseudo'])){
							$content.='<input type="text" name="pseudo_inscrit" />pseudo non valide';
						}elseif (isset($tab['pseudo'])){
							$p = $tab['pseudo'];
							$content.='<input type="text" name="pseudo_inscrit" value='.$p.' />
							';
						}
						$content.='</div></div>
						</br>
						<input type="password" name="mp_inscrit" />
						';
						if (empty($tab['mp']){
							$content.='mot de passe non valide';
						}
						$content.='</div>
						</br>
						<input type="password" name="cmp_inscrit" />
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
				$content='<p>
					<input type="text" name="pseudo_inscrit" />
					<input type="password" name="mp_inscrit" />
					<input type="password" name="cmp_inscrit" />'
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