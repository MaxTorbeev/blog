<?php

namespace MaxTor\MXTCore\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use MaxTor\MXTCore\Models\Extension;
use MaxTor\MXTCore\Models\Menu;
use MaxTor\MXTCore\Models\MenuType;
use MaxTor\MXTCore\Requests\MenuRequests;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission:access_dashboard');
    }

    public function index()
    {
        $this->authorize('show_menu_item', Menu::class);

        return view('mxtcore::dashboard.menu.menu-items.index', [
            'menuItems' => Menu::all()
        ]);
    }

    public function create()
    {
        $this->authorize('create_menu_item', Menu::class);

        return view('mxtcore::dashboard.menu.menu-items.create', [
            'menuTypes' => null
        ]);
    }

    public function store(MenuRequests $request)
    {
        $this->authorize('create_menu_item', Menu::class);

        $menu = new Menu();
        $menu->create($request->all());

        return back()->with('flash', 'Пункт меню был создан');
    }

    public function update($id, MenuRequests $request)
    {
        $menu = Menu::where('id', $id)->firstOrFail();
        $menu->update($request->all());

        return redirect()->back();
    }

    public function createMenuItem($controller, $page)
    {
        $menu = new Menu();
        $parentMenuItem = $this->getMenuList($menu);
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

    public function menuTypeStore(Request $request)
    {
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

    protected function getMenuList($model)
    {
        $model = $model->pluck('title', 'id');

        return $model->prepend('Не выбрано', null);
    }

}
