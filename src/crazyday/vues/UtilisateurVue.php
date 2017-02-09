<?php

namespace crazyday\vues;


class UtilisateurVue
{
    private $pbc;

    function __construct($fromController=null){
        $this->pbc = $fromController;
    }

    private function htmlListUsers(){

        $html = "<ul>";

        foreach ($this->pbc as $users){
            $html .= "<li><a href='/user/$users->id'>" . $users->nom . " " . $users->message . "<img src='assets/user/$users->id.jpg'/>" . "</a></li>";
        }

        $html .= "</ul>";

        return $html;
    }

    function render($selecteur){

        switch ($selecteur){
            case "LIST_USERS":
                $html = $this->htmlListUsers();
                break;
            default:
                $html = "<h1>Erreur : mauvais selecteur !!!</h1>";
        }

        return $html;
    }
}