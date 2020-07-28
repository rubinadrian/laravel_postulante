<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = "familiares";

    protected $hidden = ['created_at', 'updated_at'];

}
