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
      <header  id="header" class="shadow-sm  z-50">
        
  
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
  <div class="w-full container mx-auto px-4 lg:py-10 py-10">
    <h1 class="lg:text-3xl text-lg font-bold mt-5 mb-2 lg:my-8 text-gray-800 flex items-center">
      <i class="fas fa-shopping-cart mr-2"></i>
      Shopping Cart
    </h1>
  
    <div class="grid gap-6 md:grid-cols-[2fr_1fr]">
      <!-- Product List -->
      <div class="space-y-6">
        <!-- Product 1 -->
        @foreach($cartItems as $item)
    @php
        $product = $item->varient?->checkout;
    @endphp

    @if ($product)
    <div class="border rounded-lg relative overflow-hidden shadow-lg">
        <div class="p-3">
            <div class="md:flex gap-3 md:space-y-0 space-y-4">
                <div class="relative md:w-28 w-full h-[200px] md:h-28 max-h-[300px] rounded-lg overflow-hidden">
                    <img
                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-base lg:text-xl">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{ $product->short_description }}</p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-2">
                <div class="flex items-center gap-4">
                    <!-- Quantity Controls -->
                    <div class="flex items-center space-x-1 bg-white p-0 rounded-xl shadow-lg border border-gray-200">
                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-l-md hover:bg-red-500 hover:text-white"
                            onclick="decrementQty({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                            </svg>
                        </button>

                        <input type="number" id="quantity-{{ $item->id }}" name="quantity"
                            value="{{ $item->quantity }}"
                            min="1"
                            class="w-8 h-8 text-center text-lg font-semibold text-gray-700" readonly />

                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-r-md hover:bg-green-500 hover:text-white"
                            onclick="incrementQty({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </button>
                    </div>

                    <!-- Delete Button -->
                    <form method="POST" action="{{ route('user.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-500 absolute top-5 right-5 hover:text-red-700 flex items-center">
                            <i class="fas fa-trash-alt mr-2"></i>
                        </button>
                    </form>
                </div>

                <!-- Price -->
                <div class="text-right flex justify-center gap-x-4 items-center">
                    <div class="text-4xl font-semibold text-gray-700">AED {{ $item->varient->discounted_price ?? $item->varient->unit_price }}</div>
                    @if($item->varient->discounted_price && $item->varient->discounted_price < $item->varient->unit_price)
                        <div class="text-2xl text-gray-500 line-through">AED {{ $item->varient->unit_price }}</div>
                    @endif
                </div>
            </div>

            <!-- Timer -->
            <div class="bg-[#58af0838] rounded-lg w-full p-3 text-base my-2">
                <div class="flex items-center gap-2 text-gray-800">
                    <i class="fas fa-clock"></i>
                    <span id="countdown-timer" data-end-time="{{ $end->format('Y-m-d H:i:s') }}">Sale ends in  {{ $totalDays }} days 18:22:50</span>
                </div>
            </div>

            <!-- Gift Option -->
            <label class="flex items-start gap-2">
                <input type="checkbox" class="mt-1 w-4 h-4" />
                <div>
                    <div class="font-medium flex items-center">
                        <i class="fas fa-gift mr-2 text-gray-700"></i>
                        Buy as a gift
                    </div>
                    <div class="text-sm text-gray-500">Send or print gift voucher after purchase</div>
                </div>
            </label>
        </div>
    </div>
    @endif
@endforeach

      
        <!-- Validation Message Popup -->
        <div id="validationPopup" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50">
          <div class="bg-white p-6 rounded-lg shadow-lg md:w-1/2 lg:w-1/3">
            <h3 class="text-xl font-semibold text-red-500">Invalid Quantity</h3>
            <p class="text-sm text-gray-600">Please enter a valid quantity greater than 0.</p>
            <button onclick="closeValidationPopup()" class="mt-4 bg-red-500 text-white p-2 rounded-lg w-full">Close</button>
          </div>
        </div>
        
        <!-- Delete Confirmation Popup -->
        <div id="deletePopup" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50">
          <div class="bg-white p-6 rounded-lg shadow-lg md:w-1/2 lg:w-1/3">
            <h3 class="text-xl font-semibold text-red-500">Delete Item</h3>
            <p class="text-sm text-gray-600">Are you sure you want to delete this item?</p>
            <div class="mt-4 flex gap-4">
              <button onclick="deleteItem()" class="bg-red-500 text-white p-2 rounded-lg w-1/2">Yes, Delete</button>
              <button onclick="closeDeletePopup()" class="bg-gray-500 text-white p-2 rounded-lg w-1/2">Cancel</button>
            </div>
          </div>
        </div>

        <script>
    function startCountdown(endTimeStr) {
        const endTime = new Date(endTimeStr).getTime();
        const timerEl = document.getElementById('countdown-timer');

        function updateTimer() {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance < 0) {
                timerEl.innerText = "Sale ended";
                clearInterval(timerInterval);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            timerEl.innerText = `Sale ends in ${days} day${days !== 1 ? 's' : ''} ${hours}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        updateTimer(); // Initial call
        const timerInterval = setInterval(updateTimer, 1000);
    }

    const countdownEl = document.getElementById('countdown-timer');
    if (countdownEl) {
        startCountdown(countdownEl.dataset.endTime);
    }
</script>
        
        <script>
          function incrementQty() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue)) {
              quantityInput.value = currentValue + 1;
              hideValidationMessage();
            }
          }
        
          function decrementQty() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue > 1) {
              quantityInput.value = currentValue - 1;
              hideValidationMessage();
            } else {
              showValidationMessage();
            }
          }
        
          function showValidationMessage() {
            const validationPopup = document.getElementById('validationPopup');
            validationPopup.classList.remove('hidden');
          }
        
          function hideValidationMessage() {
            const validationPopup = document.getElementById('validationPopup');
            validationPopup.classList.add('hidden');
          }
        
          function closeValidationPopup() {
            const validationPopup = document.getElementById('validationPopup');
            validationPopup.classList.add('hidden');
          }
        
          function confirmDelete() {
            const deletePopup = document.getElementById('deletePopup');
            deletePopup.classList.remove('hidden');
          }
        
          function closeDeletePopup() {
            const deletePopup = document.getElementById('deletePopup');
            deletePopup.classList.add('hidden');
          }
        
          function deleteItem() {
            alert('Item deleted successfully.');
            closeDeletePopup();
          }
        </script>
        
      
        <!-- Repeat Product 2 and Product 3 similar to Product 1 -->
      </div>

     <!-- Order Summary -->
<div>
  <div class="border rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
    <div class="space-y-2 lg:text-base text-sm">
      <div class="flex justify-between lg:py-2">
        <div>Subtotal</div>
        <div class="font-medium">AED {{ number_format($total) }}</div>
      </div>
      
     
      <hr>
      <div class="flex justify-between lg:py-2 font-semibold">
        <div>Total</div>
        <div class="text-gray-700">AED {{ number_format($total) }}</div>
      </div>
    </div>

    <a href="{{ route('user.checkout') }}">
      <button class="w-full mt-6 px-9 py-3 bg-[#58af0838] text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
        Proceed to Checkout
      </button>
    </a>

    <div class="mt-4 text-center text-sm text-gray-500 flex items-center justify-center">
      <i class="fas fa-lock mr-2"></i>
      Secure Transaction
    </div>

    <hr class="my-4">

    <div class="text-sm text-gray-500">
      <h3 class="font-semibold mb-2">Accepted Payment Methods</h3>
      <div class="flex gap-2">
        <div class="w-10 h-6 bg-gray-200 rounded"></div>
        <div class="w-10 h-6 bg-gray-200 rounded"></div>
        <div class="w-10 h-6 bg-gray-200 rounded"></div>
        <div class="w-10 h-6 bg-gray-200 rounded"></div>
      </div>
    </div>
  </div>

  <div class="border rounded-lg shadow-sm p-6 mt-6">
    <h3 class="font-semibold mb-2">Need Help?</h3>
    <ul class="text-sm text-gray-500 space-y-1">
      <li>• View our return policy</li>
      <li>• Check order status</li>
      <li>• Shipping information</li>
    </ul>
  </div>
</div>

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
      left: 10px;

    }

    .owl-prev,
    .owl-next span {
      font-size: 40px !important;
      line-height: 40px !important;
      color: #000 !important;
    }

    .owl-next {
      right: 10px;
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

    .custom-right-icon {
      background-image: url('path-to-your-right-arrow-icon.svg');
      /* Replace with your custom right icon */
    }
  </style>

  <script>
    $(document).ready(function () {
      $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        margin: 16,
        nav: true,  // Enable navigation
        dots: false, // Enable dots pagination
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 4
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

</html>

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