<?php

use Illuminate\Database\Seeder;
use App\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [["id"=>"1", "nombre"=>"Femenino"],["id"=>"2", "nombre"=>"Masculino"]];

        Genero::insert($array);
    }
}
