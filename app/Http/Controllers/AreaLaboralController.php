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
        return AreaLaboral::orderBy('nombre', 'asc')->get();
    }

    public function update(Request $request)
    {
        if ($request->has('id'))
        {
            $area = AreaLaboral::find($request->id);
        }
        else
        {
            $area = new AreaLaboral();
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
            $area = AreaLaboral::find($request->id);
            if($area) {
                $area->delete();
            }
        }
    }

}
