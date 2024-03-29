<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
     <!-- Right Side Of Navbar -->

     <ul class="nav navbar-nav navbar-right">

<!-- Authentication Links -->

@if (Auth::guest())

    <li><a href="{{ route('login') }}">Login</a></li>

    <li><a href="{{ route('register') }}">Register</a></li>

@else

     <!-- ADD ROLES AND USERS LINKS -->

    @role('admin')

        <li><a href="{{ route('roles.index') }}">Roles</a></li>

        <li><a href="{{ route('users.index') }}">Users</a></li>

    @endrole

    

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

            {{ Auth::user()->name }} <span class="caret"></span>

        </a>



        <ul class="dropdown-menu" role="menu">

            <li>

                <a href="{{ route('logout') }}"

                    onclick="event.preventDefault();

                             document.getElementById('logout-form').submit();">

                    Logout

                </a>



                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                    {{ csrf_field() }}

                </form>

            </li>

        </ul>

    </li>

@endif

</ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
