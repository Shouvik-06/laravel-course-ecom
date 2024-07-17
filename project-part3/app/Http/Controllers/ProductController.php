<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;
    
    public function index() {
        return view('admin.product.index', ['products' => Product::all()]);
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
        $this->product = Product::newProduct($request);
        ProductImage::newProductImage($request->file('other_image'), $this->product->id);
        return back()->with('message', 'Product created successfully.');
    }

    public function detail($id) {
        return view('admin.product.detail', ['product' => Product::find($id)]);
    }

    public function edit($id) {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        return view('admin.product.edit', [
            'product' => Product::find($id),
            'categories'=> $categories,
            'sub_categories'=> $sub_categories,
            'brands'=> $brands,
            'units'=> $units
        ]);
    }

    public function update(Request $request, $id) {
        Product::updateProduct($request, $id);
        if ($request->file('other_image')) {    // only update if something new was uploaded
            ProductImage::updateProductImage($request->file('other_image'), $id);
        }
        return redirect('/product')->with('message', 'Product updated successfully.');
    }

    public function destroy($id) {
        Product::deleteProduct($id);
        ProductImage::deleteProductImage($id);
        return back()->with('message', 'Product deleted successfully.');
    }

    public function getSubCategoryByCategory() {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }
}