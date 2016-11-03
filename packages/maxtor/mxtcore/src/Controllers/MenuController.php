<?php

namespace MaxTor\MXTCore\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use MaxTor\MXTCore\Models\Extension;
use MaxTor\MXTCore\Models\Menu;
use MaxTor\MXTCore\Models\MenuType;

class MenuController extends Controller
{
    public function index()
    {
        $extensions = Extension::all();

        return view('mxtcore::dashboard.extensions.index', compact('extensions'));
    }

    public function update($id, Request $request)
    {
        $menu = Menu::whereId($id)->firstOrFail();
        $menu->update($request->all());

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->create($request->all());

        return redirect()->back();
    }

    public function dashboard($controller, $page)
    {
        $menu = Menu::all();
        $extensions = Extension::pluck('name', 'id');
        $menuTypes = MenuType::pluck('title', 'id');

        return view('mxtcore::dashboard.menu.index', compact('menu', 'extensions', 'menuTypes', 'page'));
    }

    public function createMenuItem()
    {
        $menu = new Menu();
        $parentMenuItem = Menu::pluck('title', 'id');
        $extensions = Extension::pluck('name', 'id');
        $menuTypes = MenuType::pluck('title', 'id');

        return view('mxtcore::dashboard.menu.menu-items.create', compact('menu', 'menuTypes', 'extensions', 'parentMenuItem'));
    }

//    public function editMenuItem($id)
//    {
//        $menu = new Menu();
//
//        $parentMenuItem = Menu::pluck('title', 'id');
//        $extensions = Extension::pluck('name', 'id');
//        $menuTypes = MenuType::pluck('title', 'id');
//
//        return view('mxtcore::dashboard.menu.menu-items.update', compact('menu', 'menuTypes', 'extensions', 'parentMenuItem'));
//    }

    public function createMenuType()
    {
        $menuTypes = MenuType::all();

        return view('mxtcore::dashboard.menu.menu-types.create', compact('menuTypes'));

    }

    public function api()
    {
        $menu = Menu::all();

        return $menu;
    }

}
