<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	use HasFactory;
	private static $blog, $image, $imageUrl, $imageName, $directory;
	private static $is_delete;

	public static function getImageUrl($req)
	{
		self::$image = $req->file('image');
		// var_dump(self::$image);
		// exit();
		self::$imageName = self::$image->getClientOriginalName();
		self::$directory = 'blog-images/';
		self::$image->move(self::$directory, self::$imageName);

		return self::$directory . self::$imageName;
	}
	public static function newBlog($req)
	{
		self::$blog = new Blog();
		self::$imageUrl = self::getImageUrl($req);
		self::saveBasicBlogInfo(self::$blog, self::$imageUrl, $req);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public static function updateBlog($req, $id)
	{
		// var_dump($req->all());
		self::$blog = Blog::find($id);
		if($req->file('image'))
		{
			self::$is_delete = self::delete_file(self::$blog->image);
			self::$imageUrl = self::getImageUrl($req);
		}
		else
		{
			self::$imageUrl = self::$blog->image;
		}

		self::saveBasicBlogInfo(self::$blog, self::$imageUrl, $req);
	}

	public static function saveBasicBlogInfo($blog, $imageUrl, $req)
	{
		$blog->category_id = $req->category_id;
		$blog->title = $req->title;
		$blog->short_description = $req->short_description;
		$blog->long_description = $req->long_description;
		$blog->image = $imageUrl;
		$blog->save();
	}
	public static function deleteBlog($id)
	{
		self::$blog = Blog::find($id);
		self::$is_delete = self::delete_file(self::$blog->image);
		self::$blog->delete();
	}

	private static function delete_file($path) {
		if(file_exists($path)) {
			return unlink($path);	
		}
		else {
			return false;
		}
	}
}
