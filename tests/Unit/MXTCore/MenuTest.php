<?php

namespace Tests\Unit\MXTCore;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MaxTor\MXTCore\Models\Menu;
use Tests\TestCase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_menu_params_can_set_as_json_string()
    {
        $this->withOutExceptionHandling();

        $params = ['one', 'two', ['ten' => 10, 'eleven' => 11]];

        $menu = create(Menu::class, [
            'params' => $params
        ]);

        $this->assertEquals($menu->getOriginal('params'), json_encode($params));
    }

    /** @test */
    function a_menu_can_make_a_string_url_path_by_laravel_route_name()
    {
        $this->withOutExceptionHandling();

        $menu = create(Menu::class, [
            'route_name' => 'admin.menu-types.edit',
            'params'    => ['menu_type' => 1]
        ]);

        $this->assertEquals('/admin/menu-types/1/edit', $menu->uri);
    }

    /** @test */
    function a_menu_can_make_a_string_url_path_by_laravel_route_name_with_params()
    {
        $this->withOutExceptionHandling();

        $menu = create(Menu::class, [
            'route_name' => 'admin.menu-types.create'
        ]);

        $this->assertEquals('/admin/menu-types/create', $menu->uri);
    }
}