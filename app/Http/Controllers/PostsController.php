<?php

namespace App\Http\Controllers;

use App\Posts\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        Auth::user()->posts()->create($request->all());
        session()->flash('flash_message', 'Материал был создан');

        return redirect()->back();
    }
}
