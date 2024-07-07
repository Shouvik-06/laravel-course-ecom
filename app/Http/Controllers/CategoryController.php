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
        Category::newCategory($request);
        return back()->with('message', 'category created successfully');
    }
}
