@extends('parent')
@section("title", "loginpage")
@section('content')
      <div class="bg-white p-8 mx-auto mt-2 rounded-2xl border shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login to Your Account</h2>
    
    <form action="" method="post" class="space-y-5">
      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400" required>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400" required>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" class="w-full bg-amber-500 text-white py-2 px-4 rounded-lg hover:bg-amber-600 transition">Login</button>
      </div>

@endsection