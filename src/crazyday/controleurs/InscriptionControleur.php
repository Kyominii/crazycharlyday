<?php
namespace crazyday\controleurs;
use \crazyday\models\User as Utilisateur;
use \crazyday\vues\InscriptionVue as InscriptionVue;
class InscriptionControleur{
	public function afficher(){
		$v = new InscriptionVue(); 
		print $v->render(3);
	}

	public function inscription($pseudo =null,$mp=null,$cmp=null){
		$pseudo =filter_var($pseudo,FILTER_SANITIZE_STRING);
		$mp=filter_var($mp,FILTER_SANITIZE_STRING);
		$cmp=filter_var($cmp,FILTER_SANITIZE_STRING);
		$email=filter_var($email,FILTER_SANITIZE_EMAIL);
		$cemail=filter_var($cemail,FILTER_SANITIZE_EMAIL);
		$tabverite = array();
		//vérification pseudo
		$test = User::where('pseudo', '=', $pseudo)->first();
		if(isset($pseudo) && empty($test) && $pseudo!=null){//rajouter d'autre vérification
			$tabverite['pseudo'] =$pseudo;
		}
		//vérification mot de passe
		if(isset($mp) && $mp==$cmp && $mp!=null){
			$tabverite['mp']=$mp;
		}
		/*vérification email
		$test2 = User::where('email', '=', $email)->first();
		if(isset($email) && $email==$cemail && empty($test2) && $email!=null){
			$tabverite['email']=$email;
		}
		*/
		$v = new InscriptionVue(); 
		if (!isset($tabverite['pseudo']) || !isset($tabverite['mp'])){
			$res=$v->render(1,$tabverite);
		}else{
			if (isset($pseudo) && isset($mp) && isset($email)){
			$n = new Utilisateur();
			$n->pseudo=$pseudo;
			$n->mp = $mp; //password_hash($mp,PASSWORD_DEFAULT['cost'=> 12] );
			$n->save();
			$res=$v->render(2,$tabverite);
			$_SESSION['pseudo']=$pseudo;
			$_SESSION['mp']=$mp;
		}else{
			$res=$v->render(1,$tabverite);
		}
	}
		print $res;
		 
	}
}