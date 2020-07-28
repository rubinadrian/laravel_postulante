<?php

namespace App\Http\Controllers;

use App\AreaLaboral;
use Illuminate\Http\Request;

class AreaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AreaLaboral::all();
    }

}
