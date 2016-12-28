<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Breaking News - @yield('site_title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        {!! HTML::style('bootstrap/css/bootstrap.min.css') !!}
    </head>
    <body>
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle"
                        data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('articles') }}">Home</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{ url('pages/about') }}">About</a>
                        </li>
                        <li>
                            <a href="{{ url('pages/contact') }}">Contact</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="{{ url('articles/create') }}">New Article</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>    
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                    <li><a tabindex="-1" href="#">Action</a></li>
                                    <li><a tabindex="-1" href="#">Another action</a></li>
                                    <li><a tabindex="-1" href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" href="#">Separated link</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            {{-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul> --}}
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
        <div class="footer text-center">
            Copyright &copy; 2016
        </div>
        {!! HTML::script('js/jquery.min.js') !!}
        {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
    </body>
</html>