<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{asset(getThemeAssets('bootstrap/css/bootstrap.min.css', true))}}" rel="stylesheet">
    <link href="{{asset(getThemeAssets('font-awesome/css/font-awesome.min.css', true))}}" rel="stylesheet">
    <link href="{{asset(getThemeAssets('animate/animate.css', true))}}" rel="stylesheet">
    @yield('css')
    <link href="{{asset(getThemeAssets('css/style.css'))}}" rel="stylesheet">
</head>
<body class="">
<div id="wrapper">
    @include('layouts.partials.'.getTheme().'-sidebar')

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Hi,{{auth()->user()->name}}</span>
                    </li>

                    <li>
                        <a id="logout-a">
                            <i class="fa fa-sign-out"></i>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        @yield('content')
        <div class="footer">
            <div class="pull-right">
                <i class="fa fa-github"></i>
                <strong>
                    <a href="https://github.com/FlyingOranges/any" target="_blank">
                        https://github.com/FlyingOranges/any
                    </a>
                </strong>
            </div>
            <div>
                <strong>Copyright</strong> 通用后台 &copy; http://www.xxx.me
            </div>
        </div>

    </div>
</div>
<script src="{{asset(getThemeAssets('jquery/jquery-2.1.1.js', true))}}"></script>
<script src="{{asset(getThemeAssets('bootstrap/js/bootstrap.min.js', true))}}"></script>
<script src="{{asset(getThemeAssets('metisMenu/jquery.metisMenu.js', true))}}"></script>
<script src="{{asset(getThemeAssets('slimscroll/jquery.slimscroll.min.js', true))}}"></script>
<script src="{{asset(getThemeAssets('js/inspinia.js'))}}"></script>
@yield('js')

<script>
    $('#logout-a').on('click', function () {
        $('#logout-form').submit();
    });
</script>
</body>
</html>