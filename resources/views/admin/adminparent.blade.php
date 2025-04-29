<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin ||@yield("title") {{env("APP_NAME")}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      {!! ToastMagic::styles() !!}
</head>
<body>
    <div class="py-4 px-6 bg-black ">
        <div class="flex justify-between items-center mx-auto">
          <a href="" class="text-2xl font-bold text-white">{{env("APP_NAME")}}</a>
          <a href="" class="text-white border border-red-500 px-2 py-1 rounded font-semibold ">Logout</a>
         
        </div>
    </div>
      <div class="py-2 px-6 bg-blue-500 ">
            <div class="flex gap-6 text-white  ">
                <a class="border-r-2 px-4 border-gray-300 " href="{{route("admin.dashboard")}}">Home</a>
                <a class="border-r-2 px-4 border-gray-300 " href="{{route("admin.manageCategory")}}">Category</a>
                <a class="border-r-2 px-4 border-gray-300 " href="{{route("admin.manageProduct")}}">Product</a>
                <a class="border-r-2 px-4 border-gray-300 " href="">Users</a>
                <a class="border-r-2 px-4 border-gray-300 " href="">Orders</a>
            </div>
    </div>
    @section('content')
        
    @show
     {!! ToastMagic::scripts() !!}
    
</body>
</html>