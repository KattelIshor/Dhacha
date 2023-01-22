    {{-- Header --}}
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid right-sidebar">
                {{-- Hamburger Menu --}}
                <div class="hamburger__menu mr-3" title="Sidebar">
                    <a href="#" class="hamburger__menu__link">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('css/dacha.png') }}" alt="Logo" height="40">
                </a>

                {{--Navbar Brand --}}
                {{-- <a class="navbar-brand" href="{{ url('/') }}"><span style="color: #43424c">Dhacha</span></a>

                <div class="logo">
                    <img src="{{ asset('css/logo.png') }}" alt="" width="10"/>
                    </div>
                    <style>
                *{transition:all 0.3s ease-in-out;}

.logo img{float:left;}
</style> --}}
                {{-- Navbar Toggler Button--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav search-box ml-3">
                        <form class="form-inline" action="{{ route('search') }}" method="POST">
                            @csrf
                            <input name="product_title" class="form-control mr-sm-2 search-product" type="search" placeholder="Search products" aria-label="Search">
                            <button class="btn btn-outline-muted my-2 my-sm-0" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </ul>

                    <ul class="navbar-nav second-navbar">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" title="Home">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.posts') }}" title="Blog">
                                Blog
                            </a>
                        </li>

                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle cart" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile', Auth::user()->slug) }}">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('password.change') }}">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    {{ Form::open(['route' => 'logout']) }}
                                        {{ Form::submit('Sign out') }}
                                    {{ Form::close() }}
                                </div>
                            </li>

                            @php
                                $wishlists = DB::table('wishlists')->where('user_id', Auth::id())->get();
                            @endphp

                            <li class="nav-item wishlist">
                                <a class="nav-link" href="{{ route('wishlist') }}" title="Wishlist">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <span>{{ count($wishlists) }}</span>
                                </a>
                            </li>

                        @endauth

                            <li class="nav-item cart">
                                <a class="nav-link" href="{{ route('show.cart') }}" title="Cartlist">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span>{{ Cart::count() }}</span>
                                </a>
                            </li>

                        @auth
                            <h6 class="ml-2">Rs {{ Cart::subtotal() }}</h6>
                        @endauth

                        @guest
                            <li class="nav-item ml-3 user-btn">
                                <a href="{{ route('login') }}" class="btn btn-info my-5 my-sm-0">
                                    Sign in
                                </a>
                            </li>
                        @endguest

                    </ul>
                </div>

                @include('frontend.partials.sidebar')

            </div>
        </nav>
    </header>
    {{-- End Header --}}
