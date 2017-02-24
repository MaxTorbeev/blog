<?php

namespace MaxTor\MXTCore\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function dashboard($controller, $page)
    {
        $users = (new User())->all();
        
        return view('mxtcore::dashboard.users.index', compact('users', 'page'));
    }
}
