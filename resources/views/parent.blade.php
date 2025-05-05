<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') {{ env('APP_NAME') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {!! ToastMagic::styles() !!}
</head>

<body>
    <header class="bg-teal-500   py-4 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">

            <!-- Logo -->
            <a href="{{ route('homepage') }}" class="text-3xl font-bold text-white flex items-center">
                <i class="fas fa-store mr-2 text-yellow-300"></i>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-yellow-500">
                    {{ env('APP_NAME') }}
                </span>
            </a>

            <!-- Search -->
            <form method="GET" action="{{ route('search') }}" class="flex items-center w-full md:w-auto gap-2">
                <input type="text" name="search" placeholder="Search now..."
                    class="w-full md:w-64 px-3 py-1.5 rounded bg-white text-gray-800 focus:outline-none">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 rounded">
                    Search
                </button>
            </form>

            <!-- Navigation & Auth -->
            <div class="flex items-center gap-6 text-white text-sm">
                <a href="{{ route('homepage') }}" class="hover:text-yellow-300 font-semibold">Home</a>

                @auth
                    <!-- Dropdown for logged-in user -->
                    <div class="relative group">
                        <button class="flex items-center font-medium hover:text-yellow-300">
                            <i class="fas fa-user-circle mr-1 text-xl"></i>
                            {{ auth()->user()->name }}
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 hover:bg-purple-100">My Account</a>
                            <a href="#" class="block px-4 py-2 hover:bg-purple-100">Orders</a>
                            <a href="{{ route('logoutUser') }}" class="block px-4 py-2 hover:bg-purple-100">Logout</a>
                        </div>
                    </div>
                @else
                    <!-- Guest Links -->
                    <a href="{{ route('login') }}" class="flex items-center hover:text-yellow-300">
                        <i class="fas fa-sign-in-alt mr-1"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center hover:text-yellow-300">
                        <i class="fas fa-user-plus mr-1"></i> Register
                    </a>
                @endauth

                <!-- Cart -->
                <a href="#" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white font-semibold">
                    <i class="fas fa-shopping-cart mr-1"></i> Cart
                </a>
            </div>
        </div>
    </header>
    @section('content')

    @show

    {!! ToastMagic::scripts() !!}
</body>

</html>
