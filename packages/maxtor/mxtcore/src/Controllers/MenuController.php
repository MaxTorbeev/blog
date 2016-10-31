<?php

namespace MaxTor\MXTCore\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use MaxTor\MXTCore\Models\Extension;
use MaxTor\MXTCore\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $extensions = Extension::all();

        return view('mxtcore::dashboard.extensions.index', compact('extensions'));
    }

    public function update($id, Request $request)
    {
        $extension = Extension::whereId($id)->firstOrFail();
        $extension->update($request->all());

        return redirect()->back();
    }

    public function dashboard()
    {
        $menu = Menu::get();

        return view('mxtcore::dashboard.menu.index', compact('menu'));
    }
}
