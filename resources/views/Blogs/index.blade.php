@extends('layouts.app')
@section('content')
@section('title', __('MegaBlog') )

<div class="container">
    <div class="col-md-6 mb-3 mb-md-0 text-md-left">
        <a class="btn btn-dark" href="{{URL("/myBlogs/create")}}">New Blog</a>
    </div>
    <br>
    <div class="row ">
        @foreach ($blog as $blog)
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
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
        @endforeach
    </div>
</div>    

@endsection