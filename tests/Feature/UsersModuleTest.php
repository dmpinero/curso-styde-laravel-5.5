<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsersModuleTest extends TestCase
{

    use RefreshDatabase; // Cada prueba se ejecuta dentro de una transacción de la base de datos. Al finalizar se ejecuta un rollback, para no afectar a la siguiente prueba y que la "contamine".

    /**
     * Test si los usuarios se listan
     *
     * @test
     */
    function it_shows_the_users_list()
    {
        factory(User::class)->create([
            'name' => 'Daniel',
        ]);

        factory(User::class)->create([
            'name' => 'Juan',
        ]);

        factory(User::class)->create([
            'name' => 'Pepe',
        ]);

        $this->get('/usuarios')
             ->assertStatus(200)
             ->assertSee('Listado de Usuarios')
             ->assertSee('Daniel')
             ->assertSee('Juan')
             ->assertSee('Pepe');
    }

    /**
     * Test si no hay usuarios
     *
     * @test
     */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get('/usuarios')
             ->assertStatus(200)
             ->assertSee('No hay usuarios registrados');
    }    

    /** @test */
    function it_displays_the_users_details()
    {
        $user = factory(User::class)->create([
            'name' => 'Daniel Martínez'
        ]);

        $this->get('/usuarios/' . $user->id)
             ->assertStatus(200)
             ->assertSee('Daniel Martínez');
    }

    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get('/usuarios/nuevo')
             ->assertStatus(200)
             ->assertSee("Crear nuevo usuario");
    }

    /** @test */
    function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /** @test */
    function it_creates_a_new_user()
    {
        $this->post('/usuarios', [
            'name' => 'Daniel',
            'email' => 'dmpinero@gmail.com',
            'password' => '123456'
        ])->assertSee('Procesando información...');
    }
}
