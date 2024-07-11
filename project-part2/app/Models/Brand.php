<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public static $brand, $image, $directory, $imageName, $imageURL;

    public static function newBrand($request) {
        self::$imageURL = null;

        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/brand-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;
        }

        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imageURL;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function updateBrand($request, $id) {
        self::$brand = Brand::find($id);
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/brand-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;
        }
        else {
            self::$imageURL = self::$brand->image;
        }

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imageURL;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($id) {
        self::$brand = Brand::find($id);
        self::$brand->delete();
    }
}
