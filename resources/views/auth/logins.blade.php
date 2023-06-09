<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="cahya">
    <meta name="description" content="">
    <script src="/cdn-cgi/apps/head/yZcRqLnyFEjMCrfXHlj2VKQPx0g.js"></script>
    <!-- Tailwind -->

    <!-- Login ADMIN Material -->
    <link href="{{ asset('/css/tailwind.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/loginadmin.css') }}" rel="stylesheet">
</head>


<body class="bg-white font-family-karla h-screen">
    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-left text-5xl" style="color:#087990"><u><strong>Login</strong></u><span
                        class="text-left text-2xl" style="color:#3F6F81"><strong>ADMINISTRATOR</strong></span>
                <p>
                <h5 style="color:#087990"><strong style="color:#087990"></strong> <br>Sistem Login SIASIK </h5>

                <form action="{{ route('login') }}" method="POST" class="flex flex-col pt-3 md:pt-4">
                    @csrf
                    <div class="flex flex-col pt-2">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    @error('username')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="flex flex-col pt-2">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="button primary">Masuk</button>
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Perlu Bantuan ? <a href="#" class="underline font-semibold">Hubungi Bagian Admin</a></p>
                </div>
            </div>
        </div>
        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block"
                src="{{ asset('/resources/images/admin/login-admin.gif') }}">
        </div>
    </div>
</body>


</html>
