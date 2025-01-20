<!-- Add this to the bottom of your CSS -->

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

  .w-8 {
    width: 40px !important;
  }



  .from-cyan-500 {
    --tw-gradient-from: #06b6d4 var(--tw-gradient-from-position);
    --tw-gradient-to: rgb(6 182 212 / 0) var(--tw-gradient-to-position);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
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
  </div>
  <style>
    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }
  </style>

  <style>
    .accordion-content {
      display: none;
    }
  </style>

  <div class="lg:hidden bg-[#58af0838]  text-gray-900 p-4">
    <div class="accordion-item mb-3">
      <button
        class="accordion-header flex justify-between items-center w-full py-3 px-4 border-gray-300 border-2 rounded-lg"
        data-tab="personal-info">
        <span>Personal Info</span>
        <i class="fas fa-chevron-down"></i>
      </button>

      <div class="accordion-content mt-4 px-0 pt-2">
        <!-- Title -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-8 flex items-center gap-3">
          <i class="fas fa-user-circle text-blue-500"></i> Profile Information
        </h2>

        <!-- Profile Picture -->
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700 mb-3">
            <i class="fas fa-camera text-black text-base mr-2"></i> Profile Picture
          </label>
          <div class="flex flex-col md:flex-row items-center gap-6">
            <!-- Profile Picture -->
            <div class="relative group w-28 h-28">
              <img src="https://via.placeholder.com/100" alt="Profile Picture"
                class="w-full h-full rounded-full object-cover">
              <div
                class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full">
                <button type="button"
                  class="text-white text-sm px-3 py-2 bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                  <i class="fas fa-camera"></i>
                </button>
              </div>
            </div>

            <!-- Upload Section -->
            <div class="flex flex-col gap-2">
              <label for="profile-upload"
                class="block w-full px-4 py-2 text-sm text-center text-gray-700 border border-dashed border-gray-300 rounded-lg bg-gray-100 hover:bg-gray-200 cursor-pointer">
                <i class="fas fa-upload text-blue-500 mr-2"></i> Drag & Drop or <span
                  class="text-blue-600">Browse</span>
                <input type="file" id="profile-upload" class="hidden">
              </label>
              <p class="text-sm text-black text-base">Supports JPG, PNG. Max size: 2MB.</p>
            </div>
          </div>
        </div>


        <!-- Form Start -->
        <form class="space-y-6" id="personal-info-form">
          <!-- Name Section -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-id-badge text-black text-base mr-2"></i> First Name
              </label>
              <input type="text" id="first-name" name="first-name" value="Vivek"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
              <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-id-card text-black text-base mr-2"></i> Last Name
              </label>
              <input type="text" id="last-name" name="last-name" value="Shakya"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
          </div>

          <!-- Gender and Birthday Section -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-venus-mars text-black text-base mr-2"></i> Gender
              </label>
              <select id="gender" name="gender"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div>
              <label for="birthday" class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-birthday-cake text-black text-base mr-2"></i> Birthday
              </label>
              <input type="date" id="birthday" name="birthday"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
          </div>

          <!-- Contact Section -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-phone-alt text-black text-base mr-2"></i> Phone Number
              </label>
              <input type="tel" id="phone" name="phone" placeholder="+91 1234567890"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fas fa-envelope text-black text-base mr-2"></i> Email Address
              </label>
              <input type="email" id="email" name="email" value="vivekshakya8447@gmail.com" readonly
                class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-600">
            </div>
          </div>
          <div class="mb-4">
            <!-- Label with Icon -->
            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">
              <i class="fas fa-globe text-black text-base mr-2"></i> Country
            </label>

            <!-- Select Input -->
            <div class="relative">
              <select id="country" name="country"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="" disabled selected>Select your country</option>
                <option value="USA">United States</option>
                <option value="UK">United Kingdom</option>
                <option value="India">India</option>
              </select>


            </div>
          </div>
          <!-- Address Section -->
          <div>
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
              <i class="fas fa-map-marker-alt text-black text-base mr-2"></i> Address
            </label>
            <textarea id="address" name="address" rows="3" placeholder="Enter your address"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
          </div>






          <!-- Save Button -->
          <div class="flex justify-end">
            <button type="button" id="save-personal-info"
              class="px-6 py-2 bg-gradient-to-r bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg text-white font-semibold transition-all duration-300 hover:shadow-lg">
              <i class="fas fa-save"></i> Save Changes
            </button>
          </div>
        </form>
      </div>

    </div>
    <div class="accordion-item mb-3">
      <button
        class="accordion-header flex justify-between items-center w-full py-3 px-4 border-gray-300 border-2 rounded-lg"
        data-tab="personal-info">
        <span>My booking </span>
        <i class="fas fa-chevron-down"></i>
      </button>
      <div class="accordion-content mt-4 px-0 pt-2">
        <div class="flex justify-between items-center mb-8">
          <h1 class="text-3xl font-bold text-gray-800">My Bookings</h1>

        </div>

        <div class="flex gap-4 mb-8">
          <input type="text" placeholder="Search by listing name"
            class="flex-1 px-4 py-2 border w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent" />
          <button class="px-6 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition duration-300">
            Search
          </button>
        </div>

        <div class="space-y-6">
          <!-- Booking Item 1 -->


          <!-- Booking Item 2 -->
          <div class="bg-white rounded-xl shadow-lg p-3 transition duration-300 hover:shadow-xl">
            <div class="flex flex-col md:flex-row gap-2">
              <div class="w-full md:w-20">
                <img src="/images/banner.png" alt="West Town 3rd Floor" class="w-full h-20 object-cover rounded-lg" />
              </div>
              <div class="flex-1 w-full">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                  <div class="col-span-3">
                    <h3 class="text-lg font-medium text-gray-800">Booking Request 35426</h3>
                    <p class="text-sm text-gray-600">for West Town 3rd Floor Dorm</p>
                    <div class="flex mt-2 gap-x-4 w-full">
                      <p class="text-xs text-gray-500"><i class="fas fa-dollar-sign mr-2 text-cyan-500"></i>Pay Amount:
                        USD 1,234</p>
                      <p class="text-xs text-gray-500"><i class="fas fa-users mr-2 text-cyan-500"></i>Guests: 1 (1
                        Guest, 0 Children, 0 Infants)</p>
                    </div>
                  </div>
                  <div>
                    <span
                      class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                      <i class="fas fa-exclamation-circle mr-2"></i> Invoice Posted
                    </span>
                  </div>
                  <div class="text-sm text-gray-600">
                    <p><i class="fas fa-calendar-alt mr-2 text-cyan-500"></i><strong>date</strong> 16/12/21 </p>

                  </div>
                </div>
                <div class="mt-4 flex gap-2">
                  <button
                    class="px-4 py-2 text-sm bg-cyan-100 text-cyan-700 rounded-lg hover:bg-cyan-200 transition duration-300">Create
                    Invoice</button>
                  <button
                    class="px-4 py-2 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition duration-300">Reject
                    Booking</button>
                  <button
                    class="px-4 py-2 text-sm bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition duration-300">Send
                    Reminder Email</button>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="accordion-item mb-3">
      <button
        class="accordion-header flex justify-between items-center w-full py-3 px-4 border-gray-300 border-2 rounded-lg"
        data-tab="change-password">
        <span>Change Password</span>
        <i class="fas fa-chevron-down"></i>
      </button>
      <div class="accordion-content px-0 mt-4 pt-2">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
          <i class="fas fa-lock text-blue-500 mr-2"></i> Change Password
        </h2>
        <form class="space-y-6" id="change-password-form">
          <!-- Current Password -->
          <div>
            <label for="current-password" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-key text-gray-400 mr-2"></i> Current Password
            </label>
            <div class="relative">
              <input type="password" id="current-password" name="current-password" placeholder="Enter current password"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <button type="button"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700 toggle-password">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <!-- New Password -->
          <div>
            <label for="new-password" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-shield-alt text-gray-400 mr-2"></i> New Password
            </label>
            <div class="relative">
              <input type="password" id="new-password" name="new-password" placeholder="Enter new password"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <button type="button"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700 toggle-password">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <!-- Confirm New Password -->
          <div>
            <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-check-circle text-gray-400 mr-2"></i> Confirm New Password
            </label>
            <div class="relative">
              <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter new password"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <button type="button"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700 toggle-password">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="flex justify-end mt-4">
            <button type="button" id="change-password-btn"
              class="px-6 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition duration-300">
              <i class="fas fa-save mr-2"></i> Change Password
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="accordion-item mb-3">
      <button
        class="accordion-header flex justify-between items-center w-full py-3 px-4 border-gray-300 border-2 rounded-lg"
        data-tab="payment-method">
        <span>Payment Method</span>
        <i class="fas fa-chevron-down"></i>
      </button>
      <div class="accordion-content px-0 mt-4 pt-2">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
          <i class="fas fa-credit-card text-blue-500 mr-2"></i> Payment Method
        </h2>
        <p class="text-gray-600 mb-8">Select your preferred payment method and fill in the required details below.</p>

        <!-- Payment Options -->
        <div id="payment-options" class="space-y-6">
          <!-- Credit/Debit Card -->
          <div data-method="credit-card"
            class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
            <i class="fas fa-wallet text-blue-500 text-2xl"></i>
            <div>
              <h3 class="text-lg font-semibold text-gray-700">Credit/Debit Card</h3>
              <p class="text-sm text-gray-500">Pay securely using your credit or debit card.</p>
            </div>
          </div>
          <!-- Bank Transfer -->
          <div data-method="bank-transfer"
            class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
            <i class="fas fa-university text-blue-500 text-2xl"></i>
            <div>
              <h3 class="text-lg font-semibold text-gray-700">Bank Transfer</h3>
              <p class="text-sm text-gray-500">Directly transfer funds from your bank account.</p>
            </div>
          </div>
          <!-- PayPal -->
          <div data-method="paypal"
            class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
            <i class="fab fa-paypal text-blue-500 text-2xl"></i>
            <div>
              <h3 class="text-lg font-semibold text-gray-700">PayPal</h3>
              <p class="text-sm text-gray-500">Use your PayPal account for a quick checkout.</p>
            </div>
          </div>
        </div>

        <!-- Dynamic Inputs -->
        <div id="payment-details" class="mt-8 hidden">
          <!-- Credit/Debit Card Details -->
          <div id="credit-card-details" class="hidden">
            <h3 class="font-semibold text-gray-700 mb-4">Credit/Debit Card Details</h3>
            <div class="space-y-4">
              <input type="text" placeholder="Card Number"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
              <div class="grid grid-cols-2 gap-4">
                <input type="text" placeholder="Expiry Date (MM/YY)"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <input type="text" placeholder="CVV"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
              </div>
              <!-- Save Card Details Checkbox -->
              <div class="flex items-center">
                <input type="checkbox" id="save-card"
                  class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="save-card" class="ml-2 text-gray-700">Save card details for future payments</label>
              </div>
            </div>
          </div>
          <!-- Bank Transfer Details -->
          <div id="bank-transfer-details" class="hidden">
            <h3 class="font-semibold text-gray-700 mb-4">Bank Transfer Details</h3>
            <div class="space-y-4">
              <input type="text" placeholder="Account Number"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
              <input type="text" placeholder="Bank Name"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
          </div>
          <!-- PayPal Details -->
          <div id="paypal-details" class="hidden">
            <h3 class="font-semibold text-gray-700 mb-4">PayPal Details</h3>
            <input type="email" placeholder="PayPal Email"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
          </div>
        </div>

        <!-- Action Button -->
        <div id="continue-button" class="mt-8 hidden">
          <button
            class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition-all">
            Continue to Payment
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const accordionHeaders = document.querySelectorAll('.accordion-header');

      accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
          const content = header.nextElementSibling;
          const icon = header.querySelector('i');

          // Toggle visibility
          if (content.style.display === 'block') {
            content.style.display = 'none';
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
          } else {
            // Close other accordions
            document.querySelectorAll('.accordion-content').forEach(item => {
              item.style.display = 'none';
            });
            document.querySelectorAll('.accordion-header i').forEach(icon => {
              icon.classList.remove('fa-chevron-up');
              icon.classList.add('fa-chevron-down');
            });

            content.style.display = 'block';
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
          }
        });
      });
    });
  </script>



  <div class="]   text-gray-900 border-b-2 border-[#58af0838]">
    <div class="container mx-auto   ">
      <div class="lg:flex flex-col lg:flex-row  hidden">
        <div class="lg:w-1/4 py-8 px-4 lg:px-10  bg-[#58af0838]">
          <h1 class="text-2xl font-bold mb-6">My Account</h1>
          <nav class="space-y-1" id="sidebar">
            <button data-tab="personal-info"
              class="flex items-center space-x-3 px-4 py-3 w-full text-left rounded-lg bg-gray-100 text-gray-900">
              <i class="fas fa-user"></i>
              <span>Personal info</span>
            </button>
            <button data-tab="booking"
              class="flex items-center space-x-3 px-4 py-3 w-full text-left rounded-lg  text-gray-900">
              <i class="fas fa-user"></i>
              <span>My Booking</span>
            </button>
            <button data-tab="change-password"
              class="flex items-center space-x-3 px-4 py-3 w-full text-left rounded-lg text-gray-700 hover:bg-gray-50">
              <i class="fas fa-lock"></i>
              <span>Change password</span>
            </button>
  
            <button data-tab="payment-method"
              class="flex items-center space-x-3 px-4 py-3 w-full text-left rounded-lg text-gray-700 hover:bg-gray-50">
              <i class="fas fa-credit-card"></i>
              <span>Payment method</span>
            </button>
          </nav>
        </div>
  
        <div class="lg:w-3/4 bg-white">
          <div id="tab-content">
            <div id="personal-info" class="tab-content active py-10 lg:py-8  px-4 lg:p-8 max-w-4xl mx-auto">
              <!-- Title -->
              <h2 class="text-2xl font-semibold text-gray-800 mb-8 flex items-center gap-3">
                <i class="fas fa-user-circle text-blue-500"></i> Profile Information
              </h2>
  
              <!-- Profile Picture -->
              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-3">
                  <i class="fas fa-camera text-black text-base mr-2"></i> Profile Picture
                </label>
                <div class="flex flex-col md:flex-row items-center gap-6">
                  <!-- Profile Picture -->
                  <div class="relative group w-28 h-28">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture"
                      class="w-full h-full rounded-full object-cover">
                    <div
                      class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full">
                      <button type="button"
                        class="text-white text-sm px-3 py-2 bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="fas fa-camera"></i>
                      </button>
                    </div>
                  </div>
  
                  <!-- Upload Section -->
                  <div class="flex flex-col gap-2">
                    <label for="profile-upload"
                      class="block w-full px-4 py-2 text-sm text-center text-gray-700 border border-dashed border-gray-300 rounded-lg bg-gray-100 hover:bg-gray-200 cursor-pointer">
                      <i class="fas fa-upload text-blue-500 mr-2"></i> Drag & Drop or <span
                        class="text-blue-600">Browse</span>
                      <input type="file" id="profile-upload" class="hidden">
                    </label>
                    <p class="text-sm text-black text-base">Supports JPG, PNG. Max size: 2MB.</p>
                  </div>
                </div>
              </div>
  
  
              <!-- Form Start -->
              <form class="space-y-6" id="personal-info-form">
                <!-- Name Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-id-badge text-black text-base mr-2"></i> First Name
                    </label>
                    <input type="text" id="first-name" name="first-name" value="Vivek"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  </div>
                  <div>
                    <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-id-card text-black text-base mr-2"></i> Last Name
                    </label>
                    <input type="text" id="last-name" name="last-name" value="Shakya"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  </div>
                </div>
  
                <!-- Gender and Birthday Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-venus-mars text-black text-base mr-2"></i> Gender
                    </label>
                    <select id="gender" name="gender"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                      <option value="">Select your gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                  <div>
                    <label for="birthday" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-birthday-cake text-black text-base mr-2"></i> Birthday
                    </label>
                    <input type="date" id="birthday" name="birthday"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  </div>
                </div>
  
                <!-- Contact Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-phone-alt text-black text-base mr-2"></i> Phone Number
                    </label>
                    <input type="tel" id="phone" name="phone" placeholder="+91 1234567890"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  </div>
                  <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-envelope text-black text-base mr-2"></i> Email Address
                    </label>
                    <input type="email" id="email" name="email" value="vivekshakya8447@gmail.com" readonly
                      class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-600">
                  </div>
                </div>
                <div class="mb-4">
                  <!-- Label with Icon -->
                  <label for="country" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-globe text-black text-base mr-2"></i> Country
                  </label>
  
                  <!-- Select Input -->
                  <div class="relative">
                    <select id="country" name="country"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                      <option value="" disabled selected>Select your country</option>
                      <option value="USA">United States</option>
                      <option value="UK">United Kingdom</option>
                      <option value="India">India</option>
                    </select>
  
  
                  </div>
                </div>
                <!-- Address Section -->
                <div>
                  <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-map-marker-alt text-black text-base mr-2"></i> Address
                  </label>
                  <textarea id="address" name="address" rows="3" placeholder="Enter your address"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
  
  
  
  
  
  
                <!-- Save Button -->
                <div class="flex justify-end">
                  <button type="button" id="save-personal-info"
                    class="px-6 py-2 bg-[#58af0838] hover:bg-[#58af0838] rounded-lg text-white font-semibold transition-all duration-300 hover:shadow-lg">
                    <i class="fas fa-save"></i> Save Changes
                  </button>
                </div>
              </form>
            </div>
  
  
  
            <div id="change-password" class="tab-content  max-w-4xl mx-auto p-8">
              <h2 class="text-2xl font-bold text-gray-800 mb-6">
                <i class="fas fa-lock text-blue-500 mr-2"></i> Change Password
              </h2>
              <form class="space-y-6" id="change-password-form">
                <!-- Current Password -->
                <div>
                  <label for="current-password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-key text-gray-400 mr-2"></i> Current Password
                  </label>
                  <div class="relative">
                    <input type="password" id="current-password" name="current-password"
                      placeholder="Enter current password"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="button"
                      class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700 toggle-password">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
  
                <!-- New Password -->
                <div>
                  <label for="new-password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-shield-alt text-gray-400 mr-2"></i> New Password
                  </label>
                  <div class="relative">
                    <input type="password" id="new-password" name="new-password" placeholder="Enter new password"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="button"
                      class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700 toggle-password">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
  
                <!-- Confirm New Password -->
                <div>
                  <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-check-circle text-gray-400 mr-2"></i> Confirm New Password
                  </label>
                  <div class="relative">
                    <input type="password" id="confirm-password" name="confirm-password"
                      placeholder="Re-enter new password"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="button"
                      class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700 toggle-password">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
  
                <!-- Submit Button -->
                <div class="flex justify-end mt-4">
                  <button type="button" id="change-password-btn"
                    class="px-6 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition duration-300">
                    <i class="fas fa-save mr-2"></i> Change Password
                  </button>
                </div>
              </form>
            </div>
  
            <div id="booking" class="tab-content  max-w-4xl mx-auto p-8">
              <div class="">
                <div class="flex justify-between items-center mb-8">
                  <h1 class="text-3xl font-bold text-gray-800">My Bookings</h1>
  
                </div>
  
                <div class="flex gap-4 mb-8">
                  <input type="text" placeholder="Search by listing name"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent" />
                  <button class="px-6 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition duration-300">
                    Search
                  </button>
                </div>
                <div class="flex items-center mb-3 space-x-4">
                  <!-- Inactive Radio Button -->
                  <label class="flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                      <input type="radio" name="status" class="hidden"  />
                      <span class="w-6 h-6 flex items-center justify-center border-2 border-cyan-500 bg-cyan-500 text-white rounded-full">
                        <i class="fas fa-check-circle"></i>
                      </span>
                      <span class="text-gray-700">All</span>
                    </label>
                    <input type="radio" name="status" class="hidden"checked />
                    <span class="w-6 h-6 flex items-center justify-center border-2 border-gray-400 rounded-full text-gray-400">
                      <i class="fas fa-circle"></i>
                    </span>
                    <span class="text-gray-700">Active</span>
                  </label>
                
                  <label class="flex items-center space-x-2">
                    <input type="radio" name="status" class="hidden" />
                    <span class="w-6 h-6 flex items-center justify-center border-2 border-gray-400 rounded-full text-gray-400">
                      <i class="fas fa-circle"></i>
                    </span>
                    <span class="text-gray-700">Inactive</span>
                  </label>
                 
                
                  <!-- Active Radio Button -->
                
                </div>
                
                <div class="space-y-6">
                  <!-- Booking Item 1 -->
                  <div class="border  relative border-cyan-400 rounded-xl shadow-xs p-3 transition duration-300">
                    <div class="flex gap-x-3 items-center mb-2">
                      <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                        <i class="fas fa-exclamation-circle mr-2"></i> Invoice
                      </span>
                      <div class="text-sm col-span-2  text-gray-600">
                        <p><i class="fas fa-calendar-alt mr-2 text-cyan-500"></i><strong>date</strong> 16/12/21</p>
                      </div>
                    </div>
                   
                    <div class="flex flex-col md:flex-row gap-4">
                      
                      <div class="w-full md:w-20">
                        <img src="/images/banner.png" alt="West Town 3rd Floor" class="w-full h-20 object-cover rounded-lg" />
                      </div>
                      <div class=" w-full">
                        <div class="grid grid-cols-1 items-center md:grid-cols-3 gap-4">
                          <div class="col-span-2">
                            <h3 class="text-lg font-medium text-gray-800">Booking Request 35426</h3>
                            <p class="text-sm text-gray-600">for West Town 3rd Floor Dorm</p>
  
                            
                          </div>
                         
                           <div class="flex flex-col items-end top-2 right-4 absolute justify-end gap-3 mt-2 md:mt-0">
                        <img src="/images/US-UK_Add_to_Apple_Wallet_RGB_101421.svg" class="w-28">
  
  
                      </div>
                        </div>
                        <div class="w-full justify-between flex gap-x-3">
                          <div class="w-full">
                            <p class="mb-1 text-xs text-gray-500"><i
                                class="fas fa-dollar-sign  mr-2 text-cyan-500"></i>Pay Amount: USD 1,234</p>
                            <p class="text-xs text-gray-500"><i class="fas fa-users  mr-2 text-cyan-500"></i>Guests: 1
                              (1 Guest, 0 Children, 0 Infants)</p>
                          </div>
                          <div class="flex w-full justify-end gap-x-3">
                            <div class="mt-0 flex gap-2 justify-end">
                              <button
                              class="px-2 py-2 text-xs bg-cyan-100 text-cyan-700 rounded-lg hover:bg-cyan-200 transition duration-300 flex items-center">
                              <i class="fas fa-envelope mr-1"></i> Resend Email
                            </button>
                            
                              <button
                                class="px-2 py-2 text-xs bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition duration-300 flex items-center">
                                <i class="fas fa-times-circle mr-1"></i> cancel Booking
                              </button>
                              <button
                                class="px-2 py-2 text-xs bg-green-100 text-black rounded-lg hover:bg-green-200 transition duration-300 flex items-center">
                                <i class="fas fa-download  text-sm mr-1 "> </i> Download
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Right side icons -->
                     
  
                    </div>
  
                  </div>
  
  
                  <!-- Booking Item 2 -->
  
  
  
  
  
                </div>
              </div>
  
  
  
            </div>
  
  
  
            <div id="payment-method" class="tab-content max-w-4xl mx-auto p-8">
              <h2 class="text-2xl font-bold text-gray-800 mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                  <i class="fas fa-credit-card text-blue-500 mr-2"></i> Payment Method
                </h2>
                <p class="text-gray-600 mb-8">Select your preferred payment method and fill in the required details below.
                </p>
  
                <!-- Saved Cards Section -->
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Saved Cards</h3>
                <div id="saved-cards" class="space-y-4">
                  <!-- Saved Card 1 -->
  
                  <!-- Saved Card 2 -->
                  <div
                    class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <input type="radio" id="card2" name="saved-card" class="w-5 h-5 text-blue-500 cursor-pointer">
                    <label for="card2" class="flex flex-grow items-center gap-4 cursor-pointer">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg"
                        alt="Mastercard" class="w-12 h-auto">
                      <div class="flex-grow">
                        <h3 class="text-lg font-semibold text-gray-700">**** **** **** 2345</h3>
                        <p class="text-sm text-gray-500">Mastercard</p>
                      </div>
                    </label>
                  </div>
                  <!-- Saved Card 3 -->
                  <div
                    class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <input type="radio" id="card3" name="saved-card" class="w-5 h-5 text-blue-500 cursor-pointer">
                    <label for="card3" class="flex flex-grow items-center gap-4 cursor-pointer">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg" alt="Visa"
                        class="w-12 h-auto">
                      <div class="flex-grow">
                        <h3 class="text-lg font-semibold text-gray-700">**** **** **** 6789</h3>
                        <p class="text-sm text-gray-500">Visa</p>
                      </div>
                    </label>
                  </div>
                </div>
  
                <!-- Payment Options -->
                <h3 class="text-lg font-semibold text-gray-700 mt-8 mb-4">Other Payment Methods</h3>
  
  
  
                <!-- Payment Options -->
                <div id="payment-options" class="space-y-6">
                  <!-- Credit/Debit Card -->
                  <div data-method="credit-card"
                    class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                    <i class="fas fa-wallet text-blue-500 text-2xl"></i>
                    <div>
                      <h3 class="text-lg font-semibold text-gray-700">Credit/Debit Card</h3>
                      <p class="text-sm text-gray-500">Pay securely using your credit or debit card.</p>
                    </div>
                  </div>
                  <!-- Bank Transfer -->
                  <div data-method="bank-transfer"
                    class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                    <i class="fas fa-university text-blue-500 text-2xl"></i>
                    <div>
                      <h3 class="text-lg font-semibold text-gray-700">Bank Transfer</h3>
                      <p class="text-sm text-gray-500">Directly transfer funds from your bank account.</p>
                    </div>
                  </div>
                  <!-- PayPal -->
                  <div data-method="paypal"
                    class="flex items-center gap-4 bg-gray-50 border border-gray-300 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                    <i class="fab fa-paypal text-blue-500 text-2xl"></i>
                    <div>
                      <h3 class="text-lg font-semibold text-gray-700">PayPal</h3>
                      <p class="text-sm text-gray-500">Use your PayPal account for a quick checkout.</p>
                    </div>
                  </div>
                </div>
  
                <!-- Dynamic Inputs -->
                <div id="payment-details" class="mt-8 hidden">
                  <!-- Credit/Debit Card Details -->
                  <div id="credit-card-details" class="hidden">
                    <h3 class="font-semibold text-gray-700 mb-4">Credit/Debit Card Details</h3>
                    <div class="space-y-4">
                      <input type="text" placeholder="Card Number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                      <div class="grid grid-cols-2 gap-4">
                        <input type="text" placeholder="Expiry Date (MM/YY)"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <input type="text" placeholder="CVV"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                      </div>
                      <!-- Save Card Details Checkbox -->
                      <div class="flex items-center">
                        <input type="checkbox" id="save-card"
                          class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="save-card" class="ml-2 text-gray-700">Save card details for future payments</label>
                      </div>
                    </div>
                  </div>
                  <!-- Bank Transfer Details -->
                  <div id="bank-transfer-details" class="hidden">
                    <h3 class="font-semibold text-gray-700 mb-4">Bank Transfer Details</h3>
                    <div class="space-y-4">
                      <input type="text" placeholder="Account Number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                      <input type="text" placeholder="Bank Name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                  </div>
                  <!-- PayPal Details -->
                  <div id="paypal-details" class="hidden">
                    <h3 class="font-semibold text-gray-700 mb-4">PayPal Details</h3>
                    <input type="email" placeholder="PayPal Email"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                  </div>
                </div>
  
                <!-- Action Button -->
                <div id="continue-button" class="mt-8 hidden">
                  <button
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition-all">
                    Continue to Payment
                  </button>
                </div>
            </div>
  
            <script>
              const paymentOptions = document.querySelectorAll("#payment-options > div");
              const paymentDetails = document.getElementById("payment-details");
              const continueButton = document.getElementById("continue-button");
              const saveCardCheckbox = document.getElementById("save-card");
  
              // Handle payment option selection
              paymentOptions.forEach((option) => {
                option.addEventListener("click", () => {
                  // Reset active state
                  paymentOptions.forEach((opt) => opt.classList.remove("ring-2", "ring-blue-500"));
                  option.classList.add("ring-2", "ring-blue-500");
  
                  // Hide all details
                  document.querySelectorAll("#payment-details > div").forEach((detail) => detail.classList.add("hidden"));
  
                  // Show relevant details
                  const method = option.getAttribute("data-method");
                  document.getElementById(`${method}-details`).classList.remove("hidden");
  
                  // Display the payment details section and continue button
                  paymentDetails.classList.remove("hidden");
                  continueButton.classList.remove("hidden");
                });
              });
  
              // Handle save card checkbox
              saveCardCheckbox?.addEventListener("change", () => {
                if (saveCardCheckbox.checked) {
                  console.log("Card details will be saved for future payments.");
                  // Store preference securely or call an API to save this setting
                  localStorage.setItem("saveCardDetails", true);
                } else {
                  console.log("Card details will not be saved.");
                  localStorage.setItem("saveCardDetails", false);
                }
              });
            </script>
  
  
          </div>
        </div>
      </div>
  
    </div>
  </div>

  <script>
    // Tab switching functionality
    const tabButtons = document.querySelectorAll('#sidebar button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        const tabId = button.getAttribute('data-tab');

        tabButtons.forEach(btn => btn.classList.remove('bg-gray-100', 'text-gray-900'));
        tabContents.forEach(content => content.classList.remove('active'));

        button.classList.add('bg-gray-100', 'text-gray-900');
        document.getElementById(tabId).classList.add('active');
      });
    });

    // Personal info saving
    document.getElementById('save-personal-info').addEventListener('click', () => {
      const firstName = document.getElementById('first-name').value;
      const lastName = document.getElementById('last-name').value;
      const gender = document.getElementById('gender').value;
      const birthday = document.getElementById('birthday').value;
      alert(`Saved: ${firstName} ${lastName}, Gender: ${gender}, Birthday: ${birthday}`);
    });

    // Password change functionality
    document.getElementById('change-password-btn').addEventListener('click', () => {
      const currentPassword = document.getElementById('current-password').value;
      const newPassword = document.getElementById('new-password').value;
      const confirmPassword = document.getElementById('confirm-password').value;

      if (newPassword !== confirmPassword) {
        alert("New passwords don't match!");
        return;
      }

      if (newPassword.length < 8) {
        alert("New password must be at least 8 characters long!");
        return;
      }

      alert("Password changed successfully!");
      document.getElementById('change-password-form').reset();
    });

    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
      button.addEventListener('click', function () {
        const input = this.closest('div').querySelector('input');
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
      });
    });

    // Address management
    let addresses = [
      { id: 1, name: "Home", street: "123 Main St", city: "Anytown", state: "CA", zip: "12345" },
      { id: 2, name: "Work", street: "456 Office Blvd", city: "Workville", state: "NY", zip: "67890" }
    ];

    function renderAddresses() {
      const addressList = document.getElementById('address-list');
      addressList.innerHTML = '';
      addresses.forEach(address => {
        const addressElement = document.createElement('div');
        addressElement.className = 'bg-gray-50 p-4 rounded-lg';
        addressElement.innerHTML = `
                    <h3 class="font-semibold">${address.name}</h3>
                    <p>${address.street}</p>
                    <p>${address.city}, ${address.state} ${address.zip}</p>
                    <button class="text-red-600 hover:text-red-800 text-sm mt-2" onclick="removeAddress(${address.id})">
                        Remove
                    </button>
                `;
        addressList.appendChild(addressElement);
      });
    }

    function removeAddress(id) {
      addresses = addresses.filter(address => address.id !== id);
      renderAddresses();
    }

    document.getElementById('add-address-btn').addEventListener('click', () => {
      document.getElementById('add-address-form').classList.remove('hidden');
      document.getElementById('add-address-btn').classList.add('hidden');
    });

    document.getElementById('cancel-add-address').addEventListener('click', () => {
      document.getElementById('add-address-form').classList.add('hidden');
      document.getElementById('add-address-btn').classList.remove('hidden');
    });

    document.getElementById('save-address').addEventListener('click', () => {
      const name = document.getElementById('address-name').value;
      const street = document.getElementById('street').value;
      const city = document.getElementById('city').value;
      const state = document.getElementById('state').value;
      const zip = document.getElementById('zip').value;

      if (!name || !street || !city || !state || !zip) {
        alert('Please fill in all fields');
        return;
      }

      const newId = addresses.length > 0 ? Math.max(...addresses.map(a => a.id)) + 1 : 1;
      addresses.push({ id: newId, name, street, city, state, zip });
      renderAddresses();

      document.getElementById('add-address-form').classList.add('hidden');
      document.getElementById('add-address-btn').classList.remove('hidden');
      document.getElementById('add-address-form').reset();
    });

    // Initial render of addresses
    renderAddresses();
  </script>

  <!-- Footer -->
  <footer class="bg-[#58af0838] lg:block hidden text-gray-900 py-16 shadow-lg">
    <div class="container mx-auto  px-4 lg:px-0">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
        <!-- Brand Section -->
        <div>
          <div class="flex items-center gap-2 text-white text-2xl font-bold mb-4">
            <img src="/images/NearByVoucherswide.svg" alt="logo" class="w-40">
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
              <a href="#" class="bg-[#58af0838] p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-cyan-600 transition-colors">
                <i class="fab fa-facebook-f text-white"></i>
              </a>
              <a href="#" class="bg-blue-400 p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-blue-500 transition-colors">
                <i class="fab fa-twitter text-white"></i>
              </a>
              <a href="#" class="bg-red-600 p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-red-700 transition-colors">
                <i class="fab fa-youtube text-white"></i>
              </a>
              <a href="#" class="bg-pink-600 p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-pink-700 transition-colors">
                <i class="fab fa-instagram text-white"></i>
              </a>
            </div>
            

          <h3 class="text-black text-base lg:text-xl font-bold mb-6">Payment
            Channels</h3>
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
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold" onclick="toggleFooterSection('brand-section')">
            Brand Info
            <i class="fas fa-chevron-down" id="brand-section-icon"></i>
          </button>
          <div id="brand-section" class="hidden">
            <div class="flex items-center gap-2 text-white text-2xl font-bold mb-4">
              <img src="/images/NearByVoucherswide.svg" alt="logo" class="w-40">
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
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold" onclick="toggleFooterSection('top-destination')">
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
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold" onclick="toggleFooterSection('information')">
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
          <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold" onclick="toggleFooterSection('follow-payment')">
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
            <button class="mt-8 border border-gray-700 rounded-lg px-4 py-2 flex items-center gap-2 hover:border-gray-500 transition-colors">
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