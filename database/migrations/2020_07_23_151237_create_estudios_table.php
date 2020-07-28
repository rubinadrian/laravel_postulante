<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postulante_id')->nullable()->constrained('postulantes');
            
            $table->foreignId('area_estudio_id')->nullable()->constrained('areas_estudios');
            $table->boolean('completo')->nullable();
            $table->string('institucion')->nullable();
            $table->string('titulo')->nullable();
            $table->foreignId('nivel_estudio_id')->nullable()->constrained('niveles_estudios');
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
        Schema::dropIfExists('estudios');
    }
}

