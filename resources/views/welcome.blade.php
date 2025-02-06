@extends('layouts.app')
@section('content')
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
@endsection
