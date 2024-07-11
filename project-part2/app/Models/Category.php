<?php

namespace App\Models;

//use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    public static $category, $image, $directory, $imageName, $imageURL;

    public static function newCategory($request) {
        self::$imageURL = null;

        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/category-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;
        }

        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageURL;
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function updateCategory(Request $request, $id) {
        self::$category = Category::find($id);
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/category-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;
        }
        else {
            self::$imageURL = self::$category->image;
        }

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageURL;
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($id) {
        self::$category = Category::find($id);
        self::$category->delete();
    }
}
