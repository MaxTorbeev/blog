<?php

namespace MaxTor\MXTCore\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use MaxTor\MXTCore\Models\Extension;
use MaxTor\MXTCore\Models\Menu;
use MaxTor\MXTCore\Models\MenuType;
use MaxTor\MXTCore\Requests\MenuRequests;

class MenuTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission:access_dashboard');
    }

    public function index()
    {
        return view('mxtcore::dashboard.menu.menu-types.index', [
            'menuTypes' => MenuType::all()
        ]);
    }

    /**
     * Форма создания типа меню.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_menu_type', MenuType::class);

        return view('mxtcore::dashboard.menu.menu-types.create', [
            'menuTypes' => MenuType::all()
        ]);
    }

    /**
     * Создание нового типа меню.
     *
     * @method POST
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create_menu_type', MenuType::class);

        $menuType = MenuType::create($request->all());

        return redirect(route('admin.menu-types.edit', ['menu_type' => $menuType->id]))
            ->with('flash', 'Тип меню создан успешно');
    }

    public function edit(MenuType $menuType)
    {
        $this->authorize('create_menu_type', MenuType::class);

        return view('mxtcore::dashboard.menu.menu-types.edit', [
            'menuType' => $menuType,
            'menuTypes' => MenuType::all()
        ]);
    }

    public function update(MenuType $menuType, Request $request)
    {
        $this->authorize('create_menu_type', MenuType::class);

        $menuType->update($request->all());

        return back()->with('flash', 'Тип меню успешно редактирован');
    }

    public function delete(MenuType $menuType)
    {
        $this->authorize('delete_menu_type', MenuType::class);

        $menuType->destroy();

        return redirect(route('admin.menu.index'))->with('flash', 'Тип меню был удален');
    }
}