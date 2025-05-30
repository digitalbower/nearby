<style>
.vendor-sidebar{
    width: 230px;
}

.vendor-sidebar.active{
    width: 60px;
}
</style>
<aside class="vendor-sidebar glass-effect p-4 flex flex-col gap-6 z-10">
    <div class="text-2xl text-custom-blue">
        <!-- <i class="fas fa-water"></i> -->
    </div>
    <nav class="flex flex-col gap-6">
        <a href="{{ route('vendor.booking') }}"
           class="{{ request()->routeIs('vendor.booking') ? 'text-custom-blue' : 'text-gray-500 hover:text-custom-blue transition-colors' }}">
            <!-- <i class="fas fa-users"></i> -->
             <i class="fa-solid fa-headset"></i>
             <span class="menu-title ms-3">Booking Management</span>
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