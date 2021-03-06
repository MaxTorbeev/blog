<?php

namespace Tests\Feature\MXTCore;

use App\User;
use MaxTor\MXTCore\Models\Menu;
use MaxTor\MXTCore\Models\MenuType;
use MaxTor\MXTCore\Models\Permission;
use MaxTor\MXTCore\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMenuTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Гость и обычный пользователь без прав не может создать тип меню.
     *
     * @test
     */
    public function guest_may_not_created_menu_type()
    {
        $this->get('admin/menu-types/create')->assertRedirect('/login');
        $this->post('admin/menu-types')->assertRedirect('/login');
    }

    /**
     * Пользователь с соответствующими правами может создать тип меню.
     *
     * @test
     */
    public function an_authenticated_user_can_create_new_menu_type()
    {
        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_menu_type']);

        $menuType = make(MenuType::class);

        $this->get('/admin/menu-types/create')->assertStatus(200);

        $response = $this->post('/admin/menu-types', $menuType->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($menuType->name)
            ->assertSee($menuType->slug);
    }

    /**
     * Гость и обычный пользователь без прав не может создать пункт меню.
     *
     * @test
     */
    public function guest_may_not_created_menu_item()
    {
        $this->get('admin/menu/create')->assertRedirect('/login');

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_menu_item']);

        $this->get('admin/menu/create')->assertStatus(200);
    }

    /**
     * Пользователь с соответствующими правами может создать тип меню.
     *
     * @test
     */
    public function an_authenticated_user_can_create_new_menu_item()
    {
        $this->withOutExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'create_menu_item']);

        $menu = make(Menu::class);

        $this->get('/admin/menu/create')->assertStatus(200);

        $response = $this->post('/admin/menu', $menu->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($menu->name)
            ->assertSee($menu->slug);
    }

    /**
     * Пользователь с соответствующими правами может удалить пункт меню.
     *
     * @test
     */
    public function an_authenticated_user_can_delete_menu_item()
    {
//        $this->withExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'delete_menu_item']);

        $menu = create(Menu::class);
        $menuChild = create(Menu::class, ['parent_id' => $menu->id]);

        $response = $this->json('DELETE', '/admin/menu/' . $menu->id . '/');
        $response->assertStatus(204);

        $this->assertDatabaseMissing('menu', ['id' => $menu->id]);
        $this->assertDatabaseMissing('menu', ['parent_id' => $menu->id]);
    }

    /**
     * Пользователь с соответствующими правами может удалить пункт меню.
     *
     * @test
     */
    public function an_authenticated_user_can_delete_menu_type()
    {
//        $this->withExceptionHandling();

        $this->signIn(create(User::class), 'root', ['access_dashboard', 'delete_menu_type']);

        $menuType = create(MenuType::class);
        $menu = create(Menu::class, ['menu_type_id' => $menuType->id]);

        $response = $this->json('DELETE', '/admin/menu-types/' . $menuType->id);
        $response->assertStatus(204);

        $this->assertDatabaseMissing('menu_types', ['id' => $menuType->id]);
        $this->assertDatabaseMissing('menu', ['menu_type_id' => $menuType->id]);
    }
}