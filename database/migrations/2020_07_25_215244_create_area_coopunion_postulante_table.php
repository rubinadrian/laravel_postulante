<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaCoopunionPostulanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_coopunion_postulante', function (Blueprint $table) {
            $table->foreignId('area_coopunion_id')->constrained('areas_coopunion');
            $table->foreignId('postulante_id')->constrained('postulantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_coopunion_postulante');
    }
}
