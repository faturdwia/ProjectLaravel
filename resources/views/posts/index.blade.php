@extends('layouts.app')

@section('title', 'Post')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between">
        <h3 class="">{{ isset($category) ? 'Category : ' . $category->name : (isset($tag) ? 'Tag : ' . $tag->name : 'All Post') }}</h3>
        <div>
            @auth
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="btn btn-light">Login to Create</a>
            @endguest
        </div>
    </div>
    <hr>
    @include('layouts.alert')
    <div class="row">
        @foreach ($post as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    {{ $item->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($item->body, 100, '...') }}</p>
                    <a href="{{ route('posts.show', $item->slug) }}" class="">Read more</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    Published on {{ $item->created_at->diffForHumans() }}
                    @can('update', $item)
                    <a href="{{ route('posts.edit', $item->slug) }}" class="btn btn-sm btn-success">Edit</a>
                    @endcan
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center mt-4">
        {{ $post->links() }}
    </div>
    </div>
    
</div>

@endsection