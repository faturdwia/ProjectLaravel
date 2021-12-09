@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="container mt-4">
    <h3>{{ $post->title }}</h3>
    <div class="text-secondary">
        <a href="{{ route('categories.index', $post->category->slug) }}" class="text-decoration-none">{{ $post->category->name }} </a>
        &middot; 
        {{ $post->created_at->format("d F, Y") }}
        &middot;
        @foreach ($post->tags as $tag)
            <a href="{{ route('tags.index', $tag->slug) }}" class="text-decoration-none">{{ $tag->name }}</a>
        @endforeach
    </div>
    <hr>
    <p>{{ $post->body }}</p>
    <div class="text-secondary mb-3">Posted by {{ $post->author->name }}</div>
    <div class="">
        @can('delete', $post)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
            Delete
            </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this post?</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $post->title }} will be deleted.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ route('posts.delete', $post->slug) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
</div>

@endsection