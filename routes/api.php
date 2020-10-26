<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::get('prueba/mail', 'PostulanteController@pruebaMail');

Route::middleware(['auth.firebase'])->group(function () {
    Route::post('areascoopunion', 'AreaCoopunionController@index');
    Route::post('areascoopunion/update', 'AreaCoopunionController@update');
    Route::post('areascoopunion/remove', 'AreaCoopunionController@remove');

    Route::post('areasestudios', 'AreaEstudioController@index');
    Route::post('areasestudios/update', 'AreaEstudioController@update');
    Route::post('areasestudios/remove', 'AreaEstudioController@remove');

    Route::post('areaslaborales', 'AreaLaboralController@index');
    Route::post('areaslaborales/update', 'AreaLaboralController@update');
    Route::post('areaslaborales/remove', 'AreaLaboralController@remove');

    Route::post('curriculum/getfile', 'CurriculumController@getFile');
    Route::post('curriculum/uploadfile', 'CurriculumController@uploadFile');

    // Route::post('login', 'LoginController@index');
    Route::get('usuario','UsuarioController@index');
    Route::put('usuario','UsuarioController@setUserAdmin');
    Route::delete('usuario/{id}','UsuarioController@delUserAdmin');

    Route::post('estadosciviles', 'EstadoCivilController@index');
    Route::post('generos', 'GeneroController@index');
    Route::post('nivelesestudios', 'NivelEstudioController@index');
    Route::post('provincias', 'ProvinciaController@index');
    Route::post('localidades/{provincia_id}', 'LocalidadController@index');
    Route::post('tiposfamiliares', 'TipoFamiliarController@index');

    Route::post('postulante/id/{id}', 'PostulanteController@getPostulanteById');
    Route::post('postulante/{uid_firebase}', 'PostulanteController@show');
    Route::put ('postulante', 'PostulanteController@update');
    Route::post('postulantes', 'PostulanteController@filters');
});


