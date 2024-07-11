<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    public static $product, $image, $directory, $imageName, $imageURL;

//    public function product_images() {
//        return $this->hasMany(ProductImage::class);
//    }

//    public function category() {
//        return $this->belongsTo(Category::class);
//    }

    public static function newProduct($request) {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'uploads/sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;

        self::$product                      = new Product();
        self::$product->category_id         = $request->category_id;
        self::$product->sub_category_id     = $request->sub_category_id;
        self::$product->brand_id            = $request->brand_id;
        self::$product->unit_id             = $request->unit_id;

        self::$product->name                = $request->name;
        self::$product->code                = $request->code;
        self::$product->short_description   = $request->short_description;
        self::$product->long_description    = $request->long_description;
        self::$product->stock               = $request->stock;
        self::$product->meta_title          = $request->meta_title;
        self::$product->meta_description    = $request->meta_description;
        self::$product->image               = self::$imageURL;
        self::$product->other_image         = self::$imageURL;
        self::$product->status              = $request->status;
        self::$product->save();
    }

    public static function updateProduct(Request $request, $id) {
        self::$product = Product::find($id);
        if($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/product-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;
        } else {
            self::$imageURL = self::$product->image;
        }

        self::$product->name = $request->name;
        self::$product->category_id = $request->category_id;
        self::$product->description = $request->description;
        self::$product->image = self::$imageURL;
        self::$product->status = $request->status;
        self::$product->save();
    }

    public static function deleteProduct($id) {
        self::$product = Product::find($id);
        self::$product->delete();
    }
}
