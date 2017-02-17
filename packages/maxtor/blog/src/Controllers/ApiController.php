<?php

namespace MaxTor\Blog\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaxTor\Blog\Models\Photo;
use MaxTor\Blog\Models\Post;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Get json array photos in Post
     *
     * @param $id
     * @return mixed
     */
    public function getPhotosList($id)
    {
        $post = Post::findOrFail($id);
        $photos = $post->photos->all();

        return $photos;
    }

}