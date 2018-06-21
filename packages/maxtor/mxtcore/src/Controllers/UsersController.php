<?php

namespace MaxTor\MXTCore\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use MaxTor\MXTCore\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.role:root');
    }

    public function dashboard($controller, $page)
    {
        $users = (new User())->all();

        return view('mxtcore::dashboard.users.index', compact('users', 'page'));
    }

    public function edit($controller, $page, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $roles = Role::pluck('label', 'id');

        return view('mxtcore::dashboard.users.edit', compact('user', 'roles', 'page'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,id',
            'new_password' => 'confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');

        if(request('new_password')){
            $user->password = Hash::make(request('new_password'));
        }

        $user->save();

        $user->roles()->sync(request('role'));

        return redirect(
            route('dashboard.components', [
                'alias' => 'users',
                'method' => 'edit',
                'id' => $user->id
            ]))->with('flash', "Пользователь {$user->name} обновлен");
    }

    public function create($controller, $page)
    {
        $roles = Role::pluck('label', 'id');

        return view('mxtcore::dashboard.users.create', compact('roles', 'page'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('new_password'))
        ]);

        $user->roles()->sync(request('role'));

        return redirect(
            route('dashboard.components', [
                'alias' => 'users',
                'method' => 'edit',
                'id' => $user->id
            ]))->with('flash', "Пользователь {$user->name} создан");
    }

}
