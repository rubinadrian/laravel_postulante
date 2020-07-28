<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoFamiliarSeeder::class);
        $this->call(NivelEstudioSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(AreaCoopunionSeeder::class);
        $this->call(AreaEstudioSeeder::class);
        $this->call(AreaLaboralSeeder::class);
        $this->call(PostulanteSeeder::class);
        $this->call(EstudioSeeder::class);
        $this->call(ExperienciaSeeder::class);
        $this->call(FamiliarSeeder::class);
        $this->call(PreferenciaSeeder::class);
        $this->call(ReferenciaSeeder::class);
    }
}
