
@php
  $cart_count = getCartItemsCount();
@endphp




<nav class="navbar navbar-expand-lg" style="background-color: #2F58CD;position:">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('image/Foodlogo3.png')}}" style="background: transparent" alt="Food Logo" height="50" width="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justifiy-content-between" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" style="font-size: 16px; font-weight: bold;" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white" href="{{route('restaurants')}}" style="font-size: 16px; font-weight: bold;">Restaurants</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white" href="/about" style="font-size: 16px; font-weight: bold;">About Us</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white" href="{{route('contact.create')}}" style="font-size: 16px; font-weight: bold;">Contact Us</a>
          </li>
        </ul>

       
         
          <form action="{{route('search')}}" class="d-flex w-50" style="margin-left: 100px;" method="GET">
            <input type="search" class="form-control me-2" placeholder="search" name="search" aria-label="search" value="{{$key ?? ''}}">
            <button class="btn text-white btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
         </form>
        
   

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 16px;font-weight: bold;" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 16px;font-weight: bold;" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                    
                <li class="nav-item dropdown d-flex align-self-center me-2">
                    <a href="/cartitems" class="position-relative">
                      <i class="fas fa-cart-plus text-white" style="font-size: 20px;font-weight: bold;"></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart_badge">
                        {{$cart_count}}
                        <span class="visually-hidden">Cart</span>
                      </span>
                    </a>
                </li>


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" style="font-size: 16px;" class="nav-link fw-bold dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if (auth()->user()->role->role == "admin")
                          <a class="dropdown-item text-black" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                          </a>
                        @endif

                         @if (auth()->user()->role->role == "customer")
                          <a class="dropdown-item text-black" href="{{route('customerdetail')}}">
                            {{ __('Profile Setting') }}
                          </a>
                        @endif

                        <a class="dropdown-item text-black" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>