<?php

namespace App\Http\Controllers;

use App\AreaCoopunion;
use Illuminate\Http\Request;

class AreaCoopunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AreaCoopunion::all();
    }

}
