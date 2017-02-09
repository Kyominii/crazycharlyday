<?php
namespace crazyday\controleurs;

use crazyday\modeles as modeles;
use crazyday\vues as vues;

class GroupeControleur
{

    function createGroup(){

        $user = modeles\EstMembre::where('id_user', '=', modeles\User::where('nom', '=', $_SESSION['pseudo'])->first()->id)->where('estCreateur', '=', true)->first();

        if(empty($user)){
            $groupe = new modeles\Groupe();
            $groupe->description = "";
            $groupe->id_logement = -1;
            $groupe->url = sha1(uniqid("groupecreate", true));;
            $groupe->save();

            $membre = new modeles\EstMembre();
            $membre->id_groupe = $groupe->id;
            $membre->id_user = modeles\User::where('nom', '=', $_SESSION['pseudo'])->first()->id;
            $membre->estCreateur = true;
            $membre->save();
        } else {
            $groupe = modeles\Groupe::where('id', '=', $user->id_groupe)->first();
        }


        $vue = new vues\GroupeVue($groupe);
        return $vue->render("CREATE_GROUP");
    }

}