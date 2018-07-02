<?php

namespace MaxTor\Content\Controllers\Frontend;

use App\Http\Flash;
use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

use MaxTor\Content\Models\Category;
use MaxTor\Content\Models\Photo;
use MaxTor\Content\Models\Post;
use MaxTor\Content\Models\Tag;
use MaxTor\Content\Requests\PostRequest;
use MaxTor\Content\Requests\TagRequest;

class TagsController extends Controller
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
        $tag = Tag::whereAlias($alias)->firstOrFail();
        $posts = $tag->posts->all();

        return view('blog::index', compact('posts'));
    }

    public function create($controller, $page)
    {
        return view('blog::dashboard.tags.create', compact('page'));
    }

    public function store(TagRequest $request)
    {
        Auth::user()->tags()->create($request->all());

        return [
            'message' => 'Тег успешно создан'
        ];
//        return redirect()->back();
    }

    public function edit($controller, $page, $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('title', 'id');

        return view('blog::dashboard.posts.edit', compact('post', 'categories', 'page'));
    }

    /** @todo: Пока не работает */
    public function update($id, Request $request){
        $post = Post::findOrFail($id);
        $post->update($request->all());
        flash()->success('Материал был сохранен', 'Материал успешно сохранен.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

    }
    
    public function dashboard($controller, $page)
    {
        $tags = Tag::get();

        return view('blog::dashboard.tags.index', compact('tags', 'controller', 'page'));
    }
}
