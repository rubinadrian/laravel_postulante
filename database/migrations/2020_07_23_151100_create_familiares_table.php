<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postulante_id')->nullable()->constrained('postulantes');
            $table->foreignId('tipo_familiar_id')->nullable()->constrained('tipos_familiares');
            $table->string('nombre')->nullable();
            $table->string('oficio')->nullable();
            $table->bigInteger('edad')->nullable();
            $table->foreignId('genero_id')->nullable()->constrained('generos');
            $table->boolean('vive')->default(true);
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
        Schema::dropIfExists('familiares');
    }
}