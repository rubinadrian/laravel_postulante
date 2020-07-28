<?php

namespace App\Http\Controllers;

use App\NivelEstudio;
use Illuminate\Http\Request;

class NivelEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NivelEstudio::all();
    }

   
}
