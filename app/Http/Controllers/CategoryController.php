<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	private $categories,$category;
  public function index()
	{
		return view('category.index');
	}
  public function create(Request $request)
	{
		Category::newCategory($request);
		// return $request->all();
		return redirect('/category/add')->with('msg', 'Category Info Created Successfully.');
	}

	public function manage()
	{
		$this->categories = Category::all();
		return view('category.manage', ['categories' => $this->categories]);
	}

	public function edit_ready($id)
	{  $this->category = Category::find($id);
		return view('category.edit',['category'=> $this->category]);
	}

	public function update(Request $request, $id)
	{
         
			Category::updateCategory($request, $id);
			return redirect('/category/manage')->with('msg', 'Category info updated successfully');
		
	}

	public function delete($id)
	{   
		Category::deleteCategory($id);
		return redirect('/category/manage')->with('msg', 'Category info delete successfully');


	}

}
