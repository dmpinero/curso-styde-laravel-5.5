<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /**
     * Test si los usuarios se listan
     *
     * @test
     */
    function it_shows_the_users_list()
    {
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
        $this->get('/usuarios?empty')
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