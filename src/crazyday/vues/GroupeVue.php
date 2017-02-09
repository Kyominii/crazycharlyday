<?php

namespace crazyday\vues;

class GroupeVue
{
    private $pbc;

    function __construct($fromController=null){
        $this->pbc = $fromController;
    }

    private function htmlCreatedGroup(){
        $html = "<a href='" . $this->pbc->url . "'>LIEN</a>";

        return $html;
    }

    function render($selecteur){

        $html = "";

        switch ($selecteur){
            case "CREATE_GROUP":
                $html = $this->htmlCreatedGroup();
                break;
            case "NO_GROUP":
                $html = "<h1>Aucun groupe ne correspond à cette URL !</h1>";
                break;
            default:
                $html = "<h1>Erreur : mauvais selecteur !!!</h1>";
        }

        return $html;
    }
}