<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    function it_welcomes_users_with_nickname()
    {
        $this->get('saludo/daniel/dmpinero')
             ->assertStatus(200)
             ->assertSee("Bienvenido Daniel, tu apodo es dmpinero");
    }

    /** @test */
    function it_welcomes_users_without_nickname()
    {
        $this->get('saludo/daniel')
        ->assertStatus(200)
        ->assertSee("Bienvenido Daniel");        
    }
}