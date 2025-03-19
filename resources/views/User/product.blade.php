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

  <!-- Owl Carousel Stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <!-- Owl Carousel Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
  .to-blue-500 {
    --tw-gradient-to: #3b82f6 var(--tw-gradient-to-position);
  }
  .splide__arrow{
    background: #000 !important;
  }
  .splide__arrow svg{
    fill: #fff !important;
  }
  /* Update the body to use the Poppins font */
  body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
  }

  .from-cyan-500 {
    --tw-gradient-from: #06b6d4 var(--tw-gradient-from-position);
    --tw-gradient-to: rgb(6 182 212 / 0) var(--tw-gradient-to-position);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .bg-gradient-to-r {
    background-image: linear-gradient(to right, var(--tw-gradient-stops));
  }
</style>
<style>
  .swiper-button-next, .swiper-button-prev{
    color: #fff !important;
  }
  [x-cloak] {
    display: none !important;
  }
</style>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
            <a href="/signin.html" class="text-black   duration flex items-center">
              <i class="fas pr-1 text-cyan-900 fa-sign-in-alt"></i>
              Sign In
            </a>
            <a href="/Signup.html" class="text-black   duration flex items-center">
              <i class="fas pr-1 text-cyan-900 fa-user-plus"></i>
              Sign Up
            </a>
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
            <a href="{{ route('home.cart') }}" class="relative hidden md:block">
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
                <a href="/product.html"
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

    <section class="w-full">
      <div class="container mx-auto py-10 px-4 lg:px-0 ">
        <!-- Promo Banner -->
        <div
          class="flex items-center p-4 mb-8 w-auto px-9 py-3 bg-[#58af0838]  text-gray-800 font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
          <i class="fas fa-tag text-2xl mr-3"></i>
          <div>
            <p class="lg:text-2xl text-lg font-semibold">Extra $13.8 off</p>
            <p class="lg:text-base font-medium text-base">
              Promo <span class=" font-semibold text-lg">EARLYBIRD24</span> ends in: 
              <span id="countdown" class="font-medium text-base"></span>
            </p>
          </div>
<script>
// Set the target date for the promo end time
const promoEndDate = new Date("2024-12-31T23:59:59");

// Function to calculate and display the countdown
function updateCountdown() {
  const now = new Date();
  const timeRemaining = promoEndDate - now;

  if (timeRemaining <= 0) {
    document.getElementById("countdown").textContent = "Promo ended!";
    return;
  }

  const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

  // Update the countdown text
  document.getElementById("countdown").textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
}

// Initialize the countdown and set it to update every second
updateCountdown();
setInterval(updateCountdown, 1000);

</script>
        </div>

        <!-- Main Content -->
        <div class="lg:grid md:grid-cols-12 grid-cols-1 relative gap-10">
          <!-- Left Column -->
          <div class="col-span-7">
            <!-- Deal Title -->
            <h1 class="md:text-2xl text-base font-bold text-gray-800 mb-4">
              65 or 90-Minute Foot Reflexology with Aloe Salt, Body Massage,
              and Spa Effervescent Foot Bath (Up To 39% Off)
            </h1>
            <div class="flex items-center gap-6 mb-6">
              <a href="#" class="text-gray-800 text-sm lg:text-base hover:underline font-medium">Foot Smile
                Spa - Chicago</a>
              <div class="flex items-center text-gray-600 gap-2">
                <i class="fas fa-star text-yellow-500"></i>
                <span class="font-semibold">4.6</span>
                <span class="text-xs lg:text-sm">(7,843 reviews)</span>
              </div>
            </div>

            <!-- Tags -->
            <div class="flex gap-1 lg:gap-3 mb-6">
              <span
                class="bg-black text-white px-2 md:px-4 py-2 rounded-full text-xs md:text-sm flex items-center gap-2">
                <i class="fas fa-fire"></i> Black Friday
              </span>
              <span
                class="bg-yellow-100 text-yellow-800 px-2 md:px-4 py-2 rounded-full text-xs md:text-sm flex items-center gap-2">
                <i class="fas fa-star"></i> Best Rated
              </span>
              <span
                class="bg-[#4a910954] text-black px-2 md:px-4 py-2 rounded-full text-xs md:text-sm flex items-center gap-2">
                <i class="fas fa-shopping-cart"></i> 10,000+ Bought
              </span>
            </div>
            <div class="relative overflow-hidden">
              <!-- Include Splide.js CSS and JS -->
              <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
              />
              <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
            
              <!-- Main Image Slider -->
              <section id="main-slider" class="splide" aria-label="Main Image Slider">
                <div class="splide__track">
                  <ul class="splide__list rounded-md">
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Spa Interior"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 1"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 2"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 3"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 4"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 3"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 4"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 3"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Product 4"
                        class="w-full rounded-lg object-cover shadow-md"
                      />
                    </li>
                  </ul>
                </div>
              </section>
            
              <!-- Thumbnail Slider -->
              <section
                id="thumbnail-slider"
                class="splide mt-4"
                aria-label="Thumbnail Slider"
              >
                <div class="splide__track">
                  <ul class="splide__list">
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 1"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 2"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 1"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 2"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 1"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 2"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 3"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 4"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                    <li class="splide__slide rounded-md">
                      <img
                        src="/images/banner.png"
                        alt="Thumbnail 5"
                        class=" object-cover rounded-lg cursor-pointer"
                      />
                    </li>
                  </ul>
                </div>
              </section>
            
              <!-- Splide.js Initialization -->
              <script>
                document.addEventListener("DOMContentLoaded", function () {
                  // Main Slider
                  var mainSlider = new Splide("#main-slider", {
                    type: "fade", // Smooth fade transition
                    heightRatio: 0.5,
                    pagination: false,
                    arrows: true,
                    cover: true,
                  }).mount();
            
                  // Thumbnail Slider
                  var thumbnailSlider = new Splide("#thumbnail-slider", {
                    fixedWidth: 100,
                    fixedHeight: 60,
                    isNavigation: true, // Sync thumbnails to main slider
                    gap: 10,
                    focus: "center",
                    pagination: false,
                    cover: true,
                    arrows: false,
                  }).mount();
            
                  // Sync both sliders
                  mainSlider.sync(thumbnailSlider);
                });
              </script>
            </div>
            
            
            <!-- Include Swiper.js CSS and JS -->
          

            <div class="max-w-4xl mx-auto mt-2 lg:mt-10 bg-white rounded-lg shadow-lg p-3 lg:p-6 space-y-6">
              <!-- Header Section -->
              <div>
                <h1 class="lg:text-2xl text-base font-bold text-gray-800">65 or 90-Minute
                  Foot Reflexology with Aloe</h1>
                <p class="text-gray-600 text-sm lg:text-base">Salt, Body Massage, and Spa
                  Effervescent Foot Bath (Up To 59% Off)</p>
              </div>

              <!-- Tabs Section -->
              <div>

                <div class="flex justify-start space-x-0 bg-gray-50 rounded-lg p-2">
                  <!-- Modern Tabs -->
                  <button id="tab-about" role="tab"
                    class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none "
                    onclick="openTab(event, 'about')">
                    About
                  </button>
                  <button id="tab-fine-print" role="tab"
                    class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none "
                    onclick="openTab(event, 'fine-print')">
                    Fine Print
                  </button>
                  <button id="tab-reviews" role="tab"
                    class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none "
                    onclick="openTab(event, 'reviews')">
                    Reviews
                  </button>
                  <button id="tab-location" role="tab"
                    class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none"
                    onclick="openTab(event, 'location')">
                    Location
                  </button>
                </div>
                <!-- Tab Contents -->
                <div id="about" class="tab-content mt-4">
                  <h3 class="text-lg font-semibold">What We Offer</h3>
                  <ul class="list-disc pl-5 space-y-2 text-sm lg:text-base text-gray-700">
                    <li>65 or 90-minute foot reflexology session</li>
                    <li>Professional massage therapists</li>
                    <li>Relaxing spa environment</li>
                    <li>Complimentary aloe treatment</li>
                  </ul>
                  <h3 class="text-lg font-semibold mt-4">Why You Should Give
                    This Offer</h3>
                  <p class=" text-sm lg:text-base text-gray-600">
                    Experience ultimate relaxation with our comprehensive foot
                    reflexology package. Our skilled therapists combine
                    traditional techniques with modern comfort to provide a
                    truly rejuvenating experience.
                  </p>
                </div>
                <div id="fine-print" class="tab-content hidden mt-4  bg-white">
                  <h3 class="text-xl font-bold text-gray-800 mb-4">Fine
                    Print</h3>
                  <ul class="list-disc text-sm lg:text-base list-inside space-y-2 text-gray-700">
                    <li>
                      <strong class="text-gray-900">Eligibility:</strong> This
                      offer is valid for new customers only.
                    </li>
                    <li>
                      <strong class="text-gray-900">Non-Combining
                        Policy:</strong> Cannot be combined with other
                      promotions or discounts.
                    </li>
                    <li>
                      <strong class="text-gray-900">Booking
                        Requirements:</strong> Advance booking is required to
                      redeem this offer.
                    </li>
                    <li>
                      <strong class="text-gray-900">Usage
                        Restrictions:</strong> Offer is limited to one per
                      customer.
                    </li>
                    <li>
                      <strong class="text-gray-900">Validity Period:</strong>
                      Please check the specific terms for expiry dates.
                    </li>
                  </ul>
                  <div class="mt-6 bg-blue-100 text-blue-800 p-4 rounded-lg">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                    <span>Please read the full terms and conditions carefully
                      before availing of this offer.</span>
                  </div>
                </div>

                <div id="reviews" class="tab-content text-sm lg:text-base hidden mt-4">
                  <div class="space-y-3 mt-4 lg:mt-12 ">
                    <div class="mx-auto ">
                      <div class="flex flex-col md:flex-row items-center justify-between items-start mb-3">
                        <div>
                          <h2 class="text-3xl font-bold text-gray-900">Customer Reviews</h2>
                        </div>
                        <div>
                          <button id="reviewButton" onclick="toggleReviewForm()"
                            class="mt-0 md:mt-0 text-black flex items-center gap-2">
                            <i class="fas fa-plus w-4 h-4"></i> Write a Review
                          </button>
                        </div>
                      </div>

                      <div id="review-form" class="hidden mb-8 p- bg-white">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Add Your Review</h3>
                        <form onsubmit="addReview(event)">
                          <!-- Name Field -->
                          <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                            <input type="text" id="name"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm"
                              placeholder="Enter your name" required>
                          </div>

                          <!-- Rating Field -->
                          <div class="mb-6">
                            <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                            <div class="flex gap-2">
                              <button type="button" onclick="setRating(1)"
                                class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                                <i class="fas fa-star w-6 h-6"></i>
                              </button>
                              <button type="button" onclick="setRating(2)"
                                class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                                <i class="fas fa-star w-6 h-6"></i>
                              </button>
                              <button type="button" onclick="setRating(3)"
                                class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                                <i class="fas fa-star w-6 h-6"></i>
                              </button>
                              <button type="button" onclick="setRating(4)"
                                class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                                <i class="fas fa-star w-6 h-6"></i>
                              </button>
                              <button type="button" onclick="setRating(5)"
                                class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                                <i class="fas fa-star w-6 h-6"></i>
                              </button>
                            </div>
                          </div>

                          <!-- Comment Field -->
                          <div class="mb-6">
                            <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Your
                              Comment</label>
                            <textarea id="comment" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm"
                              placeholder="Write your review here..." required></textarea>
                          </div>

                          <!-- Action Buttons -->
                          <div class="flex justify-end gap-4">
                            <button type="button" onclick="cancelReview()"
                              class="px-6 py-3 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                              Cancel
                            </button>
                            <button type="submit"
                              class="px-6 py-3 bg-[#58af0838] hover:bg-[#4a910954] text-black rounded-lg  transition-colors">
                              Submit Review
                            </button>
                          </div>
                        </form>
                      </div>

                      <div class="flex items-center gap-2 mb-1">
                        <span class="text-3xl font-bold text-gray-900">4.4</span>
                        <div class="flex">
                          <!-- Replace with FontAwesome Stars -->
                          <i class="fas fa-star text-yellow-500"></i>
                          <i class="fas fa-star text-yellow-500"></i>
                          <i class="fas fa-star text-yellow-500"></i>
                          <i class="fas fa-star text-yellow-500"></i>
                          <i class="fas fa-star text-gray-300"></i>
                        </div>
                      </div>
                      <p class="text-sm text-gray-600">based on 5,462 reviews</p>

                      <div class="bg-gray-50 rounded-lg p-4 my-8">
                        <div class="flex items-center gap-2 mb-4">
                          <i class="fas fa-check-circle text-green-600 w-5 h-5"></i>
                          <span class="font-semibold">100% Verified Reviews</span>
                        </div>
                        <p class="text-sm text-gray-600">All reviews are from customers who redeemed deals. Review
                          requests are sent by email to customers who purchased the deal.</p>
                      </div>

                      <div class="mb-8">
                        <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">5 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-[#4a910954] transition-all duration-500"
                              style="width: 72%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">72%</span>
                        </div>
                        <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">4 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-[#4a910954] transition-all duration-500"
                              style="width: 10%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">10%</span>
                        </div>
                        <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">3 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-[#4a910954] transition-all duration-500"
                              style="width: 6%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">6%</span>
                        </div>
                        <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">2 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-[#4a910954] transition-all duration-500"
                              style="width: 4%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">4%</span>
                        </div>
                        <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">1 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-[#4a910954] transition-all duration-500"
                              style="width: 8%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">8%</span>
                        </div>
                      </div>

                      <div class="mb-5">
                        <button onclick="toggleReviews()"
                          class="w-auto px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                          Show Reviews
                        </button>
                      </div>

                      <div id="reviews-list" class="space-y-6 hidden">
                        <!-- Reviews will be dynamically added here -->
                      </div>

                    </div>
                  </div>

                  <script>
                    let reviews = [
                      {
                        id: 1,
                        name: "John Doe",
                        rating: 5,
                        comment: "The best massage experience ever! Highly recommended.",
                        date: "November 20, 2024"
                      },
                      {
                        id: 2,
                        name: "Jane Smith",
                        rating: 4,
                        comment: "A wonderful spa experience. Highly recommend!",
                        date: "November 15, 2024"
                      },
                      {
                        id: 3,
                        name: "Michael Lee",
                        rating: 3,
                        comment: "Good service, but the price is a bit high.",
                        date: "November 10, 2024"
                      }
                    ];

                    let hasReviewed = false;

                    function toggleReviewForm() {
                      const reviewButton = document.getElementById("reviewButton");
                      const reviewForm = document.getElementById("review-form");

                      if (!hasReviewed) {
                        reviewForm.classList.remove("hidden");
                        reviewButton.innerHTML = "<i class='fas fa-edit w-4 h-4'></i> Edit Review";
                        hasReviewed = true;
                      } else {
                        reviewForm.classList.add("hidden");
                        reviewButton.innerHTML = "<i class='fas fa-plus w-4 h-4'></i> Write a Review";
                        hasReviewed = false;
                      }
                    }

                    function setRating(rating) {
                      const stars = document.querySelectorAll('.fa-star');
                      stars.forEach((star, index) => {
                        if (index < rating) {
                          star.classList.add('text-yellow-500');
                          star.classList.remove('text-gray-300');
                        } else {
                          star.classList.remove('text-yellow-500');
                          star.classList.add('text-gray-300');
                        }
                      });
                    }

                    function cancelReview() {
                      const reviewForm = document.getElementById("review-form");
                      reviewForm.classList.add("hidden");
                      hasReviewed = false;
                      document.getElementById("reviewButton").innerHTML = "<i class='fas fa-plus w-4 h-4'></i> Write a Review";
                    }

                    function addReview(event) {
                      event.preventDefault();

                      const name = document.getElementById("name").value;
                      const rating = Array.from(document.querySelectorAll('.fa-star.text-yellow-500')).length;
                      const comment = document.getElementById("comment").value;
                      const reviewDate = new Date().toLocaleDateString();

                      reviews.push({
                        id: reviews.length + 1,
                        name,
                        rating,
                        comment,
                        date: reviewDate
                      });

                      alert("Review added successfully!");
                      cancelReview();
                      displayReviews();
                    }

                    function displayReviews() {
                      const reviewList = document.getElementById("reviews-list");
                      reviewList.innerHTML = "";
                      reviews.forEach(review => {
                        const reviewDiv = document.createElement("div");
                        reviewDiv.classList.add("p-2", "bg-white", "rounded-lg", "border", "border-gray-200", "space-y-4");

                        const reviewHeader = document.createElement("div");
                        reviewHeader.classList.add("flex", "justify-between", "items-center", "mb-4");

                        const reviewerName = document.createElement("span");
                        reviewerName.classList.add("font-semibold", "text-lg", "text-gray-800");
                        reviewerName.textContent = review.name;

                        const reviewDate = document.createElement("span");
                        reviewDate.classList.add("text-sm", "text-gray-500");
                        reviewDate.textContent = review.date;

                        reviewHeader.appendChild(reviewerName);
                        reviewHeader.appendChild(reviewDate);

                        const reviewRating = document.createElement("div");
                        reviewRating.classList.add("flex", "gap-1");

                        for (let i = 0; i < 5; i++) {
                          const starIcon = document.createElement("i");
                          starIcon.classList.add("fas", "fa-star", i < review.rating ? "text-yellow-500" : "text-gray-300");
                          reviewRating.appendChild(starIcon);
                        }

                        const reviewComment = document.createElement("p");
                        reviewComment.classList.add("text-sm", "text-gray-600");
                        reviewComment.textContent = review.comment;

                        reviewDiv.appendChild(reviewHeader);
                        reviewDiv.appendChild(reviewRating);
                        reviewDiv.appendChild(reviewComment);

                        reviewList.appendChild(reviewDiv);
                      });

                      reviewList.classList.remove("hidden");
                    }

                    function toggleReviews() {
                      const reviewsList = document.getElementById("reviews-list");
                      reviewsList.classList.toggle("hidden");
                    }

                    displayReviews();
                  </script>
                </div>


                <div  id="location" class="tab-content hidden text-sm lg:text-base mt-4">
                  <h3 class="text-lg font-semibold text-gray-800 md:text-base text-sm">Our
                    Location</h3>
                  <div class="mt-4   space-y-4">
                    <!-- Address -->
                    <div>
                      <h4 class="font-medium text-gray-900">Address</h4>
                      <p class="text-gray-600">123 Spa Street, Relaxation
                        City, Bliss Country</p>
                    </div>
                    <!-- Map Placeholder -->
                    <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                      <p class="text-gray-500">[Map Placeholder]</p>
                    </div>
                    <!-- Contact Details -->
                    <div class="pb-4">
                      <h4 class="font-medium text-gray-900">Contact Us</h4>
                      <p class="text-gray-600">
                        Phone: <a href="tel:+1234567890" class="text-gray-800 hover:underline">+1 234 567
                          890</a><br>
                        Email: <a href="mailto:info@spaexample.com"
                          class="text-gray-800 hover:underline">info@spaexample.com</a>
                      </p>
                    </div>
                    <!-- Directions Button -->
                    <div class="">
                      <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer"
                        class="w-auto px-9 py-3 bg-[#58af0838]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                        Get Directions
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          
            <script>
              // Function to handle tab switching
              function openTab(event, tabId) {
                // Hide all tab contents
                const tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach((content) => content.classList.add('hidden'));
          
                // Remove active state from all tabs
                const tabs = document.querySelectorAll('[role="tab"]');
                tabs.forEach((tab) =>
                  tab.classList.remove('bg-[#4a910954]', 'rounded-md')
                );
          
                // Show the active tab content
                const activeContent = document.getElementById(tabId);
                if (activeContent) {
                  activeContent.classList.remove('hidden');
                } else {
                  console.error(`Tab content with ID '${tabId}' not found.`);
                }
          
                // Set the active tab
                event?.currentTarget.classList.add('bg-[#4a910954]', 'rounded-md');
              }
          
              // Initialize the default active tab on page load
              document.addEventListener('DOMContentLoaded', () => {
                const defaultTab = document.getElementById('tab-about'); // Default tab ID
                const defaultTabContentId = 'about'; // Default tab content ID
          
                if (defaultTab && document.getElementById(defaultTabContentId)) {
                  defaultTab.classList.add('bg-[#4a910954]', 'rounded-md');
                  document.getElementById(defaultTabContentId).classList.remove('hidden');
                } else {
                  console.error('Default tab or tab content not found.');
                }
              });
            </script>
          </div>

          <!-- Right Column -->
          <div
            class=" lg:mt-0 mt-5 w-full pb-20 col-span-5 sticky top-0  h-[120vh]  bg-[#58af0838] rounded-lg  p-3 lg:p-5 space-y-6">
            <!-- Option Selector -->
           
           
          
            <!-- Options -->
            <div class="space-y-4">
              <h2 class="md:text-2xl text-base font-bold text-gray-800 mb-0">
                Choose a Variant
            </h2>
              <div
              class="rounded-lg border bg-white text-card-foreground shadow-sm w-full overflow-hidden hover:shadow-xl f transition-all duration-300 ease-in-out transform hover:border-cyan-300 hover:ring-2 hover:ring-cyan-600">
              <div class="flex flex-col space-y-2 p-4 pb-2">
                <h3 class="tracking-tight text-base lg:text-2xl font-bold">1NT Family Suite</h3>
                <div class="gap-x-4 flex items-center">
                  <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-bed h-5 w-5 text-gray-800">
                      <path d="M2 4v16"></path>
                      <path d="M2 8h18a2 2 0 0 1 2 2v10"></path>
                      <path d="M2 17h20"></path>
                      <path d="M6 8v9"></path>
                    </svg>
                  </div>
                  <p class="text-sm text-muted-foreground flex items-center gap-2">
                    <span>Two queen beds and one full sofa bed w/ daily water park wristbands for six</span>
                  </p>
                </div>
              </div>
            
              <div class="p-4 pt-0 space-y-3">
                <div class="flex items-center justify-between">
                  <div class="space-y-1">
                    <div class="flex items-center gap-2">
                      <span class="text-sm font-medium text-muted-foreground">From</span>
                      <span class="text-sm line-through text-muted-foreground">$286.09</span>
                      <div
                        class="inline-flex items-center rounded-full border px-2 py-1 text-xs transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 text-green-600 bg-green-100 font-semibold"
                        data-v0-t="badge">-54%</div>
                    </div>
                    <div class="flex items-center gap-2">
                      <span class="text-3xl font-bold text-primary">$131.43</span>
                      <span class="text-sm text-muted-foreground">/night</span>
            
                      <div class="flex items-center space-x-1 bg-white p-0 rounded-xl shadow-lg border border-gray-200">
                        <!-- Decrement Button -->
                        <button
                          type="button"
                          class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-l-md hover:bg-red-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-300"
                          onclick="decrementQty()"
                          aria-label="Decrease Quantity">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                          </svg>
                        </button>
            
                        <!-- Quantity Display -->
                        <input
                          type="number"
                          id="quantity"
                          value="0"
                          min="0"
                          class="w-12 h-8 pl-4 text-center flex justify-center rounded-lg text-lg font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                          aria-label="Quantity" />
            
                        <!-- Increment Button -->
                        <button
                          type="button"
                          class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-r-md hover:bg-green-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-300"
                          onclick="incrementQty()"
                          aria-label="Increase Quantity">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div
                    class="bg-primary text-primary-foreground rounded-full p-2 hover:bg-primary/90 transition-colors duration-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-arrow-right h-6 w-6">
                      <path d="M5 12h14"></path>
                      <path d="m12 5 7 7-7 7"></path>
                    </svg>
                  </div>
                </div>
            
                <div
                  class="text-xs  bg-[#58af0838] rounded-md p-2 text-black flex gap-x-4 items-center rounded-lg p-3">
                  <p class="font-medium">4 interest-free payments of $32.86 with Klarna</p>
                  <p class="text-primary font-semibold">Learn more</p>
                </div>
            
                <div class="flex items-center justify-between text-sm text-muted-foreground">
                  <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-users h-5 w-5 text-gray-800">
                      <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                      <circle cx="9" cy="7" r="4"></circle>
                      <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="font-medium">10,000+ booked</span>
                  </span>
                  <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-calendar h-4 w-4 text-purple-500">
                      <path d="M8 2v4"></path>
                      <path d="M16 2v4"></path>
                      <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                      <path d="M3 10h18"></path>
                    </svg>
                    <span class="font-medium">1 night minimum</span>
                  </span>
                </div>
              </div>
            </div>
            <div
            class="rounded-lg border bg-white text-card-foreground shadow-sm w-full overflow-hidden hover:shadow-xl f transition-all duration-300 ease-in-out transform hover:border-cyan-300 hover:ring-2 hover:ring-cyan-600">
            <div class="flex flex-col space-y-2 p-4 pb-2">
              <h3 class="tracking-tight text-base lg:text-2xl font-bold">1NT Family Suite</h3>
              <div class="gap-x-4 flex items-center">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-bed h-5 w-5 text-gray-800">
                    <path d="M2 4v16"></path>
                    <path d="M2 8h18a2 2 0 0 1 2 2v10"></path>
                    <path d="M2 17h20"></path>
                    <path d="M6 8v9"></path>
                  </svg>
                </div>
                <p class="text-sm text-muted-foreground flex items-center gap-2">
                  <span>Two queen beds and one full sofa bed w/ daily water park wristbands for six</span>
                </p>
              </div>
            </div>
          
            <div class="p-4 pt-0 space-y-3">
              <div class="flex items-center justify-between">
                <div class="space-y-1">
                  <div class="flex items-center gap-2">
                    <span class="text-sm font-medium text-muted-foreground">From</span>
                    <span class="text-sm line-through text-muted-foreground">$286.09</span>
                    <div
                      class="inline-flex items-center rounded-full border px-2 py-1 text-xs transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 text-green-600 bg-green-100 font-semibold"
                      data-v0-t="badge">-54%</div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-3xl font-bold text-primary">$131.43</span>
                    <span class="text-sm text-muted-foreground">/night</span>
          
                    <div class="flex items-center space-x-1 bg-white p-0 rounded-xl shadow-lg border border-gray-200">
                      <!-- Decrement Button -->
                      <button
                        type="button"
                        class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-l-md hover:bg-red-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-300"
                        onclick="decrementQty()"
                        aria-label="Decrease Quantity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>
                      </button>
          
                      <!-- Quantity Display -->
                      <input
                        type="number"
                        id="quantity"
                        value="0"
                        min="0"
                        class="w-12 h-8 pl-4 text-center flex justify-center rounded-lg text-lg font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                        aria-label="Quantity" />
          
                      <!-- Increment Button -->
                      <button
                        type="button"
                        class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-r-md hover:bg-green-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-300"
                        onclick="incrementQty()"
                        aria-label="Increase Quantity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
                <div
                  class="bg-primary text-primary-foreground rounded-full p-2 hover:bg-primary/90 transition-colors duration-200 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-arrow-right h-6 w-6">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                  </svg>
                </div>
              </div>
          
              <div
                class="text-xs  bg-[#58af0838] rounded-md p-2 text-black flex gap-x-4 items-center rounded-lg p-3">
                <p class="font-medium">4 interest-free payments of $32.86 with Klarna</p>
                <p class="text-primary font-semibold">Learn more</p>
              </div>
          
              <div class="flex items-center justify-between text-sm text-muted-foreground">
                <span class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-users h-5 w-5 text-gray-800">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  <span class="font-medium">10,000+ booked</span>
                </span>
                <span class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-calendar h-4 w-4 text-purple-500">
                    <path d="M8 2v4"></path>
                    <path d="M16 2v4"></path>
                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                    <path d="M3 10h18"></path>
                  </svg>
                  <span class="font-medium">1 night minimum</span>
                </span>
              </div>
            </div>
          </div>
          
           
            </div>
            <script>
              // Function to decrement the quantity
              function decrementQty() {
                const quantityInput = document.getElementById('quantity');
                let currentValue = parseInt(quantityInput.value);
            
                if (currentValue > 0) { // Prevent decrementing below zero
                  quantityInput.value = currentValue - 1;
                }
              }
            
              // Function to increment the quantity
              function incrementQty() {
                const quantityInput = document.getElementById('quantity');
                let currentValue = parseInt(quantityInput.value) || 0; // Ensure a valid number
                quantityInput.value = currentValue + 1;
              }
            </script>

            <!-- Continue Button -->
            <button
              class="w-full px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]   text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
              Continue
            </button>
            <button
            class="relative px-6 w-full py-3  bg-[#58af0838] hover:bg-[#4a910954] text-black font-semibold rounded-lg shadow-md  transition-transform transform  duration-300 ease-in-out"
          >
          <i class="fas fa-shopping-cart mr-2"><a href="{{ route('home.cart') }}">Add to Cart</a></i>
          </button>
          </div>
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
   
    
 
    
      
      
</body>

</html>