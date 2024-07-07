<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public $categories;

    public function index() {
        $this->categories = Category::all();
        return view('admin.category.index', ['categories' => $this->categories]);
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
//        $formFields = $request->validate([
//            'name' => 'required|unique',
//        ]);

        Category::newCategory($request);
        return back()->with('message', 'Category created successfully.');
    }

    public function edit($id) {
        return view('admin.category.edit', ['category' => Category::find($id)]);
    }

    public function update(Request $request, $id) {
        Category::updateCategory($request, $id);
        return redirect('/category')->with('message', 'Category info update successfully.');
    }

    public function destroy($id) {
        Category::deleteCategory($id);
        return back()->with('message', 'Category deleted successfully.');
    }
}
