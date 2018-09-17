<?php

namespace MaxTor\Content\Controllers\Admin;

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
use MaxTor\MXTCore\Controllers\DashboardController;

class PostsController extends DashboardController
{
    public function __construct()
    {
        $this->middleware('check.permission:access_dashboard');
    }

    public function index()
    {
        return view('content::dashboard.posts.index', ['posts' => Post::all()]);
    }

    /**
     * Create a new blog post.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create_post', Post::class);

        return view('content::dashboard.posts.create', [
            'categories' => $this->getList(Category::all(), true),
            'tags' => $this->getList(Tag::all(), null),
            'photos' => (new Post)->photos->pluck('original_name', 'id')
        ]);
    }

    public function store(PostRequest $request)
    {
        $this->authorize('create_post', Post::class);

        $post = Post::create($request->all());

        return redirect(route('admin.posts.edit', ['id' => $post->id]))
            ->with('flash', 'Пост создан успешно');
    }

    public function edit(Post $post)
    {
        $this->authorize('create_post', Post::class);

        return view('content::dashboard.posts.edit', [
            'post' => $post,
            'categories' => $this->getList(Category::all(), true),
            'tags' => $this->getList(Tag::all(), null),
            'photos' => (new Post)->photos->pluck('original_name', 'id')
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->authorize('create_post', Post::class);

        $post->update($request->all());

        return view('content::dashboard.posts.edit', [
            'post' => $post,
            'categories' => $this->getList(Category::all(), true),
            'tags' => $this->getList(Tag::all(), null),
            'photos' => (new Post)->photos->pluck('original_name', 'id')
        ]);
    }
}