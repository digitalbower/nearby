<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @if($seo)
    <title>{{ $seo->meta_title ?? 'Default' }}</title>
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta property="og:title" content="{{ $seo->og_title }}">
    <meta property="og:description" content="{{ $seo->og_description }}">
    @if($seo->og_image)
        <meta property="og:image" content="{{ asset('storage/' . $seo->og_image) }}">
    @endif
    @if($seo->schema)
        <script type="application/ld+json">{!! $seo->schema !!}</script>
    @endif
  @endif
  @include('user.layouts.headercss')  

</head>
<body class="bg-white">
    @include('user.layouts.header')
    @yield('content')
    @include('user.layouts.footer')
    @include('user.layouts.footerjs')

</body>

</html>