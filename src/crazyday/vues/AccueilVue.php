<?php

namespace crazyday\vues;

class AccueilVue
{

    private $pbc;

    function __construct($fromController=null)
    {
        $this->pbc = $fromController;
    }

    private function htmlDefaut(){
        return "<h1>MVC en place :D</h1>";
    }

    function render($selecteur){

        $html = "";
        switch ($selecteur){
            case "DEFAUT":
                $html = $this->htmlDefaut();
                break;
            default:
                $html = "<h1>Erreur : mauvais selecteur !!!</h1>";
        }

        return $html;
    }

}