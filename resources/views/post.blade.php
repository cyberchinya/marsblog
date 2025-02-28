@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 lg:px-16 py-8">

    <!-- Заголовок статьи -->
    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight text-center">
        {{ $post->title }}
    </h1>

    <!-- Изображение поста с увеличением при клике -->
    @if($post->image)
        <div class="flex justify-center mb-6">
            <div x-data="{ open: false }" class="w-full sm:w-11/12 md:w-3/4 lg:w-2/3">
                <!-- Превью изображения -->
                <img src="{{ asset('storage/' . $post->image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow-lg cursor-pointer transition-transform hover:scale-105"
                     @click="open = true">

                <!-- Модальное окно с увеличенным изображением -->
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50" x-cloak>
                    <div @click.away="open = false" class="p-4 max-w-full max-h-full flex justify-center items-center">
                        <img src="{{ asset('storage/' . $post->image) }}" 
                             class="w-auto max-w-full max-h-screen rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Контент статьи -->
    <div class="prose prose-sm sm:prose md:prose-lg lg:prose-xl xl:prose-2xl max-w-full text-gray-800 mx-auto">
        {!! $post->content !!}
    </div>

    <!-- Кнопка "Назад" -->
    <div class="mt-8 text-center">
        <a href="/" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
            Назад к статьям
        </a>
    </div>

</div>
@endsection

@push('scripts')
<!-- Подключаем Alpine.js -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
