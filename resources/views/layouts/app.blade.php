<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-6 shadow-md">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">Laravel Blog</h1>
            <a href="/admin" class="bg-white text-blue-600 px-4 py-2 rounded-lg shadow hover:bg-gray-200">Admin Panel</a>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        @yield('content')
    </div>
</body>
</html>