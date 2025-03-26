<div  class="bg-[#58af0838] ">
  <div
    class="hidden container mx-auto lg:px-0 px-4 md:flex  w-full  justify-between items-center py-2 text-sm border-b border-gray-200">
    <div class="flex gap-4">
      <a href="#" class="text-black  duration-300">
        <i class="fas pr-1 text-cyan-900 fa-tags"></i>
        Discounts Guide
      </a>
      <a href="#" class="text-black  duration-300">
        <i class="fas pr-1 text-cyan-900 fa-headset"></i>
        Customer
        Assistance
      </a>
    </div>
    <div class="flex gap-4">
      @auth
        <div class="relative group">
            <button class="flex items-center text-black">
                <i class="fas fa-user-circle pr-1 text-cyan-900"></i> {{auth()->user()->first_name}}
            </button>
            <div class="absolute hidden group-hover:block bg-white shadow-md rounded-lg mt-2 w-40">
                <a href="{{ route('home.index') }}" class="block px-4 py-2 text-black hover:bg-gray-200">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-black hover:bg-gray-200">Logout</button>
                </form>
            </div>
        </div>
      @else
        <!-- ✅ Show Sign In and Sign Up for Guests -->
        <a href="{{ route('login') }}" class="text-black flex items-center">
            <i class="fas pr-1 text-cyan-900 fa-sign-in-alt"></i> Sign In
        </a>
        <a href="{{ route('signup') }}" class="text-black flex items-center">
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

      <a href="/" class="text-2xl font-bold text-gray-900">
        <img src="/images/NearByVoucherswide.svg" alt="logo" class="w-36 ovject-fit">
      </a>

      <!-- Mobile Menu Toggle -->
      <button id="mobile-menu-toggle"
        class="md:hidden text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500">
        <i class="fas pr-1 text-[#58af0838] fa-bars"></i>
      </button>

      <!-- Search Bar -->
      <form class="hidden md:block relative w-full max-w-2xl">
        <div class="relative">
          <input id="search-input" type="text" placeholder="Search for deals"
            class="w-full pl-10 pr-20 py-2 rounded-full focus:outline-none border focus:ring-0 focus:ring-none "
            onclick="toggleDropdown()"
            autocomplete="off"  />
          <i
            class="fas pr-1 text-[#58af0838] fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
       
       
          <select id="location" name="location"
          class="absolute right-20 w-auto inset-y-0 px-4 border-none text-gray-500 bg-gray-100 hover:bg-gray-200 flex items-center rounded-r-full focus:outline-none focus:ring-0 focus:ring-[#58af0838]">
            <option class="bg-white text-gray-700 hover:bg-gray-100" value="chicago">Chicago</option>
            <option class="bg-white text-gray-700 hover:bg-gray-100" value="new-york">New York</option>
            <option class="bg-white text-gray-700 hover:bg-gray-100" value="los-angeles">Los Angeles</option>
            <option class="bg-white text-gray-700 hover:bg-gray-100" value="san-francisco">San Francisco</option>
            <option class="bg-white text-gray-700 hover:bg-gray-100" value="miami">Miami</option>
            <option class="bg-white text-gray-700 hover:bg-gray-100" value="dallas">Dallas</option>
          </select>
       
         

          <div
            class="absolute right-0 w-10 h-10  inset-y-0 px-4 -bottom-0 text-gray-500 bg-[#58af0838] hover:bg-[#58af0838] flex items-center justify-center rounded-full">
            <i
              class="fas text-black fa-search    w-5 h-5"></i>
          </div>

          <!-- Dropdown -->
          <div id="dropdown"
            class="absolute z-50 mt-2 w-full bg-white border border-gray-300 rounded-lg shadow-lg hidden">
            <!-- Dynamic Items -->
            <ul id="dropdown-list" class="divide-y divide-gray-200">
              <li class="py-2 px-4 hover:bg-gray-100">Deal
                of the Day:
                Electronics</li>
              <li class="py-2 px-4 hover:bg-gray-100">50%
                Off on
                Shoes</li>
              <li class="py-2 px-4 hover:bg-gray-100">Best
                Deals on
                Mobiles</li>
              <li class="py-2 px-4 hover:bg-gray-100">Discounted
                Furniture
                Sale</li>
              <li class="py-2 px-4 hover:bg-gray-100">Summer
                Clothing
                Offers</li>
              <li class="py-2 px-4 hover:bg-gray-100">Grocery
                Discounts
                Nearby</li>
            </ul>
          </div>
        </div>
      </form>

      <!-- Cart -->
      <a href="/cart.html" class="relative hidden md:block">
        <i class="fas pr-1 text-[#58af0838] fa-shopping-cart w-6 h-6 text-gray-700"></i>
        <span
          class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
      </a>
    </div>
  </div>

  <!-- Mobile menu -->
  <nav id="mobile-menu"
    class="hidden  fixed md:top-0 top-20 md:h-auto lg:auto z-30 md:relative md:py-0 py-10 w-full px-4 lg:px-0 bg-white border-y md:flex justify-between border-gray-200">
    <div class="container mx-auto lg:px-0 px-4 ">
      <ul class="flex py-2 flex-col md:flex-row md:items-center md:space-x-4 text-gray-700">
        <li>
          <a href="/" 
             class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200 border-b-2 active:border-b-4 border-white hover:border-[#58af0838]">
            Home
          </a>
        </li> 
        <li class="relative group">
          <a href="/deals"
            class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Deals</a>
          <ul
            class="absolute hidden group-hover:block z-50 md:w-[200px] z-50 w-50 pl-4 transition-all duration-300 ease-in-out bg-white border rounded-md shadow-lg mt-0">
            <li>
              <a href="/deals/electronics" class="block py-2 lg:px-4 hover:bg-gray-100">Electronics</a>
            </li>
            <li>
              <a href="/deals/clothing" class="block py-2 lg:px-4 hover:bg-gray-100">Clothing</a>
            </li>
            <li>
              <a href="/deals/home" class="block py-2 lg:px-4 hover:bg-gray-100">Home
                Goods</a>
            </li>
            <li>
              <a href="/deals/groceries" class="block py-2 lg:px-4 hover:bg-gray-100">Groceries</a>
            </li>
            <li>
              <a href="/deals/furniture" class="block py-2 lg:px-4 hover:bg-gray-100">Furniture</a>
            </li>
            <li>
              <a href="/deals/sports" class="block py-2 lg:px-4 hover:bg-gray-100">Sports
                Equipment</a>
            </li>
          </ul>
        </li>
        <li class="relative group">
          <a href="/coupons"
            class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Coupons</a>
          <ul
            class="absolute hidden group-hover:block z-50 md:w-[200px] pl-4 transition-all duration-300 ease-in-out bg-white border rounded-md shadow-lg mt-0">
            <li>
              <a href="/coupons/electronics" class="block py-2 lg:px-4 hover:bg-gray-100">Electronics</a>
            </li>
            <li>
              <a href="/coupons/clothing" class="block py-2 lg:px-4 hover:bg-gray-100">Clothing</a>
            </li>
            <li>
              <a href="/coupons/home" class="block py-2 lg:px-4 hover:bg-gray-100">Home
                Goods</a>
            </li>
          </ul>
        </li>
        <li class="relative group">
          <a href="/stores"
            class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Stores</a>
          <ul
            class="absolute hidden group-hover:block z-50 md:w-[200px] pl-4 transition-all duration-300 ease-in-out bg-white border rounded-md shadow-lg mt-0">
            <li>
              <a href="/stores/electronics" class="block py-2 lg:px-4 hover:bg-gray-100">Electronics</a>
            </li>
            <li>
              <a href="/stores/clothing" class="block py-2 lg:px-4 hover:bg-gray-100">Clothing</a>
            </li>
            <li>
              <a href="/stores/home" class="block py-2 lg:px-4 hover:bg-gray-100">Home
                Goods</a>
            </li>
          </ul>
        </li>
        <!-- <li>
            <a href="/booking-confirmation.html"
              class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">booking
              conformation</a>
          </li>
          <li>
            <a href="/checkout.html"
              class="block py-3 lg:px-4 hover:font-semibold hover:text-black from-cyan-300 to-blue-200 rounded-md">checkout
            </a>
          </li>

          <li>
            <a href="/filter.html"
              class="block py-3 lg:px-4 hover:font-semibold hover:text-black from-cyan-300 to-blue-200 rounded-md">Filter</a>
          </li>
          <li>
            <a href="/my-booking.html"
              class="block py-3 lg:px-4 hover:font-semibold hover:text-black from-cyan-300 to-blue-200 rounded-md">my
              booking</a>
          </li> -->
        <li>
          <a href="{{ route('user.products.index') }}"
               class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Product</a>
        </li>
        <li>
          <a href="/profile.html"
               class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Profile</a>
        </li>
        <li>
          <a href="/contact-us.html"
               class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Contact</a>
        </li>
        <li>
          <a href="./Signin.html"
               class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">signin</a>
        </li>
      </ul>
    </div>
  </nav>

</header>