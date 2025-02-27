@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 lg:px-16 py-8">
    
    <!-- Заголовок статьи -->
    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
        {{ $post->title }}
    </h1>

    <!-- Изображение поста (адаптивное) -->
    @if($post->image)
        <div class="flex justify-center mb-6">
            <img src="{{ asset('storage/' . $post->image) }}" 
                 alt="{{ $post->title }}" 
                 class="w-full md:w-3/4 lg:w-2/3 max-h-[600px] object-cover rounded-lg shadow-lg">
        </div>
    @endif

    <!-- Контент статьи -->
    <div class="prose prose-lg md:prose-xl lg:prose-2xl max-w-full text-gray-800">
        {!! $post->content !!}
    </div>

    <!-- Кнопка "Назад" -->
    <div class="mt-8">
        <a href="/" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
            Назад к статьям
        </a>
    </div>

</div>
@endsection