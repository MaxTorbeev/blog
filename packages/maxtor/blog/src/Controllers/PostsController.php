<?php

namespace MaxTor\Blog\Controllers;

use App\Http\Flash;
use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

use MaxTor\Blog\Models\Category;
use MaxTor\Blog\Models\Photo;
use MaxTor\Blog\Models\Post;
use MaxTor\Blog\Models\Tag;
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

    public function portfolio($alias)
    {
        return 'portfolio';
    }

    public function show($alias)
    {
        $post = Post::whereAlias($alias)->firstOrFail();

        return view('blog::show', compact('post'));
    }

    public function create($controller, $page)
    {
        $categories = $this->getCategoriesList( (new Category()) );
        $tags = Tag::pluck('name', 'id');

        return view('blog::dashboard.posts.create', compact('categories', 'tags'));
    }

    public function edit($controller, $page, $id)
    {
        $post       = Post::findOrFail($id);
        $categories = Category::pluck('title', 'id');
        $tags       = Tag::pluck('name', 'id');
        $photos     = $post->photos->pluck('original_name', 'id');

        return view('blog::dashboard.posts.edit', compact('post', 'categories', 'page', 'tags', 'photos'));
    }

    public function store(PostRequest $request, Flash $flash)
    {
        Auth::user()->posts()->create($request->all());
        flash()->success('Материал был создан', 'Материал успешно создан.');

        return redirect()->back();
    }

    public function update($id, Request $request){
        $post = Post::findOrFail($id);
        if($request->input('tag_list')){
            $this->syncTags($post, $request->input('tag_list'));
        }
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
        $posts = Post::get();
        $categories = Category::pluck('title', 'id');

        return view('blog::dashboard.posts.index', compact('posts', 'categories', 'page'));
    }

    /**
     * Sync up the list of tags in the database
     *
     * @param Article $article Request $request
     */
    public function syncTags(Post $post, array $tags)
    {
        $post->tags()->sync($tags);
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
        return Photo::named($file)->move($file);

    }

    protected function getCategoriesList($model)
    {
        return $model::pluck('title', 'id');
    }
}
