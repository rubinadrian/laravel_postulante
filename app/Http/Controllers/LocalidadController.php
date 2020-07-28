<?php

namespace App\Http\Controllers;

use App\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provincia_id)
    {
        return Localidad::where('provincia_id', $provincia_id)->get();
    }

  
}
