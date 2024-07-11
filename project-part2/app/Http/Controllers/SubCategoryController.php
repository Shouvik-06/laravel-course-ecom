<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index() {
        return view('admin.sub-category.index', ['sub_categories' => SubCategory::all()]);
    }

    public function create() {
        return view('admin.sub-category.create', ['categories' => Category::where('status', 1)->get()]);
    }

    public function store(Request $request) {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'Sub-Category created successfully.');
    }

    public function edit($id) {
        $categories = Category::where('status', 1)->get();
        return view('admin.sub-category.edit', [
            'sub_category' => SubCategory::find($id),
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id) {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category')->with('message', 'Sub-Category updated successfully.');
    }

    public function destroy($id) {
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category')->with('message', 'Sub-Category deleted successfully.');
    }
}
