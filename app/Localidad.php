<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidades';
     protected $hidden = ['created_at', 'updated_at'];
}
