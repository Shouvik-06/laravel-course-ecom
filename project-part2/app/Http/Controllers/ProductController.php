<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('admin.product.index');
    }

    public function create() {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        return view('admin.product.create', [
            'categories'=> $categories,
            'sub_categories'=> $sub_categories,
            'brands'=> $brands,
            'units'=> $units
        ]);
    }

    public function store(Request $request) {
        return $request;
    }

    public function edit() {
        return view('admin.product.edit');
    }

    public function update(Request $request, $id) {
        return $request;
    }

    public function destroy($id) {
//        return $request;
    }




}
