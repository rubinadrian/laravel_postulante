<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelEstudio extends Model
{
    protected $table = "niveles_estudios";
     protected $hidden = ['created_at', 'updated_at'];
}
