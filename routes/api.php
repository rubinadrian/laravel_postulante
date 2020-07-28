<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('areascoopunion', 'AreaCoopunionController@index');
Route::get('areasestudios', 'AreaEstudioController@index');
Route::get('areaslaborales', 'AreaLaboralController@index');
Route::get('estadosciviles', 'EstadoCivilController@index');
Route::get('generos', 'GeneroController@index');
Route::get('nivelesestudios', 'NivelEstudioController@index');
Route::get('provincias', 'ProvinciaController@index');
Route::get('localidades/{provincia_id}', 'LocalidadController@index');
Route::get('tiposfamiliares', 'TipoFamiliarController@index');

Route::get('postulante/id/{id}', 'PostulanteController@getPostulanteById');
Route::get('postulante/{uid_firebase}', 'PostulanteController@show');

Route::put('postulante', 'PostulanteController@update');
Route::post('postulantes', 'PostulanteController@filters');