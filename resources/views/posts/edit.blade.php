@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Update Post : {{ $post->title }}</h3>
    <form class="col-md-6" method="POST" action="{{ route('posts.update', $post->slug) }}">
        @method('patch')
        @csrf
        @include('posts.partial.form-control')
    </form>
</div>

@endsection