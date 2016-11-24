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
use MaxTor\Blog\Requests\CategoryRequest;
use MaxTor\Blog\Requests\PostRequest;

class CategoriesController extends Controller
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

    public function create($controller, $page)
    {
        $categoryList = $this->getCategoriesList(Category::get());
        return view('blog::dashboard.categories.create',  compact('categoryList', 'page'));
    }

    public function edit($controller, $page, $id)
    {
        $category = Category::findOrFail($id);
        $categoryList = $this->getCategoriesList($category);

        return view('blog::dashboard.categories.edit', compact('category', 'categoryList', 'page'));
    }

    public function update($id, Request $request){
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->back();
    }

    public function store(CategoryRequest $request, Flash $flash)
    {
        Auth::user()->categories()->create($request->all());
        flash()->success('Категория была создан', 'Материал успешно создан.');

        return redirect()->back();
    }
    
    public function dashboard($controller, $page, $id)
    {
        $categories = Category::get();

        return view('blog::dashboard.categories.index', compact('categories', 'page'));
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

    protected function getCategoriesList($model)
    {
        $model = Category::pluck('title', 'id');

        return $model->prepend('Не выбрано', null);
    }
}
