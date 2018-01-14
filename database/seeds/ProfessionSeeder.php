<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Constructor de consultas de Laravel
        /*
        DB::table('professions')->insert([
            'title' => 'Desarrollador backend'
        ]);

        DB::table('professions')->insert([
            'title' => 'Desarrollador front-end'
        ]);        

        DB::table('professions')->insert([
            'title' => 'Diseñador web'
        ]);
        */                

        // Creación de elementos a través de modelos
        Profession::create([
            'title' => 'Desarrollador backend',
        ]);

        Profession::create([
            'title' => 'Desarrollador front-end',
        ]);
        
        Profession::create([
            'title' => 'Diseñador web',
        ]);        

        factory(Profession::class, 17)->create();
    }
}
