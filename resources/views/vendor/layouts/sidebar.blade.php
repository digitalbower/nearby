<style>
.vendor-sidebar{
    width: 260px;
}

.vendor-sidebar.active{
    width: 60px;
}

.mini-logo, .vendor-sidebar.active .lg-logo{
    display:none;
}

.vendor-sidebar.active .mini-logo{
    display:block;
}

.vendor-sidebar.active .menu-title{
    display: none;
}

.vendor-sidebar.active{
    text-align: center;
}

@media screen  and (max-width:991px) {

.vendor-sidebar{
    position: fixed;
    height: 100%;
    left: -100%;
}

.vendor-sidebar.active{
    width: 260px;
    left: 0;
    text-align: left;
}

.vendor-sidebar.active .mini-logo{
    display:none;
}

.vendor-sidebar.active .lg-logo{
    display:block;
}

.vendor-sidebar.active .menu-title{
    display: inline-block;
}

    
}
</style>
<aside class="vendor-sidebar glass-effect p-4 flex flex-col gap-6 z-10">
    <a href="javascript:void(0);" class="inline-block close_sidemenu_btn lg:hidden text-right"><i class="fa-solid fa-x"></i></a>
    <div class="text-2xl text-custom-blue">
        <!-- <i class="fas fa-water"></i> -->
        <img src="{{asset('images/admin-logo.svg')}}" class="lg-logo" alt="" srcset="">
        <img src="{{asset('images/admin-mini-logo.svg')}}" class="mini-logo" alt="" srcset="">
    </div>
    <nav class="flex flex-col gap-6">
        <a href="{{ route('vendor.booking') }}"
           class="{{ request()->routeIs('vendor.booking') ? 'text-custom-blue' : 'text-gray-500 hover:text-custom-blue transition-colors' }}">
            <!-- <i class="fas fa-users"></i> -->
             <i data-tooltip-target="tooltip-default" data-tooltip-placement="top" class="fa-solid fa-headset"></i>
             <span class="menu-title ms-3">Booking Management</span>
             <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                Booking Management
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </a>
    
        <a href="{{ route('vendor.booking_history') }}"
           class="{{ request()->routeIs('vendor.booking_history') ? 'text-custom-blue' : 'text-gray-500 hover:text-custom-blue transition-colors' }}">
            <i class="fas fa-chart-pie"></i>
            <span class="menu-title ms-3">Booking History</span>
        </a>
    
        <a href="{{ route('vendor.payment') }}"
           class="{{ request()->routeIs('vendor.payment') ? 'text-custom-blue' : 'text-gray-500 hover:text-custom-blue transition-colors' }}">
            <!-- <i class="fas fa-wallet"></i> -->
             <i class="fa-solid fa-money-bills"></i>
            <span class="menu-title ms-3">Payment Management</span>
        </a>
    
        <a href="{{ route('vendor.report') }}"
           class="{{ request()->routeIs('vendor.report') ? 'text-custom-blue' : 'text-gray-500 hover:text-custom-blue transition-colors' }}">
            <!-- <i class="fas fa-code"></i> -->
             <i class="fa-regular fa-file"></i>
            <span class="menu-title ms-3">Report</span>
        </a>
    
        <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="text-gray-500 hover:text-custom-blue transition-colors">
            <i class="fas fa-cog"></i>
             <span class="menu-title ms-3">Logout</span>
        </a>
    </nav>
    
</aside>