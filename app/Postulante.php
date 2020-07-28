<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table = "postulantes";
     protected $hidden = ['created_at', 'updated_at'];


    public function preferencias()
    {
        return $this->belongsToMany('App\AreaCoopunion');
    }

    public function familiares()
    {
        return $this->hasMany('App\Familiar');
    }

    public function estudios()
    {
        return $this->hasMany('App\Estudio');
    }

    public function experiencias()
    {
        return $this->hasMany('App\Experiencia');
    }

    public function referencias()
    {
        return $this->hasMany('App\Referencia');
    }

}
