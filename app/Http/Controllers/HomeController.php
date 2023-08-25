<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $products = Product::paginate(10);
    
        return view('home.userpage', compact('products'));
    }

    public function redirect() {
        $usertype = Auth::user()->usertype;
        $products = Product::paginate(10);


        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('home.userpage',compact('products'));
        }
    }

}
