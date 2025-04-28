<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Booking Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @include('vendor.layouts.headercss')  
</head>
<body class="blue-bg min-h-screen font-sans">
    <div class="flex min-h-screen">
        @include('vendor.layouts.sidebar')
        @yield('content')
    </div>
    @include('vendor.layouts.footerjs')  
</body>
</html>