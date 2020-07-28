<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaCoopunion extends Model
{
    protected $table = 'areas_coopunion';
     protected $hidden = ['created_at', 'updated_at'];


    public function postulantes()
    {
        return $this->belongsToMany('App\Postulante');
    }
}
