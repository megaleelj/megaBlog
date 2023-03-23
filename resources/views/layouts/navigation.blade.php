<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ URL('/myBlogs') }}">{{ config('app.name', 'MegaBlog') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto">
      @if(!Auth::guest())
        <a class="nav-link" href="{{ URL('/myBlogs/create') }}">Create Blog</a>
      @endif
      </div>
      <div class="navbar-nav">
        <div class="nav-item dropdown">
          @if(!Auth::guest())
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                <a class="nav-link" href="{{ URL('/dashboard') }}">Dashboard</a>
                </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="dropdown-item" type="submit">
                    {{ __('Log Out') }}
                  </button>
                </form>
              </li>
            </ul>
          @else
            <a class="nav-link" href="{{ URL('/login') }}">Login/Register</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</nav>
