@extends('User.layouts.main')
@push('styles')
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
@endpush
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
@endpush
@section('content')
  <main class="flex-grow bg-[#58af0838]  px-4 lg:px-10 py-8">
    <form method="POST" action="{{route('user.checkout_booking')}}" id="bookingForm">
      @csrf
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
              <button onclick="window.location.href='{{ route('user.products.index') }}'" 
                class="bg-white text-groupon-green border border-groupon-green rounded px-4 py-2 hover:bg-groupon-green hover:text-black transition duration-300">
                Continue Shopping
              </button>
            </div>
          </div>

          <div class="bg-white rounded-xl py-6 px-2 lg:px-8 lg:py-10">
            <h2 class="text-2xl font-semibold mb-2 lg:mb-6 text-gray-800">
              Checkout ({{$count}} items)
            </h2>
          
              <!-- Scrollable Product List -->
              <div id="product-list" class="lg:space-y-8 space-y-4">
                <!-- Items are dynamically loaded -->
              </div>

              <!-- Load More Button -->
              <button id="load-more-btn" type="button"
                class="px-6 py-2 bg-[#58af0838]  lg:w-auto w-full rounded-lg text-black hover:text-black font-semibold transition-all duration-300 hover:shadow-lg mt-4">
                See More
              </button>
            </div>

            @guest
            <div class="bg-white rounded-xl px-4 p-4 lg:p-7">
              <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
              <div class="space-y-6">

                {{-- <div class="space-y-2">
                  <label for="email" class="block">E-mail</label>
                  <input type="email" id="email" placeholder="john.smith@example.com" class="w-full border rounded p-2" readonly value="{{auth()->user()->email}}"/>
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
                </div>  --}}
                <div class=" ">
                  <!-- Account Information Section -->
                 
                  <div class="flex mb-2 flex-col lg:flex-row items-center gap-4 text-center lg:text-left">
                    <span class="text-lg font-semibold text-gray-700">Already have an account?</span>
                    <a href="{{ route('user.login', ['redirect' => url()->current()]) }}" 
                      class="text-lg font-semibold text-indigo-600 hover:text-indigo-700 hover:underline transition duration-200">
                      Sign in
                    </a>

                  </div>
              
                  {{-- <p class="text-lg mb-4 text-gray-500">or continue with:</p>
                  <!-- Social Login Buttons Section -->
                  <div class="flex flex-wrap justify-center w-full lg:justify-start gap-4">
                    <!-- Google Button -->
                    <button 
                      class="flex items-center justify-center lg:w-1/4 px-6 py-3 w-full  bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg hover:bg-gray-100 transition duration-300 gap-3">
                      <i class="fa-brands fa-google text-red-500 text-xl"></i>
                      <span class="text-lg font-medium text-gray-700">SignIn</span>
                    </button> --}}

                    <!-- Facebook Button -->
                    {{-- <button
                      class="flex items-center justify-center lg:w-1/4 px-6 py-3 w-full  bg-blue-600 text-white rounded-lg shadow-md hover:shadow-lg hover:bg-blue-700 transition duration-300 gap-3">
                      <i class="fa-brands fa-facebook-f text-xl"></i>
                      <span class="text-lg font-medium">Facebook</span>
                    </button> --}}

                    <!-- Apple Button -->
                    {{-- <button
                      class="flex items-center justify-center lg:w-1/4 px-6 py-3 w-full  bg-black text-white rounded-lg shadow-md hover:shadow-lg hover:bg-gray-800 transition duration-300 gap-3">
                      <i class="fa-brands fa-apple text-xl"></i>
                      <span class="text-lg font-medium">Apple</span>
                    </button> --}}
                  {{-- </div> --}}
                </div>

          </div>
        </div>
        @endguest
        <div class="md:mt-0 mt-4 md:hidden block mb-5 md:mb-0">
          <div class="bg-white rounded-xl shadow p-6 sticky top-4">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
            <div class="space-y-4">
              <div class="flex justify-between">
                <span>Booking Amount</span>
                <span>AED {{ number_format($bookingAmount, 2) }}</span>
              </div>
              <div class="flex justify-between text-groupon-green">
                <span>Nearby Voucher Savings</span>
                <span>AED {{ number_format($voucherSavings, 2) }}</span>
              </div>
              <div class="flex justify-between">
                <span>VAT (5%)</span>
                <span>AED {{ number_format($vat, 2) }}</span>
              </div>
              <hr />
              <div class="flex justify-between font-semibold">
                <span>Total</span>
                <span>AED {{ number_format($total, 2) }}</span>
              </div>

              <p class="text-xs text-left text-gray-600">
                By clicking below, I agree to the Terms of Use and Refund Policy
                and that I have read the Privacy Statement.
              </p>
            </div>
            <div class="mt-5">
              <button id="dropdownToggle" type="button" class="flex justify-between w-full items-center mb-4"
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
    
      </div>
      <input type="hidden" name="booking_amount" value="{{ $bookingAmount }}">
      <input type="hidden" name="voucher_savings" value="{{ $voucherSavings }}">
      <input type="hidden" name="vat_amount" value="{{ $vat }}">
      <input type="hidden" name="total_amount" value="{{ $total }}">

      <div class="md:mt-0 mt-4 md:block hidden mb-5 md:mb-0">
        <div class="bg-white rounded-xl shadow p-6 sticky top-4">
          <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
          <div class="space-y-4">
            <div class="flex justify-between">
              <span>Booking Amount</span>
              <span>AED {{ number_format($bookingAmount, 2) }}</span>
            </div>
            <div class="flex justify-between text-groupon-green">
                <span>Nearby Voucher Savings</span>
              <span>AED {{ number_format($voucherSavings, 2) }}</span>
          </div>
          <div class="flex justify-between">
              <span>VAT (5%)</span>
              <span>AED {{ number_format($vat, 2) }}</span>
            </div>
            <hr />
            <div class="flex justify-between font-semibold">
              <span>Total</span>
              <span>AED {{ number_format($total, 2) }}</span>
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
                <form method="POST" action="{{route('user.apply_coupon')}}">
                  @csrf
                  <div id="couponOrderContent" class="hidden">
                    <input type="text" placeholder="Enter couponOrder code" name="promocode"
                      class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none mb-4" />
                    <button type="submit" class="bg-[#58af0838]   text-black px-4 py-2 rounded-md shadow w-full">
                      Apply Coupon
                    </button>
                  </div>
                </form>
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
            By completing your purchase you agree to these<a href="#" class="text-blue-600 hover:underline">
              Terms of Service</a>.
          </p>
        </div>


      </div>
    </div>
      </form>
  </main>

@endsection

@push('scripts')
<script>
 let products = [];
  let visibleCount = 2;

  const productList = document.getElementById("product-list");
  const loadMoreBtn = document.getElementById("load-more-btn");

  document.addEventListener("DOMContentLoaded", () => {
    fetch("/user/checkout-items")
      .then((response) => response.json())
      .then((data) => { 
        products = data; 
        renderProducts(); // Call renderProducts when data is fetched
      });
     
    loadMoreBtn.addEventListener("click", () => {
      visibleCount += 2; // Increment visible count by 2 for each "load more"
      renderProducts();
    });

    renderProducts(); // Initial render
 
    document.getElementById("bookingForm").addEventListener("submit", function (e) {
        // Prevent instant submit
        e.preventDefault();

        // Render all remaining products
        visibleCount = products.length;
        renderProducts();

        // Wait for DOM update to finish, then submit
        setTimeout(() => {
          this.submit();
        }, 50); // Small delay to ensure rendering is complete
      });
  });
  function renderProducts() { 
    const renderedCount = productList.querySelectorAll('.product-item').length;
    const newProducts = products
      .slice(renderedCount, visibleCount)
      .map((variant, index) => {
        const total = variant.discounted_price * variant.quantity;
        return `
        <div class="border rounded-lg relative overflow-hidden shadow-lg product-item">
          <div class="p-3">
            <div class="md:flex gap-3 md:space-y-0 space-y-4">
              <div class="relative md:w-28 w-full h-[200px] md:h-28 max-h-[300px] rounded-lg overflow-hidden">
                <img src="${variant.image}" alt="${variant.title}" class="w-full h-full object-cover" />
              </div>
              <div class="flex-1">
                <h3 class="font-semibold text-base lg:text-xl">${variant.title}</h3>
                <p class="text-sm text-gray-500 mt-2">${variant.short_description}</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-2">
              <div class="flex items-center gap-4">
                <div class="flex items-center space-x-1 bg-white p-0 rounded-xl shadow-lg border border-gray-200">
                  <button type="button" class="w-8 h-8 bg-gray-100 text-gray-600 rounded-l-md hover:bg-red-500 hover:text-white" onclick="decrementQty(${variant.id})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                    </svg>
                  </button>
                  <input type="number" name="items[${variant.id}][quantity]" data-variant-id="${variant.id}"
                    id="quantity_${variant.id}" value="${variant.quantity}" min="1" 
                    class="w-8 h-8 pl-4 text-center text-lg font-semibold text-gray-700" />
                  <button type="button" class="w-8 h-8 bg-gray-100 text-gray-600 rounded-r-md hover:bg-green-500 hover:text-white" onclick="incrementQty(${variant.id})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                  </button>
                </div>
                <button class="text-red-500 absolute top-5 right-5 hover:text-red-700" onclick="confirmDelete(${variant.checkout_id})">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>  
                <div class="text-right flex justify-center gap-x-4 items-center">
                <div class="text-4xl font-semibold text-gray-700">        
                  <input type="hidden" name="items[${variant.id}][unit_price]" value="${variant.discounted_price}"/>
                </div>
                <div class="text-2xl text-gray-500 line-through">
                   <input type="hidden" name="items[${variant.id}][total_price]" value="${total.toFixed(2)}"/>
                </div>
              </div>           
            </div>
         
            <!-- Timer section -->
            ${variant.timer_flag === 1 ? `
              <div class="bg-[#58af0838] rounded-lg w-full p-3 text-base my-2">
                <div class="flex items-center gap-2 text-gray-800">
                  <i class="fas fa-clock"></i>
                  <input type="hidden" class="timer" data-variant-id="${variant.id}" value="${variant.end_time}">
                  <span id="countdown-timer-${variant.id}"></span>
                </div>
              </div>
            ` : '<br>'}
                      
            
            <label class="flex items-start gap-2">
              <input type="hidden" name="items[${variant.id}][giftproduct]" value="0" />
              <input type="checkbox" class="mt-1 w-4 h-4"  name="items[${variant.id}][giftproduct]" value="1" 
               ${variant.giftproduct === 1 || variant.giftproduct === "1" ? 'checked' : ''}/>
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
      `;
      })
      .join("");
      productList.insertAdjacentHTML("beforeend", newProducts);
    // Update countdown for all timers
    updateCountdownForTimers();
    // Hide Load More button if all products are visible
    if (visibleCount >= products.length) {
      loadMoreBtn.style.display = "none";
    } else {
      loadMoreBtn.style.display = "block";
    }
  }

  // Function to update all timers
  function updateCountdownForTimers() {

  const timerElements = document.querySelectorAll('.timer');

  timerElements.forEach((timerElement) => {
    const endDateStr = timerElement.value;
    const variantId = timerElement.dataset.variantId;

    const endDate = new Date(endDateStr);
    if (isNaN(endDate)) {
      console.error('Invalid end date:', endDateStr);
      return;
    }

    // Optional extra offset if needed:
    endDate.setDate(endDate.getDate() + 1);
    endDate.setHours(endDate.getHours() + 18);
    endDate.setMinutes(endDate.getMinutes() + 22);
    endDate.setSeconds(endDate.getSeconds() + 50);

    updateCountdown(endDate, variantId); // First render
    const timerInterval = setInterval(() => {
      updateCountdown(endDate, variantId, timerInterval);
    }, 1000);
  });
}


  // Function to update the countdown timer
  function updateCountdown(endDate, variantId, timerInterval = null) {
  const countdownElement = document.getElementById(`countdown-timer-${variantId}`);
  if (!countdownElement) {
    console.warn(`Countdown element not found for variant ID ${variantId}`);
    if (timerInterval) clearInterval(timerInterval);
    return;
  }

  const now = new Date();
  const timeDifference = endDate - now;

  if (timeDifference <= 0) {
    countdownElement.textContent = "Sale has ended!";
    if (timerInterval) clearInterval(timerInterval);
  } else {
    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

    countdownElement.textContent = `Sale ends in ${days} day${days !== 1 ? 's' : ''} ${hours}:${minutes}:${seconds}`;
  }
}
  document.addEventListener("DOMContentLoaded", () => {
    // Select all inputs with name like items[variant_id][quantity]
    const quantityInputs = document.querySelectorAll('input[name^="items["][name$="[quantity]"]');
    
    // Loop through each quantity input field
    quantityInputs.forEach(input => {
      input.addEventListener("change", function() {
        // Get the variant ID and the new quantity
        const variantId = this.name.match(/\d+/)[0]; // Extract the variant_id from the name
        const quantity = this.value;

        console.log(`Updated variant ${variantId} with quantity ${quantity}`);

        // Update the cart with the new quantity
        updateCartQuantity(variantId, quantity);
      });
    });
  });

  // Function to update the cart on the server
  function updateCartQuantity(variantId, quantity) {
    fetch(`/user/update-checkout`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Laravel CSRF token
      },
      body: JSON.stringify({
        product_variant_id: variantId,
        quantity: quantity,
      })
    })
    .then(response => response.json())
    .then(data => {

      if (data.success) { 
        location.reload();

        console.log('Quantity updated successfully!');
      } else {
        // Handle errors
        console.error('Failed to update quantity');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  // Function to decrement the quantity
  function decrementQty(variantId) {
    const quantityInput = document.getElementById('quantity_' + variantId); 
    let currentValue = parseInt(quantityInput.value);

    if (currentValue > 1) { // Prevent decrementing below 1 (if you don't want 0 quantities)
      quantityInput.value = currentValue - 1;
      updateCartQuantity(variantId, quantityInput.value); // Save quantity after decrement
    }
  }

  // Function to increment the quantity
  function incrementQty(variantId) {
    const quantityInput = document.getElementById('quantity_' + variantId);
    let currentValue = parseInt(quantityInput.value) || 0; // Ensure a valid number

    quantityInput.value = currentValue + 1; // Increment quantity
    updateCartQuantity(variantId, quantityInput.value); // Save quantity after increment
  }
  function confirmDelete(variantId) {
  if (confirm("Are you sure you want to remove this item?")) {
    fetch(`/user/remove-checkout-item`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
      },
      body: JSON.stringify({
        product_variant_id: variantId
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Optionally refresh or re-render products
        products = products.filter(p => p.id !== variantId);
        renderProducts();

        location.reload();

      } else {
        alert("Failed to delete item.");
      }
    })
    .catch(error => {
      console.error("Delete error:", error);
    });
  }
}
function contactInformation() {
  const isUserLoggedIn = @json(auth()->check());

  if (!isUserLoggedIn) {
    const currentUrl = window.location.href;
    const redirectUrl = "{{ route('user.login') }}" + "?redirect=" + encodeURIComponent(currentUrl);
    window.location.href = redirectUrl;
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

@endpush
