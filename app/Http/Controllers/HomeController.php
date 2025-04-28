<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::paginate(50);
        $categories = Category::where('category_id', null)->get(); 
        return view('home', compact('products', 'categories'));
    }

    public function login()
    {
        return view('login');
    }
}
