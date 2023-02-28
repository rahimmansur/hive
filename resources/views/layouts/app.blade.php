<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('css')
</head>
<body>
<div>

{{--Start Header 1--}}
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            {{--                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">--}}
            {{--                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use src=""/></svg>--}}
            {{--                </a>--}}



            @guest

                <div class="ms-auto">


                </div>

                @if (Route::has('login'))
                    <button type="button" class="btn btn-outline-light me-2">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </button>
                @endif

                @if (Route::has('register'))
                    <button type="button" class="btn btn-outline-light me-2">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </button>
                @endif
            @else

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="{{route('home')}}" class="nav-link px-2 text-secondary">Home</a></li>
                            <li><a href="{{route('posts.index')}}" class="nav-link px-2 text-white">Posts</a></li>
                            <li><a href="{{route('categories.index')}}" class="nav-link px-2 text-white">Category</a></li>
                            <li><a href="{{route('trashed-posts.index')}}" class="nav-link px-2 text-white">Bin</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                        </ul>
                    </div>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 btn-sm" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Setting</a>
                        <a class="dropdown-item" href="">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</header>
{{--End Header 2--}}
<main class="py-4">

    @auth
        <div class="container">

            @if(session() -> has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif


            <div class="row">
                <div class="col-md-3">

                </div>

                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>

        </div>
    @else
        @yield('content')
    @endauth


</main>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
