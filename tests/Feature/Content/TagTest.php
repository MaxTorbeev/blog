<?php

namespace Tests\Feature;

use App\User;
use MaxTor\Content\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
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

    /**
     * Пользователь с правами может создать новый тэг.
     *
     * @test
     */
    function an_authenticated_user_can_create_new_tag()
    {
        $this->withOutExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_tag']);

        $tag = make(Tag::class);

        $this->get('/admin/tags/create')->assertStatus(200);

        $response = $this->post('/admin/tags', $tag->toArray());

        $this->get($response->headers->get('Location'))->assertStatus(200);

        $this->get($response->headers->get('Location'))
            ->assertSee($tag->name)
            ->assertSee($tag->slug);
    }
}
