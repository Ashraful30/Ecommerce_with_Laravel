<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_title'];
            $category->description = $data['category_description'];
            $category->url = $data['category_url'];
            $category->save();

            return redirect('/admin/add-category')->with('flash_message_success','Category added successfully');
        }
        return view('admin.categories.add_category');
    }
}
