<?php

namespace MaxTor\Blog\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaxTor\Blog\Models\Photo;
use MaxTor\Blog\Models\Post;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'getPostHits'
        ]]);
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

    public function getPostHits(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if($request->isMethod('post')){
            $post->update(['hist' => $post->hits++]);
        }

        return $post->hits;

    }

}