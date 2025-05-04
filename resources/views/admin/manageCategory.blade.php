@extends('admin.adminparent')

@section('title', 'dashboard')

@section('content')
<div class="flex">
    <!-- Category Table -->
    <div class="w-8/12 m-4">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="border py-2 px-3">ID</th>
                    <th class="border py-2 px-3">Title</th>
                    <th class="border py-2 px-3">Description</th>
                    <th class="border py-2 px-3">Parent</th>
                    <th class="border py-2 px-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                <tr>
                    <td class="border text-center px-2 py-1">{{ $cat->id }}</td>
                    <td class="border text-center px-2 py-1">{{ $cat->cat_title }}</td>
                    <td class="border text-center px-2 py-1">{{ substr($cat->cat_description, 0, 50) }}</td>
                    <td class="border text-center px-2 py-1">{{ $cat->parent ? $cat->parent->cat_title : '' }}</td>
                    <td class="border text-center px-2 py-1 flex justify-center gap-2">
                        <form action="{{ route('admin.deleteCategory', $cat->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="X" class="py-1 px-2 rounded text-white bg-red-500">
                        </form>
                        <a href="#" data-modal-target="editmodel-{{ $cat->id }}" data-modal-toggle="editmodel-{{ $cat->id }}"
                            class="py-1 px-2 rounded text-white bg-blue-500">Edit</a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div id="editmodel-{{ $cat->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden fixed inset-0 z-50  items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">
                        <button type="button"
                            class="absolute top-3 right-3 text-gray-500 hover:text-gray-900"
                            data-modal-toggle="editmodel-{{ $cat->id }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <h2 class="text-xl font-semibold text-center mb-4">Edit Category {{$cat->cat_title . "` s Record"}}</h2>
                        <form action="{{ route('admin.updateCategory', $cat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="cat_title" class="block text-sm font-medium">Title</label>
                                <input type="text" name="cat_title" value="{{ $cat->cat_title }}"
                                    class="w-full border rounded px-3 py-2 mt-1" required>
                            </div>

                            <div class="mb-3">
                                <label for="cat_description" class="block text-sm font-medium">Description</label>
                                <textarea name="cat_description" rows="4"
                                    class="w-full border rounded px-3 py-2 mt-1"
                                    required>{{ $cat->cat_description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="block text-sm font-medium">Parent Category</label>
                                <select name=" " class="w-full border rounded px-3 py-2 mt-1">
                                    <option value="">None</option>
                                    @foreach ($parent_cat as $parent)
                                        <option value="{{ $parent->id }}" {{ $cat->category_id == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->cat_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <button type="submit"
                                    class="w-full bg-blue-500 text-white rounded py-2 font-semibold">Update
                                    Category</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        <p class="mt-4">{{ $categories->links() }}</p>
    </div>

    <!-- Category Insert Form -->
    <div class="w-4/12 m-4">
        <div class="border p-4 rounded shadow">
            <h2 class="text-center text-2xl font-semibold">Insert Category</h2>
            <form action="{{ route('admin.createCategory') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="cat_title" class="block text-sm font-medium">Title</label>
                    <input type="text" name="cat_title" value="{{ old('cat_title') }}"
                        class="w-full border rounded px-3 py-2 mt-1">
                    @error('cat_title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cat_description" class="block text-sm font-medium">Description</label>
                    <textarea name="cat_description" rows="5"
                        class="w-full border rounded px-3 py-2 mt-1">{{ old('cat_description') }}</textarea>
                    @error('cat_description')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium">Parent Category</label>
                    <select name="category_id" class="w-full border rounded px-3 py-2 mt-1">
                        <option value="">None</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white rounded py-2 font-semibold">Insert Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
