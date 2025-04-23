@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-xl font-semibold mb-4">Edit Post: {{ $post->title }}</h1>


    <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block mb-1">Title:</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ $post->title }}"
                class="w-full p-2 border border-gray-300 rounded"
            >
        </div>

        <div class="mb-4">
            <label for="content" class="block mb-1">Content:</label>
            <textarea
                id="content"
                name="content"
                rows="5"
                class="w-full p-2 border border-gray-300 rounded"
            >{{$post->content }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
            >
                Update Post
            </button>
            <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
        </div>
    </form>

    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}" class="mt-4 inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 hover:text-red-700">Delete Post</button>
    </form>

</div>
@endsection
