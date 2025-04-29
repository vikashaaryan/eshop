@extends('admin.adminparent')

@section('title' , 'dashboard')

@section("content")
<div class="flex">
    
    <div class="mx-auto w-[70vh] m-4">
        <div class="border p-4 rounded">
            <h2 class="text-center text-2xl font-semibold">Insert Category</h2>
            <form action="/admin/editCategory/{{$category->id}}" method="post" class="mt-4">
                @method("put")
                @csrf 
               <div class=" flex flex-col gap-1">
                 <label for="cat_title">Title</label>
                 <input type="text" name="cat_title" value="{{$category->cat_title}}" class="border rounded py-1 px-2" >
                 @error('cat_title')
                     <p class="text-red-500">{{$message}}</p>
                 @enderror
               </div>
                <div class=" flex flex-col gap-1 mt-4">
                 <label for="cat_description">Description</label>
                 <textarea rows="5" name="cat_description"  class="border rounded py-1 px-2">{{$category->cat_description}}"</textarea>
                 @error('cat_description')
                     <p class="text-red-500">{{$message}}</p>
                 @enderror
               </div>
               <div class="flex flex-col mt-4 gap-2">
                <label for="parent_category">Parent Category</label>
                <select name="category_id" id=""  class="border py-1 px-2 rounded">
                    <option value="">Parent Category</option>
                    @foreach ($categories as $category)
                   
                       <option value="{{$category->id}}">{{$category->cat_title}}</option>          
                    @endforeach
                </select>
                 @error('category_id')
                     <p class="text-red-500">{{$message}}</p>
                 @enderror
               </div>
               <div class="mt-4">
                <input type="submit" value="Insert Category" class="w-full bg-blue-500 rounded text-white font-semibold py-2" id="">
               </div>
            </form>

        </div>

    </div>
</div>
    
@endsection