<div id="mainHeader" class=" ">  
  <div  class="bg-[#58af0838] ">
    <div
      class="hidden container mx-auto lg:px-0 px-4 md:flex  w-full  justify-between items-center py-2 text-sm border-b border-gray-200">
      <div class="flex gap-4">
      @foreach ($uppermenuItems->where('navigation_placement', 'upper') as $menu)
      <a href="{{ $menu->link }}" class="text-black duration-300">
        <i class="fas pr-1 text-cyan-900 {{ $menu->icon }}"></i>
        {{ $menu->name }}
    </a>
@endforeach
  </div>

  
      <div class="flex gap-4">
@auth
    <!-- ✅ Show Dropdown for Logged-in Users -->
    <div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="flex items-center text-black">
        <i class="fas fa-user-circle pr-1 text-cyan-900"></i> {{ auth()->user()->first_name }}
    </button>

    <div
        x-show="open"
        @click.away="open = false"
        class="absolute bg-white shadow-md rounded-lg mt-2 w-40 z-50"
        x-cloak
    >
        <a href="{{ route('home.index') }}" class="block px-4 py-2 text-black hover:bg-gray-200">Dashboard</a>
        <form method="POST" action="{{ route('user.logout') }}" class="block">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-black hover:bg-gray-200">Logout</button>
        </form>
    </div>
</div>
@else
    <!-- ✅ Show Sign In and Sign Up for Guests -->
    <a href="{{ route('user.login') }}" class="text-black flex items-center">
        <i class="fas pr-1 text-cyan-900 fa-sign-in-alt"></i> Sign In
    </a>
    <a href="{{ route('user.signup') }}" class="text-black flex items-center">
        <i class="fas pr-1 text-cyan-900 fa-user-plus"></i> Sign Up
    </a>
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

        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-toggle"
          class="md:hidden text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500">
          <i class="fas pr-1 text-[#58af0838] fa-bars"></i>
        </button>

        <!-- Search Bar -->
       
        <!-- Cart -->
        @php
    $cartCount = \App\Models\Cart::getCartCount();
@endphp

<a href="{{ route('user.cart') }}" class="relative hidden md:block">
    <i class="fas pr-1 text-[#58af0838] fa-shopping-cart w-6 h-6 text-gray-700"></i>
    @if($cartCount > 0)
        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
            {{ $cartCount }}
        </span>
    @endif
</a>
      </div>
    </div>

    <!-- Mobile menu -->
    <nav id="mobile-menu" class="hidden fixed md:top-0 top-20 md:h-auto lg:auto z-30 md:relative md:py-0 py-10 w-full px-4 lg:px-0 bg-white border-y md:flex justify-between border-gray-200">
<div class="container mx-auto lg:px-0 px-4">
    <ul class="flex py-2 flex-col md:flex-row md:items-center md:space-x-4 text-gray-700">
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

  </header>

</div>