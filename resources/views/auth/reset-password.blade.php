<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    @vite('resources/app/app.css')
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6">Reset Your Password</h1>
      
        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" id="password" name="password" required autofocus
                       class="mt-1 block w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm py-3 px-2">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       class="mt-1 block w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm py-3 px-2">
            </div>
            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
