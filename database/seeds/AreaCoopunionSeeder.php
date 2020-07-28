<?php

use Illuminate\Database\Seeder;
use App\AreaCoopunion;

class AreaCoopunionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaCoopunion::insert([
			["id"=>"1","nombre"=>"Administracion Insumos Agropecuarios"],
			["id"=>"2","nombre"=>"Dpto Tecnico Agropecuario"],
			["id"=>"3","nombre"=>"Produccion Campos"],
			["id"=>"4","nombre"=>"Ferticentro"],
			["id"=>"5","nombre"=>"Semillero"],
			["id"=>"6","nombre"=>"Balanza - Planta de Acopio"],
			["id"=>"7","nombre"=>"Planta de Acopio - Operario"],
			["id"=>"8","nombre"=>"Mantenimiento (Electrico Mecanico)"],
			["id"=>"9","nombre"=>"Chofer de Camiones"],
			["id"=>"10","nombre"=>"Supermercado"],
			["id"=>"11","nombre"=>"Seguros La Segunda"],
			["id"=>"12","nombre"=>"Coovaeco"],
			["id"=>"13","nombre"=>"ACA Salud"],
			["id"=>"14","nombre"=>"Construccion & Ferreteria"],
			["id"=>"15","nombre"=>"Estacion de Servicio - Administracion"],
			["id"=>"16","nombre"=>"Estacion de Servicio - Playa"],
			["id"=>"17","nombre"=>"Estacion de Servicio - Tienda Full"],
			["id"=>"18","nombre"=>"Finanzas"],
			["id"=>"19","nombre"=>"Cuentas Corrientes"],
			["id"=>"20","nombre"=>"Contabilidad"],
			["id"=>"21","nombre"=>"Administracion General"],
			["id"=>"22","nombre"=>"Administracion Cereales"],
			["id"=>"23","nombre"=>"RRHH - Comuncacion"],
			["id"=>"24","nombre"=>"Seguridad e Higiene - Medio Ambiente"],
			["id"=>"25","nombre"=>"Marketing y Nuevos Negocios"],
			["id"=>"26","nombre"=>"Sistemas Tecnologicos"],
			["id"=>"27","nombre"=>"Maestranza"]
        ]);
    }
}
