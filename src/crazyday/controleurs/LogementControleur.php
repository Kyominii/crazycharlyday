<?php

namespace crazyday\controleurs;
use crazyday\vues as vues;
use crazyday\modeles as modeles;

class LogementControleur
{
    function renderListLogement(){

        $query = modeles\Logement::get();
        $object = null;
        foreach ($query as $logement){
            $object[] = $logement;
        }

        $vue = new vues\LogementVue($object);
        return $vue->render("LIST_LOGEMENT");
    }

    function renderLogement($id){

        $query = modeles\Logement::where('id', '=', $id)->first();

        if(empty($query)) {
            $vue = new vues\LogementVue();
            return $vue->render("NO_LOGEMENT");
        }

        $vue = new vues\LogementVue($query);
        return $vue->render("DETAILED_LOGEMENT");

    }

}