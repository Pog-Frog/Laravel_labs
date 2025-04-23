<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected PostRepository $postRepository)
    {
        
    }

    public function index()
    {
        $posts = $this->postRepository->getAllPosts();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = $this->postRepository->createPost(
            $validatedData['title'],
            $validatedData['content']
        );

        if (!$post) {
            return back()->with('error', 'Failed to create post. Please try again.')->withInput();
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(string $id)
    {
        $post = $this->postRepository->getPostById($id);

        if (!$post) {
            abort(404);
        }

        return view('posts.show', ['post' => $post]);
    }

    public function edit(string $id)
    {
        $post = $this->postRepository->getPostById($id);

        if (!$post) {
            abort(404);
        }

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $updatedPost = $this->postRepository->updatePost(
            $id,
            $validatedData['title'],
            $validatedData['content']
        );

        if (!$updatedPost) {
            return back()->with('error', 'Failed to update post.');
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(string $id)
    {
        $deletedPost = $this->postRepository->deletePost($id);

        if (!$deletedPost) {
            return back()->with('error', 'Failed to delete post.');
        }

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
