@extends('admin.adminparent')

@section('title', 'Insert Product')

@section('content')
<div class="flex flex-col min-h-screen bg-gray-50 px-6 py-10">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8 max-w-5xl w-full mx-auto">
        <h2 class="text-3xl font-bold text-gray-800">Insert Product</h2>
        <a href="{{ route('admin.manageProduct') }}" class="text-white bg-gray-800 hover:bg-gray-900 transition rounded-md px-4 py-2 text-sm font-medium shadow">
            Go Back
        </a>
    </div>

    <div class="w-full  max-w-5xl mx-auto bg-white p-8 rounded-xl shadow border">
        <form action="{{ route('admin.storeProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <!-- Title -->
                <div class="flex flex-col gap-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" class="py-1 border rounded px-2">
                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Brand -->
                <div class="flex flex-col gap-2">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" value="{{ old('brand') }}" id="brand" class="py-1 border rounded px-2">
                    @error('brand')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="flex flex-col gap-2">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{ old('price') }}" id="price" class="py-1 border rounded px-2">
                    @error('price')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Discount Price -->
                <div class="flex flex-col gap-2">
                    <label for="discount_price">Discount Price</label>
                    <input type="text" name="discount_price" value="{{ old('discount_price') }}" id="discount_price" class="py-1 border rounded px-2">
                    @error('discount_price')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="flex flex-col gap-2">
                    <label for="category_id">Select Category</label>
                    <select name="category_id" id="category_id" class="py-1 border rounded px-2">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->cat_title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="flex flex-col gap-2">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="py-1 border rounded px-2">
                    @error('image')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="flex flex-col mt-4 gap-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="py-1 border rounded px-2" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="mt-6">
                <input type="submit" value="Insert Product" class="bg-green-500 text-white font-semibold rounded py-2 px-4 w-full">
            </div>
        </form>
    </div>
</div>
@endsection
