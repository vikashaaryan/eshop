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
    // search work
    public function search(Request $req){
        $search = $req->search;
        $products = Product::where('title', 'like', "%$search%")->paginate(50);

        $categories = Category::where("category_id", null)->get();
        return view("home", compact("products", "categories"));
    }
    //filter work

    public function filter($catId){
        $products = Product::where("category_id", "$catId")->paginate(50);
        $categories = Category::where("category_id", null)->get();
        return view("home", compact("products", "categories"));
    }

    
}
