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
        return AreaEstudio::orderBy('nombre', 'asc')->get();
    }

    public function update(Request $request)
    {
        if ($request->has('id'))
        {
            $area = AreaEstudio::find($request->id);
        }
        else
        {
            $area = new AreaEstudio();
        }

        if ($area && $request->has('nombre'))
        {
            $area->nombre = $request->nombre;
            $area->save();
            return ['ok'=>true];
        }

        return ['ok'=>false];
    }

    public function remove(Request $request)
    {
        if ($request->has('id'))
        {
            $area = AreaEstudio::find($request->id);
            if($area) {
                $area->delete();
            }
        }
    }

}
