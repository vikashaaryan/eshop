<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
        $countUser = User::count();
        return view('admin.dashboard', compact('countUser'));
    }
    public function manageCategory(){
        $categories = Category::orderby('id','DESC')->paginate(20);
        return view('admin.manageCategory', compact('categories'));
    }
    public function createCategory(Request $request){

        $request->validate([
            'cat_title' => 'required|string',
            'cat_description' =>'required'
        ]);
        Category::create([
            'cat_title' => $request->cat_title,
            'cat_description' => $request->cat_description,
            'category_id' => $request->category_id,

        ]);
        ToastMagic::success('Category add successfully!');
        return redirect("admin/category");


    }
    public function deleteCategory(Category $category){
        $category->delete();
        ToastMagic::success('Category deleted successfully!');
        return redirect ("admin/category");
    }
    public function editCat(Category $category){
        $categories = Category::orderby('id', 'DESC')->paginate(20);
        return view("admin/editCategory", compact('categories','category'));
    }
    public function updateCategory(Request $req ,$c){
        $item = $req->validate([
            'cat_title' => 'required|string',
            'cat_description' => 'required' ,
        ]);
        $item = Category::find($c)->update($item);
        return redirect("/admin/category");

    }
    
}
