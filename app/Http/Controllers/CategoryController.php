<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->with(['books'])->latest()->get();
        // $books = Category::select('id', 'name')->get();
        return view('category.category', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.category-edit', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories');
    }
}
