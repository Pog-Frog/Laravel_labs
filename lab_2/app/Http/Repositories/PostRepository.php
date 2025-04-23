<?php 

namespace App\Http\Repositories;
use App\Models\Post;
use App\Models\User;

class PostRepository {
    public function getAllPosts($paginate = null) {
        if($paginate !== null) {
            return Post::query()->with('author')->paginate($paginate);
        }
        return Post::query()->with('author')->get();
    }

    public function getPostById($id) {
        return Post::query()->find($id);
    }

    public function createPost(string $title, string $body, User $user) {
        $post = new Post();

        $post->title = $title;
        $post->body = $body;
        $post->user_id = $user->id;

        if(!$post->save()) {
            return null;
        }

        return $post;
    }

    public function updatePost($id, string $title, string $body, User $user) {
        $post = Post::query()->find($id);

        if(!$post) {
            return null;
        }

        $post->title = $title;
        $post->body = $body;
        $post->user_id = $user->id;

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

        if(!$post->delete()){
            return null;
        }

        return $post;
    }
}