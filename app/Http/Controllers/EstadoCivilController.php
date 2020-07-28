<?php

namespace App\Http\Controllers;

use App\EstadoCivil;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EstadoCivil::All();
    }


}
