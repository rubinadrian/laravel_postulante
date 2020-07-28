<?php

use Illuminate\Database\Seeder;
use App\Estudio;

class EstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Storage::get('json/estudios_cursados.json'); //disk('local') default
        $contents = Storage::get('json/capacitaciones.json'); //disk('local') default

        $array = json_decode($contents, true);

        Estudio::insert($array);
    }
}
