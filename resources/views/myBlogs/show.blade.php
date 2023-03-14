@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $myBlog->title }}</h1>
                <p>{{ $myBlog->content }}</p>
                <a href="{{ route('myBlogs.edit', $myBlog->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('myBlogs.destroy', $myBlog->id) }}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this myBlog?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
