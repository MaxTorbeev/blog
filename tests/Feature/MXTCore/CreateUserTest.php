<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Гость и обычный пользователь без прав не может создать тип меню.
     *
     * @test
     */
    public function guest_may_not_created_user()
    {
        $this->withExceptionHandling();

        $this->get('admin/users/create')->assertRedirect('/login');
        $this->post('admin/users')->assertRedirect('/login');
    }
}
