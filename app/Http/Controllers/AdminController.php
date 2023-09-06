<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function delete_product($id)
    {
        $product = Product::find($id);

        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);

        $categories = Category::all();

        return view('admin.update_product', compact('product', 'categories'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $image = $request->image;

        if ($image) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/product', $fileName);
            $product->image = $fileName;
        }



        $product->save();

        return redirect()->back()->with('message', 'Product updated successfully');

    }

    public function order() {
        $orders = Order::all();

        return view('admin.order', compact('orders'));
    }

    public function delivered($id) {
        $order = Order::find($id);

        $order->delivery_status = "delivered";
        $order->payment_status = "Paid";

        $order->save();
        
        return redirect()->back();
    }
}
