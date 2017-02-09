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
            $html .= "<li><a href='/user/$users->id'>" . $users->nom . " " . $users->message . "<img src='/assets/user/$users->id.jpg'/>" . "</a></li>";
        }

        $html .= "</ul>";

        return $html;
    }

    private function htmlDetailedUser(){
        return "<p>ID : " . $this->pbc->id . "; NOM : " . $this->pbc->nom  . "; MESSAGE : " . $this->pbc->message . "</p><img src='/assets/user/" . $this->pbc->id . ".jpg' />";
    }

    function render($selecteur){

        switch ($selecteur){
            case "LIST_USERS":
                $html = $this->htmlListUsers();
                break;
            case "DETAILED_USER":
                $html = $this->htmlDetailedUser();
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