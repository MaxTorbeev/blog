<?php

namespace MaxTor\MXTCore\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MaxTor\MXTCore\Models\Menu;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
       return redirect('admin/dashboard');
    }

    public function dashboard($controller, $page)
    {
        return view('mxtcore::dashboard.index', compact('page'));
    }

    /**
     * load and init MXTCore components
     *
     * @param $alias
     * @param null $method
     * @param null $id
     * @return mixed
     * @throws \Exception
     */
    public function loadComponents($alias, $method = null, $id = null)
    {
        $page       = Menu::whereAlias($alias)->firstOrFail();
        $extension  = $page->extension()->first();

        if ($method === null){
            $method = 'dashboard';
        }

        try{
            $controller = \App::make($extension->controller_path);
        }catch(\Exception $ex){
            throw new \Exception('Can not found the ' . $extension->controller_path);
        }

        if( !method_exists($controller, $method) ) {
            throw new \BadMethodCallException('Can not found the method ' . $extension->controller_path . '@' . $method);
        }

        $control = $controller->callAction($method, [
            'entity'    => $extension->controllerName(),
            'page'      => $page,
            'id'        => $id
        ]);

        return $control;
    }

  
}
