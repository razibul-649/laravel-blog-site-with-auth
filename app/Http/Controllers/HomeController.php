<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{   private $blogs;
	public function index() {
         $this->blogs=Blog::all();
		
		return view('home.index',['blogs'=>$this->blogs]);
	}
}
