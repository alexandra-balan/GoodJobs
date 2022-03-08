<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body {
            background-image: {{url('./test.jpg')}};
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GoodJobs') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'GoodJobs') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
                    aria-controls="navbarColor03" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <!-- Left Side Of Navbar -->
            {{--                <ul class="navbar-nav mr-auto">--}}

            {{--                </ul>--}}



            <!-- Authentication Links -->
            @guest
                <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Autentificare') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Înregistrare') }}</a>
                            </li>
                        @endif
                    </ul>
            @else
                @if(Auth::user()->role == 'Companie' || Auth::user()->role == 'Administrator')
                    <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('candidates.index')}}">{{__('Candidati')}}</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('articles.index')}}">{{__('Articole')}}</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('jobs.index')}}">{{__('Joburile mele')}}</a>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <a class="nav-link" href="{{route('jobs.index')}}">{{__('Joburi')}}</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a class="nav-link" href="{{route('students.create')}}">{{__('Adaugă elev')}}</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a class="nav-link" href="{{route('studentClasses.create')}}">{{__('Add Class')}}</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a class="nav-link" href="{{route('articles.index')}}">{{__('Articole')}}</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a class="nav-link" href="{{route('candidateJobs.index')}}">{{__('Aplicari la joburi')}}</a>--}}
                            {{--                            </li>--}}
                            {{--                            --}}{{--                            <li>--}}
                            {{--                            --}}{{--                                <a class="nav-link" href="{{route('subjects.create')}}">{{__('Add Subject')}}</a>--}}
                            {{--                            --}}{{--                            </li>--}}


                        </ul>

                        <ul class="navbar-nav ml-auto">

                            <form class="form-inline my-2 my-lg-0" action="{{route(('searchJob'))}}"
                                  method="POST"
                                  role="search">
                                {{ csrf_field() }}
                                <input class="form-control mr-sm-2" type="text" placeholder="Caută"
                                       name="searchName">
                                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Caută</button>
                            </form>
                            @endif



                            @if(Auth::user()->role == 'Candidat')
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('showCandidate')}}">{{__('Profilul meu')}}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{route('articles.index')}}">{{__('Articole')}}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{route('jobs.index')}}">{{__('Joburi')}}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link"
                                           href="{{route('candidateJobs.index')}}">{{__('Aplicarile mele')}}</a>
                                    </li>
                                    {{--                                    <li>--}}
                                    {{--                                        <a class="nav-link"--}}
                                    {{--                                           href="{{route('candidateJobs.index')}}">{{__('Aplicarile mele')}}</a>--}}
                                    {{--                                    </li>--}}
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <form class="form-inline my-2 my-lg-0" action="{{route(('searchJob'))}}"
                                          method="POST"
                                          role="search">
                                        {{ csrf_field() }}
                                        <input class="form-control mr-sm-2" type="text" placeholder="Caută"
                                               name="searchName">
                                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Caută</button>
                                    </form>
                                </ul>
                            @endif

                            @if(Auth::user()->role == 'Administrator')
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.index')}}">{{__('Utilizatori')}}</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ml-auto"></ul>
                            @endif


                            <ul class="navbar-nav ml-auto">
                                {{--                                <form class="form-inline my-2 my-lg-0" action="{{route(('searchStudent'))}}" method="POST"--}}
                                {{--                                      role="search">--}}
                                {{--                                    {{ csrf_field() }}--}}
                                {{--                                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="searchName">--}}
                                {{--                                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Caută</button>--}}
                                {{--                                </form>--}}
                                <li class="nav-item">
                                    @if(Auth::user()->role == 'Companie')
                                        <a class="nav-link" href="{{route('showCompany')}}">{{ Auth::user()->name }}</a>
                                    @else
                                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                                    @endif

                                </li>
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">{{ __('Ieși din cont') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                        </ul>

                    @endguest


            </div>
        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>


    {{--<div style="position: fixed;--}}
    {{--  left: 0;--}}
    {{--  bottom: 0;--}}
    {{--  width: 100%;--}}
    {{--  text-align: center;" class="page-footer card-footer">--}}

    {{--<!-- Footer Links -->--}}
    {{--    <div class="container-fluid">--}}

    {{--        <!-- Grid row-->--}}
    {{--        <div class="row text-center d-flex justify-content-center align-content-center pt-1 mb-1">--}}

    {{--            <!-- Grid column -->--}}
    {{--            <div class="col-md-3 mb-1">--}}
    {{--                <h6 class="text-uppercase font-weight-bold">--}}
    {{--                    <a href="#!">Despre KidLearn</a>--}}
    {{--                </h6>--}}
    {{--            </div>--}}
    {{--            <!-- Grid column -->--}}

    {{--            <!-- Grid column -->--}}
    {{--            <div class="col-md-3 mb-1">--}}
    {{--                <h6 class="text-uppercase font-weight-bold">--}}
    {{--                    <a href="#!">Pentru Profesori</a>--}}
    {{--                </h6>--}}
    {{--            </div>--}}
    {{--            <!-- Grid column -->--}}

    {{--            <!-- Grid column -->--}}
    {{--            <div class="col-md-3 mb-1">--}}
    {{--                <h6 class="text-uppercase font-weight-bold">--}}
    {{--                    <a href="#!">Pentru Elevi</a>--}}
    {{--                </h6>--}}
    {{--            </div>--}}
    {{--            <!-- Grid column -->--}}

    {{--            <!-- Grid column -->--}}

    {{--        </div>--}}

    {{--        </div>--}}


    {{--</div>--}}
</div>
</body>
</html>

