<?php

use Illuminate\Database\Seeder;
use App\Localidad;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Storage::get('json/localidades.min.json'); //disk('local') default
        $array = json_decode($contents, true);

        Localidad::insert($array);
    }
}
