<?php

use Illuminate\Database\Seeder;
use App\Postulante;


class PostulanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Storage::get('json/postu.json'); //disk('local') default
        $array = json_decode($contents, true);

        Postulante::insert($array);
    }
}
