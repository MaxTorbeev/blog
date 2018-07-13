<?php

namespace MaxTor\Content\Controllers\Admin;

use App\Http\Controllers\Controller;
use MaxTor\Content\Models\Tag;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission:access_dashboard');
    }

    public function index()
    {
        return view('content::dashboard.tags.index', [
            'tags' => Tag::pluck('name', 'id'),
        ]);
    }

    public function create()
    {
        $this->authorize('create_tag', Tag::class);

        return view('content::dashboard.tags.create');
    }
}