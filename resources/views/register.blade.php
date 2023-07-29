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
            <h2 class="text-2xl font-semibold mb-6">Register</h2>
            <form method="POST" action="{{ route('postRegister') }}">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Name</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full border rounded focus:ring focus:ring-indigo-200" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-medium">Username</label>
                    <input type="text" name="username" id="username" class="form-input mt-1 block w-full border rounded focus:ring focus:ring-indigo-200" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 block w-full border rounded focus:ring focus:ring-indigo-200" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" name="password" id="password" class="form-input mt-1 block w-full border rounded focus:ring focus:ring-indigo-200" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input mt-1 block w-full border rounded focus:ring focus:ring-indigo-200" required>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div>
                        <p class="text-gray-600">Already have an account? <a href="{{ route('getLogin') }}" class="text-indigo-600">Login</a></p>
                    </div>
                    <button type="submit" id="register" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        Register
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

        document.addEventListener('DOMContentLoaded', () => {
            const nameInput = document.getElementById('name');
            const usernameInput = document.getElementById('username');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            // const registerBtn = document.getElementById('register');

            const checkInputs = () => {
                const name = nameInput.value.trim();
                const username = usernameInput.value.trim();
                const email = emailInput.value.trim();
                const password = passwordInput.value.trim();
                const confirmPassword = confirmPasswordInput.value.trim();

                const isNameValid = name !== '';
                const isUsernameValid = username !== '';
                const isEmailValid = email !== '';
                const isPasswordValid = password.length >= 8;
                const isConfirmPasswordValid = confirmPassword === password;

                const isFormValid = isNameValid && isUsernameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid;
                // registerBtn.disabled = !isFormValid;
            };

            nameInput.addEventListener('input', checkInputs);
            usernameInput.addEventListener('input', checkInputs);
            emailInput.addEventListener('input', checkInputs);
            passwordInput.addEventListener('input', checkInputs);
            confirmPasswordInput.addEventListener('input', checkInputs);
        });
    </script>
</body>

</html>