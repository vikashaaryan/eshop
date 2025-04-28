<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderby("id", "DESC")->paginate(10);
        return view("admin.manageProduct" , compact('products'));
    }
    public function insert(){
        $categories = Category::orderby("id", "DESC")->get();
        return view("admin.insertProduct", compact("categories"));
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'description' => 'required',
        ]);
        $imagename = time().'.'. $request->image->extension();
        $request->image->move(public_path('images'), $imagename);
        Product::create([
           'title' => $request->title,
            'brand' => $request->brand,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' =>$imagename,

        ]);
        session()->flash("sucess", 'product insert sucessfully');
        return redirect()->route('admin.manageProduct');
    }
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect("admin/product");
    }
}
