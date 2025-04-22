<nav class="bg-gray-800 text-white shadow-md">
    <div class="container mx-auto px-4 py-3">
        <ul class="flex flex-row gap-[4rem]">
            <li>
                <a href="{{ route('posts.index') }}"
                   class="hover:text-gray-300 {{ request()->routeIs('posts.index') ? 'font-semibold' : '' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('posts.create') }}"
                   class="hover:text-gray-300 {{ request()->routeIs('posts.create') ? 'font-semibold' : '' }}"> 
                    New Post
                </a>
            </li>
        </ul>
    </div>
</nav>