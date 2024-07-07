<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category, $image, $directory, $imageName, $imageURL;

    public static function newCategory($request) {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'uploads/category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;

        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageURL;
        self::$category->status = $request->status;
        self::$category->save();
    }
}
