<?php

namespace crazyday\modeles;


class Groupe extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'groupe';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function membres(){
        return $this->hasMany('\crazyday\modeles\EstMembre', 'id_groupe');
    }
}