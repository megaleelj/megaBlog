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
           <form method="POST" action="{{ route('welcome.show') }}">
            @csrf
            <label for="city">Select a City:</label>
            <select name="city" id="city">
                <option value="London">London</option>
                <option value="Birmingham">Birmingham</option>
                <option value="Manchester">Manchester</option>
                <option value="Leeds">Leeds</option>
                <option value="Glasgow">Glasgow</option>
                <option value="Newcastle">Newcastle</option>
                <option value="Liverpool">Liverpool</option>
                <option value="Bristol">Bristol</option>
                <option value="Sheffield">Sheffield</option>
                <option value="Edinburgh">Edinburgh</option>
            </select>
            <button type="submit">Show Weather</button>
        </form>
           <h1>Current Weather in {{ $data['name'] }}</h1>
            <ul>
                <li>Temperature: {{ $data['main']['temp'] }}&deg;C</li>
                <li>Humidity: {{ $data['main']['humidity'] }}%</li>
                <li>Description: {{ $data['weather'][0]['description'] }}</li>
            </ul>
         </div>
      </div>
    </div>
  </div>
</div>
@endsection

