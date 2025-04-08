<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'NearBy')</title>
  @include('user.layouts.headercss')  

</head>
<body class="bg-white">
    @include('user.layouts.header')
    @yield('content')
    @include('user.layouts.footer')
    @include('user.layouts.footerjs')

</body>

</html>