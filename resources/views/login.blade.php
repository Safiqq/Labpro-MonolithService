<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100">
    <x-error-modal :errors="$errors" />
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Login</h2>
            <form method="POST" action="{{ route('postLogin') }}">
                <div class="mb-4">
                    <label for="emailusername" class="block text-gray-700 font-medium">Email or Username</label>
                    <input type="text" name="emailusername" id="emailusername" class="form-input mt-1 block w-full border rounded focus:ring focus:ring-indigo-200" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" name="password" id="password" class="form-input mt-1 block w-full border rounded focus:ring focus:ring-indigo-200" required>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div>
                        <p class="text-gray-600">Don't have an account? <a href="{{ route('getRegister') }}" class="text-indigo-600">Register</a></p>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function closeModal() {
            var modal = document.querySelector('.modal');
            modal.style.display = 'none';
        }
    </script>
</body>

</html>