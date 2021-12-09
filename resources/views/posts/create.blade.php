@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Create Post</h3>
    <form class="col-md-6" method="POST" action="{{ route('posts.store') }}">
        @csrf
        @include('posts.partial.form-control')
    </form>
</div>

@endsection