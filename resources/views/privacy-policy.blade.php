@extends('layouts.app')

@section('title', 'Политика конфиденциальности')
@section('meta_description', 'Подробная информация о политике конфиденциальности и использовании файлов cookie на нашем сайте.')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 md:p-12 rounded-3xl shadow-2xl mt-12 mb-12 animate-fade-in">
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-10">Политика конфиденциальности</h1>

    <section class="space-y-6 text-gray-700 leading-relaxed">
        <p class="text-lg">
            Мы уважаем вашу конфиденциальность и прилагаем все усилия для защиты ваших персональных данных. В этой политике объясняется, какие данные мы собираем, как их используем и какие права у вас есть.
        </p>

        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">1. Сбор информации</h2>
            <ul class="list-inside list-disc space-y-2 pl-4">
                <li>Информация, предоставленная вами добровольно (например, комментарии, формы обратной связи).</li>
                <li>Технические данные (IP-адрес, тип браузера, время посещения и просмотренные страницы).</li>
            </ul>
        </div>

        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">2. Использование данных</h2>
            <p>Мы используем данные для следующих целей:</p>
            <ul class="list-inside list-disc space-y-2 pl-4">
                <li>Анализа и улучшения качества контента и функциональности сайта.</li>
                <li>Персонализации пользовательского опыта.</li>
                <li>Обеспечения безопасности нашего сервиса.</li>
            </ul>
        </div>

        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">3. Файлы cookie</h2>
            <p>
                Наш сайт использует файлы cookie для улучшения взаимодействия с пользователями. Cookie позволяют нам запоминать ваши предпочтения и собирать обезличенные данные о посещениях.
            </p>
            <p class="mt-2">
                Вы можете изменить настройки cookie в своем браузере в любое время.
            </p>
        </div>

        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">4. Защита данных</h2>
            <p>
                Мы применяем соответствующие технические и организационные меры безопасности для защиты ваших данных от несанкционированного доступа, изменения или уничтожения.
            </p>
        </div>

        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">5. Ваши права</h2>
            <p>
                Вы имеете право на доступ, изменение или удаление своих персональных данных. Для реализации этих прав свяжитесь с нами.
            </p>
        </div>

        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">6. Контактная информация</h2>
            <p>
                По вопросам конфиденциальности, пожалуйста, свяжитесь с нами по электронной почте:
                <a href="mailto:support@example.com" class="text-blue-600 hover:underline font-semibold">support@example.com</a>
            </p>
        </div>

        <div class="text-center mt-10">
            <a href="{{ url('/') }}" class="inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white text-lg px-6 py-3 rounded-full shadow-lg hover:scale-105 transform transition">
                Вернуться на главную
            </a>
        </div>
    </section>
</div>

<!-- Простая анимация появления -->
<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}
</style>
@endsection
