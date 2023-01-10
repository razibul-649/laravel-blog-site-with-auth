<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;
	private static $category, $image, $imageUrl, $imageName, $directory;
	private static $is_delete;


	public static function getImageUrl($req)
	{
		self::$image = $req->file('image');
		self::$imageName = self::$image->getClientOriginalName();
		self::$directory = 'category-images/';
		self::$image->move(self::$directory, self::$imageName);

		return self::$directory . self::$imageName;
	}
	public static function newCategory($req)
	{
		self::$category = new Category();

		self::$category->name = $req->name;
		self::$category->description = $req->description;
		self::$category->image = self::getImageUrl($req);
		self::$category->save();
	}



	public static function updateCategory($req,$id){


		self::$category = Category::find($id);
		if($req->file('image'))
		{
			self::$is_delete = self::delete_file(self::$category->image);
			self::$imageUrl = self::getImageUrl($req);
		}
		else
		{
			self::$imageUrl = self::$category->image;
		}

		
		self::$category->name = $req->name;
		self::$category->description = $req->description;
		self::$category->image = self::$imageUrl;
		self::$category->save();
         

	}

	

	private static function delete_file($path) {
		if(file_exists($path)) {
			return unlink($path);	
		}
		else {
			return false;
		}
	}
  
	 public static function deleteCategory($id){
        self::$category = Category::find($id);
	   self::$is_delete = self::delete_file(self::$category->image);
	   self::$category->delete();
	 }
	
	
}
