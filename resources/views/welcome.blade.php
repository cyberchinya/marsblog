@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
        <div class="bg-white p-6 shadow-lg rounded-lg transform transition hover:scale-105 hover:shadow-xl">
            <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover mt-2 rounded-lg" />
            @endif
            <p class="mt-2 text-gray-700">{!! strip_tags($post->content, '<strong><b>') !!}</p>
                 {{-- <p class="mt-2 text-gray-700">{{ $post->content }}</p> --}}
            <a href="#" class="block mt-4 text-blue-600 hover:underline">Read More</a>
        </div>
    @endforeach
</div>
@endsection
