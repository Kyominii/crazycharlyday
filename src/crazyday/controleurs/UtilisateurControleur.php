<?php

namespace crazyday\controleurs;
use crazyday\vues as vues;
use crazyday\modeles as modeles;

class UtilisateurControleur
{

    function renderListUsers(){

        $query = modeles\User::get();
        $object = null;
        foreach ($query as $user){
            $object[] = $user;
        }

        $vue = new vues\UtilisateurVue($object);
        return $vue->render("LIST_USERS");
    }

    function renderUser($id){

        $query = modeles\User::where('id', '=', $id)->first();

        if(empty($query)) {
            $vue = new vues\UtilisateurVue();
            return $vue->render("NO_USER");
        }

        $vue = new vues\UtilisateurVue($query);
        return $vue->render("DETAILED_USER");
    }
}