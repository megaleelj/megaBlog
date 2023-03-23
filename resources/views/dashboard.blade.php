@extends('layouts.app')
@section('content')
@section('title', __('MegaBlog') )

<div class="container">
    <h2 class="mb-4">Your Blogs</h2>
    @if(count($blog) > 0)
        <div class="row ">
            @foreach ($blog as $blog)
                @if ($blog->user_id == Auth::user()->id)
                    <div class="card  mb-3" >
                        <div class="card-body">          
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="well">
                                        <img style="width:25%" src="/~2046969/megaBlog/public/storage/blog_images/{{$blog->blog_image1}}" alt="product image ">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="well">
                                        <b><h3><a href="/~2046969/megaBlog/public/index.php/myBlogs/{{$blog->id}}">{{$blog->blog_heading}}</a></h3></b>
                                        <p>{{$blog->blog_body}}</p>
                                        <small> Written on {{$blog->created_at}}  </small>
                                        <div class="mt-3">
                                            <a href="{{ route('myBlogs.edit', $blog->id) }}" class="btn btn-success mr-3">Edit</a>
                                            <form class="d-inline" action="{{ route('myBlogs.destroy', $blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-4" role="alert">
            You don't have any blogs at the moment.
        </div>
    @endif
</div>    
@endsection