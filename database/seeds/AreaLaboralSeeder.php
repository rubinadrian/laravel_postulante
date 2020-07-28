<?php

use Illuminate\Database\Seeder;
use App\AreaLaboral;

class AreaLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [["id"=>1,"nombre"=>"Abastecimiento y Logística"],
				["id"=>2,"nombre"=>"Administración, Contabilidad y Finanzas"],
				["id"=>3,"nombre"=>"Aduana y Comercio Exterior"],
				["id"=>4,"nombre"=>"Atención al Cliente, Call Center y Telemarketing"],
				["id"=>5,"nombre"=>"Comercial, Ventas y Negocios"],
				["id"=>6,"nombre"=>"Comunicación, Relaciones Institucionales y Públicas"],
				["id"=>7,"nombre"=>"Construcción"],
				["id"=>8,"nombre"=>"Diseño"],
				["id"=>9,"nombre"=>"Educación, Docencia e Investigación"],
				["id"=>10,"nombre"=>"Farmacia / Bioquímica"],
				["id"=>11,"nombre"=>"Gastronomía y Turismo"],
				["id"=>12,"nombre"=>"Gerencia y Dirección General"],
				["id"=>13,"nombre"=>"Ingenierías"],
				["id"=>14,"nombre"=>"Legales"],
				["id"=>15,"nombre"=>"Marketing y Publicidad"],
				["id"=>16,"nombre"=>"Minería, Petróleo y Gas"],
				["id"=>17,"nombre"=>"Oficios y Otros"],
				["id"=>18,"nombre"=>"Otros"],
				["id"=>19,"nombre"=>"Producción y Manufactura"],
				["id"=>20,"nombre"=>"Recursos Humanos"],
				["id"=>21,"nombre"=>"Salud"],
				["id"=>22,"nombre"=>"Salud, Medicina y Farmacia"],
				["id"=>23,"nombre"=>"Secretarias y Recepción"],
				["id"=>24,"nombre"=>"Seguros"],
				["id"=>25,"nombre"=>"Tecnología, Sistemas y Telecomunicaciones"]];

		AreaLaboral::insert($array);
    }
}
