@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Blog Posts</h2>
        <a href="{{ route('blog-posts.create') }}" class="btn btn-success mb-2">Create Post</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogPostData as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('blog-posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('blog-posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
