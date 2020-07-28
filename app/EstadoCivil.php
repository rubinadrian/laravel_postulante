<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = "estados_civiles";
     protected $hidden = ['created_at', 'updated_at'];
}
