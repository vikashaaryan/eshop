<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("homepage");
Route::get("/search",[HomeController::class, "search"])->name("search");
Route::get("/filter/{catId}", [HomeController::class, "filter"])->name("filter");


//auth routes
Route::match(['post', 'get'], "/login", [AuthController::class, "login"])->name("login");
Route::match(['post', 'get'], "/register", [AuthController::class, "register"])->name("register");
Route::match(['post', 'get'], "/logout", [AuthController::class, "logoutUser"])->name("logoutUser");

Route::prefix("admin")->group(function () {

    Route::get("", [AdminController::class, "dashboard"])->name("admin.dashboard");

    Route::controller(CategoryController::class)->group(function () {
        Route::get("/category", "manageCategory")->name("admin.manageCategory");
        Route::post("/category", 'createCategory')->name('admin.createCategory');
        Route::delete('/category/{category}', 'deleteCategory')->name('admin.deleteCategory');
        Route::put("/category/{category}", 'updateCategory')->name("admin.updateCategory");
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get("/product",  'index')->name('admin.manageProduct');
        Route::get("/product/insert",  'insert')->name('admin.insertProduct');
        Route::post("/product/insert",  'store')->name('admin.storeProduct');
        Route::delete('/product/{product}',  'deleteProduct')->name('admin.deleteProduct');
    });
   
});
