<?php
namespace crazyday\controleurs;
use \crazyday\models\User as User;
use \crazyday\vues\ConnexionVue as ConnexionVue;

class ConnexionControleur{


	public function afficher(){
		//affiche le formulaire quand on arrive sur la page, donc ne controle pas les données
		echo "poule";
		/*$connect = new ConnexionVue();
		print $connect->render(1);*/

	}
	
	public function connexion($pseudo =null,$mp=null){
		// controle la connexion
		echo "poule";
		/*$connect = new ConnexionVue();
				//filtrer pseudo et mot de pass ici !!!!
				$pseudo=filter_var($pseudo,FILTER_SANITIZE_STRING);
				$mp=filter_var($mp,FILTER_SANITIZE_STRING);
				$verif = User::where('pseudo', '=',$pseudo)->first();
				if (empty($verif['pseudo']) || !password_verify($mp,$verif['mp']){
					$html= $connect->render(2);
				}else{
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['mp'] = $mp;
					$html = $connect->render(3);
				}
			}
	}else{
		$html = $connect->render(3);
	}
		print $html;
		*/
	}

}