@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Blog Post</h2>

        <form action="{{ route('blog-posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>           
            <button type="submit" class="btn btn-primary mt-5">Create</button>
        </form>
    </div>
@endsection
