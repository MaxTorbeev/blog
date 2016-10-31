<?php

namespace MaxTor\Blog\Controllers;

use App\Http\Flash;
use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

use MaxTor\Blog\Models\Photo;
use MaxTor\Blog\Models\Post;
use MaxTor\Blog\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show'] ]);
    }

    public function index()
    {
        $posts = Post::get();

        return view('blog::index', compact('posts'));
    }

    public function show($alias)
    {
        $post = Post::whereAlias($alias)->firstOrFail();

        return view('blog::show', compact('post'));
    }

    public function create()
    {
        return view('blog::create');
    }

    public function edit()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request, Flash $flash)
    {
        Auth::user()->posts()->create($request->all());
        flash()->success('Материал был создан', 'Материал успешно создан.');

        return redirect()->back();
    }
    
    public function dashboard()
    {
        $posts = Post::get();

        return view('blog::dashboard.index', compact('posts'));
    }

    public function addPhoto($alias, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = $this->makePhoto($request->file('photo'));

        Post::whereAlias($alias)->firstOrFail()->addPhoto($photo);

        return 'Done';
    }

    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())->move($file);

    }
}
