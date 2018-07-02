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

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission:access_dashboard');
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
            'categories' => (new Category())::pluck('title', 'id'),
            'tags' => Tag::pluck('name', 'id'),
            'photos' => (new Post)->photos->pluck('original_name', 'id')
        ]);
    }
}