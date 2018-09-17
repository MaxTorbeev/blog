<?php

namespace Tests\Feature\Content;

use App\User;
use MaxTor\Content\Models\Category;
use MaxTor\Content\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
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
    function an_authenticated_user_can_create_new_post()
    {
        $this->withOutExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_post']);

        $post = make(Post::class);

        $this->get('/admin/posts/create')->assertStatus(200);

        $response = $this->post('/admin/posts', $post->toArray());

        $this->get($response->headers->get('Location'))->assertStatus(200);

        $this->get($response->headers->get('Location'))
            ->assertSee($post->name)
            ->assertSee($post->slug);
    }

}
