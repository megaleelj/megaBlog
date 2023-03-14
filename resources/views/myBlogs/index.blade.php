@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">myBlogs</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($myBlogs as $myBlog)
                                <tr>
                                    <td>{{ $myBlog->title }}</td>
                                    <td>{{ $myBlog->content }}</td>
                                    <td>
                                        <a href="{{ route('myBlogs.show', $myBlog->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('myBlogs.edit', $myBlog->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('myBlogs.destroy', $myBlog->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('myBlogs.create') }}" class="btn btn-success">Create myBlog</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
