@extends('admin.adminparent')

@section('title' , 'manageProduct')

@section("content")
<div class="flex flex-col gap-6 m-8">
   <div class="flex justify-between items-center w-full">
       <h2 class="text-2xl font-semibold ">Manage Products ({{ count($products) }})</h2>
       <a href="{{route("admin.insertProduct")}}" class="border border-red-600 px-2 rounded text-xl font-semibold py-1 text-white bg-green-500">Insert Product</a>
   </div>
   <div>
    <table class="w-full">
        <thead>
            <tr>
                <th class="shadow border-b py-2 px-2">Id</th>
                <th class="shadow border-b py-2 px-2">Image</th>
                <th class="shadow border-b py-2 px-2">Title</th>
                <th class="shadow border-b py-2 px-2">Brand</th>
                <th class="shadow border-b py-2 px-2">Price</th>
                <th class="shadow border-b py-2 px-2">Category</th>
                <th class="shadow border-b py-2 px-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td class="shadow border-b py-2 text-center px-2">{{$item->id}}</td>
                <td class="shadow border-b py-2 text-center px-2"><img src="{{$item->image}}"  class="h-10"></td>
                <td class="shadow border-b py-2 text-center px-2">{{$item->title}}</td>
                <td class="shadow border-b py-2 text-center px-2">{{$item->brand}}</td>
                <td class="shadow border-b py-2 text-center px-2"><del class="text-xs text-red-500">{{$item->price}}</del>   {{$item->discount_price}}</td>
                <td class="shadow border-b py-2 text-center px-2">{{$item->category->cat_title}}</td>
                <td class="shadow border-b py-2 flex justify-center text-center px-2">
                    <form action="{{ route('admin.deleteProduct', $item->id) }}" method="POST" >
                         @csrf
                        @method('DELETE')
                        <input type="submit" value="X" name="" class="py-2 rounded text-white px-2 cursor-pointer font-semibold bg-red-500" id="">
                    </form>
                    <a href="" class="py-2 rounded text-white px-2 font-semibold bg-green-500">view</a>
                    <a href="" class="py-2 rounded text-white px-2 font-semibold bg-blue-500">edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>

</div>


@endsection