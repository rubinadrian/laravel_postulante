<?php

use Illuminate\Database\Seeder;
use App\Experiencia;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Storage::get('json/experiencias.json');
        $array = json_decode($contents, true);

        Experiencia::insert($array);
    }
}
