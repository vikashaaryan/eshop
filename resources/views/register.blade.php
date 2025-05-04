@extends('parent')
@section("title", "Register Page")
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-md border border-gray-200">
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Create Your Account</h2>
        
        <form action="{{ route('register') }}" method="post" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="relative">
                <label for="name" class="block text-sm font-semibold text-gray-600 mb-1">Full Name</label>
                <input type="text" name="name" id="name" placeholder="John Doe"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition" required>
            </div>

            <!-- Email -->
            <div class="relative">
                <label for="email" class="block text-sm font-semibold text-gray-600 mb-1">Email address</label>
                <input type="email" name="email" id="email" placeholder="you@example.com"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition" required>
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-semibold text-gray-600 mb-1">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition" required>
            </div>

           

            <!-- Submit -->
            <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg font-semibold text-lg transition transform hover:scale-[1.01]">
                Register
            </button>

            <!-- Divider -->
            <div class="flex items-center justify-center mt-6">
                <span class="text-sm text-gray-400">Already have an account?</span>
                <a href="{{ route('login') }}" class="text-red-500 ml-2 hover:text-red-600 font-medium">Sign In</a>
            </div>
        </form>
    </div>
</div>
@endsection
