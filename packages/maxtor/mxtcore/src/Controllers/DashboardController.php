<?php

namespace MaxTor\MXTCore\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MaxTor\MXTCore\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
       return redirect('admin/dashboard');
    }

    public function dashboard($alias)
    {
        dd($alias);
        $page = Menu::whereAlias($alias)->firstOrFail();

        return view('mxtcore::dashboard.index', compact('page'));
    }

    public function loadComponents($alias, $method = null)
    {
        $page = Menu::whereAlias($alias)->firstOrFail();
        $extension = $page->extension()->first();

        if ($method === null){
            $method = 'dashboard';
        }

        try{
            $controller = \App::make($extension->controller_path);
        }catch(\Exception $ex){
            throw new \Exception('Can not found the ' . $extension->controller_path);
        }

        $control = $controller->callAction($method, ['entity' => $extension->controllerName()]);

        return $control;
    }

  
}