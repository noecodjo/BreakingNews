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
                            <li>
                                <a href="{{ url('/logout') }}"> {{ Auth::user()->name }} (Logout)</a>
                            </li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="navbar navbar-default" role="navigation">...</div>
        <div class="container">
            @yield('content')
        </div>
        <div class="footer container-fluid">
            Copyright &copy; 2016
        </div>
        {!! HTML::script('js/app.js') !!}
        {!! HTML::script('js/jquery.min.js') !!}
        {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
    </body>
</html>