@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold">{{ $post->title }}</h1>

    @if($post->image)
        <img src="{{ asset('storage/posts/' . basename($post->image)) }}" class="w-full max-h-[600px] object-contain mt-4 rounded-lg" />
    @endif

    <div class="mt-4 text-gray-700">
        {!! $post->content !!}
    </div>

    <a href="/" class="block mt-6 text-blue-600 hover:underline">← Назад на главную</a>
</div>
@endsection