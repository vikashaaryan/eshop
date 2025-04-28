@extends('admin.adminparent')

@section('title' , 'dashboard')

@section("content")
<div class="flex">
    <div class="w-8/12 m-4">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="border py-2 px-3">ID</th>
                    <th class="border py-2 px-3">Title</th>
                    <th class="border py-2 px-3">Description</th>
                    <th class="border py-2 px-3">Parent </th>
                    <th class="border py-2 px-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                  <tr>
                    <td class="border text-center px-2 py-1">{{$cat->id}}</td>
                    <td class="border text-center px-2 py-1">{{$cat->cat_title}}</td>
                    <td class="border text-center px-2 py-1">{{substr($cat->cat_description,0,50)}}</td>
                    <td class="border text-center px-2 py-1">{{$cat->parent ? $cat->parent->cat_title :NULL}}</td>
                    <td class="border-r border-b text-center px-2 py-1 flex justify-center">
                       <form action="{{ route('admin.deleteCategory', $cat->id) }}" method="POST">
                            @csrf
                            @method("delete")
                            <input type="submit" value="X" class="py-1 px-2 rounded text-white bg-red-500">
                        </form>
                        <a href="" class="py-1 px-2 rounded text-white  bg-blue-500">Edit</a>
                    </td>
                  </tr>
                    
                @endforeach
            </tbody>
        </table>
      <p class="mt-4"> {{ $categories->links() }}</p>

    </div>
    <div class="w-4/12 m-4">
        <div class="border p-4 rounded">
            <h2 class="text-center text-2xl font-semibold">Insert Category</h2>
            <form action="{{route('admin.createCategory')}}" method="post" class="mt-4">
                @csrf
               <div class=" flex flex-col gap-1">
                 <label for="cat_title">Title</label>
                 <input type="text" name="cat_title" value="{{old('cat_title')}}" class="border rounded py-1 px-2" >
                 @error('cat_title')
                     <p class="text-red-500">{{$message}}</p>
                 @enderror
               </div>
                <div class=" flex flex-col gap-1 mt-4">
                 <label for="cat_description">Description</label>
                 <textarea rows="5" name="cat_description" value="{{old('cat_description')}}" class="border rounded py-1 px-2"></textarea>
                 @error('cat_description')
                     <p class="text-red-500">{{$message}}</p>
                 @enderror
               </div>
               <div class="flex flex-col mt-4 gap-2">
                <label for="parent_category">Parent Category</label>
                <select name="category_id" id="" class="border py-1 px-2 rounded">
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