<?php

use Illuminate\Database\Seeder;
use App\AreaEstudio;

class AreaEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array =     [
			    ["id"=>1,"nombre"=>"Abogacía / Derecho"],
			    ["id"=>2,"nombre"=>"Administración de Empresas"],
			    ["id"=>3,"nombre"=>"Administración y gestión pública"],
			    ["id"=>4,"nombre"=>"Agrimensor"],
			    ["id"=>5,"nombre"=>"Agronegocios"],
			    ["id"=>6,"nombre"=>"Arquitectura"],
			    ["id"=>7,"nombre"=>"Bachiller"],
			    ["id"=>8,"nombre"=>"Bibliotecología"],
			    ["id"=>9,"nombre"=>"Bioingeniería"],
			    ["id"=>10,"nombre"=>"Biología"],
			    ["id"=>11,"nombre"=>"Bioquímica"],
			    ["id"=>12,"nombre"=>"Ciencias Actuariales"],
			    ["id"=>13,"nombre"=>"Ciencias de la Educación"],
			    ["id"=>14,"nombre"=>"Ciencias Políticas"],
			    ["id"=>15,"nombre"=>"Comercio Exterior"],
			    ["id"=>16,"nombre"=>"Computación / Informática"],
			    ["id"=>17,"nombre"=>"Comunicación Social"],
			    ["id"=>18,"nombre"=>"Construcción / Ingeniería Civil"],
			    ["id"=>19,"nombre"=>"Contabilidad / Auditoría"],
			    ["id"=>20,"nombre"=>"Crítica de Artes"],
			    ["id"=>21,"nombre"=>"Diseño gráfico"],
			    ["id"=>22,"nombre"=>"Diseño web"],
			    ["id"=>23,"nombre"=>"Economía"],
			    ["id"=>24,"nombre"=>"Educación"],
			    ["id"=>25,"nombre"=>"Escribanía"],
			    ["id"=>26,"nombre"=>"Estadística"],
			    ["id"=>27,"nombre"=>"Farmacia"],
			    ["id"=>28,"nombre"=>"Finanzas"],
			    ["id"=>29,"nombre"=>"Fonoaudiología"],
			    ["id"=>30,"nombre"=>"Hotelería"],
			    ["id"=>31,"nombre"=>"Humanidades y Artes"],
			    ["id"=>32,"nombre"=>"Ingeniería"],
			    ["id"=>33,"nombre"=>"Kinesiología"],
			    ["id"=>34,"nombre"=>"Laboratorio"],
			    ["id"=>35,"nombre"=>"Marketing / Comercialización"],
			    ["id"=>36,"nombre"=>"Matemática"],
			    ["id"=>37,"nombre"=>"Medicina"],
			    ["id"=>38,"nombre"=>"Medio ambiente"],
			    ["id"=>39,"nombre"=>"Nutrición"],
			    ["id"=>40,"nombre"=>"Odontología"],
			    ["id"=>41,"nombre"=>"Periodismo"],
			    ["id"=>42,"nombre"=>"Procesos / Calidad"],
			    ["id"=>43,"nombre"=>"Psicología"],
			    ["id"=>44,"nombre"=>"Publicidad"],
			    ["id"=>45,"nombre"=>"Recursos Humanos"],
			    ["id"=>46,"nombre"=>"Relaciones Laborales"],
			    ["id"=>47,"nombre"=>"Relaciones Públicas"],
			    ["id"=>48,"nombre"=>"Salud"],
			    ["id"=>49,"nombre"=>"Seguridad e Higiene"],
			    ["id"=>50,"nombre"=>"Seguros"],
			    ["id"=>51,"nombre"=>"Telecomunicaciones"],
			    ["id"=>52,"nombre"=>"Trabajo Social"],
			    ["id"=>53,"nombre"=>"Traducción"]];

		AreaEstudio::insert($array);
    }
}
