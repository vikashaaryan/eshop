@extends('admin.adminparent')

@section('title' , 'dashboard')

@section("content")
<div class="flex">
   <div class="grid grid-cols-4 mt-10 gap-10 mx-auto">
    <div class="border-2 p-4 rounded">
        <h1 class="text-2xl font-semibold">({{ App\Models\Product::count() }})</h1>
        <h2 class="font-semibold text-2xl">Manage Products</h2>
        <div class="mt-5 gap-2 flex">
            <a href="{{ route("admin.insertProduct")}}" class="py-2 px-3 bg-red-500 text-white rounded font-semibold">Insert</a>
            <a href="{{ route("admin.manageProduct")}}" class="py-2 px-3 bg-blue-500 text-white rounded font-semibold">Manage</a>
        </div>
    </div>
     <div class="border-2 p-4 rounded">
        <h1 class="text-2xl font-semibold">({{ App\Models\Category::count() }})</h1>
        <h2 class="font-semibold text-2xl">Manage Category</h2>
        <div class="mt-5  gap-2 flex">
              
            <a href="" class="py-2 px-3 bg-red-500 text-white rounded font-semibold">Insert</a>
            <a href="{{ route("admin.manageCategory")}}" class="py-2 px-3 bg-blue-500 text-white rounded font-semibold">Manage</a>
        </div>
    </div> <div class="border-2 p-4 rounded">
        <h1 class="text-2xl font-semibold">({{ App\Models\User::count() }})</h1>
        <h2 class="font-semibold text-2xl">Manage Users</h2>
        <div class="mt-5  gap-2 flex">
            <a href="" class="py-2 px-3 bg-red-500 text-white rounded font-semibold">Insert</a>
            <a href="" class="py-2 px-3 bg-blue-500 text-white rounded font-semibold">Manage</a>
        </div>
    </div> <div class="border-2 p-4 rounded">
        <h2 class="font-semibold text-2xl">Manage Orders</h2>
        <div class="mt-5  gap-2 flex">
            <a href="" class="py-2 px-3 bg-red-500 text-white rounded font-semibold">Insert</a>
            <a href="" class="py-2 px-3 bg-blue-500 text-white rounded font-semibold">Manage</a>
        </div>
        
    </div>

   </div>
</div>
    
@endsection