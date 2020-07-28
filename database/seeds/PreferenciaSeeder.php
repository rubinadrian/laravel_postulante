<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$contents = Storage::get('json/postulante_preferencia.json'); //disk('local') default
        $array = json_decode($contents, true);

        DB::table('area_coopunion_postulante')->insert($array);
    }
}
