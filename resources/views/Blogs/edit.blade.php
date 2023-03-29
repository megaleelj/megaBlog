@extends('layouts.app')
@section('content')
@section('title', __('Edit Blog') )


<div class="container">
<br>
    <h1> Edit Blog Post</h1>
{!! Form::open(array( 'route'=>['myBlogs.update', $blog->id],'method' => 'PUT','enctype' => 'multipart/form-data')) !!} 
<form class="row g-3">

    <div class="col-md-6">
        {{Form::label('title', 'Blog Heading')}}
        {{Form::text('blog_heading', $blog->blog_heading, ['class' => 'form-control', 'placeholder' => 'e.g computer monitor'])}}  
    </div>     

    <div class="col-md-6">
        {{Form::label('title', 'Blog Body')}}
        {{Form::textarea('blog_body', $blog->blog_body, ['class' => 'form-control', 'placeholder' => 'e.g about product'])}}  
    </div> 
    <div class="col-md-8">
    <div class="row">
        <div class="col-md-6">
            {{Form::label('title', 'Blog Image 1')}}
            <div class ="form-group">
                {{{Form::file('blog_image1')}}}
            </div> 
        </div>
        <div class="col-md-6">
            {{Form::label('title', 'Blog Image 2')}}
            <div class ="form-group">
                {{{Form::file('blog_image2')}}}
            </div> 
        </div>
        <div class="col-md-6">
            {{Form::label('title', 'Blog Image 3')}}
            <div class ="form-group">
                {{{Form::file('blog_image3')}}}
            </div> 
        </div>
    </div>
    </div>
    <div class="col-md-6">
        {{{ Form::submit('Save', ['class'=> 'btn btn-primary'])}}}  

        <a href="{{url()->previous()}}"role="button"  class="btn btn-danger">Cancel</a>
    </div>  
</form>       
   
{!! Form::close() !!}
<br>

</div>

@endsections