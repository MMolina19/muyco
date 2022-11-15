<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{config('app.name') }} - @yield('title')</title>
        <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>

        @include('partials.left-navbar')

        @include('partials.main-button-nav-toggler')

        <div class="container container-fluid">
            <div class="row">
                <div class="col min-vh-100 p-4">
                    @include('partials.alerts')
                    @yield('content')
                </div>
            </div>
        </div>

        @include('partials.footer')

        @include('partials.javascripts')

    </body>
</html>
