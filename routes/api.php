<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.firebase'])->group(function () {

    Route::post('login', 'LoginController@index');
    Route::post('areascoopunion', 'AreaCoopunionController@index');
    Route::post('areasestudios', 'AreaEstudioController@index');
    Route::post('areaslaborales', 'AreaLaboralController@index');
    Route::post('estadosciviles', 'EstadoCivilController@index');
    Route::post('generos', 'GeneroController@index');
    Route::post('nivelesestudios', 'NivelEstudioController@index');
    Route::post('provincias', 'ProvinciaController@index');
    Route::post('localidades/{provincia_id}', 'LocalidadController@index');
    Route::post('tiposfamiliares', 'TipoFamiliarController@index');
    Route::post('postulante/id/{id}', 'PostulanteController@getPostulanteById');
    Route::post('postulante/{uid_firebase}', 'PostulanteController@show');
    Route::put('postulante', 'PostulanteController@update');
    Route::post('postulantes', 'PostulanteController@filters');
});


