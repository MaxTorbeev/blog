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
            'menuTypes' => null,
            'routeCollection' => app()->routes->getRoutes(),
            'parentMenuItem' => $this->getList(Menu::all())
        ]);
    }

    public function store(MenuRequests $request)
    {
        $this->authorize('create_menu_item', Menu::class);

        $menu = Menu::create($request->all());

        return redirect(route('admin.menu.edit', ['menu' => $menu->id]))
            ->with('flash', 'Пункт меню создан успешно');
    }

    public function edit(Menu $menu)
    {
        $this->authorize('create_menu_item', Menu::class);

        return view('mxtcore::dashboard.menu.menu-items.edit', [
            'menu' => $menu,
            'routeCollection' => app()->routes->getRoutes(),
            'parentMenuItem' => $this->getList(Menu::all())
        ]);
    }

    public function update(Menu $menu, MenuRequests $request)
    {
        $this->authorize('create_menu_item', Menu::class);

        $menu->update($request->all());

        return redirect(route('admin.menu.edit', ['menu' => $menu->id]))
            ->with('flash', 'Пункт меню редактирован успешно');
    }

    protected function getList($model)
    {
        $model = $model->pluck('title', 'id');

        return $model->prepend('Не выбрано', null);
    }

}
