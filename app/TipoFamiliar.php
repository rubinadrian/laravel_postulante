<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFamiliar extends Model
{
    protected $table = "tipos_familiares";
     protected $hidden = ['created_at', 'updated_at'];
}
