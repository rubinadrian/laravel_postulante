<?php

use Illuminate\Database\Seeder;
use App\Familiar;

class FamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Storage::get('json/familiares.json'); //disk('local') default
        $array = json_decode($contents, true);

        Familiar::insert($array);
    }
}
