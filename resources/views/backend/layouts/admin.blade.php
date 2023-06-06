<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
    @stack('scripts_head')
</head>
    <body>  
        <div class="wrapper theme-2-active navbar-top-light">
            <nav class="navbar navbar-inverse navbar-fixed-top">
              @include('backend.layouts.navbar')
            </nav>
            <div class="fixed-sidebar-left">
              @include('backend.layouts.sidebar')
            </div>
            <div class="page-wrapper">
              @yield('content')
              @include('backend.layouts.shared.footer')
            </div>
        </div>
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('backend/js/dropdown-bootstrap-extended.js') }}"></script>
        <script src="{{ asset('backend/js/plugins.js') }}"></script>
        <script type="text/javascript">
          AppHelper = {};
          AppHelper.baseUrl = "{{ url('/') }}";
        </script>
         @stack('scripts_footer')   
    </body>
</html>
