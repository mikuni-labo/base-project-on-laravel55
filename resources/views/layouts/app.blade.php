{{ header('X-Frame-Options: SAMEORIGIN') }}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
          window.Laravel = window.Laravel || {};
          window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>

    @yield('script')
</body>
</html>
