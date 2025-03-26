<!-- Add this to the bottom of your CSS -->
@extends('user.layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Main Navigation</title>

  <!-- Import Poppins font from Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Add Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<!-- Owl Carousel Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Owl Carousel Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>

<style>
  .to-blue-500 {
    --tw-gradient-to: #3b82f6 var(--tw-gradient-to-position);
  }

  /* Update the body to use the Poppins font */
  body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
  }

  .owl-stage-outer {
    padding: 3px 0px;
  }

  .w-8 {
    width: 40px !important;
  }




  .bg-gradient-to-r {
    background-image: linear-gradient(to right, var(--tw-gradient-stops));
  }

  .bg-custom {
    background: linear-gradient(135deg, #2b3147 0%, #1a1f2e 100%);
  }

  .product-card {
    background: linear-gradient(135deg, #3a4259 0%, #2b3147 100%);
  }

  .color-dot {
    width: 16px;
    background-color: #000;
    color: #000;
    height: 16px;
    border-radius: 50%;
    cursor: pointer;
  }

  .swiper-pagination-bullet-active {
    background-color: #2b3147 !important;
    backdrop-filter: blur(10px);
  }

  .swiper-pagination {
    color: #fff !important;
    overflow: visible;
    bottom: 10px !important;
    z-index: 999999;
  }

  .swiper-pagination-bullet {

    border-radius: 10px !important;
    width: 60px !important;
    height: 4px !important;
  }
</style>

<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: {
            50: "#f0f9ff",
            100: "#e0f2fe",
            200: "#bae6fd",
            300: "#7dd3fc",
            400: "#38bdf8",
            500: "#0ea5e9",
            600: "#0284c7",
            700: "#0369a1",
            800: "#075985",
            900: "#0c4a6e",
            950: "#0b2e4f",
          },
          background: "#ffffff",
          foreground: "#000000",
          muted: "#f3f4f6",
          "muted-foreground": "#6b7280",
          accent: "#fbbf24",
          "accent-foreground": "#000000",
        },
      },
      fontFamily: {
        body: ["Poppins", "sans-serif"],  /* Set Poppins as the body font */
        sans: [
          "Arial",
          "ui-sans-serif",
          "system-ui",
          "-apple-system",
          "system-ui",
          "Segoe UI",
          "Roboto",
          "Helvetica Neue",
          "Arial",
          "Noto Sans",
          "sans-serif",
          "Apple Color Emoji",
          "Segoe UI Emoji",
          "Segoe UI Symbol",
          "Noto Color Emoji",
        ],
      },
    },
  };
</script>

<script>
  window.onscroll = function() {
    const header = document.getElementById('header');
    const sticky = header.offsetTop;

    if (window.pageYOffset > sticky) {
      header.classList.add('fixed-header');
    } else {
      header.classList.remove('fixed-header');
    }
  };
</script>
<style>
   .fixed-header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #fff; /* Blue color */
      color: white;
     
      z-index: 10;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    </style>
  <body class="bg-white">
    <div class=" ">
      <div  class="bg-[#58af0838] ">
        <div
          class="hidden container mx-auto lg:px-0 px-4 md:flex  w-full  justify-between items-center py-2 text-sm border-b border-gray-200">
          <div class="flex gap-4">
          @foreach ($menuItems->where('navigation_placement', 'upper') as $menu)
          <a href="{{ $menu->link }}" class="text-black duration-300">
            <i class="fas pr-1 text-cyan-900 {{ $menu->icon }}"></i>
            {{ $menu->label }}
        </a>
    @endforeach
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
        <!-- ✅ Show Dropdown for Logged-in Users -->
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
            <img src="{{ asset('images/NearByVoucherswide.svg') }}" alt="logo" class="w-36 object-fit">

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
                <a href="{{ route('home.index') }}" 
                   class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200 border-b-2 active:border-b-4 border-white hover:border-[#58af0838]">
                  Home
                </a>
              </li> 
              <li class="relative group">
                <a href=""
                  class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Deals</a>
                <ul
                  class="absolute hidden group-hover:block z-50 md:w-[200px] z-50 w-50 pl-4 transition-all duration-300 ease-in-out bg-white border rounded-md shadow-lg mt-0">
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Electronics</a>
                  </li>
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Clothing</a>
                  </li>
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Home
                      Goods</a>
                  </li>
                  <li> 
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Groceries</a>
                  </li>
                  <li> 
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Furniture</a>
                  </li>
                  <li> 
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Sports
                      Equipment</a>
                  </li>
                </ul>
              </li>
              <li class="relative group">
                <a href=""
                  class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Coupons</a>
                <ul
                  class="absolute hidden group-hover:block z-50 md:w-[200px] pl-4 transition-all duration-300 ease-in-out bg-white border rounded-md shadow-lg mt-0">
                  <li> 
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Electronics</a>
                  </li>
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Clothing</a>
                  </li>
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Home
                      Goods</a>
                  </li>
                </ul>
              </li>
              <li class="relative group">
                <a href=""
                  class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Stores</a>
                <ul
                  class="absolute hidden group-hover:block z-50 md:w-[200px] pl-4 transition-all duration-300 ease-in-out bg-white border rounded-md shadow-lg mt-0">
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Electronics</a>
                  </li>
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Clothing</a>
                  </li>
                  <li>
                    <a href="" class="block py-2 lg:px-4 hover:bg-gray-100">Home
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
                <a href=""
                     class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Profile</a>
              </li>
              <li>
                <a href=""
                     class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">Contact</a>
              </li>
              <li>
                <a href="{{ route('login') }}"
                     class="block py-1 lg:px-4 hover:font-semibold hover:border-b-2 border-[#58af0838] hover:text-black from-cyan-300 to-blue-200">signin</a>
              </li>
            </ul>
          </div>
        </nav>
  
      </header>

  </div>
  <section class="">
    <div class="container mx-auto relative border-b">
      <div class=" grid h-full bg-[#58af0838] grid-cols-1  md:grid-cols-5">
        <aside
          class="lg:col-span-1 lg:order-1 order-1 sm:col-span-2 w-full shadow-lg  bg-[#58af0838] overflow-hidden relative">
          <!-- Mobile Menu Icon -->
          <div class="md:hidden flex justify-between items-center p-4 bg-[#58af0838]">
            <h2 class="text-2xl font-bold text-gray-700">Categories</h2>
            <button id="menuToggle" class="text-gray-700 focus:outline-none">
              <i class="fa-solid fa-chevron-down"></i>
            </button>
          </div>

          <!-- Sidebar Content -->
          <div id="menuContent" class="hidden md:block p-4">
            <h2 class="hidden lg:block text-2xl ml-5 font-bold mb-6 text-gray-700">Categories</h2>
            <nav class="space-y-2 ml-5">
              <a href="/category/beauty"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-heart h-5 w-5"></i><span class="font-medium">BEAUTY</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/events"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-calendar h-5 w-5"></i><span class="font-medium">EVENTS</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/fashion"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-tshirt h-5 w-5"></i><span class="font-medium">FASHION</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/fitness"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-dumbbell h-5 w-5"></i><span class="font-medium">FITNESS</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/food &amp; drink"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-utensils h-5 w-5"></i><span class="font-medium">FOOD &amp; DRINK</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/furniture"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-couch h-5 w-5"></i><span class="font-medium">FURNITURE</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/home &amp; garden"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-home h-5 w-5"></i><span class="font-medium">HOME &amp; GARDEN</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/shopping"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-shopping-bag h-5 w-5"></i><span class="font-medium">SHOPPING</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
              <a href="/category/travel"
                class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                <div class="flex items-center gap-3">
                  <i class="fas fa-plane h-5 w-5"></i><span class="font-medium">TRAVEL</span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                </div>
              </a>
            </nav>
            <div class="mt-8 pt-6 ml-5 border-t border-white/20">
              <a href="/categories"
                class="inline-flex rounded-lg p-2 px-3 items-center text-gray-700 hover:bg-white/40 transition-colors duration-200 text-gray-700 font-medium  transition-all">
                ALL CATEGORIES
                <i
                  class="fas fa-chevron-right h-4 w-4 ml-1 transition-transform transform group-hover:translate-x-1"></i>
              </a>
            </div>

          </div>
        </aside>

        <script>
          const menuToggle = document.getElementById('menuToggle');
          const menuContent = document.getElementById('menuContent');

          menuToggle.addEventListener('click', () => {
            menuContent.classList.toggle('hidden');
          });
        </script>

        <main class="lg:col-span-4 lg:order-2 order-2 sm:col-span-3 h-full lg:p-10 py-4 relative px-4">
          <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="lg:flex w-full relative mb-10 items-center justify-center">
                  <!-- Left Section (Top Animation) -->
                  <div id="left-section" class="w-full left-10 rounded-xl z-20 transform translate-x-[-50px] opacity-0">
                    <div class="rounded-xl lg:w-3/5"> 
                      <img src="{{ asset('images/images.jpeg') }}" alt="PS5 Console"
                        class="w-full h-auto max-h-[300px] lg:pb-0 pb-0 lg:max-h-[500px] rounded-xl object-cover">
                    </div>
                  </div>

                  <!-- Right Section (Bottom Animation) -->
                  <div id="right-section"
                    class="lg:absolute flex flex-col w-full lg:w-1/2 bg-white text-gray-800 rounded-lg p-3 lg:p-8 shadow-xl z-20 right-0 transform translate-x-[50px] opacity-0">
                    <h1 class="lg:text-2xl text-lg font-extrabold mb-0 leading-tight text-gray-900 leading-snug">
                      Up to 76% Off Custom Holiday Photo Cards
                    </h1>

                    <div>
                      <h2 class="lg:text-lg text-base font-bold text-gray-900">Pure White Med
                        Spa, DUBAI</h2>
                      <div class="flex items-center space-x-2 text-gray-600">
                        <span class="text-yellow-400 text-2xl">★★★★☆</span>
                        <span class="text-sm">(4.8 / 41,744 reviews)</span>
                      </div>
                    </div>

                    <p class="text-gray-600 text-sm lg:text-base leading-relaxed">
                      Discover premium-quality holiday photo cards with an
                      unbeatable discount.
                      Transform your memories into stunning prints today!
                    </p>

                    <div class="flex items-center space-x-4">
                      <span class="text-3xl font-bold text-red-600">$19.99</span>
                      <span class="text-xl text-gray-400 line-through">$79.29</span>
                    </div>

                    <span class="text-lg text-green-600 font-semibold">-75%</span>

                    <div>
                      <button
                        class="w-auto px-9 py-3 bg-[#58af0838]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:bg-[#4a910954]">
                        ADD TO CART
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="lg:flex w-full relative mb-10 items-center justify-center">
                  <!-- Left Section (Top Animation) -->
                  <div id="left-section" class="w-full left-10 rounded-xl z-20 transform translate-x-[-50px] opacity-0">
                    <div class="rounded-xl lg:w-3/5">
                      <img src="/images/images.jpeg" alt="PS5 Console"
                        class="w-full h-auto max-h-[300px] lg:pb-0 pb-0 lg:max-h-[500px] rounded-xl object-cover">
                    </div>
                  </div>

                  <!-- Right Section (Bottom Animation) -->
                  <div id="right-section"
                    class="lg:absolute flex flex-col w-full lg:w-1/2 bg-white text-gray-800 rounded-lg p-3 lg:p-8 shadow-xl z-20 right-0 transform translate-x-[50px] opacity-0">
                    <h1 class="lg:text-2xl text-lg font-extrabold mb-0 leading-tight text-gray-900 leading-snug">
                      Up to 76% Off Custom Holiday Photo Cards
                    </h1>

                    <div>
                      <h2 class="lg:text-lg text-base font-bold text-gray-900">Pure White Med
                        Spa, DUBAI</h2>
                      <div class="flex items-center space-x-2 text-gray-600">
                        <span class="text-yellow-400 text-2xl">★★★★☆</span>
                        <span class="text-sm">(4.8 / 41,744 reviews)</span>
                      </div>
                    </div>

                    <p class="text-gray-600 text-sm lg:text-base leading-relaxed">
                      Discover premium-quality holiday photo cards with an
                      unbeatable discount.
                      Transform your memories into stunning prints today!
                    </p>

                    <div class="flex items-center space-x-4">
                      <span class="text-3xl font-bold text-red-600">$19.99</span>
                      <span class="text-xl text-gray-400 line-through">$79.29</span>
                    </div>

                    <span class="text-lg text-green-600 font-semibold">-75%</span>

                    <div>
                      <button
                        class="w-auto px-9 py-3 bg-[#58af0838]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:bg-[#4a910954]">
                        ADD TO CART
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
          <script>
            // Initialize Swiper
            var swiper = new Swiper(".mySwiper", {
              loop: true,
              autoplay: {
                delay: 3000,
                disableOnInteraction: false,
              },
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
            });

            // IntersectionObserver to trigger animations when sections are in view
            const observerOptions = {
              root: null, // Observing within the viewport
              rootMargin: "0px",
              threshold: 0.5, // Trigger when 50% of the element is in view
            };

            const sections = document.querySelectorAll('#left-section, #right-section');

            const animateSectionInView = (entries, observer) => {
              entries.forEach(entry => {
                if (entry.isIntersecting) {
                  if (entry.target.id === 'left-section') {
                    entry.target.classList.add('animate-slideInTop'); // Trigger top animation for left section
                  } else if (entry.target.id === 'right-section') {
                    entry.target.classList.add('animate-slideInBottom'); // Trigger bottom animation for right section
                  }
                  observer.unobserve(entry.target);
                }
              });
            };

            const observer = new IntersectionObserver(animateSectionInView, observerOptions);

            sections.forEach(section => {
              observer.observe(section);
            });
          </script>

        </main>

        <style>
          /* Keyframes for slide-in animations */
          @keyframes slideInTop {
            0% {
              transform: translateY(-100px);
              opacity: 0;
            }

            100% {
              transform: translateY(0);
              opacity: 1;
            }
          }

          @keyframes slideInBottom {
            0% {
              transform: translateY(100px);
              opacity: 0;
            }

            100% {
              transform: translateY(0);
              opacity: 1;
            }
          }

          /* Apply animations */
          .animate-slideInTop {
            animation: slideInTop 1s ease-out forwards;
          }

          .animate-slideInBottom {
            animation: slideInBottom 1s ease-out forwards;
          }
        </style>

      </div>
    </div>
  </section>
  <section class="w-full container lg:px-0 px-4 mx-auto lg:py-20 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:mb-0 mb-8">
      <!-- Adoption Section -->
      <div
        class="bg-gradient-to-r from-teal-500 via-[#58af0838] to-blue-500 rounded-xl shadow-lg lg:p-8 p-4 flex items-center  transition-transform duration-300">
        <div class="flex-1">
          <h2 class="lg:text-2xl text-base font-extrabold text-white mb-4">
            Any Pets Available for Adoption?
          </h2>
          <p class="lg:text-base text-sm text-white lg:mb-6 mb-4">
            Join our community and give a loving home to a pet
            waiting for
            adoption.
          </p>
          <button
            class="bg-white text-gray-900 lg:text-base text-sm font-semibold rounded-full lg:px-6 px-4 lg:py-3 py-2 shadow-md hover:bg-white/80 transition-colors duration-200  hover:shadow-lg transition duration-300">
            Create an Account →
          </button>
        </div>
        <div class="flex-shrink-0"> 
          <img alt="Adopt a pet"
            class="lg:w-40 lg:h-40 w-20 h-20 ml-6 object-cover rounded-full shadow-md border-4 border-white"
            src="{{ asset('images/banner.png') }}" />
        </div>
      </div>

      <!-- Find Best Friend Section -->
      <div
        class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 rounded-xl shadow-lg lg:p-8 p-4 flex items-center  transition-transform duration-300">
        <div class="flex-1">
          <h2 class="lg:text-2xl text-base font-extrabold text-white mb-4">
            Let's Find Your New Best Friend
          </h2>
          <p class="lg:text-base text-sm text-white lg:mb-6 mb-4">
            Explore the best pets available for adoption near
            you.
          </p>
          <button
            class="bg-white text-pink-500 lg:text-base text-sm font-semibold rounded-full lg:px-6 px-4 lg:py-3 py-2 shadow-md hover:bg-white/80 hover:shadow-lg transition duration-300">
            Create an Account →
          </button>
        </div>
        <div class="flex-shrink-0">
          <img alt="Find a friend"
            class="lg:w-40 lg:h-40 w-20 h-20 ml-6 object-cover rounded-full shadow-md border-4 border-white"
            src="{{ asset('images/banner.png') }}" /> 
        </div>
      </div>
    </div>
  </section>
  <section class=" bg-[#58af0838] lg:pt-20 py-10 lg:px-4 from-cyan-50 to-blue">
    <div class="mb-8 container  mb-10 mx-auto px-4 lg:px-0">
      <div class="flex justify-between items-center mb-4">
        <h2 class="lg:text-3xl text-base font-bold text-black">Trending
          Today in
          Chicago</h2>

      </div>

      <div class="owl-carousel1  owl-carousel owl-theme">
        <div class="item">
          <a href="/">
            <div
              class="rounded-lg hover:shadow-xl hover:border-[#58af0838] shadow-lg h-full hover:shadow-xl  border bg-white shadow-lg overflow-hidden transition-transform duration-300 "
              data-v0-t="card">
              <!-- Image with Wave Shape -->

              <div class="relative">
                <img alt="Up to 76% Off Custom Holiday Photo Cards" class="w-full h-48 object-cover"
                  src="{{ asset('images/banner.png') }}">



                <!-- Discount Badge -->
                <div class="w-full flex items-center justify-between text-[#fe8500] text-2xl p-2 font-bold">
                  <div class="flex items-center mt-1">
                    <img src="{{ asset('images/banner.png') }}" class="w-8" />
                    <span class="ml-0.5 text-base text-black">50% OFF</span>
                  </div>
                  <div
                    class="flex items-center ml-auto py-0 rounded-md px-2 gap-x-1 text-[#000] font-semibold">
                    <!-- Days -->
                    <span class="text-sm flex mt-1 text-red-400">
                      <img src="{{ asset('images/banner.png') }}" class="w-8 h-9 pr-1" />
                    </span>
                
                    <!-- Countdown Timer -->
                    <div class="flex items-center gap-x-1 text-center">
                      <div class="flex flex-col items-center w-4">
                        <span class="block text-sm font-semibold mt-1" id="days">3</span>
                      </div>
                      <div class="text-red-500 text-base">:</div>
                
                      <div class="flex flex-col items-center w-4">
                        <span class="block text-sm font-semibold mt-1" id="hours">18</span>
                      </div>
                      <div class="text-red-500 text-base">:</div>
                
                      <div class="flex flex-col items-center w-4">
                        <span class="block text-sm font-semibold mt-1" id="minutes">43</span>
                      </div>
                      <div class="text-red-500 text-base">:</div>
                
                      <div class="flex flex-col items-center w-4">
                        <span class="block text-sm font-semibold mt-1" id="seconds">21</span>
                      </div>
                    </div>
                  </div>
                </div>
                
                <script>
                  function updateCountdown() {
                    const endDate = new Date(new Date().getTime() + 3 * 24 * 60 * 60 * 1000); // 3 days from now
                    const daysElement = document.getElementById('days');
                    const hoursElement = document.getElementById('hours');
                    const minutesElement = document.getElementById('minutes');
                    const secondsElement = document.getElementById('seconds');
                
                    function updateTimer() {
                      const now = new Date();
                      const timeDiff = endDate - now;
                
                      if (timeDiff <= 0) {
                        clearInterval(timerInterval);
                        daysElement.textContent = hoursElement.textContent = minutesElement.textContent = secondsElement.textContent = '00';
                        return;
                      }
                
                      const days = String(Math.floor(timeDiff / (1000 * 60 * 60 * 24))).padStart(2, '0');
                      const hours = String(Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                      const minutes = String(Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                      const seconds = String(Math.floor((timeDiff % (1000 * 60)) / 1000)).padStart(2, '0');
                
                      daysElement.textContent = days;
                      hoursElement.textContent = hours;
                      minutesElement.textContent = minutes;
                      secondsElement.textContent = seconds;
                    }
                
                    const timerInterval = setInterval(updateTimer, 1000);
                    updateTimer(); // Initial call to display timer immediately
                  }
                
                  // Initialize countdown
                  updateCountdown();
                </script>
                
              </div>

              <!-- Content Section -->
              <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                <h3 class="text-xl font-semibold leading-tight">
                  Up to 76% Off Custom Holiday Photo Cards
                </h3>

                <div class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Pure White Med Spa, DUBAI </span>
                </div>
                <div class="flex items-center gap-0">
                  <span class="text-yellow-500">★★★★☆</span>
                  <span class="text-sm text-gray-500">4.8
                    (41,744)</span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">Lorem
                  ipsum
                  ipsum
                  ipsum dolor sit amet consectetur adipisicing
                  elit. Accusantium
                  quia ex ut fuga perferendis!"
                </p>

                <div class="flex justify-between items-center">
                  <!-- Price Section -->
                  <div class="flex items-center space-x-4">
                    <span class="text-3xl font-semibold text-gray-800">$19.99</span>
                    <span class="text-lg text-gray-400 line-through">$79.29</span>
                  </div>

                </div>

                <!-- Coupon Code Section -->

              </div>

            </div>

          </a>
        </div>

      </div>
    </div>
  </section>

  <section class="bg-white lg:p-4  lg:py-20 py-10 ">
    <div class=" container mx-auto lg:px-0 px-4">
      <h2 class="lg:text-3xl text-base font-bold text-black mb-3">Popular on </h2>
      <div class="owl-carousel1  owl-carousel owl-theme">
        <div class="item">
          <a href="/">
            <div
              class="rounded-lg hover:shadow-xl hover:border-[#58af0838] shadow-lg h-full hover:shadow-xl  border bg-white shadow-lg overflow-hidden transition-transform duration-300 "
              data-v0-t="card">
              <!-- Image with Wave Shape -->

              <div class="relative">
                <img alt="Up to 76% Off Custom Holiday Photo Cards" class="w-full h-48 object-cover"
                  src="{{ asset('images/banner.png') }}">



                <!-- Discount Badge -->
                <div class=" w-full flex items-center justify-center text-[#fe8500] text-2xl p-2 font-bold ">
                  <div class=" flex items-center mt-1"> 
                    <img src="{{ asset('images/discount_7939803.png') }}" class="w-8" /> <span
                      class="ml-0.5   text-base text-black">50%
                      OFF</span>
                  </div>
                  <div
                    class=" items-center ml-auto py-0 rounded-md   px-2  ml-auto flex  gap-x-1 text-[#000] font-semibold">
                    <!-- Days -->
                    <span class="text-sm flex mt-1 text-red-400"> <img src="{{ asset('images/clock_4241462.png') }}"
                        class="w-8 h-9 pr-1" /> </span>
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="days">3</span>
                      </div>

                    </div>

                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>
                    <!-- Hours -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="hours">18</span>
                      </div>

                    </div>
                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>

                    <!-- Minutes -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="minutes">43</span>
                      </div>

                    </div>
                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>
                    <!-- Seconds -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="seconds">21</span>
                      </div>

                    </div>
                  </div>
                </div>

              </div>

              <!-- Content Section -->
              <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                <h3 class="text-xl font-semibold leading-tight">
                  Up to 76% Off Custom Holiday Photo Cards
                </h3>

                <div class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Pure White Med Spa, DUBAI </span>
                </div>
                <div class="flex items-center gap-0">
                  <span class="text-yellow-500">★★★★☆</span>
                  <span class="text-sm text-gray-500">4.8
                    (41,744)</span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">Lorem
                  ipsum
                  ipsum
                  ipsum dolor sit amet consectetur adipisicing
                  elit. Accusantium
                  quia ex ut fuga perferendis!"
                </p>

                <div class="flex justify-between items-center">
                  <!-- Price Section -->
                  <div class="flex items-center space-x-4">
                    <span class="text-3xl font-semibold text-gray-800">$19.99</span>
                    <span class="text-lg text-gray-400 line-through">$79.29</span>
                  </div>

                </div>

                <!-- Coupon Code Section -->

              </div>

            </div>

          </a>
        </div>

      </div>
    </div>

   

  </section>

  <section class="bg-[#58af0838] relative lg:py-20 py-10">
    <div class="container mx-auto lg:px-0 px-4">

      <h2 class="lg:text-3xl text-base font-bold text-black mb-3">Popular on </h2>
      <div class="owl-carousel1  owl-carousel owl-theme">
        <div class="item">
          <a href="/">
            <div
              class="rounded-lg hover:shadow-xl hover:border-[#58af0838] shadow-lg h-full hover:shadow-xl  border bg-white shadow-lg overflow-hidden transition-transform duration-300 "
              data-v0-t="card">
              <!-- Image with Wave Shape -->

              <div class="relative">
                <img alt="Up to 76% Off Custom Holiday Photo Cards" class="w-full h-48 object-cover"
                  src="{{ asset('images/banner.png') }}
">  


                <!-- Discount Badge -->
                <div class=" w-full flex items-center justify-center text-[#fe8500] text-2xl p-2 font-bold ">
                  <div class=" flex items-center mt-1"> 
                    <img src="{{ asset('images/discount_7939803.png') }}" class="w-8" /> <span
                      class="ml-0.5   text-base text-black">50%
                      OFF</span>
                  </div>
                  <div
                    class=" items-center ml-auto py-0 rounded-md   px-2  ml-auto flex  gap-x-1 text-[#000] font-semibold">
                    <!-- Days --> 
                    <span class="text-sm flex mt-1 text-red-400"> <img src="{{ asset('images/clock_4241462.png') }}"
                        class="w-8 h-9 pr-1" /> </span>
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="days">3</span>
                      </div>

                    </div>

                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>
                    <!-- Hours -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="hours">18</span>
                      </div>

                    </div>
                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>

                    <!-- Minutes -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="minutes">43</span>
                      </div>

                    </div>
                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>
                    <!-- Seconds -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="seconds">21</span>
                      </div>

                    </div>
                  </div>
                </div>

              </div>

              <!-- Content Section -->
              <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                <h3 class="text-xl font-semibold leading-tight">
                  Up to 76% Off Custom Holiday Photo Cards
                </h3>

                <div class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Pure White Med Spa, DUBAI </span>
                </div>
                <div class="flex items-center gap-0">
                  <span class="text-yellow-500">★★★★☆</span>
                  <span class="text-sm text-gray-500">4.8
                    (41,744)</span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">Lorem
                  ipsum
                  ipsum
                  ipsum dolor sit amet consectetur adipisicing
                  elit. Accusantium
                  quia ex ut fuga perferendis!"
                </p>

                <div class="flex justify-between items-center">
                  <!-- Price Section -->
                  <div class="flex items-center space-x-4">
                    <span class="text-3xl font-semibold text-gray-800">$19.99</span>
                    <span class="text-lg text-gray-400 line-through">$79.29</span>
                  </div>

                </div>

                <!-- Coupon Code Section -->

              </div>

            </div>

          </a>
        </div>

      </div>
    </div>

    <!-- Left and Right Navigation Buttons with Custom Icons -->

  </section>
  <section>
    <div class="container mx-auto px-4 lg:pt-20 py-10 lg:px-0">
      <h2 class="lg:text-3xl text-base font-bold text-black mb-3 text-left">So Many Deals...
        See Them
        All!</h2>
      <div class="owl-carousel1  owl-carousel owl-theme">
        <div class="item">
          <a href="/">
            <div
              class="rounded-lg hover:shadow-xl hover:border-[#58af0838] shadow-lg h-full hover:shadow-xl  border bg-white shadow-lg overflow-hidden transition-transform duration-300 "
              data-v0-t="card">
              <!-- Image with Wave Shape -->

              <div class="relative">
                <img alt="Up to 76% Off Custom Holiday Photo Cards" class="w-full h-48 object-cover"
                  src=" {{ asset('images/banner.png') }}">


                  
                <!-- Discount Badge -->
                <div class=" w-full flex items-center justify-center text-[#fe8500] text-2xl p-2 font-bold ">
                  <div class=" flex items-center mt-1">
                    <img src="{{ asset('images/discount_7939803.png') }}" class="w-8" /> <span
                      class="ml-0.5   text-base text-black">50%
                      OFF</span>
                  </div>
                  <div
                    class=" items-center ml-auto py-0 rounded-md   px-2  ml-auto flex  gap-x-1 text-[#000] font-semibold">
                    <!-- Days --> 
                    <span class="text-sm flex mt-1 text-red-400"> <img src="{{ asset('images/clock_4241462.png') }}"
                        class="w-8 h-9 pr-1" /> </span>
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="days">3</span>
                      </div>

                    </div>

                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>
                    <!-- Hours -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="hours">18</span>
                      </div>

                    </div>
                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>

                    <!-- Minutes -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="minutes">43</span>
                      </div>

                    </div>
                    <div class="flex flex-col items-center text-red-500 text-base text-center">
                      :

                    </div>
                    <!-- Seconds -->
                    <div class="flex flex-col items-center text-center">
                      <div class="">

                        <span class="block text-sm font-semibold mt-1" id="seconds">21</span>
                      </div>

                    </div>
                  </div>
                </div>

              </div>

              <!-- Content Section -->
              <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                <h3 class="text-xl font-semibold leading-tight">
                  Up to 76% Off Custom Holiday Photo Cards
                </h3>

                <div class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>Pure White Med Spa, DUBAI </span>
                </div>
                <div class="flex items-center gap-0">
                  <span class="text-yellow-500">★★★★☆</span>
                  <span class="text-sm text-gray-500">4.8
                    (41,744)</span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">Lorem
                  ipsum
                  ipsum
                  ipsum dolor sit amet consectetur adipisicing
                  elit. Accusantium
                  quia ex ut fuga perferendis!"
                </p>

                <div class="flex justify-between items-center">
                  <!-- Price Section -->
                  <div class="flex items-center space-x-4">
                    <span class="text-3xl font-semibold text-gray-800">$19.99</span>
                    <span class="text-lg text-gray-400 line-through">$79.29</span>
                  </div>

                </div>

                <!-- Coupon Code Section -->

              </div>

            </div>

          </a>
        </div>

      </div>
    </div>

  </section>
  <section class="bg-[#58af0838] text-black  lg:px-0  lg:py-20 py-10 px-4 lg:px-0">
    <div class="container mx-auto">
      <div class=" flex flex-col lg:px-0 px-6 md:flex-row items-center  justify-between">
        <div class="flex items-center lg:gap-8 gap-4">
          <img src="{{ asset('images/help.jpg') }}" alt="Support illustration"
            class="lg:w-48 w-10 rounded-full shadow-md">
          <div>
            <div class="flex items-center gap-2 text-sm mb-2">
              <i class="fas fa-arrow-left"></i>
              <span class="font-semibold">CONTACT US</span>
              <i class="fas fa-arrow-right"></i>
            </div>
            <h1 class="text-xl md:text-2xl font-extrabold leading-tight">24/7
              Expert Hosting Support Our<br>Customers Love</h1>
          </div>
        </div>
        <a href="#"
          class="mt-6 md:mt-0 bg-white text-black lg:px-6 lg:py-3 px-4 py-2 rounded-full lg:text-base text-sm hover:bg-[#4a910954] transition-colors transform shadow-md"
          id="openModalButton">
          TALK TO A SPECIALIST <i class="fas fa-arrow-right ml-2"></i>
        </a>

      </div>
    </div>
  </section>


  <!-- Newsletter Section -->
  <section class=" bg-white container mx-auto lg:px-0 px-4 lg:py-20 py-10">
    <div class="  flex flex-col md:flex-row items-center justify-between gap-8">
      <h2 class="text-3xl text-black lg:text-3xl text-base font-bold text-black font-extrabold">Stay
        Updated
        With Our Latest Newsletter</h2>
      <div class="lg:flex w-full md:w-auto gap-4">
        <input type="email" placeholder="Enter Email"
          class="flex-1 lg:w-80 px-6 py-4 rounded-full border-2 lg:w-auto w-full lg:mb-0 mb-5 focus:outline-none focus:ring-2 focus:ring-cyan-700 bg-white text-black placeholder-gray-500 shadow-md">
        <button
          class="w-full lg:w-auto px-9 py-3 bg-[#58af0838]  text-black font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-300">
          Subscribe Now <i class="fas fa-paper-plane ml-2"></i>
        </button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-[#58af0838] lg:block hidden text-gray-900 py-16 shadow-lg">
    <div class="container mx-auto  px-4 lg:px-0">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
        <!-- Brand Section -->
        <div> 
          <div class="flex items-center gap-2 text-white text-2xl font-bold mb-4">
          <img src="{{ asset('images/NearByVoucherswide.svg') }}" alt="logo" class="w-36 object-fit">
          </div>
          <p class="mb-6">Don't just get there, get there in
            style</p>   
          <div class="space-y-3">
            <div class="flex items-center gap-3">
              <i class="fas fa-location-dot"></i>
              <span>901 Thornridge Cir Shiloh, Hawaii
                81063</span>
            </div>
            <div class="flex items-center gap-3">
              <i class="fas fa-phone"></i>
              <span>(308) 555-0121</span>
            </div>
            <div class="flex items-center gap-3">
              <i class="fas fa-envelope"></i>
              <span>hello@travelwp.com</span>
            </div>
          </div>
        </div>

        <!-- Top Destination -->
        <div>
          <h3 class="text-black text-base lg:text-xl font-bold mb-6">Top
            Destination</h3>
          <ul class="space-y-3 text-sm lg:text-base">
            <li><a href="#" class="hover:text-black transition-colors">Bali</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Bangkok</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Cancun</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Nha
                Trang</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Phuket</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Tokyo</a></li>
            <li><a href="#" class="hover:text-black transition-colors">More
                Destinations</a></li>
          </ul>
        </div>

        <!-- Information -->
        <div>
          <h3 class="text-black text-base lg:text-xl font-bold mb-6">Information</h3>
          <ul class="space-y-3 text-sm lg:text-base">
            <li><a href="#" class="hover:text-black transition-colors">Help
                &
                FAQs</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Careers</a></li>
            <li><a href="#" class="hover:text-black transition-colors">About
                us</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Contact
                us</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Privacy
                policy</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Blogs</a></li>
          </ul>
        </div>

        <!-- Follow Us & Payment -->
        <div>
          <h3 class="text-black text-base lg:text-xl font-bold mb-6">Follow
            Us</h3>
          <div class="flex gap-4 mb-8">
            <a href="#"
              class="bg-[#58af0838] p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-cyan-600 transition-colors">
              <i class="fab fa-facebook-f text-white"></i>
            </a>
            <a href="#"
              class="bg-blue-400 p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-blue-500 transition-colors">
              <i class="fab fa-twitter text-white"></i>
            </a>
            <a href="#"
              class="bg-red-600 p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-red-700 transition-colors">
              <i class="fab fa-youtube text-white"></i>
            </a>
            <a href="#"
              class="bg-pink-600 p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-pink-700 transition-colors">
              <i class="fab fa-instagram text-white"></i>
            </a>
          </div>


          <h3 class="text-black text-base lg:text-xl font-bold mb-6">Payment
            Channels</h3>
          <div class="grid grid-cols-4 gap-4"> 
            <img src="https://img.icons8.com/?size=100&id=34350&format=png&color=000000" alt="Union Pay" class="h-9">
            <img src="https://img.icons8.com/?size=100&id=13608&format=png&color=000000" alt="Visa" class="h-9">
            <img src="https://img.icons8.com/?size=100&id=13610&format=png&color=000000" alt="Mastercard" class="h-9">
            
            <img src="https://img.icons8.com/?size=100&id=13607&format=png&color=000000" alt="American Express" class="h-9">
            <img src="https://img.icons8.com/?size=100&id=63492&format=png&color=000000" alt="Apple Pay" class="h-9">
            <img src="https://img.icons8.com/?size=100&id=am4ltuIYDpQ5&format=png&color=000000" alt="Google Pay" class="h-9">
           
          </div>

          <button
            class="mt-8 border border-gray-700 rounded-lg px-4 py-2 flex items-center gap-2 hover:border-gray-500 transition-colors">
            <i class="fas fa-globe"></i>
            English | USD
          </button>
        </div>
      </div>

      <div class="mt-16 pt-8 border-t border-gray-800 text-center">
        Copyright © 2024 Travel WP. All Rights Reserved.
      </div>
    </div>
  </footer>

  <footer class=" lg:hidden block bg-[#58af0838] text-gray-900 py-16 shadow-lg">
    <div class="container mx-auto lg:px-0 px-4 lg:px-4">
      <div class="grid grid-cols-1 gap-8">
        <!-- Brand Section -->
        <div>
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
            onclick="toggleFooterSection('brand-section')">
            Brand Info
            <i class="fas fa-chevron-down" id="brand-section-icon"></i>
          </button>
          <div id="brand-section" class="hidden"> 
            <div class="flex items-center gap-2 text-white text-2xl font-bold mb-4">
            <img src="{{ asset('images/NearByVoucherswide.svg') }}" alt="logo" class="w-36 object-fit">
            </div>
            <p class="mb-6 text-sm lg:text-base">Don't just get there, get there in style</p>
            <div class="space-y-3 text-sm lg:text-base">
              <div class="flex items-center gap-3">
                <i class="fas fa-location-dot"></i>
                <span>901 Thornridge Cir Shiloh, Hawaii 81063</span>
              </div>
              <div class="flex items-center gap-3">
                <i class="fas fa-phone"></i>
                <span>(308) 555-0121</span>
              </div>
              <div class="flex items-center gap-3">
                <i class="fas fa-envelope"></i>
                <span>hello@travelwp.com</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Top Destination -->
        <div>
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
            onclick="toggleFooterSection('top-destination')">
            Top Destination
            <i class="fas fa-chevron-down" id="top-destination-icon"></i>
          </button>
          <div id="top-destination" class="hidden">
            <ul class="space-y-3 text-sm lg:text-base">
              <li><a href="#" class="hover:text-black transition-colors">Bali</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Bangkok</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Cancun</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Nha Trang</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Phuket</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Tokyo</a></li>
              <li><a href="#" class="hover:text-black transition-colors">More Destinations</a></li>
            </ul>
          </div>
        </div>

        <!-- Information -->
        <div>
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
            onclick="toggleFooterSection('information')">
            Information
            <i class="fas fa-chevron-down" id="information-icon"></i>
          </button>
          <div id="information" class="hidden">
            <ul class="space-y-3 text-sm lg:text-base">
              <li><a href="#" class="hover:text-black transition-colors">Help & FAQs</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Careers</a></li>
              <li><a href="#" class="hover:text-black transition-colors">About us</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Contact us</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Privacy policy</a></li>
              <li><a href="#" class="hover:text-black transition-colors">Blogs</a></li>
            </ul>
          </div>
        </div>

        <!-- Follow Us & Payment -->
        <div>
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
            onclick="toggleFooterSection('follow-payment')">
            Follow Us & Payment
            <i class="fas fa-chevron-down" id="follow-payment-icon"></i>
          </button>
          <div id="follow-payment" class="hidden">
            <div class="flex gap-4 mb-8">
              <a href="#" class="bg-[#58af0838] rounded-full p-2 hover:bg-cyan-600 transition-colors">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="bg-blue-400 p-2 rounded-full hover:bg-blue-500 transition-colors">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="bg-red-600 p-2 rounded-full hover:bg-red-700 transition-colors">
                <i class="fab fa-youtube"></i>
              </a>
              <a href="#" class="bg-pink-600 p-2 rounded-full hover:bg-pink-700 transition-colors">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <h3 class="text-black text-base lg:text-xl font-bold mb-6">Payment Channels</h3>
            <div class="grid grid-cols-4 gap-4">
              <img src="https://via.placeholder.com/50x30" alt="Union Pay" class="h-8">
              <img src="https://via.placeholder.com/50x30" alt="Visa" class="h-8">
              <img src="https://via.placeholder.com/50x30" alt="Mastercard" class="h-8">
              <img src="https://via.placeholder.com/50x30" alt="JCB" class="h-8">
              <img src="https://via.placeholder.com/50x30" alt="American Express" class="h-8">
              <img src="https://via.placeholder.com/50x30" alt="Apple Pay" class="h-8">
              <img src="https://via.placeholder.com/50x30" alt="Google Pay" class="h-8">
              <img src="https://via.placeholder.com/50x30" alt="Alipay" class="h-8">
            </div>
            <button
              class="mt-8 border border-gray-700 rounded-lg px-4 py-2 flex items-center gap-2 hover:border-gray-500 transition-colors">
              <i class="fas fa-globe"></i>
              English | USD
            </button>
          </div>
        </div>
      </div>

      <div class="mt-16 pt-8 border-t border-gray-800 text-center">
        Copyright © 2024 Travel WP. All Rights Reserved.
      </div>
    </div>
  </footer>

  <script>
    function toggleFooterSection(sectionId) {
      const section = document.getElementById(sectionId);
      const icon = document.getElementById(`${sectionId}-icon`);
      if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
      } else {
        section.classList.add('hidden');
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
      }
    }
  </script>

  <style>
    /* Custom Styles for Owl Carousel */
    .owl-carousel {
      position: relative;
    }

    /* Center Left and Right Navigation Buttons */
    .owl-prev,
    .owl-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 50px;


      height: 50px;

      border-radius: 100% !important;
      background-color: #fff !important;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Adjust button positions */
    .owl-prev {
      right: 80px;
      top: -45px;

    }

    .owl-prev,
    .owl-next span {
      font-size: 40px !important;
      line-height: 40px !important;
      color: #000 !important;
    }

    .owl-next {
      right: 10px;
      top: -45px;
    }

    /* Hover effect for buttons */
    .owl-prev:hover,
    .owl-next:hover {
      background-color: #00bcd4;
      /* Cyan */
      color: white;
    }

    /* Custom icon size adjustment */
    .custom-left-icon,
    .custom-right-icon {
      width: 24px !important;
      border-radius: 100%;
      height: 24px !important;
      color: #fff !important;
      background-size: cover;
      display: inline-block;
    }

    /* Custom icons (you can add your own image or SVG) */
    .custom-left-icon {
      background-image: url('path-to-your-left-arrow-icon.svg');
      /* Replace with your custom left icon */
    }

    .owl-carousel .owl-dots.disabled,
    .owl-carousel .owl-nav.disabled {
      display: block;
    }

    .custom-right-icon {
      background-image: url('path-to-your-right-arrow-icon.svg');
      /* Replace with your custom right icon */
    }

    @media (max-width: 768px) {

      .owl-prev,
      .owl-next {
        width: 40px;
        height: 40px;
      }

      .owl-prev {
        right: 60px;


      }

      .owl-prev {
        top: -35px;

      }

      .owl-next {

        top: -35px;
      }

      .owl-prev,
      .owl-next span {
        font-size: 25px !important;
      }
    }
  </style>

  <script>
    $(document).ready(function () {
      $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        margin: 16,
        nav: true,  // Enable navigation
        dots: true, // Enable dots pagination
        autoplay: false,
        autoplayTimeout: 3000,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            nav: true,
            items: 4
          }
        }
      });
    });
    $(document).ready(function () {
      $(".owl-carousel1").owlCarousel({
        items: 1,
        loop: true,
        margin: 16,
        nav: true,  // Enable navigation
        dots: true, // Enable dots pagination
        autoplay: false,
        autoplayTimeout: 3000,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 4,
            nav: true
          }
        }
      });
    });
  </script>

</body>

<script>
  const toggle = document.getElementById("mobile-menu-toggle");
  const menu = document.getElementById("mobile-menu"); // Ensure this matches the id in the HTML
  toggle.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });
</script>

<script>
  const dropdown = document.getElementById("dropdown");

  function showDropdown() {
    dropdown.classList.remove("hidden");
  }

  function toggleDropdown() {
    dropdown.classList.toggle("hidden");
  }

  // Hide dropdown when clicking outside
  document.addEventListener("click", (event) => {
    if (
      !event.target.closest("#dropdown") &&
      !event.target.closest("#search-input") &&
      !event.target.closest("button")
    ) {
      dropdown.classList.add("hidden");
    }
  });
</script>
<!-- Modal Structure -->
<div id="modal"
  class="fixed inset-0 bg-gray-500 bg-opacity-50 z-50 flex items-center justify-center hidden transition-opacity duration-300 ease-in-out">
  <div
    class="bg-[#daedc9]  p-8 rounded-xl shadow-2xl w-full max-w-md mx-auto transform transition-all scale-95 relative">
    <!-- Close Button in Top-Right Corner -->
    <button id="closeModalButton" class="absolute top-3 right-3 text-gray-800 text-xl font-bold focus:outline-none">
      &times;
    </button>

    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Talk to a Specialist</h2>
    <form id="modalForm" class="">
      <!-- Name Field -->
      <div class="mb-5">
        <label for="name" class="block text-sm font-medium text-gray-800">Name</label>
        <input type="text" id="name" name="name"
          class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
          placeholder="Enter your name" required>
      </div>

      <!-- Email Field -->
      <div class="mb-5">
        <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
        <input type="email" id="email" name="email"
          class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
          placeholder="Enter your email" required>
      </div>

      <!-- Phone Number Field -->
      <div class="mb-5">
        <label for="number" class="block text-sm font-medium text-gray-800">Phone Number</label>
        <div class="flex items-center space-x-3">
          <select id="countryCode" name="countryCode"
            class="p-3 border border-transparent rounded-lg bg-white focus:ring-2 focus:ring-blue-400 transition-all">
            <option value="+1">+1 (USA)</option>
            <option value="+44">+44 (UK)</option>
            <option value="+91">+91 (India)</option>
            <!-- Add more country codes as needed -->
          </select>
          <input type="tel" id="phone" name="phone"
            class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
            placeholder="Enter phone number" required>
        </div>
      </div>

      <!-- Message Field -->
      <div class="mb-5">
        <label for="message" class="block text-sm font-medium text-gray-800">Message</label>
        <textarea id="message" name="message"
          class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
          rows="4" placeholder="Your message" required></textarea>
      </div>

      <!-- Buttons -->
      <div class="flex justify-between mt-6">
        <button type="submit"
          class="from-cyan-300 to-blue-300 bg-gradient-to-r w-full text-gray-800 px-6 py-3 rounded-md hover:bg-blue-700 transition-all transform duration-200">Submit</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Get modal and button elements
  const openModalButton = document.getElementById('openModalButton');
  const modal = document.getElementById('modal');
  const closeModalButton = document.getElementById('closeModalButton');

  // Open the modal when the button is clicked
  openModalButton.addEventListener('click', (e) => {
    e.preventDefault();  // Prevent default link behavior
    modal.classList.remove('hidden');  // Show the modal
  });

  // Close the modal when the close button is clicked
  closeModalButton.addEventListener('click', () => {
    modal.classList.add('hidden');  // Hide the modal
  });

  // Optional: Close the modal if user clicks outside the modal content
  window.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.classList.add('hidden');
    }
  });
</script>


</html>