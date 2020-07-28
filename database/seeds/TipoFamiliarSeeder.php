<?php

use Illuminate\Database\Seeder;
use App\TipoFamiliar;

class TipoFamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
	        ['id'=>1, 'tipo'=>'madre'],
	        ['id'=>2, 'tipo'=>'padre'],
	        ['id'=>3, 'tipo'=>'hijo'],
	        ['id'=>4, 'tipo'=>'hermano']];

	    TipoFamiliar::insert($array);
    }
}
