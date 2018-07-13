<?php

namespace Tests\Feature;

use App\User;
use MaxTor\Content\Models\Category;
use MaxTor\Content\Models\Post;
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
    function an_authenticated_user_can_create_new_post_category()
    {
        $this->withOutExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_post_category']);

        $category = make(Category::class);

        $this->get('/admin/categories/create')->assertStatus(200);

        $response = $this->post('/admin/categories', $category->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($category->name)
            ->assertSee($category->slug);
    }

    /**
     * Пользователь с правами может редактировать категорию,
     * причем псевдоним должен быть сохранен прежний
     *
     * @test
     */
    function an_authenticated_user_can_edit_post_category()
    {
        $this->withOutExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_post_category']);

        $category = create(Category::class);

        $this->get('/admin/categories/' . $category->id . '/edit/')->assertStatus(200);

        $categoryEditable = make(Category::class, ['name' => 'Editable']);

        $response = $this->call('PATCH', '/admin/categories/'. $category->id . '/', $categoryEditable->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($categoryEditable->name);

        $this->assertDatabaseHas('posts_categories', [
            'slug' => $category->slug,
            'name' => $categoryEditable->name
        ]);
    }

    /**
     * Пользователь с правами может удалить категорию.
     * Все посты, которые хранятся в удаленной категории будут отключены.
     *
     * @test
     */
    function an_authenticated_user_can_delete_post_category()
    {
        $this->withOutExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'delete_post_category']);

        $post = create(Post::class);
    }

}
