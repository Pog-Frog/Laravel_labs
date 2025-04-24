<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-10 px-4">

                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl font-semibold text-gray-800">Blog Posts</h1>
                            <a href="{{ route('posts.create') }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                               Create New Post
                            </a>
                        </div>
                    
                    
                        @if($posts->isEmpty())
                            <p >
                                <strong class="font-bold">No posts found!</strong>
                            </p>
                        @else
                            <div class="space-y-4"> 
                                @foreach ($posts as $post)
                                    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                                        <h2 class="text-xl font-semibold text-gray-900 mb-2">
                                            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="hover:text-blue-600">
                                               Title:  {{ $post->title }} <span class="text-gray-600 text-sm">{{ $post->created_at->format('F j, Y, g:i a') }}</span>
                                            </a>
                                        </h2>
                                        @if(isset($post->author->name))
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                               Author name:  {{$post->author->name}}
                                            </h3>
                                        @endif
                                        <p class="text-gray-700 mb-4">
                                            {{ $post->content }} 
                                        </p>
                                        <div class="flex items-center space-x-2 text-sm">
                                            <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                                               class="text-blue-500 hover:text-blue-700">
                                               View
                                            </a>
                    
                                            <span class="text-gray-300">|</span> 
                    
                                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}"
                                               class="text-green-500 hover:text-green-700">
                                               Edit
                                            </a>
                    
                                            <span class="text-gray-300">|</span> 
                    
                                            <form method="post" action="{{ route('posts.destroy', ['id' => $post->id]) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $posts->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
