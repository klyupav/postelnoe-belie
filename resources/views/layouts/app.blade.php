<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datatables.bootstrap.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,800' rel='stylesheet'
          type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="{{ asset('highlight/styles/zenburn.css') }}">
    @stack('css')

    <!-- Scripts -->
    <script src="{{ asset('highlight/highlight.pack.js')  }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            {{--<li><a href="{{ url('/donor') }}">Доноры</a></li>--}}
                            <?php
                                $versions = explode(',', env('DONOR_VERSION', ''));
                                $version_list = config('parser.version');
                                $version_label = config('parser.version_label');
                                foreach ( $versions as $version )
                                {
                                    if ( isset($version_list[$version]) )
                                    {
                                        $id = $version_list[$version];
                                        $version_list_isset[$version] = $id;
                                    }
                                }
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Источники <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    @foreach( $version_list_isset as $version => $id )
                                        <li><a href="{{ url('/sources/'.$version) }}"><span class="glyphicon glyphicon-globe"></span> {{ $version_label[$version] }} </a></li>
                                    @endforeach

                                </ul>
                            </li>
                            @if (Auth::user()->id == 1 )
                                <li><a href="{{ url('/proxy') }}"><span class="glyphicon glyphicon-list-alt"></span> Списки прокси и user-agent</a></li>
                                <li><a href="{{ url('/process-log') }}"><span class="glyphicon glyphicon-time"></span> Процессы</a></li>
                                <li><a href="{{ url('/logs') }}">Логи</a></li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(function () {
            var $input = $("input[name='keyword']"), $context = $(".keyword");
            $input.on("input", function () {
                var term = $(this).val();
                $context.show().unmark();
                if (term) {
                    $context.mark(term, {
                        done: function () {
                            $context.not(":has(mark)").hide();
                        }
                    });
                }
            });
            $('#search-filter').focus();
            $("#toTop").scrollToTop(1000);
        });

    </script>
    <script src="/js/jquery.scrollToTop.min.js"></script>
    <a href="#top" id="toTop"></a>
    @stack('scripts')
</body>
</html>
