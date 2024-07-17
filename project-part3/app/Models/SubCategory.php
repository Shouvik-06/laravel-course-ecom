<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $sub_category, $image, $directory, $imageName, $imageURL;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public static function newSubCategory($request) {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'uploads/sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;

        self::$sub_category = new SubCategory();
        self::$sub_category->name = $request->name;
        self::$sub_category->category_id = $request->category_id;
        self::$sub_category->description = $request->description;
        self::$sub_category->image = self::$imageURL;
        self::$sub_category->status = $request->status;
        self::$sub_category->save();
    }
    
    public static function updateSubCategory(Request $request, $id) {
        self::$sub_category = SubCategory::find($id);
        if($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/sub-category-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;
        } else {
            self::$imageURL = self::$sub_category->image;
        }

        self::$sub_category->name = $request->name;
        self::$sub_category->category_id = $request->category_id;
        self::$sub_category->description = $request->description;
        self::$sub_category->image = self::$imageURL;
        self::$sub_category->status = $request->status;
        self::$sub_category->save();
    }

    public static function deleteSubCategory($id) {
        self::$sub_category = SubCategory::find($id);
        self::$sub_category->delete();
    }
}