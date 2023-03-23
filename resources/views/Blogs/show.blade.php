@extends('layouts.app')
@section('content')
@section('title', __($blog->blog_heading) )


<div class="container">
<div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-dark" href="{{URL("/myBlogs/create")}}">New Blog</a></div>
<br>
    <div class="row">
      <div class="card " style="width: 30rem; 
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                <img style="width:100%" src="/~2046969/megaBlog/public/storage/blog_images/{{$blog->blog_image1}}" alt="blog image ">
                </div>
                <div class="carousel-item">
                <img style="width:100%" src="/~2046969/megaBlog/public/storage/blog_images/{{$blog->blog_image2}}" alt="blog image ">
                </div>
                <div class="carousel-item">
                <img style="width:100%" src="/~2046969/megaBlog/public/storage/blog_images/{{$blog->blog_image3}}" alt="blog image ">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>   
      <div class="card  mb-3" >
        <div class="card-body">          
            <div class="row">
                <!-- <div class="col-sm-3">
                    <div class="well">
                        <img style="width:25%" src="/~2046969/megaBlog/public/storage/blog_images/{{$blog->blog_image1}}" alt="product image ">
                    </div>
                </div> -->
                <div class="col-sm-9">
                    <div class="well">
                        <b><h3><a href="/~2046969/megaBlog/public/index.php/myBlogs/{{$blog->id}}">{{$blog->blog_heading}}</a></h3></b>
                        <p>{{$blog->blog_body}}</p>
                        <small> Written on {{$blog->created_at}} </small>
                    </div>
                </div>
            </div>
        </div>       
    </div>
    @if(!Auth::guest())
      @if(Auth::user()->role == 'admin')
        <div class="row">
          <div class="col">
            <a class="btn btn-primary" href="/~2046969/megaBlog/public/index.php/myBlogs/{{$blog->id}}/edit" role="button">Edit </a>
          </div>
        
          <div class="col">
            
              {!! Form::open(array( 'route'=>['myBlogs.destroy',$blog->id],'method' => 'POST', 'class' => 'float-right')) !!} 
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete', ['class' => "btn btn-warning"])}}
              {!! Form::close() !!}
          </div>
        
        </div>
        @endif
      @endif
    </div>
    

</div>
  @endsection