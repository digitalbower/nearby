@extends('user.layouts.main')
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

      input[type="radio"]:checked + span {
        display: block;
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
  <main class="flex-grow bg-[#ebebeb] px-4 lg:px-10 py-8 lg:py-20">
    <div class="lg:flex container mx-auto lg:space-x-6">
        <div class="md:w-full lg:w-[50%] xl:w-[60%] md:mb-6 lg:mb-0 space-y-6 overflow-hidden">
          {{-- <div class="bg-[#58af0838]  rounded-xl px-4 p-2 lg:p-7">
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
          </div> --}}

          <div class="p-4 bg-white rounded-xl">
            <h5 class="font-semibold text-xl text-gray-800 mb-4">Checkout</h5>

            <!-- <div class="grid sm:grid-cols-4 gap-6 mb-6">
              <label for="plan-hobby" class="relative flex flex-col bg-white p-5 rounded-lg shadow-md cursor-pointer">
                <span class="font-semibold text-gray-500 leading-tight uppercase">Delivery</span>
                <input type="radio" name="plan" id="plan-hobby" value="hobby" class="absolute h-0 w-0 appearance-none" />
                <span aria-hidden="true" class="hidden absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
                  <span class="absolute top-4 right-4 h-6 w-6 inline-flex items-center justify-center rounded-full bg-green-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-green-600">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                  </span>
                </span>
              </label>
              <label for="plan-growth" class="relative flex flex-col bg-white p-5 rounded-lg shadow-md cursor-pointer">
                <span class="font-semibold text-gray-500 leading-tight uppercase">Pick Up</span>
                <input type="radio" name="plan" id="plan-growth" value="growth" class="absolute h-0 w-0 appearance-none" checked />
                <span aria-hidden="true" class="hidden absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
                  <span class="absolute top-4 right-4 h-6 w-6 inline-flex items-center justify-center rounded-full bg-green-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-green-600">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                  </span>
                </span>
              </label>
            </div> -->

            <div class="mt-4">
              <!-- Tabs -->
              <ul id="tabs" class="inline-flex whitespace-nowrap overflow-y-hidden pt-2 px-1 w-full">
                <li class="px-4 text-gray-800 font-semibold py-2 bg-[#58af0838] rounded -mb-px"><a id="default-tab" href="#first">Main Guest</a></li>
                @for ($i=1;$i<$max_quantity_in_checkout;$i++)
                  <li class="px-4 text-gray-800 font-semibold py-2 rounded"><a href="#second_{{$i}}">Guest {{$i}}</a></li>
                @endfor
              </ul>

              <!-- Tab Contents -->
              <div id="tab-contents">
                <div id="first" class="p-4">
                  <div class="grid md:grid-cols-2 gap-6">
                    <div class="relative">
                      <label class="text-sm block text-sm font-semibold text-gray-800" for="">Name</label>
                      <input type="text" name="name" value="{{$user_first_name}}" class="mt-2 w-full relative rounded-lg focus:outline-none border border-gray-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring px-2 py-2" disabled>
                    </div>
                    <div class="relative">
                      <label class="text-sm block text-sm font-semibold text-gray-800" for="">Email Address</label>
                      <input type="email" name="email" value="{{$user_email}}" class="mt-2 w-full relative rounded-lg focus:outline-none border border-gray-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring px-2 py-2" disabled>
                    </div>
                  </div>
                </div>
@for ($i=1;$i<$max_quantity_in_checkout;$i++)                     
<div id="second_{{$i}}" class="hidden p-4">                       
    <div class="grid md:grid-cols-2 gap-6">                         
        <div class="relative">                           
            <label class="text-sm block text-sm font-semibold text-gray-800" for="">Name</label>                           
            <input type="text" 
                   name="guests[{{$i}}][guest_first_name]" 
                   value="{{ old('guests.'.$i.'.guest_first_name') }}"
                   class="mt-2 w-full relative rounded-lg focus:outline-none border focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring px-2 py-2 
                          {{ $errors->has('guests.'.$i.'.guest_first_name') ? 'border-red-500 focus-visible:ring-red-500' : 'border-gray-300' }}">
            @error('guests.'.$i.'.guest_first_name')
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
            @enderror                         
        </div>                         
        <div class="relative">                           
            <label class="text-sm block text-sm font-semibold text-gray-800" for="">Email Address</label>                           
            <input type="email" 
                   name="guests[{{$i}}][guest_email]" 
                   value="{{ old('guests.'.$i.'.guest_email') }}"
                   class="mt-2 w-full relative rounded-lg focus:outline-none border focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring px-2 py-2 
                          {{ $errors->has('guests.'.$i.'.guest_email') ? 'border-red-500 focus-visible:ring-red-500' : 'border-gray-300' }}">
            @error('guests.'.$i.'.guest_email')
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
            @enderror                         
        </div>                       
    </div>                     
</div>                 
@endfor
              </div>
            </div>

            
          </div>

          <!-- <div class="p-4 bg-white rounded-xl mt-4">
            <h5 class="font-semibold text-xl text-gray-800 mb-4">Shipping information</h5>
            <div class="grid grid-cols-2 gap-6">
              <div class="user mt-0 border relative border-[#58af0838] rounded-xl shadow-lg p-3 transition duration-300">
                <h4 class="text-lg font-medium">Varun Kumar</h4>
                <p class="text-sm my-1"><strong class="text-gray-800">Email:</strong> varunkumar@gmail.com</p>
                <p class="text-sm"><strong class="text-gray-800">Quantity:</strong> 5</p>
              </div>

              <div class="user mt-0 border relative border-[#58af0838] rounded-xl shadow-lg p-3 transition duration-300">
                <h4 class="text-lg font-medium">Varun Kumar</h4>
                <p class="text-sm my-1"><strong class="text-gray-800">Email:</strong> varunkumar@gmail.com</p>
                <p class="text-sm"><strong class="text-gray-800">Quantity:</strong> 5</p>
              </div>
            </div>
          </div> -->

          

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
          <div class="bg-white rounded-xl shadow md:p-6 p-3 sticky top-4">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
            <div class="space-y-4">
              <div class="flex justify-between">
                <span>Total Amount</span>
                <span>AED {{ number_format($bookingAmount, 2) }}</span>
              </div>
              <div class="flex justify-between text-groupon-green">
                <span>Savings from Regular Price</span>
                <span>AED {{ number_format($voucherSavings, 2) }}</span>
              </div>
              <div class="flex justify-between">
                <span>VAT (5%)</span>
                <span>AED {{ number_format($vat, 2) }}</span>
              </div>
              @if (session('promocode'))
              <div class="flex justify-between">
                <span>Promocode</span>
                <span>{{ $promoCode }}({{ rtrim(rtrim(number_format($promo_discount, 2), '0'), '.') }}%)</span>
              </div>
              <div class="flex justify-between">
                <span>Promocode Discount</span>
                <span>AED {{ number_format($promocode_discount_amount,2) }}</span>
              </div>
              @endif
            
              <hr />
              
              <div class="flex justify-between font-semibold">
                <span>Grand Total</span>
                <span>AED {{ number_format($total, 2) }}</span>
              </div>
            </div>
            {{-- <div class="mt-5">
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
            </div> --}}

            <!-- Coupon Code Section -->
            <div class="mt-6">
              <button type="button" id="couponToggle" class="flex justify-between w-full items-center mb-4"
                onclick="toggleDropdown('couponContent', 'couponIcon')">
                <span class="text-sm font-medium">Have a Coupon Code?</span>
                <i id="couponIcon" class="fas fa-chevron-down"></i>
              </button>
            
              @php
                $isPromoApplied = session('promocode') !== null;
              @endphp
            
              <div id="couponContent" class="hidden">
                <input type="text" placeholder="Enter coupon code" id="promocode-mobile" name='promocode'
                  class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none mb-4" />
                <button type="button" onclick="applyCoupon()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow w-full">
                  Apply Coupon
                </button>
                @if ($isPromoApplied)
                <p class="text-green-500 text-sm mt-2">Promo code <strong>{{ session('promocode') }}</strong> already applied.</p>
                @endif
              </div>
            </div>

            <button
              class="md:inline-flex hidden items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 w-full mt-6 bg-[#58af0838]  text-black pay-now-button">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
                class="svg-inline--fa fa-lock mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor"
                  d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z">
                </path>
              </svg>Complete Order
            </button>

            <p class="text-xs text-gray-500 md:block hidden text-center mt-4">
              By completing your purchase, you agree to our <a href="{{route('terms_and_conditions')}}" class="text-blue-600 hover:underline">Terms & Conditions</a>.
            </p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow p-4 px-4 lg:p-7 mx-auto">
          <h2 class="text-2xl font-semibold mb-6">Payment</h2>
          <div class="space-y-6">
            <div class="space-y-4" id="paymentDetails">
              <div class="space-y-6">
                <input type="hidden" name="amount" id="amount" value="{{ $total }}">
              
                <!-- Card Number -->
                <div class="relative">
                  <label for="cardNumber" class="block text-sm font-semibold text-gray-800">Card Number</label>
                  <div class="mt-2 relative rounded-lg border border-gray-300 focus-within:ring-2 focus-within:ring-[#000] px-4 py-3" id="card-number-element">
                    <!-- Stripe will mount card number here -->
                  </div>
                  <div class="absolute inset-y-0 right-4 top-7 flex items-center pointer-events-none">
                    <i class="fas fa-credit-card text-gray-500"></i>
                  </div>
                  <div id="cardNumberError" class="text-sm text-red-600 mt-1 hidden">Please enter a valid card number.</div>
                </div>
              
                <!-- Expiry and CVV -->
                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label for="expDate" class="block text-sm font-semibold text-gray-800">Expiration Date</label>
                    <div class="mt-2 px-4 py-3 border border-gray-300 rounded-lg" id="card-expiry-element">
                      <!-- Stripe will mount expiry here -->
                    </div>
                    <div id="expDateError" class="text-sm text-red-600 mt-1 hidden">Invalid expiration date.</div>
                  </div>
              
                  <div>
                    <label for="cvv" class="block text-sm font-semibold text-gray-800">CVV</label>
                    <div class="mt-2 px-4 py-3 border border-gray-300 rounded-lg" id="card-cvc-element">
                      <!-- Stripe will mount CVV here -->
                    </div>
                    <div id="cvvError" class="text-sm text-red-600 mt-1 hidden">Invalid CVV.</div>
                  </div>
                </div>
              
                <!-- Submit -->
                <button
                  class="inline-flex items-center justify-center gap-2 rounded-md text-sm font-medium h-10 px-4 py-2 w-full mt-6 bg-[#58af0838] text-black shadow hover:shadow-md transition pay-now-button">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
                    class="svg-inline--fa fa-lock mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512" width="16" height="16">
                    <path fill="currentColor"
                      d="M144 144v48h160v-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192v-48C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64v192c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64h16z">
                    </path>
                  </svg>
                  Complete Payment
                </button>
              </div>
                <div id="card-errors" class="text-red-600 mt-2 text-sm hidden"></div>
            </div>
        
           
            <p class="text-xs text-gray-500 text-center mt-4">
              By completing your purchase, you agree to our <a href="{{route('terms_and_conditions')}}" class="text-blue-600 hover:underline">Terms & Conditions</a>.
            </p>
          </div>
        </div>
    
      </div>
      <input type="hidden" name="max_quantity_in_checkout" id="max_quantity_in_checkout" value="{{ $max_quantity_in_checkout }}">
      <input type="hidden" name="booking_amount" id="booking_amount" value="{{ $bookingAmount }}">
      <input type="hidden" name="voucher_savings" id="voucher_savings" value="{{ $voucherSavings }}">
      <input type="hidden" name="vat_amount" id="vat_amount" value="{{ $vat }}">
      <input type="hidden" name="promocode" id="promocode" value="{{ $promoCode }}">
      <input type="hidden" name="promocode_discount_amount" id="promocode_discount_amount" value="{{ $promocode_discount_amount }}">
      <input type="hidden" name="total_amount" id="total_amount" value="{{ $total }}">
      <input type="hidden" name="order_id" id="order_id" value="{{ $order_id }}">

      <div class="md:mt-0 mt-4 md:w-full lg:w-[50%] xl:w-[40%] md:block hidden mb-5 md:mb-0">
        <!-- <div class="bg-white rounded-xl py-6 mb-4 px-2 lg:px-8 lg:py-10">        
          
        </div> -->
        <div class="bg-white rounded-xl shadow p-6 sticky top-4">
          <h2 class="text-xl font-semibold mb-4">Order Summary ({{$count}} items)</h2>
          <div class=" mb-8">
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
          <div class="space-y-4">
            <div class="flex justify-between">
              <span>Total Amount</span>
              <span>AED {{ number_format($bookingAmount, 2) }}</span>
            </div>
            <div class="flex justify-between text-groupon-green">
                <span>Savings from Regular Price</span>
              <span>AED {{ number_format($voucherSavings, 2) }}</span>
          </div> 
          <div class="flex justify-between">
              <span>VAT (5%)</span>
              <span>AED {{ number_format($vat, 2) }}</span>
          </div>
          @if (session('promocode'))
            <div class="flex justify-between">
              <span>Promocode</span>
              <span>{{ $promoCode }}({{ rtrim(rtrim(number_format($promo_discount, 2), '0'), '.') }}%)</span>
            </div>
            <div class="flex justify-between">
              <span>Promocode Discount</span>
              <span>AED {{ number_format($promocode_discount_amount,2) }}</span>
            </div>
            @endif
           
            <hr />
            <div class="flex justify-between font-semibold">
              <span>Grand Total</span>
              <span>AED {{ number_format($total, 2) }}</span>
            </div>

          </div>


          {{-- <div class="mt-5">
            <button type="button" class="flex justify-between w-full items-center mb-4" data-toggle="dropdownCheckout"
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
          </div> --}}

              <!-- CouponOrder Code Section -->
              <div class="mt-6">
                <button  type="button" class="flex justify-between w-full items-center mb-4" data-toggle="couponOrder"
                  data-target="couponOrderContent" data-icon="couponOrderIcon">
                  <span class="text-sm font-medium">Have a CouponOrder Code?</span>
                  <i id="couponOrderIcon" class="fas fa-chevron-down"></i>
                </button>
                @php
                  $isPromoApplied = session('promocode') !== null;
                @endphp
                  <div id="couponOrderContent" class="hidden">
                    <input type="text" placeholder="Enter couponOrder code" name="promocode" id="promocode-desktop"
                      class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring focus:ring-blue-300 focus:outline-none mb-4" />
                    <button type="button" onclick="applyCoupon()"  class="bg-[#58af0838]   text-black px-4 py-2 rounded-md shadow w-full">
                      Apply Coupon
                    </button>
                    @if ($isPromoApplied)
                    <p class="text-green-500 text-sm mt-2">Promo code <strong>{{ session('promocode') }}</strong> already applied.</p>
                    @endif
                </div>
          </div>

          <button
            class="md:inline-flex hidden items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 w-full mt-6 bg-[#58af0838]  text-black pay-now-button">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock"
              class="svg-inline--fa fa-lock mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path fill="currentColor"
                d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z">
              </path>
            </svg>Complete Order
          </button>

          <p class="text-xs text-gray-500 md:block hidden text-center mt-4">
          By completing your purchase, you agree to our <a href="{{route('terms_and_conditions')}}" class="text-blue-600 hover:underline">Terms & Conditions</a>.
          </p>
        </div>


      </div>
    </div>
    
  </main>

@endsection
<script src="https://js.stripe.com/v3/"></script>
<script>
  const stripePublicKey = "{{ env('STRIPE_KEY') }}";  // Note the quotes

</script>

<script type="module">

  import { Application, Controller } from "https://unpkg.com/@hotwired/stimulus/dist/stimulus.js"
  window.Stimulus = Application.start()

  Stimulus.register("tabs", class extends Controller {
    static targets = [ "tab", "panel" ]
    static values = { index: Number }

    initialize() {
      this.showTab()
    }

    change(event) {
      event.preventDefault()
      this.indexValue = this.tabTargets.indexOf(event.currentTarget)
      this.showTab()
    }

    showTab() {
      this.panelTargets.forEach((el, index) => {
        index == this.indexValue ? el.classList.remove("hidden") : el.classList.add("hidden")
      })
      this.tabTargets.forEach((el, index) => {
        index == this.indexValue ? el.classList.add("bg-gray-100") : el.classList.remove("bg-gray-100")
      })
    }
  })
</script>
<script>
 document.addEventListener("DOMContentLoaded", function () {
  const stripe = Stripe(stripePublicKey);
  const elements = stripe.elements();
  const style = {
    base: {
      fontSize: '14px',
      color: '#1f2937',
      fontFamily: 'inherit',
      '::placeholder': { color: '#9ca3af' },
    },
    invalid: { color: '#ef4444' },
  };

  const cardNumber = elements.create('cardNumber', { style });
  const cardExpiry = elements.create('cardExpiry', { style });
  const cardCvc = elements.create('cardCvc', { style });

  cardNumber.mount('#card-number-element');
  cardExpiry.mount('#card-expiry-element');
  cardCvc.mount('#card-cvc-element');

  function clearErrorOnInputChange(element) {
  element.on('change', function(event) {
    const errorElement = document.getElementById("card-errors");
    if (event.error) {
      errorElement.textContent = event.error.message;
      errorElement.classList.remove("hidden");
    } else {
      errorElement.textContent = "";
      errorElement.classList.add("hidden");
    }
  });
}

clearErrorOnInputChange(cardNumber);
clearErrorOnInputChange(cardExpiry);
clearErrorOnInputChange(cardCvc);

function collectGuests() {
  const maxQuantityElement = document.getElementById("max_quantity_in_checkout"); 
  const maxQuantity = parseInt(maxQuantityElement.value, 10);
  const guests = [];
  const errors = [];
  
  // Helper function to clear previous JS error styling
  function clearJSErrors() {
    const errorElements = document.querySelectorAll('.js-error-message');
    errorElements.forEach(el => el.remove());
    
    const inputsWithErrors = document.querySelectorAll('.js-error-input');
    inputsWithErrors.forEach(input => {
      input.classList.remove('js-error-input');
      // Reset border color to original state
      if (input.classList.contains('border-red-500')) {
        input.classList.remove('border-red-500');
        input.classList.add('border-gray-300');
      }
    });
  }
  
  // Helper function to display JS error message
  function showJSError(inputElement, message) {
    inputElement.classList.add('js-error-input');
    inputElement.classList.remove('border-gray-300');
    inputElement.classList.add('border-red-500');
    
    const errorSpan = document.createElement('span');
    errorSpan.className = 'js-error-message text-red-500 text-xs mt-1 block';
    errorSpan.textContent = message;
    
    inputElement.parentNode.appendChild(errorSpan);
  }
  
  // Clear any previous JS errors (keep Laravel errors)
  clearJSErrors();
  
  for (let i = 1; i < maxQuantity; i++) {
    const guestNameInput = document.querySelector(`input[name="guests[${i}][guest_first_name]"]`);
    const guestEmailInput = document.querySelector(`input[name="guests[${i}][guest_email]"]`);
    
    if (guestNameInput && guestEmailInput) {
      const guestName = guestNameInput.value.trim();
      const guestEmail = guestEmailInput.value.trim();
      
      let hasError = false;
      
      // Check if name is required
      if (!guestName) {
        showJSError(guestNameInput, 'Name is required');
        errors.push(`Guest ${i}: Name is required`);
        hasError = true;
      }
      
      // Check if email is required
      if (!guestEmail) {
        showJSError(guestEmailInput, 'Email is required');
        errors.push(`Guest ${i}: Email is required`);
        hasError = true;
      }
      
      // Only add guest if no errors
      if (!hasError) {
        guests.push({
          guest_first_name: guestName,
          guest_email: guestEmail
        });
      }
    }
  }
  
  return {
    guests: guests,
    errors: errors,
    isValid: errors.length === 0
  };
}

  async function handlePayment() {
    const amountElement = document.getElementById("amount");
    const orderIdElement = document.getElementById("order_id");
    const bookingAmountElement = document.getElementById("booking_amount");
    const voucherSavingsElement = document.getElementById("voucher_savings");
    const totalAmountElement = document.getElementById("total_amount");
    const vatAmountElement = document.getElementById("vat_amount");
    const promocodeElement = document.getElementById("promocode");
    const promocodeDiscountAmountElement = document.getElementById("promocode_discount_amount");

    // Validate guests first
    const guestValidation = collectGuests();
    if (!guestValidation.isValid) {
      showError("Please fill in all required guest information");
      return;
    }

    // Check if the required elements exist
    if (!amountElement || !orderIdElement || !bookingAmountElement || !voucherSavingsElement || !totalAmountElement || !vatAmountElement) {
        showError("Please enter card details");
        return;
    }

    const amount = amountElement.value;
    const order_id = orderIdElement.value;
    const booking_amount = bookingAmountElement.value;
    const voucher_savings = voucherSavingsElement.value;
    const total_amount = totalAmountElement.value;
    const vat_amount = vatAmountElement.value;
    const promocode = promocodeElement.value;
    const promo_discount_amount = promocodeDiscountAmountElement.value;

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (!amount || isNaN(amount) || parseFloat(amount) <= 0) {
      showError("Invalid amount.");
      return;
    }
    if (!order_id) {
      showError("Order ID is missing.");
      return;
    }

    try {
      const res = await fetch("/api/stripe/create-payment-intent", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({ amount: Math.round(parseFloat(amount) * 100) })
      });

      const { client_secret } = await res.json();
      if (!client_secret) throw new Error("No client secret received.");

      const { paymentIntent, error } = await stripe.confirmCardPayment(client_secret, {
        payment_method: {
          card: cardNumber,
          billing_details: { name }
        }
      });

      if (error || paymentIntent.status !== "succeeded") {
        throw new Error(error?.message || "Payment failed.");
      }

      if (paymentIntent.status === "succeeded") {
        const items = collectItems();
        const guests = guestValidation.guests; // Use already validated guests
        const finalizeRes = await fetch("/api/stripe/finalize-booking", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            payment_intent_id: paymentIntent.id,
            order_id,
            booking_amount,
            voucher_savings,
            total_amount,
            vat_amount,
            promocode,
            promo_discount_amount,
            items,
            guests
          })
        });

        const result = await finalizeRes.json();
        if (result.success) {
          console.log("Booking complete!");
          window.location.href = "/bookingconfirmation";
        } else {
          showError("Booking failed: " + result.error);
        }
      }

    } catch (err) {
      console.error("Payment error:", err);
      showError(err.message);
    }
  }

  function showError(message) {
    console.log("Showing error:", message); 
    const errorElement = document.getElementById("card-errors");
    if (!errorElement) return console.error("Missing #card-errors element in HTML");
    errorElement.textContent = message;
    errorElement.classList.remove("hidden");
  }

  // Add the 'async' keyword here
  document.querySelectorAll(".pay-now-button").forEach(button => {
    button.addEventListener("click", async (event) => { 
      event.preventDefault();
      const loader = document.getElementById("page-loader");
      if (!loader) {
        console.error("Loader element not found!");
        return;
      }
        loader.style.display = 'flex';
      

      try {
        await handlePayment();  
      } catch (error) {
        showError("Unexpected error occurred");
      } finally {
        loader.style.display = 'none'; 
      }
    });
  });
});

function collectItems() {
  const itemInputs = document.querySelectorAll("[id^='quantity_']");
  const items = {};

  itemInputs.forEach((input) => {
    const variantId = input.dataset.variantId;
    const quantity = parseInt(input.value, 10);
    const unitPrice = parseFloat(
      document.querySelector(`input[name="items[${variantId}][unit_price]"]`).value
    );
    const totalPrice = parseFloat(
      document.querySelector(`input[name="items[${variantId}][total_price]"]`).value
    );
    const giftCheckbox = document.querySelector(`input[name="items[${variantId}][giftproduct]"]:checked`);
    const giftproduct = giftCheckbox ? 1 : 0;

    items[variantId] = {
      quantity,
      unit_price: unitPrice,
      total_price: totalPrice,
      giftproduct,
    };
  });

  return items;
}

</script>
@push('scripts')
<script>
 let products = [];
  let visibleCount = 2;

  const productList = document.getElementById("product-list");
  const loadMoreBtn = document.getElementById("load-more-btn");

  document.addEventListener("DOMContentLoaded", () => {
    fetch("/checkout-items")
      .then((response) => response.json())
      .then((data) => { 
        products = data; 
        renderProducts(); // Call renderProducts when data is fetched
      });
     
    loadMoreBtn.addEventListener("click", () => {
      visibleCount += 2; // Increment visible count by 2 for each "load more"
      updateVisibleItems();
    });
  });
  function renderProducts() {
    const allProductsHTML = products.map((variant, index) => {
        const total = variant.discounted_price * variant.quantity;
        const isVisible = index < visibleCount;
        return `
        <div class="product-item border p-4 rounded shadow" style="display: ${isVisible ? 'block' : 'none'};">
          <div class="md:text-2xl text-lg relative text-gray-700">
            <div class="md:flex gap-3 md:space-y-0 space-y-4">
              <div class="relative md:w-28 w-full h-[200px] md:h-28 max-h-[300px] rounded-lg overflow-hidden">
                <img src="${variant.image}" alt="${variant.title}" class="w-full h-full object-cover" />
              </div>
              <div class="flex-1">
                <h3 class="font-semibold text-base lg:text-lg pr-5">${variant.product_name}</h3>
                <p class="text-sm text-gray-500 mt-2">${variant.title}</p>
                <p class="text-sm text-gray-500 mt-2">${variant.short_description}</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-2">
              <div class="flex items-center gap-4">
                <div class="flex items-center space-x-1 bg-white p-0 rounded-xl shadow-lg border border-gray-200">
               
               <input 
  type="number" 
  name="items[${variant.id}][quantity]" 
  data-variant-id="${variant.id}"
  id="quantity_${variant.id}" 
  value="${variant.quantity}" 
  min="1" 
  readonly
  class="w-8 h-8 text-center text-lg font-semibold text-gray-700" 
/>



                </div>
                
              </div>  
                <div class="text-right">
                 <div class="md:text-xl text-lg font-bold text-gray-700"> 
                    AED ${variant.discounted_price}   
                  <input type="hidden" name="items[${variant.id}][unit_price]" value="${variant.discounted_price}"/>
                </div>
               <div class="text-lg line-through text-gray-500">
                    AED ${variant.original_price}   
                   <input type="hidden" name="items[${variant.id}][total_price]" value="${total.toFixed(2)}"/>
                </div>
              </div>           
            </div>
            <button type="button" class="text-red-500 hover:text-red-700 absolute md:top-0 md:right-0 top-3 right-3 z-20" onclick="confirmDelete(${variant.id})">
              <i class="fas fa-trash-alt text-lg"></i>
            </button>
            <!-- Timer section -->
            ${variant.timer_flag === 1 && new Date(variant.end_time) > new Date() ? `
              <div class="bg-[#58af0838] rounded-lg w-full p-3 text-base my-2">
                <div class="flex items-center gap-2 text-gray-800">
                  <i class="fas fa-clock"></i>
                  <input type="hidden" class="timer" data-variant-id="${variant.id}" value="${variant.end_time}">
                  <span id="countdown-timer-${variant.id}"></span>
                </div>
              </div>
            ` : ''}
          </div>
        </div>
      `;
      })
      .join("");
      productList.innerHTML = allProductsHTML;
    // Update countdown for all timers
    updateCountdownForTimers();
    // Hide Load More button if all products are visible
    if (visibleCount >= products.length) {
      loadMoreBtn.style.display = "none";
    }
  }

  function updateVisibleItems() {
    const productItems = document.querySelectorAll(".product-item");
    productItems.forEach((item, index) => {
      if (index < visibleCount) {
        item.style.display = "block";
      }
    });

    if (visibleCount >= products.length) {
      loadMoreBtn.style.display = "none";
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

    const now = new Date(); 
    // 💡 Requirement 3: Sale already expired on first load? Hide completely.
    if (endDate <= now) {   
      const countdownElement = document.getElementById(`countdown-timer-${variantId}`);
      if (countdownElement) countdownElement.style.display = 'none';
      return;
    }

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

    countdownElement.textContent =
      `Sale ends in ${days} day${days !== 1 ? 's' : ''} ` +
      `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
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
    fetch(`/update-checkout`, {
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
 function incrementQty(id) {
  const qtyInput = document.getElementById('quantity_' + id);
  const incrementBtn = document.getElementById('incrementBtn_' + id);
  let currentValue = parseInt(qtyInput.value) || 0;

  if (currentValue < 5) {
    qtyInput.value = currentValue + 1;

    if (parseInt(qtyInput.value) === 5) {
      incrementBtn.disabled = true;
      incrementBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
  }
}

function decrementQty(id) {
  const qtyInput = document.getElementById('quantity_' + id);
  const incrementBtn = document.getElementById('incrementBtn_' + id);
  let currentValue = parseInt(qtyInput.value);

  if (currentValue > 1) {
    qtyInput.value = currentValue - 1;

    if (parseInt(qtyInput.value) < 5) {
      incrementBtn.disabled = false;
      incrementBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    }
  }
}

  function confirmDelete(variantId) {
  Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to remove this item?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch(`/remove-checkout-item`, {
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
          // Update products list
          products = products.filter(p => p.id !== variantId);
          renderProducts();

          // Optional success message
          Swal.fire(
            'Deleted!',
            'The item has been removed.',
            'success'
          ).then(() => {
            location.reload(); // Reload after showing success
          });

        } else {
          Swal.fire(
            'Error!',
            'Failed to delete item.',
            'error'
          );
        }
      })
      .catch(error => {
        console.error("Delete error:", error);
        Swal.fire(
          'Error!',
          'Something went wrong.',
          'error'
        );
      });
    }
  });
}
</script>
<script>
function applyCoupon() {
  const mobileInput = document.getElementById("promocode-mobile");
  const desktopInput = document.getElementById("promocode-desktop");

  // Pick the visible input
  const promoCode = !mobileInput.classList.contains('hidden') && mobileInput.offsetParent !== null
    ? mobileInput.value.trim()
    : desktopInput.value.trim();

  if (!promoCode) {
    Swal.fire('Oops!', 'Please enter a promo code.', 'warning');
    return;
  }

  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

  fetch("{{ route('user.apply_coupon') }}", {
    method: 'POST',
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": csrfToken,
    },
    body: JSON.stringify({ promocode: promoCode }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        Swal.fire('Success', data.message, 'success').then(() => {
          location.reload();
        });
      } else {
        Swal.fire('Error', data.message, 'error');
      }
    })
    .catch((error) => {
      console.error(error);
      Swal.fire('Error', 'Something went wrong.', 'error');
    });
}


</script>
<script>

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
  document.addEventListener("DOMContentLoaded", () => {
  const dropdown = document.getElementById("dropdown");

  document.addEventListener("click", (event) => {
    if (
      !event.target.closest("#dropdown") &&
      !event.target.closest("#search-input") &&
      !event.target.closest("button")
    ) {
      dropdown.classList.add("hidden");
    }
  });
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
  function toggleDropdown(contentId, iconId) {
  const content = document.getElementById(contentId);
  const icon = document.getElementById(iconId);

  console.log(content, icon);  // Debugging to check if content and icon are correctly selected

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
<script>

document.addEventListener("DOMContentLoaded", function () {
  const couponOrderToggle = document.getElementById('couponOrderToggle');
  const couponOrderContent = document.getElementById('couponOrderContent');
  const couponOrderIcon = document.getElementById('couponOrderIcon');

  // Check if the button exists
  if (couponOrderToggle) {
    couponOrderToggle.addEventListener('click', function () {
      // Toggle the visibility of the couponOrderContent
      couponOrderContent.classList.toggle('hidden');
      
      // Toggle the icon (change from down to up chevron)
      if (couponOrderContent.classList.contains('hidden')) {
        couponOrderIcon.classList.remove('fa-chevron-up');
        couponOrderIcon.classList.add('fa-chevron-down');
      } else {
        couponOrderIcon.classList.remove('fa-chevron-down');
        couponOrderIcon.classList.add('fa-chevron-up');
      }
    });
  }
});

let tabsContainer = document.querySelector("#tabs");

let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

console.log(tabTogglers);

tabTogglers.forEach(function(toggler) {
  toggler.addEventListener("click", function(e) {
    e.preventDefault();

    let tabName = this.getAttribute("href");

    let tabContents = document.querySelector("#tab-contents");

    for (let i = 0; i < tabContents.children.length; i++) {
      
      tabTogglers[i].parentElement.classList.remove("bg-[#58af0838]");  tabContents.children[i].classList.remove("hidden");
      if ("#" + tabContents.children[i].id === tabName) {
        continue;
      }
      tabContents.children[i].classList.add("hidden");
      
    }
    e.target.parentElement.classList.add("bg-[#58af0838]");
  });
});

</script>


@endpush