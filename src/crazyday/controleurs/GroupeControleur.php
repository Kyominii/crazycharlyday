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

    public function detailGroup($id){

        $user = modeles\EstMembre::where('id_groupe', '=', modeles\Groupe::where('url', '=', $id)->first()->id)->where('estCreateur', '=', true)->where('id_user', '=', modeles\User::where('nom', '=', $_SESSION['pseudo'])->first()->id)->first();
        if(empty($user)){
            $vue = new vues\GroupeVue();
            return $vue->render("FORBIDDEN");
        } else {

            $object['groupe'] =  modeles\Groupe::where('url', '=', $id)->first();
            $members = modeles\EstMembre::where('id_groupe', '=', $object['groupe']->id)->get();
            foreach ($members as $member){
                $object['membres'][] = [modeles\User::where('id', '=', $member->id_user)->first(), $member->estCreateur];
            }

            $vue = new vues\GroupeVue($object);
            return $vue->render("DETAIL_GROUP");
        }
    }

    public function addMember($url, $member){
        $user = modeles\EstMembre::where('id_groupe', '=', modeles\Groupe::where('url', '=', $url)->first()->id)->where('estCreateur', '=', true)->where('id_user', '=', modeles\User::where('nom', '=', $_SESSION['pseudo'])->first()->id)->first();
        if(empty($user)){
            $vue = new vues\GroupeVue();
            return $vue->render("FORBIDDEN");
        } else {

            $groupe =  modeles\Groupe::where('url', '=', $url)->first();
            $checkMembre = modeles\EstMembre::where('id_groupe', '=', $groupe->id)->where('id_user', '=', member)->first();

            if(empty($checkMembre)){
                $m = new modeles\EstMembre();
                $m->id_groupe = $groupe->id;
                $m->id_user = $member;
                $m->estCreateur = false;
                $m->save();
            }

            return true;
        }
    }

}