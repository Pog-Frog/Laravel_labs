@extends('layouts.app') 

@section('title', $post->title)

@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow border border-gray-200">

        <h1 class="text-3xl font-bold mb-4 text-gray-800">
            {{ $post->title }}
        </h1>

        <div class="text-gray-700 leading-relaxed mb-6 whitespace-pre-wrap">
            {{ $post->content }}
        </div>

        <div class="mt-8 border-t pt-6 flex items-center space-x-4">
             <a href="{{ route('posts.index') }}"
                class="text-blue-500 hover:text-blue-700">
                ← Back to All Posts
             </a>

            <a href="{{ route('posts.edit', ['id' => $post->id]) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded text-sm">
               Edit
            </a>
        </div>

    </div>
</div>
@endsection