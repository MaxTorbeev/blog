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

    public function createMenuItem($controller, $page)
    {
        $menu = new Menu();
        $parentMenuItem = Menu::pluck('title', 'id');
        $extensions = Extension::pluck('name', 'id');
        $menuTypes = MenuType::pluck('title', 'id');

        return view('mxtcore::dashboard.menu.menu-items.create', compact(
            'menu',
            'menuTypes',
            'extensions',
            'parentMenuItem',
            'page'
        ));
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

    public function menuTypeStore(Request $request){
        (new MenuType)->create($request->all());

        return 'Тип меню успешно создан';
    }

    public function createMenuType($controller, $page)
    {
        $menuTypes = MenuType::all();

        return view('mxtcore::dashboard.menu.menu-types.create', compact(
            'menuTypes',
            'page'
        ));

    }

    public function api()
    {
        $menu = Menu::all();

        return $menu;
    }

    public function apiItem($controller, $page, $id)
    {
        $menu = Menu::find($id);

        return $this->getArrayForForm($menu);
    }

    public function getArrayForForm($model)
    {
        return [
            'id' => [
                'value' => $model->id,
                'type' => 'text'
            ],

            'menu_type_id' => [
                'label' => 'Тип меню',
                'value' => $model->menu_type_id,
                'type' => 'select',
                'options' => MenuType::pluck('title', 'id')
            ],

            'extensions_id' => [
                'value' => $model->menu_type_id,
                'type' => 'select'
            ],

        ];
    }

}
