<?php

namespace App\Http\Controllers;

use App\AreaCoopunion;
use App\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{

    public function getFile(Request $request){
        $p = Postulante::where('keyfirestore', $request->uid)->first();
        if($p) {
            return Storage::download($p->curriculum_file);
        }
    }


    public function uploadFile(Request $request){

        $name = $request->file('file')->getClientOriginalName();
        $extension = $request->file('file')->extension();

        if(array_search($extension, ['pdf','doc','docx']) !== false) {

            $p = Postulante::where('keyfirestore', $request->uid)->first();
            if(!$p) {
                $p = new Postulante();
                $p->keyfirestore = $request->uid;
            } else if(Storage::exists($p->curriculum_file)) {
                Storage::delete($p->curriculum_file);
            }

            $path = 'curriculums';

            $filename = Storage::putFile($path, $request->file('file'));

            $p->curriculum_file = $filename;
            $p->save();

            return response()->json(['ok'=>true, 'filename'=> $filename, 'uid'=>$request->uid]);
        }
        return ['ok'=>false];
    }

}
