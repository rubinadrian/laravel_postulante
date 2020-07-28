<?php

use Illuminate\Database\Seeder;
use App\Provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::insert([
				["nombre"=>"Misiones","id"=>"54"],
				["nombre"=>"San Luis","id"=>"74"],
				["nombre"=>"San Juan","id"=>"70"],
				["nombre"=>"Entre Ríos","id"=>"30"],
				["nombre"=>"Santa Cruz","id"=>"78"],
				["nombre"=>"Río Negro","id"=>"62"],
				["nombre"=>"Chubut","id"=>"26"],
				["nombre"=>"Córdoba","id"=>"14"],
				["nombre"=>"Mendoza","id"=>"50"],
				["nombre"=>"La Rioja","id"=>"46"],
				["nombre"=>"Catamarca","id"=>"10"],
				["nombre"=>"La Pampa","id"=>"42"],
				["nombre"=>"Santiago del Estero","id"=>"86"],
				["nombre"=>"Corrientes","id"=>"18"],
				["nombre"=>"Santa Fe","id"=>"82"],
				["nombre"=>"Tucumán","id"=>"90"],
				["nombre"=>"Neuquén","id"=>"58"],
				["nombre"=>"Salta","id"=>"66"],
				["nombre"=>"Chaco","id"=>"22"],
				["nombre"=>"Formosa","id"=>"34"],
				["nombre"=>"Jujuy","id"=>"38"],
				["nombre"=>"Ciudad Autónoma de Buenos Aires","id"=>"02"],
				["nombre"=>"Buenos Aires","id"=>"06"],
				["nombre"=>"Tierra del Fuego","id"=>"94"]]
        );
    }
}
