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
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <input type="checkbox" class="toggle-active" data-id="{{ $post->id }}"
                                {{ $post->is_active ? 'checked' : '' }} />
                        </td>
                        <td>
                            <a href="{{ route('blog-posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                            <form class="delete-form" action="{{ route('blog-posts.destroy', $post->id) }}" method="POST"
                                style="display:inline;">
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
    
    <script>
     
        $(document).ready(function() {
            $('.toggle-active').on('change', function() {
                const postId = $(this).data('id');
                const isActive = $(this).prop('checked');
                const token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: `/blog-posts-change-status/${postId}`,
                    method: 'PUT',
                    data: {
                        is_active: isActive
                    },
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'bottom-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3500
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            toast: true,
                            position: 'bottom-end',
                            icon: 'error',
                            title: 'Something Went Wrong!',
                            showConfirmButton: false,
                            timer: 3500
                        })
                    }
                });
            });
        });
    </script>
@endsection
