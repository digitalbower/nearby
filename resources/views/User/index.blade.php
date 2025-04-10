
@extends('User.layouts.main')
@push('scripts')
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
@endpush
@push('styles')
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
   
@endpush
@section('content')
<section class="">
<!-- Add this to the bottom of your CSS -->
@if(session('success'))
  <div x-data="{ show: true }" x-show="show" class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-300 flex justify-between items-center">
      <span>{{ session('success') }}</span>
      <button @click="show = false" class="text-green-700 hover:text-green-900">&times;</button>
  </div>
@endif
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
    @foreach ($categories as $category)
        <a href="{{ url('/category/' . $category->code) }}"
           class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
            <div class="flex items-center gap-3">
                <i class="{{ $category->categoryicon }} h-5 w-5"></i>
                <span class="font-medium">{{ strtoupper($category->name) }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
            </div>
        </a>
    @endforeach
</nav>

           

          </div>
        </aside>

        @push('scripts')
        <script>
          const menuToggle = document.getElementById('menuToggle');
          const menuContent = document.getElementById('menuContent');

          menuToggle.addEventListener('click', () => {
            menuContent.classList.toggle('hidden');
          });
        </script>
        @endpush
        <main class="lg:col-span-4 lg:order-2 order-2 sm:col-span-3 h-full lg:p-10 py-4 relative px-4">
          <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">

    @foreach ($products as $product)
    <div class="swiper-slide">
        <div class="lg:flex w-full relative mb-10 items-center justify-center">
            <!-- Left Section (Top Animation) -->
            <div id="left-section" class="w-full left-10 rounded-xl z-20 transform translate-x-[-50px] opacity-0">
                <div class="rounded-xl lg:w-3/5">  
                    <img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-auto max-h-[300px] lg:pb-0 pb-0 lg:max-h-[500px] rounded-xl object-cover">
                </div>
            </div>

            <!-- Right Section (Bottom Animation) -->
            <div id="right-section"
                class="lg:absolute flex flex-col w-full lg:w-1/2 bg-white text-gray-800 rounded-lg p-3 lg:p-8 shadow-xl z-20 right-0 transform translate-x-[50px] opacity-0">
                
                <h1 class="lg:text-2xl text-lg font-extrabold mb-0 leading-tight text-gray-900 leading-snug">
                    {{ $product->name }}
                </h1>

                <div>
                    <h2 class="lg:text-lg text-base font-bold text-gray-900">
                        {{ $product->productlocation_address ?? 'Dubai, UAE' }}
                    </h2>
                    <div class="flex items-center space-x-2 text-gray-600">
                        <span class="text-yellow-400 text-2xl">★★★★☆</span>
                        <span class="text-sm">(4.8 / 1,234 reviews)</span> {{-- Hardcoded for now --}}
                    </div>
                </div>

                <p class="text-gray-600 text-sm lg:text-base leading-relaxed">
                    {{ $product->short_description }}
                </p>

                <div class="flex items-center space-x-4">
                    <span class="text-3xl font-bold text-red-600">
                        {{ $product->sale_price ?? '$19.99' }} {{-- Replace with real pricing logic --}}
                    </span>
                    <span class="text-xl text-gray-400 line-through">
                        {{ $product->original_price ?? '$79.29' }} {{-- Replace with real original price --}}
                    </span>
                </div>

                <span class="text-lg text-green-600 font-semibold">
                    {{ isset($product->sale_price, $product->original_price) ? '-' . round((($product->original_price - $product->sale_price) / $product->original_price) * 100) . '%' : '-75%' }}
                </span>

                <div>
                    <button
                        class="w-auto px-9 py-3 bg-[#58af0838] text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:bg-[#4a910954]">
                        ADD TO CART
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach

              </div>
               </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          @push('scripts')
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
          @endpush
        </main>
        @push('styles')
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
        @endpush
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
  <section class="bg-[#58af0838] lg:pt-20 py-10 lg:px-4 from-cyan-50 to-blue">
  <div class="mb-8 container mb-10 mx-auto px-4 lg:px-0">
    <div class="flex justify-between items-center mb-4">
      <h2 class="lg:text-3xl text-base font-bold text-black">
        Trending Today in UAE
      </h2>
    </div>

    <div class="owl-carousel1 owl-carousel owl-theme">
      @foreach($trendingProducts as $product)
        <div class="item">
          <a href="{{ url('/product/' . $product->id) }}">
            <div class="rounded-lg hover:shadow-xl shadow-lg h-full border bg-white overflow-hidden transition-transform duration-300">
              
              <!-- Product Image -->
              <div class="relative">
                <img alt="{{ $product->name }}" class="w-full h-48 object-cover"
                  src="{{ asset('storage/' . $product->image) }}">

                <!-- Discount & Countdown -->
                <div class="w-full flex items-center justify-between text-[#fe8500] text-2xl p-2 font-bold">
                  <div class="flex items-center mt-1">
                    <img src="{{ asset('images/discount_7939803.png') }}" class="w-8" />
                    <span class="ml-0.5 text-base text-black">50% OFF</span>
                  </div>
                  <div class="flex items-center ml-auto py-0 rounded-md px-2 gap-x-1 text-[#000] font-semibold">
                    <img src="{{ asset('images/clock_4241462.png') }}" class="w-8 h-9 pr-1" />
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
              </div>

              <!-- Product Details -->
              <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                <h3 class="text-xl font-semibold leading-tight">{{ $product->name }}</h3>

                <div class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>{{ $product->location ?? 'UAE' }}</span>
                </div>

                <div class="flex items-center gap-0">
                  <span class="text-yellow-500">★★★★☆</span>
                  <span class="text-sm text-gray-500">{{ number_format($product->rating, 1) }} (1,244)</span>
                </div>

                <p class="text-gray-700 text-sm leading-relaxed line-clamp-2">
                  {{ Str::limit($product->description, 100) }}
                </p>

                <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                    <span class="text-3xl font-semibold text-gray-800">${{ $product->price }}</span>
                    <span class="text-lg text-gray-400 line-through">${{ $product->old_price }}</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
  @push('scripts')
  <!-- Countdown Script -->
  <script>
    function updateCountdown() {
      const endDate = new Date(new Date().getTime() + 3 * 24 * 60 * 60 * 1000); // 3 days
      const days = document.getElementById('days');
      const hours = document.getElementById('hours');
      const minutes = document.getElementById('minutes');
      const seconds = document.getElementById('seconds');

      function updateTimer() {
        const now = new Date();
        const timeDiff = endDate - now;

        if (timeDiff <= 0) {
          days.textContent = hours.textContent = minutes.textContent = seconds.textContent = '00';
          return;
        }

        days.textContent = String(Math.floor(timeDiff / (1000 * 60 * 60 * 24))).padStart(2, '0');
        hours.textContent = String(Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
        minutes.textContent = String(Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
        seconds.textContent = String(Math.floor((timeDiff % (1000 * 60)) / 1000)).padStart(2, '0');
      }

      updateTimer();
      setInterval(updateTimer, 1000);
    }

    updateCountdown();
  </script>
  @endpush
</section>



 @foreach($carouselCategories as $category)
  <section class="bg-[#58af0838] relative lg:py-20 py-10">
  <div class="container mx-auto lg:px-0 px-4">
    
    <!-- Section Title -->
    <h2 class="lg:text-3xl text-base font-bold text-black mb-3">Popular on</h2>

    <!-- Owl Carousel -->
    <div class="owl-carousel owl-theme owl-carousel1">
     
        <div class="item">
          <a href="{{ url('/category/' . strtolower($category->code)) }}">
            <div class="rounded-lg hover:shadow-xl hover:border-[#58af0838] shadow-lg h-full border bg-white overflow-hidden transition-transform duration-300">
              
              <!-- Category Image -->
              <div class="relative">
                <img alt="{{ $category->name }}" class="w-full h-48 object-cover"
                     src="{{ asset('storage/' . $category->image) }}" />

                <!-- Discount Badge -->
                <div class="w-full flex items-center justify-center text-[#fe8500] text-2xl p-2 font-bold">
                  <div class="flex items-center mt-1">
                    <img src="{{ asset('images/discount_7939803.png') }}" class="w-8" />
                    <span class="ml-0.5 text-base text-black">50% OFF</span>
                  </div>

                  <div class="items-center ml-auto py-0 px-2 flex gap-x-1 text-[#000] font-semibold">
                    <span class="text-sm flex mt-1 text-red-400">
                      <img src="{{ asset('images/clock_4241462.png') }}" class="w-8 h-9 pr-1" />
                    </span>
                    <div class="flex items-center text-center gap-1">
                      <span class="text-sm font-semibold" id="days">3</span>
                      <span class="text-red-500">:</span>
                      <span class="text-sm font-semibold" id="hours">18</span>
                      <span class="text-red-500">:</span>
                      <span class="text-sm font-semibold" id="minutes">43</span>
                      <span class="text-red-500">:</span>
                      <span class="text-sm font-semibold" id="seconds">21</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Category Info -->
              <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                <h3 class="text-xl font-semibold leading-tight">
                  {{ $category->name }}
                </h3>

                <div class="flex items-center text-sm text-gray-500 gap-1">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>UAE</span>
                </div>

                <div class="flex items-center gap-0">
                  <span class="text-yellow-500">★★★★☆</span>
                  <span class="text-sm text-gray-500">4.8 (1,244)</span>
                </div>

                <p class="text-gray-700 text-sm leading-relaxed">
                  Discover amazing offers and experiences in {{ $category->name }} category.
                </p>

                <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-4">
                    <span class="text-3xl font-semibold text-gray-800">AED 19.99</span>
                    <span class="text-lg text-gray-400 line-through">AED 79.29</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    
    </div>
  </div>
</section>
@endforeach


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


  <section class="bg-white container mx-auto lg:px-0 px-4 lg:py-20 py-10">
  <form method="POST" action="{{ route('subscribe') }}" class="flex flex-col md:flex-row items-center justify-between gap-8">
    @csrf
    <!-- input fields -->

    <h2 class="text-3xl text-black lg:text-3xl text-base font-bold text-black font-extrabold">
      Stay Updated With Our Latest Newsletter
    </h2>
    <div class="lg:flex w-full md:w-auto gap-4">
      <input name="email" type="email" placeholder="Enter Email"
        class="flex-1 lg:w-80 px-6 py-4 rounded-full border-2 lg:w-auto w-full lg:mb-0 mb-5 focus:outline-none focus:ring-2 focus:ring-cyan-700 bg-white text-black placeholder-gray-500 shadow-md"
        required>
      <button type="submit"
        class="w-full lg:w-auto px-9 py-3 bg-[#58af0838] text-black font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-300">
        Subscribe Now <i class="fas fa-paper-plane ml-2"></i>
      </button>
    </div>
  </form>
</section>

@push('scripts')
 
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
</script><script>
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
@endpush
  @push('styles')
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
  
  
  @endpush

  
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
   
    <form id="modalForm" class=""  action="{{ route('specialist.submit') }}" method="POST">
    @csrf
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
            @foreach($countryCodes as $country)
            <option value="{{ $country->id }}" {{ old('country_code_id', isset($user) ? $user->country_code_id : '') == $country->id ? 'selected' : '' }}>
            {{ $country->country_code }} 
        </option>
    @endforeach
           
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
@endsection
@push('scripts')
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


@endpush
