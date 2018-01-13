<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use \App\Profession;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Obtener el identificador de la professión
        // $professions = DB::select('SELECT id FROM professions WHERE title = "Desarrollador backend"'); // Opción no segura, ya que si el parámetro title proviene del usuario podría ser susceptible de tener ataque por inyección de código sql
        //$professions = $professions = DB::select('SELECT id FROM professions WHERE title = ? LIMIT 0,1', ['Desarrollador backend']);

        // Constructor de consultas de Laravel
        //$professions = DB::table('professions')->select('id')->take(1)->get(); // Devuelve una colección de tipo Illuminate\Support\Collection, con una iterfaz orientada a objetos
        //dd($professions->first()->id);

        //$profession = DB::table('professions')->select('id')->first(); // No devuelve una colección, sino un objeto con un único registro
        //$profession = DB::table('professions')->select('id')->first(); // No devuelve una colección, sino un objeto con un único 
        //$profession = DB::table('professions')->where('title','Desarrollador backend')->first();
        //$profession = DB::table('professions')
        //    ->where(['title' => 'Desarrollador backend'])
        //    ->first(); // Mismo resultado que el anterior
        //dd($profession);

        //$professionId = DB::table('professions')
        //    ->where(['title' => 'Desarrollador backend'])
        //    ->value('id'); 
        /*$professionId = DB::table('professions')
        ->whereTitle('Desarrollador backend')
        ->value('id');         
        */

        //$professionId = Profession::whereTitle('Desarrollador backend')
        //                ->value('id');         

        //dd($professionId);

        // Constructor de consultas de Laravel
        /*
        DB::table('users')->insert([
            'name' => 'Daniel Martínez',
            'email' => 'dmpinero@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,
        ]);
        */

        // Creación de elementos a través de modelos
        /*User::create([
            'name' => 'Daniel Martínez',
            'email' => 'dmpinero@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,
        ]);
        */

        // Creación de elementos a través de factory (datos aleatorios)
        $professionId = Profession::where('title', 'Desarrollador backend')->value('id');
                
        factory(User::class)->create([
            'name' => 'Daniel Martínez',
            'email' => 'dmpinero@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,            
        ]);

        factory(User::class)->create(); // 1 usuario con todos los datos aleatorios

        factory(User::class, 49)->create(); // 49 usuario con todos los datos aleatorios
     }
}
