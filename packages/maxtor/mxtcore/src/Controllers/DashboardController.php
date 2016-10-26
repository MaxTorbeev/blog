<?php

namespace MaxTor\MXTCore\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MaxTor\MXTCore\Models\Menu;

class DashboardController extends Controller
{
    public function index($alias)
    {
        $page = Menu::whereAlias($alias)->firstOrFail();
        $extension = $page->extension()->first();
//        dd(class_exists($extension->namespace));

        try{
            $controller = \App::make('MaxTor\Blog\Controllers\PostsController');
        }catch(\Exception $ex){
            throw new \Exception("Can not found the Controller ( PostsController ) ");
        }

        $controller->callAction('show', array('entity' => 'PostsController'));

//        App::make(MaxTor\Blog\Controllers\PostsController);
//        dd($controller->callAction($methods, ['entity' => MaxTor\Blog\Controllers\PostsController]));
//        dd()
//        $url = false;
//        if ( in_array($alias, $urls)){
//            $controller_path = $extension->namespace'Serverfireteam\Panel\\'.$entity.'Controller';
//        } else {
//            $panel_path = \Config::get('panel.controllers');
//            if (isset($panel_path)) {
//                $controller_path = '\\' . $panel_path . '\\' . $entity . 'Controller';
//            } else {
//                $controller_path = $appHelper->getNameSpace() . 'Http\Controllers\\' . $entity . 'Controller';
//            }
//        }

            return view('mxtcore::dashboard.index', compact('page'));
    }
}
