<?php

use Illuminate\Database\Seeder;
use App\NivelEstudio;

class NivelEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [["id"=>"1","nombre"=>"Primario"],
					["id"=>"2","nombre"=>"Secundario"],
					["id"=>"3","nombre"=>"Terciario"],
					["id"=>"4","nombre"=>"Universitario"],
					["id"=>"5","nombre"=>"Otro"]];

		NivelEstudio::insert($array);
    }
}
