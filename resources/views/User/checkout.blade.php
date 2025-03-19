<!-- Add this to the bottom of your CSS -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Main Navigation</title>

  <!-- Import Poppins font from Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <!-- Add Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<!-- Owl Carousel Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

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
    font-family: "Poppins", sans-serif;
    font-weight: 400;
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
        body: ["Poppins", "sans-serif"] /* Set Poppins as the body font */,
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
  <main class="flex-grow bg-[#58af0838]  px-4 lg:px-10 py-8">
    <div class="grid container mx-auto md:grid-cols-3 md:space-x-6">
      <div class="md:col-span-2  space-y-6 overflow-hidden">
        <div class="bg-[#58af0838]  rounded-xl px-4 p-2 lg:p-7">
          <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
              <p class="font-medium">Item was added to cart</p>
              <p class="text-sm text-gray-600 my-2">
                40 Custom Holiday Photo Cards (Shipping Not Included)
              </p>
            </div>
            <button
              class="bg-white text-groupon-green border border-groupon-green rounded px-4 py-2 hover:bg-groupon-green hover:text-black transition duration-300">
              Continue Shopping
            </button>
          </div>
        </div>

        <div class="bg-white rounded-xl py-6 px-2 lg:px-8 lg:py-10">
          <h2 class="text-2xl font-semibold mb-2 lg:mb-6 text-gray-800">
            Checkout (3 items)
          </h2>

          <!-- Scrollable Product List -->
          <div id="product-list" class="lg:space-y-8 space-y-4">
            <!-- Items are dynamically loaded -->
          </div>

          <!-- Load More Button -->
          <button id="load-more-btn"
            class="px-6 py-2 bg-[#58af0838]  lg:w-auto w-full rounded-lg text-black hover:text-black font-semibold transition-all duration-300 hover:shadow-lg mt-4">
            See More
          </button>
        </div>

        <script>
          const products = [
            {
              name: "40, 70, 100, or 150 Custom Holiday Photo Cards from PhotoAffections",
              description:
                "40 Custom Holiday Photo Cards (Shipping Not Included)",
              price: "$17.99",
              originalPrice: "$79.20",
              timer: "1 day 18:22:50",
              image: "https://via.placeholder.com/100",
            },
            {
              name: "Customized Mugs - 4 Pack (Up to 60% Off)",
              description: "4 Personalized Coffee Mugs",
              price: "$20.00",
              originalPrice: "$50.00",
              timer: "2 days 12:15:30",
              image: "https://via.placeholder.com/100",
            },
            {
              name: "Personalized Tote Bags - Set of 3 (Up to 50% Off)",
              description: "3 Custom Tote Bags for Shopping",
              price: "$15.00",
              originalPrice: "$30.00",
              timer: "3 days 08:00:00",
              image: "https://via.placeholder.com/100",
            },
          ];

          const productList = document.getElementById("product-list");
          const loadMoreBtn = document.getElementById("load-more-btn");

          let visibleCount = 2;

          function renderProducts() {
            productList.innerHTML = products
              .slice(0, visibleCount)
              .map(
                (product) => `
                <div class="border rounded-lg relative overflow-hidden shadow-lg">
          <div class="p-3">
            <div class="md:flex gap-3 md:space-y-0 space-y-4">
              <div class="relative md:w-28 w-full h-[200px] md:h-28 max-h-[300px] rounded-lg overflow-hidden">
                <img
                  src="https://via.placeholder.com/100"
                  alt="Experience Ultimate Relaxation with Spa Admission"
                  class="w-full h-full object-cover"
                />
              </div>
              <div class="flex-1">
                <h3 class="font-semibold text-base lg:text-xl">Experience Ultimate Relaxation with Spa Admission</h3>
                <p class="text-sm text-gray-500 mt-2">General Spa Admission for One Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium autem, </p>
             
              </div>
            </div>
            <div class="flex items-center justify-between mt-2">
              <div class="flex items-center gap-4">
                <div class="flex items-center space-x-1 bg-white p-0 rounded-xl shadow-lg border border-gray-200">
                  <!-- Decrement Button -->
                  <button
                    type="button"
                    class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-l-md hover:bg-red-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-300"
                    onclick="decrementQty()"
                    aria-label="Decrease Quantity"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                    </svg>
                  </button>
        
                  <!-- Quantity Display -->
                  <input
                    type="number"
                    id="quantity"
                    value="1"
                    min="1"
                    class="w-8 h-8 pl-4 text-center flex justify-center rounded-lg text-lg font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    aria-label="Quantity"
                  />
        
                  <!-- Increment Button -->
                  <button
                    type="button"
                    class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-r-md hover:bg-green-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-300"
                    onclick="incrementQty()"
                    aria-label="Increase Quantity"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                  </button>
                </div>
                <button class="text-red-500 absolute top-5 right-5 hover:text-red-700 flex items-center" onclick="confirmDelete()">
                  <i class="fas fa-trash-alt mr-2"></i>
                </button>
              </div>
              <div class="text-right flex justify-center gap-x-4 items-center">
                <div class="text-4xl font-semibold text-gray-700">$42</div>
                <div class="text-2xl text-gray-500 line-through">$60</div>
              </div>
            </div>
            <div class="bg-[#58af0838] rounded-lg w-full p-3 text-base my-2">
              <div class="flex items-center gap-2 text-gray-800">
                <i class="fas fa-clock"></i>
                <span id="countdown-timer">Sale ends in 1 day 18:22:50</span>
              </div>
            </div>
         
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
                        `
              )
              .join("");

            // Hide Load More button if all products are visible
            if (visibleCount >= products.length) {
              loadMoreBtn.style.display = "none";
            }
          }

          loadMoreBtn.addEventListener("click", () => {
            visibleCount += 1;
            renderProducts();
          });

          renderProducts();
          function incrementQty() {
            const qtyInput = document.getElementById("quantity");
            qtyInput.value = parseInt(qtyInput.value) + 1;
          }

          function decrementQty() {
            const qtyInput = document.getElementById("quantity");
            if (parseInt(qtyInput.value) > 1) {
              qtyInput.value = parseInt(qtyInput.value) - 1;
            }
          }
        </script>
        <script>
          // Set the end date and time for the countdown
          const endDate = new Date();
          endDate.setDate(endDate.getDate() + 1); // 1 day from now
          endDate.setHours(endDate.getHours() + 18); // Add 18 hours
          endDate.setMinutes(endDate.getMinutes() + 22); // Add 22 minutes
          endDate.setSeconds(endDate.getSeconds() + 50); // Add 50 seconds

          // Function to update the countdown timer
          function updateCountdown() {
            const now = new Date();
            const timeDifference = endDate - now;

            if (timeDifference > 0) {
              const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
              const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
              const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

              // Display the countdown
              document.getElementById('countdown-timer').textContent =
                `Sale ends in ${days} day${days !== 1 ? 's' : ''} ${hours}:${minutes}:${seconds}`;
            } else {
              // When the countdown ends
              document.getElementById('countdown-timer').textContent = "Sale has ended!";
              clearInterval(timerInterval); // Stop the interval
            }
          }

          // Update the countdown every second
          const timerInterval = setInterval(updateCountdown, 1000);

          // Initialize the countdown on page load
          updateCountdown();
        </script>

        <div class="bg-white rounded-xl px-4 p-4 lg:p-7">
          <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
          <div class="space-y-6">
            <div class="space-y-2">
              <label for="email" class="block">E-mail</label>
              <input type="email" id="email" placeholder="john.smith@example.com" class="w-full border rounded p-2" />
              <p class="text-sm text-gray-600 my-2">
                We'll use your email to send you information related to this
                offer.
              </p>
            </div>

            <div>
              <label class="flex items-center gap-2">
                <input type="checkbox" checked class="rounded text-groupon-green focus:ring-groupon-green" />
                <span class="text-sm">Yes, I want to save money by also receiving personalized
                  Groupon emails with awesome deals.</span>
              </label>
            </div>

            <div class=" ">
              <!-- Account Information Section -->
              <div class="flex mb-2 flex-col lg:flex-row items-center gap-4 text-center lg:text-left">
                <span class="text-lg font-semibold text-gray-700">Already have an account?</span>
                <a href="/signin"
                  class="text-lg font-semibold text-indigo-600 hover:text-indigo-700 hover:underline transition duration-200">
                  Sign in
                </a>

              </div>
              <p class="text-lg mb-4 text-gray-500">or continue with:</p>
              <!-- Social Login Buttons Section -->
              <div class="flex flex-wrap justify-center w-full lg:justify-start gap-4">
                <!-- Google Button -->
                <button
                  class="flex items-center justify-center lg:w-1/4 px-6 py-3 w-full  bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg hover:bg-gray-100 transition duration-300 gap-3">
                  <i class="fa-brands fa-google text-red-500 text-xl"></i>
                  <span class="text-lg font-medium text-gray-700">Google</span>
                </button>

                <!-- Facebook Button -->
                <button
                  class="flex items-center justify-center lg:w-1/4 px-6 py-3 w-full  bg-blue-600 text-white rounded-lg shadow-md hover:shadow-lg hover:bg-blue-700 transition duration-300 gap-3">
                  <i class="fa-brands fa-facebook-f text-xl"></i>
                  <span class="text-lg font-medium">Facebook</span>
                </button>

                <!-- Apple Button -->
                <button
                  class="flex items-center justify-center lg:w-1/4 px-6 py-3 w-full  bg-black text-white rounded-lg shadow-md hover:shadow-lg hover:bg-gray-800 transition duration-300 gap-3">
                  <i class="fa-brands fa-apple text-xl"></i>
                  <span class="text-lg font-medium">Apple</span>
                </button>
              </div>
            </div>

          </div>
        </div>
        <div class="md:mt-0 mt-4 md:hidden block mb-5 md:mb-0">
          <div class="bg-white rounded-xl shadow p-6 sticky top-4">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
            <div class="space-y-4">
              <div class="flex justify-between">
                <span>Subtotal</span>
                <span>$17.99</span>
              </div>
              <div class="flex justify-between text-groupon-green">
                <span>You save</span>
                <span>$61.21</span>
              </div>
              <hr />
              <div class="flex justify-between font-semibold">
                <span>Total</span>
                <span>$17.99</span>
              </div>

              <p class="text-xs text-left text-gray-600">
                By clicking below, I agree to the Terms of Use and Refund Policy
                and that I have read the Privacy Statement.
              </p>
            </div>
            <div class="mt-5">
              <button id="dropdownToggle" class="flex justify-between w-full items-center mb-4"
                onclick="toggleDropdownA('dropdownContent', 'dropdownIcon')">
                <span class="text-sm font-medium">Show Order Details</span>
                <i id="dropdownIcon" class="fas fa-chevron-down"></i>
              </button>
              <div id="dropdownContent" class="hidden">
                <!-- Order Item -->
                <div class="flex gap-4 mb-4">
                  <img src="/images/banner.png" alt="Product" class="w-16 h-16 rounded object-cover" />
                  <div class="flex-1">
                    <h3 class="text-sm font-medium">Saturday Brunch</h3>
                    <p class="text-sm text-gray-600 my-2">Vendor: Test2</p>
                  </div>
                  <div class="text-sm font-medium">AED 180</div>
                </div>
                <!-- Price Details -->
                <div class="border-t pt-4">
                  <div class="flex justify-between text-sm mb-2">
                    <span>Subtotal</span>
                    <span>AED 180</span>
                  </div>
                  <div class="flex justify-between font-medium">
                    <span>Total</span>
                    <span>AED 180</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Coupon Code Section -->
            <div class="mt-6">
              <button id="couponToggle" class="flex justify-between w-full items-center mb-4"
                onclick="toggleDropdown('couponContent', 'couponIcon')">
                <span class="text-sm font-medium">Have a Coupon Code?</span>
                <i id="couponIcon" class="fas fa-chevron-down"></i>
              </button>
              <div id="couponContent" class="hidden">
                <input type="text" placeholder="Enter coupon code"
                  class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none mb-4" />
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow w-full">
                  Apply Coupon
                </button>
              </div>
            </div>

            <button
              class="md:inline-flex hidden items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 w-full mt-6 bg-[#58af0838]  text-black">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
                class="svg-inline--fa fa-lock mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor"
                  d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z">
                </path>
              </svg>Complete Order
            </button>

            <p class="text-xs text-gray-500 md:block hidden text-center mt-4">
              By completing your purchase you agree to these<a href="#" class="text-gray-800 hover:underline">
                Terms of Service</a>.
            </p>
          </div>

          <script>
            function toggleDropdown(contentId, iconId) {
              const content = document.getElementById(contentId);
              const icon = document.getElementById(iconId);

              if (content.classList.contains("hidden")) {
                content.classList.remove("hidden");
                icon.classList.remove("fa-chevron-down");
                icon.classList.add("fa-chevron-up");
              } else {
                content.classList.add("hidden");
                icon.classList.remove("fa-chevron-up");
                icon.classList.add("fa-chevron-down");
              }
            }
          </script>
        </div>
        <div class="bg-white rounded-xl shadow p-4 px-4 lg:p-7 mx-auto">
          <h2 class="text-2xl font-semibold mb-6">Payment</h2>
          <div class="space-y-6">
            <div class="space-y-4" id="paymentMethods">
              <label class="flex items-center justify-between border rounded-lg p-2 lg:p-4 cursor-pointer">
                <div class="flex items-center gap-2">
                  <input type="radio" name="payment" value="gpay" class="text-[#000] focus:ring-[#000]" />
                  <span>Google Pay</span>
                </div>
                <i class="fab fa-google-pay text-2xl"></i>
              </label>
        
              <label class="flex items-center justify-between border rounded-lg p-2 lg:p-4 cursor-pointer">
                <div class="flex items-center gap-2">
                  <input type="radio" name="payment" value="card" class="text-[#000] focus:ring-[#000]" checked />
                  <span>Credit/Debit Card</span>
                </div>
                <div class="flex gap-2">
                  <i class="fab fa-cc-visa text-blue-700 text-2xl"></i>
                  <i class="fab fa-cc-mastercard text-2xl"></i>
                  <i class="fab fa-cc-amex text-blue-500 text-2xl"></i>
                </div>
              </label>
        
              <label class="flex items-center justify-between border rounded-lg p-2 lg:p-4 cursor-pointer">
                <div class="flex items-center gap-2">
                  <input type="radio" name="payment" value="upi" class="text-[#000] focus:ring-[#000]" />
                  <span>UPI</span>
                </div>
                <i class="fas fa-mobile-alt text-2xl"></i>
              </label>
            </div>
        
            <div id="paymentDetails" class="mt-6"></div>
        
            <button
              class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 h-10 px-4 py-2 w-full mt-6 bg-[#58af0838] text-black">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
                class="svg-inline--fa fa-lock mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor"
                  d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z">
                </path>
              </svg>Complete Order
            </button>
            <p class="text-xs text-gray-500 text-center mt-4">
              By completing your purchase you agree to these <a href="#" class="text-blue-600 hover:underline">Terms of Service</a>.
            </p>
          </div>
        </div>
        
        <script>
          const paymentMethods = document.getElementById("paymentMethods");
          const paymentDetails = document.getElementById("paymentDetails");
        
          function renderPaymentDetails(method) {
            let html = "";
            switch (method) {
              case "gpay":
                html = `
                  <p class="text-sm text-gray-600 my-2">
                    Please complete the payment using Google Pay on your device.
                  </p>
                `;
                break;
              case "card":
                html = `
                  <div class="space-y-6">
                    <div>
                      <label for="cardNumber" class="block text-sm font-semibold text-gray-800">Card Number</label>
                      <div class="mt-2 relative rounded-lg border border-gray-300 focus-within:ring-2 focus-within:ring-[#000]">
                        <input type="text" id="cardNumber" class="block w-full px-4 py-3 text-sm font-medium text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#000] rounded-lg" placeholder="1234 5678 9012 3456">
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                          <i class="fas fa-credit-card text-gray-500"></i>
                        </div>
                      </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                      <div>
                        <label for="expDate" class="block text-sm font-semibold text-gray-800">Expiration Date</label>
                        <input type="text" id="expDate" class="mt-2 block w-full px-4 py-3 border text-sm font-medium text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#000] border-gray-300 rounded-lg" placeholder="MM / YY">
                      </div>
                      <div>
                        <label for="cvv" class="block text-sm font-semibold text-gray-800">CVV</label>
                        <input type="text" id="cvv" class="mt-2 block w-full px-4 py-3 border text-sm font-medium text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#000] border-gray-300 rounded-lg" placeholder="123">
                      </div>
                    </div>
                  </div>
                `;
                break;
              case "upi":
                html = `
                <div class="flex flex-col gap-1">
  <label for="upiId" class="text-sm font-medium text-gray-700">UPI ID</label>
  <input 
    type="text" 
    id="upiId" 
    class="mt-1 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 hover:shadow-md transition-all duration-300" 
    placeholder="yourname@upi" 
  />
</div>

                `;
                break;
              default:
                html = "<p>Please select a payment method.</p>";
            }
            paymentDetails.innerHTML = html;
          }
        
          paymentMethods.addEventListener("change", (e) => {
            if (e.target.name === "payment") {
              renderPaymentDetails(e.target.value);
            }
          });
        
          // Initialize with default payment method (card)
          renderPaymentDetails("card");
        </script>
        
      </div>

      <div class="md:mt-0 mt-4 md:block hidden mb-5 md:mb-0">
        <div class="bg-white rounded-xl shadow p-6 sticky top-4">
          <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
          <div class="space-y-4">
            <div class="flex justify-between">
              <span>Subtotal</span>
              <span>$17.99</span>
            </div>
            <div class="flex justify-between text-groupon-green">
              <span>You save</span>
              <span>$61.21</span>
            </div>
            <hr />
            <div class="flex justify-between font-semibold">
              <span>Total</span>
              <span>$17.99</span>
            </div>

            <p class="text-xs text-left text-gray-600">
              By clicking below, I agree to the Terms of Use and Refund Policy
              and that I have read the Privacy Statement.
            </p>
          </div>


          <div class="mt-5">
            <button class="flex justify-between w-full items-center mb-4" data-toggle="dropdownCheckout"
              data-target="dropdownCheckoutContent" data-icon="dropdownCheckoutIcon">
              <span class="text-sm font-medium">Show Order Details</span>
              <i id="dropdownCheckoutIcon" class="fas fa-chevron-down"></i>
            </button>
            <div id="dropdownCheckoutContent" class="hidden">
              <!-- Order Item -->
              <div class="flex gap-4 mb-4">
                <img src="/images/banner.png" alt="Product" class="w-16 h-16 rounded object-cover" />
                <div class="flex-1">
                  <h3 class="text-sm font-medium">Saturday Brunch</h3>
                  <p class="text-sm text-gray-600 my-2">Vendor: Test2</p>
                </div>
                <div class="text-sm font-medium">AED 180</div>
              </div>
              <!-- Price Details -->
              <div class="border-t pt-4">
                <div class="flex justify-between text-sm mb-2">
                  <span>Subtotal</span>
                  <span>AED 180</span>
                </div>
                <div class="flex justify-between font-medium">
                  <span>Total</span>
                  <span>AED 180</span>
                </div>
              </div>
            </div>
          </div>

          <!-- CouponOrder Code Section -->
          <div class="mt-6">
            <button class="flex justify-between w-full items-center mb-4" data-toggle="couponOrder"
              data-target="couponOrderContent" data-icon="couponOrderIcon">
              <span class="text-sm font-medium">Have a CouponOrder Code?</span>
              <i id="couponOrderIcon" class="fas fa-chevron-down"></i>
            </button>
            <div id="couponOrderContent" class="hidden">
              <input type="text" placeholder="Enter couponOrder code"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none mb-4" />
              <button class="bg-[#58af0838]   text-black px-4 py-2 rounded-md shadow w-full">
                Apply Coupon
              </button>
            </div>
          </div>

          <script>
            class DropdownCheckoutToggle {
              constructor(buttonSelector) {
                this.button = document.querySelector(buttonSelector);
                this.targetId = this.button.getAttribute('data-target');
                this.iconId = this.button.getAttribute('data-icon');
                this.targetElement = document.getElementById(this.targetId);
                this.iconElement = document.getElementById(this.iconId);

                this.init();
              }

              init() {
                this.button.addEventListener('click', () => this.toggle());
              }

              toggle() {
                this.targetElement.classList.toggle('hidden');
                this.updateIcon();
              }

              updateIcon() {
                if (this.targetElement.classList.contains('hidden')) {
                  this.iconElement.classList.remove('fa-chevron-up');
                  this.iconElement.classList.add('fa-chevron-down');
                } else {
                  this.iconElement.classList.remove('fa-chevron-down');
                  this.iconElement.classList.add('fa-chevron-up');
                }
              }
            }

            // Initialize dropdownCheckout toggles for all elements with the 'data-toggle' attribute
            document.querySelectorAll('[data-toggle]').forEach(button => {
              new DropdownCheckoutToggle(`button[data-toggle="${button.getAttribute('data-toggle')}"]`);
            });
          </script>


          <button
            class="md:inline-flex hidden items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 w-full mt-6 bg-[#58af0838]  text-black">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
              class="svg-inline--fa fa-lock mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path fill="currentColor"
                d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z">
              </path>
            </svg>Complete Order
          </button>

          <p class="text-xs text-gray-500 md:block hidden text-center mt-4">
            By completing your purchase you agree to these<a href="#" class="text-blue-600 hover:underline">
              Terms of Service</a>.
          </p>
        </div>


      </div>
    </div>
  </main>

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
      background-image: url("path-to-your-left-arrow-icon.svg");
      /* Replace with your custom left icon */
    }

    .custom-right-icon {
      background-image: url("path-to-your-right-arrow-icon.svg");
      /* Replace with your custom right icon */
    }
  </style>

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

</html>