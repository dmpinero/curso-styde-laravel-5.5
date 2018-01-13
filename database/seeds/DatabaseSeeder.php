<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        // $this->call(UsersTableSeeder::class);
        $this->truncateTables([
            'users',
            'professions'
        ]);
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // Quitar restricción de clave ajena
        foreach($tables as $table)
        {   
            DB::table($table)->truncate(); // Borra todos los registros de la tabla
        }        
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); // Poner restricción de clave ajena
    }
}
