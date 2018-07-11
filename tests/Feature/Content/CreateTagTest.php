<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTagTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Гость и обычный зарегистрированный пользователь
     * не может создать тэг.
     *
     * @test
     */
    function guest_may_not_created_tag()
    {
        $this->withOutExceptionHandling();

        $this->get('/admin/tags/create')->assertRedirect('/login');
        $this->post('/admin/tags')->assertRedirect('/login');

        $this->signIn();

        $this->get('/admin/tags/create')->assertRedirect('/login');
        $this->post('/admin/tags')->assertRedirect('/login');
    }
}
