<?php

namespace App\Http\Controllers;

use App\AreaEstudio;
use Illuminate\Http\Request;

class AreaEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AreaEstudio::all();
    }

}
