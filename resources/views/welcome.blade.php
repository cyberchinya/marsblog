@extends('layouts.app')
@section('content')

<div class="container mx-auto flex flex-col md:flex-row">
    <!-- Левая колонка с баннерами -->
    <aside class="w-full md:w-1/4 p-4 hidden md:block">
        @foreach($bannersLeft as $banner)
            <a href="{{ $banner->url }}" target="_blank">
                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full mb-4 rounded-lg shadow-lg">
            </a>
        @endforeach
    </aside>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
        <div class="bg-white p-6 shadow-lg rounded-lg transform transition hover:scale-105 hover:shadow-xl">
            <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover mt-2 rounded-lg" />
            @endif
            <p class="mt-2 text-gray-700">{{ Str::limit(strip_tags($post->content), 150, '...') }}</p>
            <a href="{{ route('post.show', $post->id) }}" class="block mt-4 text-blue-600 hover:underline">Читать дальше</a>
        </div>
    @endforeach
</div>
    <!-- Правая колонка с баннерами -->
    <aside class="w-full md:w-1/4 p-4 hidden md:block">
        @foreach($bannersRight as $banner)
            <a href="{{ $banner->url }}" target="_blank">
                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full mb-4 rounded-lg shadow-lg">
            </a>
        @endforeach
    </aside>
</div>
</div>
@endsection