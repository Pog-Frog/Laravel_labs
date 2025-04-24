@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="max-w-lg mx-auto mt-10 p-6">
    <h1 class="text-xl font-semibold mb-4">Create a New Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf 

        <div class="mb-4">
            <label for="author" class="block mb-1">Author:</label>
            <select name="author" id="author" class="w-full p-2 border border-gray-300 rounded">
                @foreach ($users as $user)
                    <option value="{{$user->id}}"> {{$user->name}} </option>
                @endforeach
            </select>
            @error('author')
                <p class="text-red-500 bg-pink-300 p-2 mt-2 rounded-2xl w-fit">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="title" class="block mb-1">Title:</label>
            <input
                type="text"
                id="title"
                name="title"
                class="w-full p-2 border border-gray-300 rounded"
                value="{{@old("title")}}"
            >
            @error('title')
                <p class="text-red-500 bg-pink-300 p-2 mt-2 rounded-2xl w-fit">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="body" class="block mb-1">Content:</label>
            <textarea
                id="body"
                name="body"
                rows="5"
                class="w-full p-2 border border-gray-300 rounded"
            >
                {{@old('body')}}
            </textarea>
            @error('body')
                <p class="text-red-500 bg-pink-300 p-2 mt-2 rounded-2xl w-fit">
                    {{$message}}
                </p>
            @enderror
        </div>

        <div>
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
            >
                Save Post
            </button>
        </div>
    </form>
</div>
@endsection