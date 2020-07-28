<?php

use Illuminate\Database\Seeder;
use App\Referencia;

class ReferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = Storage::get('json/referencias.json');
        $array = json_decode($content, true);

        Referencia::insert($array);
    }
}
