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
    function it_loads_the_users_details_page()
    {
        $this->get('/usuarios/5')
             ->assertStatus(200)
             ->assertSee("Mostrando detalle del usuario: 5");
    }

    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get('/usuarios/nuevo')
             ->assertStatus(200)
             ->assertSee("Crear nuevo usuario");
    }


}
