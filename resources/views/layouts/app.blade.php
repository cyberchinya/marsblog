<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный блог</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">
    <!-- Навигация -->
    <nav class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-4 md:p-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl md:text-2xl font-bold">
                <a href="/" class="hover:text-gray-200 transition duration-300">Личный блог</a>
            </h1>
            @can('access-filament')
                <a href="/admin" class="bg-white text-blue-600 px-3 py-1 md:px-4 md:py-2 rounded-lg shadow hover:bg-gray-200 transition duration-300">
                    Админ
                </a>
            @endcan
        </div>
    </nav>

    <!-- Основное содержимое -->
    <div class="container mx-auto p-4 md:p-6 flex-1">
        @yield('content')
    </div>

    <!-- Футер -->
    <footer class="bg-gray-800 text-white p-4 md:p-6 mt-auto">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <p class="text-center md:text-left">&copy; {{ date('Y') }} Все права защищены.</p>
            <div class="flex space-x-4 mt-2 md:mt-0">
                {{-- <a href="#" class="hover:text-gray-400 transition duration-300">Политика конфиденциальности</a> --}}
                {{-- <a href="#" class="hover:text-gray-400 transition duration-300">Условия использования</a> --}}
                <a href="#" class="hover:text-gray-400 transition duration-300">Контакты</a>
            </div>
        </div>
    </footer>
</body>
</html>