<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $category = Category::find('2');
        $categoryPosts = $category->posts;

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        Category::create([
            'title' => $data['title'],
        ]);

        // flash('Категория добавлена');

        return redirect(route('admin.categories.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category)
    {

        $attributes = request()->validate([
            'title' => 'required|unique:categories,title',
        ]);

        $category->update($attributes);

        return redirect(route('admin.categories.index'));

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('admin.categories.index'));
    }
}
