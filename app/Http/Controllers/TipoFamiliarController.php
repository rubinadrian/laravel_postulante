<?php

namespace App\Http\Controllers;

use App\TipoFamiliar;
use Illuminate\Http\Request;

class TipoFamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoFamiliar::all();
    }

}
