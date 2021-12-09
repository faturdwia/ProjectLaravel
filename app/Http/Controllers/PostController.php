<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        $post = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('posts.index', compact('post'));
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create', [
            'post' => new Post(),
            'category' => Category::get(),
            'tag' => Tag::get()
        ]);
    }

    public function store(PostRequest $request) {
        $attr = $request->all();
        $attr['slug'] = Str::slug(request('title'));

        // $post = Post::create($attr);
        $post = auth()->user()->posts()->create($attr);
        $post->tags()->attach(request('tags'));

        session()->flash('success', 'The post was created');
        return redirect(route('posts.index'));
    }

    public function edit(Post $post) {
        return view('posts.edit', [
            'post' => $post,
            'category' => Category::get(),
            'tag' => Tag::get()
        ]);
    }

    public function update(PostRequest $request, Post $post) {
        $this->authorize('update', $post);
        $attr = $request->all();
        $post->tags()->sync(request('tags'));
        $post->update($attr);

        session()->flash('success', 'The post was updated');
        return redirect(route('posts.index'));
    }

    public function delete(Post $post) {
        $this->authorize('delete', $post);
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'The post was deleted');
        return redirect(route('posts.index'));
    }
}
