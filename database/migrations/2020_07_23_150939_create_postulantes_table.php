<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string('uid_fb')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('email')->nullable();
            $table->string('dni')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->foreignId('genero_id')->nullable()->constrained('generos');
            $table->foreignId('localidad_id')->nullable()->constrained('localidades');
            $table->foreignId('provincia_id')->nullable()->constrained('provincias');
            $table->foreignId('estado_civil_id')->nullable()->constrained('estados_civiles');
            $table->string('fijo')->nullable();
            $table->string('celular')->nullable();
            $table->string('nombre_pareja')->nullable();
            $table->boolean('vivienda')->nullable();
            $table->boolean('seleccionado')->nullable();
            $table->boolean('entrevistado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulantes');
    }
}

