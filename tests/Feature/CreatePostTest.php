<?php

namespace Tests\Feature;

use App\User;
use MaxTor\Content\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Гость и обычный зарегистрированный пользователь
     * не может создать пост.
     *
     * @test
     */
    function guest_may_not_created_post()
    {
        $this->withOutExceptionHandling();

        $this->get('/admin/posts/create')->assertRedirect('/login');
        $this->post('/admin/posts')->assertRedirect('/login');

        $this->signIn();

        $this->get('/admin/posts/create')->assertRedirect('/login');
        $this->post('/admin/posts')->assertRedirect('/login');
    }

    /**
     * Пользователь может попасть на форму редактирования поста,
     * если имеет соответствующее разрешение.
     *
     * @test
     */
    public function user_access_create_post_form_via_root_role()
    {
        $this->withOutExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_post']);

        $this->get('/admin/posts/create')->assertStatus(200);
    }

}
