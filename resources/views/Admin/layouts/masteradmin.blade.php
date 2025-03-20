<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>@yield('title', 'Admin Dashboard')</title>
        <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
        <link rel="icon" href="/images/NearByVoucherswide.svg"  type="image/x-icon"/>
        <link rel="icon" href="{{asset('assets/img/kaiadmin/favicon.ico')}}"  type="image/x-icon"/>
        @include('admin.layouts.headercss')
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <div class="main-panel">
                @include('admin.layouts.header')
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.footerjs')
    </body>
</html>
