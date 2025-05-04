<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manageCategory()
    {
        $categories = Category::orderby('id', 'DESC')->paginate(20);
        $parent_cat = Category::where("category_id", NULL)->get();
        return view('admin.manageCategory', compact('categories','parent_cat'));
    }
    public function createCategory(Request $request)
    {

        $request->validate([
            'cat_title' => 'required|string',
            'cat_description' => 'required'
        ]);
        Category::create([
            'cat_title' => $request->cat_title,
            'cat_description' => $request->cat_description,
            'category_id' => $request->category_id,

        ]);
        ToastMagic::success('Category add successfully!');
        return redirect("admin/category");
    }
    public function deleteCategory(Category $category)
    {
        $category->delete();
        ToastMagic::success('Category deleted successfully!');
        return redirect()->back();
    }
   
    public function updateCategory(Request $req, $c)
    {
        $item = $req->validate([
            'cat_title' => 'required|string',
            'cat_description' => 'required',
        ]);
        $item = Category::find($c)->update($item);
        return redirect()->route('admin.manageCategory');
       
    }
}
