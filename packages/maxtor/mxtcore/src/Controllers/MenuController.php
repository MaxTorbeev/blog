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

    public function dashboard($controller, $page)
    {
        $menu = Menu::all();
        $extensions = Extension::pluck('name', 'id');
        $menuTypes = MenuType::pluck('title', 'id');

        return view('mxtcore::dashboard.menu.index', compact('menu', 'extensions', 'menuTypes', 'page'));
    }

    public function addMenuType()
    {
        $menuTypes = MenuType::all();

        return view('mxtcore::dashboard.menu.menu-types.create', compact('menuTypes'));

    }

}
