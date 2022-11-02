<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::query()->latest()->get();
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        Category::query()->create($validated);
    }


    public function show(Category $category)
    {
        return $category;
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
