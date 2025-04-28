@extends('parent')
@section("title", "Homepage")

@section('content')

<div class="flex">
    <img src="{{ asset('banner.jpg') }}" alt="Banner" class="w-full h-[60vh] object-cover shadow-lg">
</div>

<div class="flex gap-4 m-5">
   <div class="w-3/12 h-[60vh] border overflow-y-scroll scrollbar-hide p-3 rounded-xl shadow-sm bg-white">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Categories</h2>

    <div class="flex gap-2 flex-col">
        @foreach ($categories as $category)
            <a href="#" class="flex justify-between items-center bg-gray-200 hover:bg-gray-300 transition p-2 rounded-md text-sm font-medium text-gray-700">
                <span class="truncate">{{ $category->cat_title }}</span>
                @if ($category->products->count() > 0)
                    <span class="bg-indigo-600 text-white text-xs rounded-full px-2 py-0.5">
                        {{ $category->products->count() }}
                    </span>
                @endif
            </a>
        @endforeach
    </div>
</div>

   <div class="w-9/12">
    <h2 class="text-2xl font-bold mb-4">All Products</h2>

  <div class="grid grid-cols-4 gap-6 p-4">
    @foreach ($products as $item)
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all p-4 group flex flex-col justify-between h-full">
    <div class="overflow-hidden rounded-lg h-40 flex items-center justify-center bg-gray-50">
        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="h-full object-contain group-hover:scale-105 transition-transform duration-300">
    </div>

    <div class="mt-3 flex flex-col justify-between flex-grow">
        <div class="space-y-1">
            <h2 class="text-sm font-semibold text-gray-800 group-hover:text-indigo-600 truncate line-clamp-2 ">
                {{ $item->title }}
            </h2>

            <p class="text-xs text-gray-500">
                Brand: <span class="font-semibold text-gray-700">{{ $item->brand ?? 'N/A' }}</span>
            </p>

            <p class="text-xs text-gray-500">
                Category: <span class="font-semibold text-gray-700">
                    {{ $item->category->cat_title ?? 'Uncategorized' }}
                </span>
            </p>
        </div>

        <div class="mt-2">
            <div class="flex items-center gap-2">
                <span class="text-lg  text-green-600">
                    {{ $item->discount_price }}
                </span>
                @if($item->price)
                    <span class="text-xs text-red-400 line-through">
                        {{ $item->price }}
                    </span>
                @endif
            </div>

        </div>
    </div>
</div>

    @endforeach
</div>

</div>

</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $products->links() }}
</div>

@endsection
<style>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none; 
    scrollbar-width: none;
}
</style>
