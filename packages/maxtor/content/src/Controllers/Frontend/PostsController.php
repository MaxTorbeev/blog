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

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show'] ]);
    }

    public function index()
    {
        $posts = Post::latest('published_at')->published()->get();

        return view('blog::index', compact('posts'));
    }

    public function portfolio($slug)
    {
        return 'portfolio';
    }

    public function show($slug)
    {
        $post = Post::whereSlug($slug)->published()->firstOrFail();

        return view('blog::show', compact('post'));
    }

    public function create($controller, $page)
    {
        return 'test';

        $categories = $this->getCategoriesList( (new Category()) );
        $tags       = Tag::pluck('name', 'id');
        $photos     = (new Post)->photos->pluck('original_name', 'id');

        return view('blog::dashboard.posts.create', compact('categories', 'tags', 'photos'));
    }

    public function edit($controller, $page, $id)
    {
        $post       = Post::findOrFail($id);
        $categories = Category::pluck('title', 'id');
        $tags       = Tag::pluck('name', 'id');
        $photos     = $post->photos->pluck('original_name', 'id');

        return view('blog::dashboard.posts.edit', compact('post', 'categories', 'page', 'tags', 'photos'));
    }

    public function store(PostRequest $request, Flash $flash, Post $post)
    {
        Auth::user()->posts()->create($request->all());

        if($request->input('tag_list')){
            $this->syncTags($post, $request->input('tag_list'));
        }

        flash()->success('Материал был создан', 'Материал успешно создан.');

        return redirect()->back();
    }

    public function update($id, Request $request){
        $post = Post::findOrFail($id);
        if($request->input('tag_list')){
            $this->syncTags($post, $request->input('tag_list'));
        }
        $post->update($request->all());

        $request->session()->flash('flash_message', 'Материал успешно сохранен!');

//        flash()->success('Материал был сохранен', 'Материал успешно сохранен.');

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

    public function addPhoto($slug, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $photo = $this->makePhoto($request->file('photo'));

        Post::whereSlug($slug)->firstOrFail()->addPhoto($photo);

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
