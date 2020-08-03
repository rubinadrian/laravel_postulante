<?php

namespace App\Http\Controllers;

use App\Postulante;
use App\Localidad;
use App\Familiar;
use App\Estudio;
use App\Experiencia;
use App\Referencia;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;

class PostulanteController extends Controller
{

	public function filters(Request $request) {

		 // Auth Guard en esta ruta

		 $dt = Carbon::parse(now());
		 $to = $dt->subYears($request->edad_minima)->format('Y-m-d');
		 $from = $dt->subYears($request->edad_maxima)->format('Y-m-d');

		 $query = Postulante::whereDate('fecha_nacimiento', '<=', $to);
		 $query = $query->whereDate('fecha_nacimiento', '>=', $from);

		 if($request->genero_id)
		 $query = $query->where('genero_id', $request->genero_id);

		 if($request->provincia_id)
		 $query = $query->where('provincia_id', $request->provincia_id);

		 if($request->localidad_id)
		 $query = $query->where('localidad_id', $request->localidad_id);

		 if($request->vivienda)
		 $query = $query->where('vivienda', $request->vivienda);
		 
		 if($request->nivel_estudio_id)
		 $query = $query->whereHas('estudios', function($q) use ($request) {
		 	$q->whereIn('nivel_estudio_id', $request->nivel_estudio_id);
		 });

		 if($request->area_estudio)
		 $query = $query->whereHas('estudios', function($q) use ($request) {
		 	$q->whereIn('area_estudio_id', $request->area_estudio);
		 });
		 
		 if($request->area_laboral)
		 $query = $query->whereHas('experiencias', function($q) use ($request) {
		 	$q->whereIn('area_laboral_id', $request->area_laboral);
		 });

		if($request->areas_coopunion)
		 $query = $query->whereHas('preferencias', function($q) use ($request) {
		 	$q->whereIn('area_coopunion_id', $request->areas_coopunion);
		 });
		 

		 return $query->limit(50)->get();

	}

    
    public function show($uid_firebase)
    {
        $postulante = Postulante::with(['familiares','estudios','experiencias','referencias','preferencias'])
        	->where('keyfirestore', $uid_firebase)->first();

        if(!$postulante) return;

        $localidades = [];
    	if($postulante && $postulante->provincia_id) {
    		$localidades = Localidad::where('provincia_id', $postulante->provincia_id)->get();
    	}

    	return [ 'localidades'=>$localidades, 'postulante'=>$postulante ];
    }


    public function getPostulanteById($id) {
    	$postulante = Postulante::with(['familiares','estudios','experiencias','referencias','preferencias'])->find($id);

        if(!$postulante) return;

        $localidades = [];
    	if($postulante && $postulante->provincia_id) {
    		$localidades = Localidad::where('provincia_id', $postulante->provincia_id)->get();
    	}

    	return [ 'localidades'=>$localidades, 'postulante'=>$postulante ];
    }


    public function update(Request $request) {

    	$is_admin = User::isAdmin($request->uid);
    	
    	if($request->id) {
    		$p = Postulante::find($request->id);
    	} else {
    		if(!$is_admin && $request->uid) {
    			$p = Postulante::where('keyfirestore', $request->uid)->first();
    		}
    	}

    	if(!$p) {
    		$p = new Postulante();
    		$p->keyfirestore = $request->uid;
    	}

    	// Datos Personales   		
		$p->apellido = $request->personal['apellido'];
		$p->celular = $request->personal['celular'];
		$p->dni = $request->personal['dni'];
		$p->domicilio = $request->personal['domicilio'];
		$p->email = $request->personal['email'];
		$p->fecha_nacimiento = Carbon::parse($request->personal['fecha_nacimiento']);
		$p->genero_id = $request->personal['genero_id'];
		$p->localidad_id = $request->personal['localidad_id']??'14182140';
		$p->nombre = $request->personal['nombre'];
		$p->provincia_id = $request->personal['provincia_id']??'14';
		$p->vivienda = $request->personal['vivienda'];
		$p->nombre_pareja = $request->familiares['nombre_pareja'];
		$p->estado_civil_id = $request->familiares['estado_civil_id'];
		$p->save();

		//Datos Familiares
		$p->familiares()->delete();
		$this->createFamiliar($request->familiares['madre'], 1, $p->id);
		
		$this->createFamiliar($request->familiares['padre'], 2, $p->id);
		
		foreach($request->familiares['hijos'] as $hijo) {
			$this->createFamiliar($hijo, 3, $p->id);
		}
		
		foreach($request->familiares['hermanos'] as $hermano) {
			$this->createFamiliar($hermano, 4, $p->id);
		}

		//Datos Estudio
		$p->estudios()->delete();
		foreach($request->estudios['estudios'] as $estudio) {
			$this->createEstudio($estudio, $p->id);
		}

		//Datos Experiencias
		$p->experiencias()->delete();
		foreach($request->experiencias['experiencias'] as $experiencia) {
			$this->createExperiencia($experiencia, $p->id);
		}

		//Datos Referencia
		$p->referencias()->delete();
		foreach($request->experiencias['referencias'] as $referencia) {
			$this->createReferencia($referencia, $p->id);
		}


		//Preferencias
		$p->preferencias()->detach();
		$p->preferencias()->attach($request->preferencias);
		
    	return ['msg' => 'successful'];

    }


    private function createFamiliar($data, $tipo_familiar_id, $postulante_id) {
    	$familiar = new Familiar();

    	if($tipo_familiar_id==1)  $data['genero_id'] = 1;
    	if($tipo_familiar_id==2)  $data['genero_id'] = 2;

    	$familiar->tipo_familiar_id = $tipo_familiar_id;
		$familiar->postulante_id = $postulante_id;

		$familiar->nombre = $data['nombre']??'';
		$familiar->oficio = $data['oficio']??'';
		$familiar->edad = $data['edad']??0;
		$familiar->genero_id = $data['genero_id']??'';

		$familiar->save();
    }

    public function createEstudio($data,  $postulante_id) {
    	$estudio = new Estudio();

	    $estudio->postulante_id = $postulante_id;

    	$estudio->nivel_estudio_id = $data['nivel_estudio_id'];
	    $estudio->area_estudio_id = $data['area_estudio_id'];
	    $estudio->institucion = $data['institucion'];
	    $estudio->completo = $data['completo'];
	    $estudio->titulo = $data['titulo'];

	    $estudio->save();
    }

    private function createExperiencia($data,  $postulante_id) {
    	$experiencia = new Experiencia();

    	$experiencia->postulante_id = $postulante_id;

		$experiencia->empresa = $data['empresa'];
		$experiencia->area_laboral_id = $data['area_laboral_id'];
		$experiencia->funcion = $data['funcion'];
		$experiencia->fecha_inicio = Carbon::parse($data['fecha_inicio']??'');
		$experiencia->fecha_fin = Carbon::parse($data['fecha_fin']??'');
		$experiencia->observacion = $data['observacion'];

		$experiencia->save();
    }

    private function createReferencia($data,  $postulante_id) {
    	$referencia = new Referencia();

    	$referencia->postulante_id = $postulante_id;

		$referencia->empresa = $data['empresa'];
		$referencia->contacto = $data['contacto'];
		$referencia->telefono = $data['telefono'];
		$referencia->observacion = $data['observacion'];

		$referencia->save();
    }


}


/*
$users = User::with(['client' => function($query) {
        $query->select(['id', 'name']);
    }])->find(2);
*/

/*
    nivel_estudio_id: '',
    area_estudio_id: '',
    institucion: '',
    completo: true,
    titulo: ''
*/