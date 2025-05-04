<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title") {{env("APP_NAME")}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      {!! ToastMagic::styles() !!}
</head>
<body>
    <div class="py-4 px-6 bg-gray-400  ">
        <div class="flex justify-between items-center mx-auto">
          <a href="" class="text-2xl font-bold text-white">{{env("APP_NAME")}}</a>
          <form method="GET" action="{{ route('search') }}">
    <input type="text" name="search" size="50"  placeholder="Search Now....." class="px-2 bg-white py-1 rounded">
      <button type="submit"  class="py-1 px-2 text-white  bg-blue-500 rounded-md">Search</button>
    </form>

      <div class="flex gap-7">
       <a href="{{ route("homepage") }}" class="text-white font-semibold px-2 py-1 ">Home</a>
     @auth
     
        <span class="text-blue-600 mt-1 font-semibold underline">{{auth()->user()->name}}</span>
      
     @else
      <a href="{{ route('login') }}" class="text-white font-semibold px-2 py-1">Login</a>
       <a href="{{ route("register") }}" class="text-white font-semibold px-2 py-1 ">Register</a>
     @endauth
           
     <a href="" class="text-white bg-red-400 px-2 py-1 rounded font-semibold ">Cart</a>
       </div>
    </div>
      
       
    </div>
    @section('content')
        
    @show
    
      {!! ToastMagic::scripts() !!}
</body>
</html>