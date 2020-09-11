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
        return AreaCoopunion::orderBy('nombre', 'asc')->get();
    }

    public function update(Request $request)
    {
        if ($request->has('id'))
        {
            $area = AreaCoopunion::find($request->id);
        }
        else
        {
            $area = new AreaCoopunion();
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
            $area = AreaCoopunion::find($request->id);
            if($area) {
                $area->delete();
            }
        }
    }

}
