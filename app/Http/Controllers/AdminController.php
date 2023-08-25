<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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

        return redirect()->back()->with('message', 'Category Added Successfully');
        
    }

    public function delete_category($id) 
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {   
        $categories = Category::all();

        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $products = new Product;

        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->discount_price = $request->dis_price;
        $products->category = $request->category;
        
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/product', $fileName);
        $products->image = $fileName;
        

        $products->save();

        return redirect()->back()->with('message', 'Product added Successfully');

    }

    public function show_product()
    {
        $products = Product::all();

        return view('admin.show_product', compact('products'));
    }



}
