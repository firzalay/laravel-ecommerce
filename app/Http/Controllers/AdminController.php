<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category()
    {
        $datas = Category::all();

        return view('admin.category', compact('datas'));
    }

    public function add_category(Request $request)
    {
        $data = new category;

        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Succesfully');
        
    }

    public function delete_category($id) 
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->back();
    }
}
