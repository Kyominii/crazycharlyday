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
}