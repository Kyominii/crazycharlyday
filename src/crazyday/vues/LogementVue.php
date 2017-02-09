<?php

namespace crazyday\vues;


class LogementVue
{
    private $pbc;

    function __construct($fromController=null){
        $this->pbc = $fromController;
    }

    private function htmlListLogement(){

        $html = "<ul>";

        foreach ($this->pbc as $logements){
            $html .= "<li><a href='/user/$logements->id'>" . $logements->places . " places" . "<img src='/assets/apart/$logements->id.jpg'/>" . "</a></li>";
        }

        $html .= "</ul>";

        return $html;
    }

    function render($selecteur){

        switch ($selecteur){
            case "LIST_LOGEMENT":
                $html = $this->htmlListLogement();
                break;
            case "DETAILED_USER":
                $html = "";
                break;
            case "NO_USER":
                $html = "<h1>Aucun utilisateur ne correspond à cette URL !</h1>";
                break;
            default:
                $html = "<h1>Erreur : mauvais selecteur !!!</h1>";
        }

        return $html;
    }
}