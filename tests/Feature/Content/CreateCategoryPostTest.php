<?php

namespace Tests\Feature;

use App\User;
use MaxTor\Content\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryPostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Гость и обычный зарегистрированный пользователь
     * не может создать пост.
     *
     * @test
     */
    function guest_may_not_created_category_post()
    {
        $this->withOutExceptionHandling();

        $this->get('/admin/categories/create')->assertRedirect('/login');
        $this->post('/admin/categories')->assertRedirect('/login');

        $this->signIn();

        $this->get('/admin/categories/create')->assertRedirect('/login');
        $this->post('/admin/categories')->assertRedirect('/login');
    }

    /**
     * Пользователь с соответствующими правами может создать тип меню.
     *
     * @test
     */
    public function an_authenticated_user_can_create_new_post_category()
    {
        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_post_category']);

        $menuType = make(Category::class);

        $this->get('/admin/categories/create')->assertStatus(200);

        $response = $this->post('/admin/categories', $menuType->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($menuType->title)
            ->assertSee($menuType->slug);
    }
}
