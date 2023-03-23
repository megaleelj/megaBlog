@extends('layouts.app')

@section('content')
<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-header bg-dark text-light">{{ __('Welcome to MegaBlog') }}</div>

        <div class="card-body">
          <p class="lead">Thank you for visiting MegaBlog! Here, you can read blogs from our community of writers, or create your own blog if you're a registered user.</p>

          @if(Auth::guest())
            <p class="text-center"><a class="btn btn-lg btn-primary" href="{{ URL('/login') }}">Login or Register</a></p>
          @else
            <p class="lead text-center">To create a new blog, simply click on the "New Blog" button on the top navigation bar. You can also browse all blogs by clicking on the "Blogs" link.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
