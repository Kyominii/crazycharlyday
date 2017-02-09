<?php

namespace crazyday\modeles;


class EstMembre extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'estmembre';
    protected $primaryKey = 'id_groupe, id_user';
    public $timestamps = false;

}