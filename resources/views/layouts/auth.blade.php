<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <title>{{ config('app.name') }}</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/theme/red.css') }}">
  @stack('css')

</head>
<body>
  <div class="app app-default" id="app">
    @yield('content')
  </div>

  @include('layouts.partials.js')

  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
  @stack('js')

</body>
</html>
