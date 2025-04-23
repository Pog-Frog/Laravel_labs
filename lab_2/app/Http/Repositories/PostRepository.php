<?php 

namespace App\Http\Repositories;
use App\Models\Post;

class PostRepository {
    public function getAllPosts() {
        return Post::all();
    }

    public function getPostById($id) {
        return Post::query()->find($id);
    }

    public function createPost(string $title, string $content) {
        $post = new Post();

        $post->title = $title;
        $post->content = $content;

        if(!$post->save()) {
            return null;
        }

        return $post;
    }

    public function updatePost($id, string $title, string $content) {
        $post = Post::query()->find($id);

        if(!$post) {
            return null;
        }

        $post->title = $title;
        $post->content = $content;

        if(!$post->save()) {
            return null;
        }

        return $post;
    }

    public function deletePost($id) {
        $post = Post::query()->find($id);

        if(!$post) {
            return null;
        }

        if(!$post->delete()) {
            return null;
        }

        return $post;
    }
}