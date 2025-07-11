<div id="mainHeader" class=" ">  
  <div  class="bg-[#58af0838] ">
    <div
      class="container mx-auto lg:px-0 px-4 flex  w-full  justify-between items-center py-2 text-sm border-b border-gray-200">
      <div class="flex gap-4">
      @foreach ($uppermenuItems->where('navigation_placement', 'upper') as $menu)
      <a href="{{ $menu->link }}" class="text-black text-xs md:text-md duration-300">
        <i class="fas pr-1 text-cyan-900 {{ $menu->icon }}"></i>
        {{ $menu->name }}
    </a>
@endforeach
  </div>

  
  <div class="flex gap-4">
    @auth
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center text-black">
                <i class="fas fa-user-circle pr-1 text-cyan-900"></i>
                 {{ auth()->user()->first_name }}
            </button>
            <style>
                [x-cloak] {
                    display: none !important;
                }
            </style>

            <ul
                x-show="open"
                @click.away="open = false"
                x-cloak
                class="absolute right-0 bg-white shadow-md rounded-lg mt-2 min-w-[12rem] w-fit z-[9999] list-none p-0"
            >
                <!-- Profile Display (non-clickable) -->
                <li class="px-4 py-2 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('assets/img/dprofile.png') }}" alt="Profile"
                             class="w-8 h-8 rounded-full">
                        <div>
                            <div class="text-sm font-semibold text-black">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Profile Link -->
                <li>
                    <a href="{{ route('user.profile.index') }}" class="block px-4 py-2 text-sm text-black hover:bg-gray-200">
                        <i class="fas fa-user pr-2 text-cyan-900"></i> Profile
                    </a>
                </li>

                <!-- Logout Button -->
                <li>
                    <form method="POST" action="{{ route('user.logout') }}" class="block">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-black hover:bg-gray-200 text-sm">
                            <i class="fas fa-sign-out-alt pr-2 text-cyan-900"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <div class="flex gap-4">
            <a href="{{ route('user.login') }}" class="text-black text-xs md:text-md flex items-center">
                <i class="fas fa-sign-in-alt pr-1 text-cyan-900"></i> Sign In
            </a>
            <a href="{{ route('user.signup') }}" class="text-black text-xs md:text-md flex items-center">
                <i class="fas fa-user-plus pr-1 text-cyan-900"></i> Sign Up
            </a>
        </div>
    @endauth
</div>


    </div>
  </div>
  <header  id="header" class="  shadow-sm  z-50">
    

    <!-- Top bar -->

    <div class="container   mx-auto lg:px-0 px-4">
      <!-- Main header -->
      <div class="flex justify-between w-full gap-x-2 lg:gap-x-4  items-center py-4 bg-white ">

        <a href="{{ $logo->link ?? '/' }}" class="text-2xl font-bold text-gray-900">
            <img src="{{ asset('storage/' . $logo->image) }}" alt="logo" class="w-36 object-fit">
        </a>

        <div class="flex items-center gap-x-2">
            <!-- Search Bar -->
            <!-- Cart -->
            @php
                $cartCount = \App\Models\Cart::getCartCount();
            @endphp

            <a href="{{ route('user.cart') }}" class="relative">
                <i class="fas pr-1 text-[#58af0838] fa-shopping-cart w-6 h-6 text-gray-700"></i>
                @if($cartCount > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

            <!-- Mobile Menu Toggle -->
            <button id="mobile-menu-toggle" class="md:hidden text-gray-800 focus:outline-none ml-5">
                <i class="fas pr-1 text-[#58af0838] fa-bars"></i>
            </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <nav id="mobile-menu" class="hidden fixed md:top-0 top-23 md:h-auto lg:auto z-30 md:relative md:py-0 pb-6 w-full px-4 lg:px-0 bg-white md:border-y md:flex justify-between border-gray-200">
        <div class="container mx-auto lg:px-0 px-4">
            <ul class="flex md:py-2 flex-col md:flex-row md:items-center md:space-x-4 text-gray-700">
                @foreach($lowermenuitem as $menu)
                    @php
                    // Check if it's a named route
                    $url = Route::has($menu->link) ? route($menu->link) : $menu->link;
                    @endphp
                    <li> 
                        <a href="{{ $url }}"
                        class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black">
                            {!! $menu->icon ? '<i class="' . $menu->icon . ' mr-2"></i>' : '' !!}
                            {{ $menu->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
    <div id="page-loader" class="loader-overlay">
        <div class="travel-loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

<style>
.loader-overlay {
    position: fixed;
    inset: 0;
    background-color: #fff;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.travel-loader {
    display: flex;
    gap: 10px;
}

.travel-loader span {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #00aaff;
    animation: bounce 1s infinite ease-in-out;
}

.travel-loader span:nth-child(2) {
    animation-delay: 0.2s;
}

.travel-loader span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes bounce {
    0%, 80%, 100% {
        transform: scale(0.8);
        opacity: 0.6;
    }
    40% {
        transform: scale(1.4);
        opacity: 1;
    }
}
</style>
<script>
    window.addEventListener('load', function () {
        const loader = document.getElementById('page-loader');
        if (loader) {
            loader.style.display = 'none';
        }
    });
</script>
  </header>

</div>