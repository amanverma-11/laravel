<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<x-navbar/>
<div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6">Login</h1>
        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                       class="mt-1 block w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm py-3 px-2">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm py-3 px-2">
            </div>
            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Login
                </button>
            </div>
            <div class="flex justify-center">
                <span class="text-center text-lg font-semibold text-gray-500">
                  or
                </span>
            </div>
            <div>
                <a href="{{ route('auth.google') }}" class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Continue with Google
                </a>
            </div>
            <div class="flex justify-between">
                <p class="text-sm text-gray-600">New User? <a href="{{ route('register') }}" class="text-blue-600 font-bold">Register</a></p>
                <a href="{{route('password.request')}}" class="text-blue-600 text-sm">Forgot your password?</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
