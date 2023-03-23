<style>
    .badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #0084ff;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
}
    </style>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href={{URL("/")}}>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/kt_blog')}}">Blog</a>
            </li> 
          </ul>
          {{-- <div class="hidden sm:flex sm:items-center sm:ml-6">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
            </ul>
            </div> --}}
          @if(Auth::guest())
          <div class="hidden sm:flex sm:items-center sm:ml-6">
          <ul> 
            <li class="nav-item">
              <a class="nav-link" href={{URL("/dashboard")}}><i class="material-icons">&#xe7fd;</i></a>
            </li>
          </ul>
          {{-- </div> --}}
          @else
          <div class="hidden sm:flex sm:items-center sm:ml-6">
            <ul> 
              <li class="nav-item">
                <a class="nav-link">
                  <div class="hidden sm:flex sm:items-center sm:ml-6">
                  <x-dropdown align="right" width="48">
                      <x-slot name="trigger">
                          <button class=" text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                              <div><i class="material-icons">&#xe7fd;</i></div>
                              <div class="ml-1">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>
                              </div>
                          </button>
                          
                      </x-slot>
    
                      <x-slot name="content">
                          <!-- Authentication -->
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
    
                              <x-dropdown-link :href="route('logout')"
                                      onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                                  {{ __('Log Out') }}
                              </x-dropdown-link>
                          </form>
    
                             <x-dropdown-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                  {{ __('Home') }}
                              </x-dropdown-link>
                         
                      </x-slot>
                  </x-dropdown>
              </div></a>
              </li>
            </ul>
          <!-- Settings Dropdown -->
          
        @endif
        <ul class="nav justify-content-right">
            <a href="{{ route('cart') }}" >
                <i class="material-icons">&#xe8cb;</i>
                
                @php
                      $total_items=0;
                  @endphp
                @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                    @php
                        $total_items++;
                    @endphp
                  @endforeach
                @endif
               
                <span class='badge badge-success' id='lblCartCount'>  {{$total_items}} </span>
            </a>
          </ul>
      

        {{-- <div class="form-group">
          <input type="text" class="form-controller"  name="search"></input>
      </div> --}}

          {{-- <form class="d-flex">
            <input class="form-control me-2" type="text" id="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> --}}
          
        </div>
      </div>
    </nav>


  