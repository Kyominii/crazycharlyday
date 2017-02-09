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
            $html .= "<li><a href='/logement/$logements->id'>" . $logements->places . " places" . "<img src='/assets/apart/$logements->id.jpg'/>" . "</a></li>";
        }

        $html .= "</ul>";

        return $html;
    }

    private function htmlDetailedUser(){
        return "<p>ID : " . $this->pbc->id . "; NOM : " . $this->pbc->places  . "</p><img src='../assets/apart/" . $this->pbc->id . ".jpg' />";
    }

    function render($selecteur){

        switch ($selecteur){
            case "LIST_LOGEMENT":
                $html = $this->htmlListLogement();
                break;
            case "DETAILED_LOGEMENT":
                $html = $this->htmlDetailedUser();
                break;
            case "NO_LOGEMENT":
                $html = "<h1>Aucun logement ne correspond à cette URL !</h1>";
                break;
            default:
                $html = "<h1>Erreur : mauvais selecteur !!!</h1>";
        }

        return $html;
    }
}