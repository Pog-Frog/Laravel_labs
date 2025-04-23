@extends('layouts.app') 

@section('title', $post->title)

@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow border border-gray-200">

        <h1 class="text-3xl font-bold mb-4 text-gray-800">
            {{ $post->title }}
        </h1>

        @if(isset($post->author->name))
            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                Author name: <span class="font-medium text-gray-700">{{ $post->author->name }}</span> 
                <span class="text-base text-gray-500">at</span> 
                <span class="text-gray-600">{{ $post->created_at->format('F j, Y, g:i a') }}</span>
            </h3>
        @endif

        <div class="text-gray-700 leading-relaxed mb-6 whitespace-pre-wrap">
            {{ $post->body }}
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