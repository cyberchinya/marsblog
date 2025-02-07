<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный блог</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">
    <nav class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-6 shadow-md">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold"><a href="/">Личный блог</a></h1>
            @can('access-filament')
                <a href="/admin" class="bg-white text-blue-600 px-4 py-2 rounded-lg shadow hover:bg-gray-200">Админ</a>
            @endcan
        </div>
    </nav>
    <div class="container mx-auto p-6 flex-1">
        @yield('content')
    </div>
    <footer class="bg-gray-800 text-white p-6 mt-auto">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} Laravel Blog. All rights reserved.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-gray-400">Privacy Policy</a>
                <a href="#" class="hover:text-gray-400">Terms of Service</a>
                <a href="#" class="hover:text-gray-400">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>
