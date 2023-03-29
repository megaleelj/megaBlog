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
            <p class="text-center">
              <a class="btn btn-lg btn-primary" href="{{ URL('/login') }}">Login</a>
              <a class="btn btn-lg btn-secondary" href="{{ URL('/register') }}">Register</a>
            </p>
            @else
              <p class="lead text-center">To create a new blog, simply click on the "New Blog" button on the top navigation bar. You can also browse all blogs by clicking on the "Blogs" link.</p>
          @endif
        </div>

        <div class="card-body">
                    @foreach ($all_articles)
                        <h2>{{ $all_articles->title }}</h2>
                        <p>{{ $all_articles->description }}</p>
                        <a href="{{ $all_articles->url }}" target="_blank">Read More</a>
                        <hr>
                    @endforeach

                    <h3>Top Headlines</h3>
                    @foreach ($top_headlines as $article)
                        <h2>{{ $article->title }}</h2>
                        <p>{{ $article->description }}</p>
                        <a href="{{ $article->url }}" target="_blank">Read More</a>
                        <hr>
                    @endforeach

                    <h3>Sources</h3>
                    <ul>
                        @foreach ($sources as $source)
                            <li>{{ $source->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection