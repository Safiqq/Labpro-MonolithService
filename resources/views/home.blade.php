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
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-4">Seleksi Labpro 2023</h1>
            <p class="mb-6">Creator: Syafiq Ziyadul Arifin</p>
            <p class="mb-6">Github: <a href="https://github.com/safiqq" target="_blank" class="text-blue-600 hover:underline">https://github.com/safiqq</a></p>
            <p class="mb-6">Repository: <a href="https://github.com/Safiqq/Labpro-MonolithService" target="_blank" class="text-blue-600 hover:underline">https://github.com/Safiqq/Labpro-MonolithService</a></p>
            <h2 class="text-xl font-bold mb-2">Available Routes (GET):</h2>
            <ul>
                @foreach($routes as $route)
                    @if ($route->getName() !== 'detail' && $route->getName() !== 'getBeli')
                        <li><a href="{{ route($route->getName()) }}" class="text-blue-600 hover:underline">{{ "/" . explode("/", route($route->getName()))[3] }}</a></li>
                    @else
                        <li><a href="{{ route($route->getName(), ['id' => 'id']) }}" class="text-blue-600 hover:underline">{{ "/" . explode("/", route($route->getName(), ['id' => 'id']))[3] . "/:id" }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>