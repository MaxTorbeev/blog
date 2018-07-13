<?php

namespace MaxTor\Content\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

use MaxTor\Content\Models\Category;
use MaxTor\Content\Models\Photo;
use MaxTor\Content\Models\Post;
use MaxTor\Content\Models\Tag;
use MaxTor\Content\Requests\CategoryRequest;
use MaxTor\Content\Requests\PostRequest;
use MaxTor\MXTCore\Controllers\DashboardController;

class CategoriesController extends DashboardController
{
    public function index()
    {
        return view('content::dashboard.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        $this->authorize('create_post_category', Category::class);

        return view('content::dashboard.categories.create', [
            'categories' => $this->getList(Category::all(), true),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('create_post_category', Category::class);

        $category = Category::create($request->all());

        return redirect(route('admin.categories.edit', ['menu' => $category->id]))
            ->with('flash', 'Категория создана успешно');
    }

    public function edit(Category $category)
    {
        $this->authorize('create_post_category', Category::class);

        return view('content::dashboard.categories.edit', [
            'category' => $category,
            'categories' => $this->getList(Category::where('id', '!=', $category->id), true),
        ]);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $this->authorize('create_post_category', Category::class);

        if($category->update($request->all())) {
            return redirect(route('admin.categories.edit', ['шв' => $category->id]))
                ->with('flash', 'Категория была отредактирована');
        }

        return flash('flash', 'Не изменить категорию');

    }
}