<?php

use Illuminate\Database\Seeder;
use App\EstadoCivil;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
        	["id"=>1,"nombre"=>"Casado"],
			["id"=>2,"nombre"=>"Soltero"],
			["id"=>3,"nombre"=>"Concubinato"],
			["id"=>4,"nombre"=>"Divorciado"],
        ];

        EstadoCivil::insert($array);

    }
}
