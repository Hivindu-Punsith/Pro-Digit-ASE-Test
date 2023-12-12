@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Blog Post</h2>

        <form action="{{ route('blog-posts.update', $blogPost->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blogPost->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $blogPost->description }}</textarea>
            </div>          
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
