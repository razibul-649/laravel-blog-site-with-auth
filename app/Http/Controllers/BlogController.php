<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	private $categories, $blogs, $blog;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->blogs = Blog::all();
			return view('blog.manage', ['blogs' => $this->blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$this->categories = Category::all();
			return view('blog.index', [
				'categories' => $this->categories
			]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Blog::newBlog($request);
			return redirect('/blog/create')
			->with('msg', 'Blog info saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$this->categories = Category::all();
			$this->blog = Blog::find($id);

			return view('blog.edit', [
				'categories' => $this->categories,
				'blog' => $this->blog
			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // return $request->file('image');

			Blog::updateBlog($request, $id);
			return redirect('/blog')->with('msg', 'Blog info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Blog::deleteBlog($id);
			return redirect('/blog')->with('msg', 'Blog info delete successfully');
    }
}
