@extends('user.layouts.main')
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
@section('content')
  <div class="w-full container mx-auto px-4 lg:py-10 py-10">
    <h1 class="lg:text-3xl text-lg font-bold mt-5 mb-2 lg:my-8 text-gray-800 flex items-center">
      <i class="fas fa-shopping-cart mr-2"></i>
      Shopping Cart
    </h1>
  
    <form action="{{route('user.proceed_checkout')}}" method="post">
      @csrf
      <div class="grid gap-6 md:grid-cols-[2fr_1fr]">
        <!-- Product List -->
        <div class="space-y-6">
          <!-- Product 1 -->
@foreach($cartItems as $item)
    @php
      
        $variant = $item->productVariant; 
        $product = $variant?->checkout;
        $discountedPrice = $variant->discounted_price; 
        $quantity = $item->quantity;
        $totalprice = $discountedPrice * $quantity;
    @endphp 
  
    @if ($variant && $product)
        <input type="hidden" name="payment_type" value="card">
        <input type="hidden" name="orders[{{ $item->id }}][product_variant_id]" value="{{ $variant->id }}" />
        <input type="hidden" name="orders[{{ $item->id }}][unit_price]" value="{{ $variant->discounted_price }}"/>
        <input type="hidden" name="orders[{{ $item->id }}][total_price]" value="{{ $totalprice }}"/>
       

        <div class="border rounded-lg relative overflow-hidden shadow-lg p-3 my-4">
            <div class="md:flex gap-3">
                <div class="md:w-28 w-full h-[200px] md:h-28">
                    <img
                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.png') }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover rounded"
                    />
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-base lg:text-xl">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{$variant->title}}</p>
                    <p class="text-sm text-gray-500 mt-2">{{ $product->short_description }}</p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-2">
                <div class="flex items-center gap-4">
                    <div class="flex items-center space-x-1 bg-white rounded-xl border p-1">
                        <button type="button" onclick="decrementQty({{ $item->id }})"
                            class="w-8 h-8 flex justify-center items-center bg-gray-100 text-gray-600 rounded-l-md">
                            -
                        </button>

                        <input type="number" id="quantity_{{ $item->id }}"
                            name="orders[{{ $item->id }}][quantity]"
                            value="{{ old('quantity', $item->quantity ?? 1) }}"
                            class="w-10 text-center text-lg" />

                       <button type="button" 
    id="incrementBtn_{{ $item->id }}"
    onclick="incrementQty({{ $item->id }})"
    class="w-8 h-8 flex justify-center items-center bg-gray-100 text-gray-600 rounded-r-md">
    +
</button>

                    </div>
                </div>

                <div class="text-right">
                    <div class="md:text-2xl text-lg font-bold text-gray-700">
                        AED {{ number_format($variant->discounted_price ?? $variant->unit_price, 2) }}
                    </div>

                    @if ($variant->discounted_price && $variant->discounted_price < $variant->unit_price)
                        <div class="md:text-lg text-sm line-through text-gray-500">
                            AED {{ number_format($variant->unit_price, 2) }}
                        </div>
                    @endif
                </div>
            </div>

          @php
            $now = \Carbon\Carbon::now();   
            $endTime = isset($isoEndTimes[$variant->id]) 
                ? \Carbon\Carbon::parse($isoEndTimes[$variant->id]) 
                : null;
          @endphp

            @if ($variant->timer_flag === 1 && $endTime && $endTime->greaterThan($now))
                <div class="bg-yellow-100 rounded-lg w-full p-3 my-3 text-base">
                    <div class="flex items-center gap-2 text-gray-800">
                        <i class="fas fa-clock"></i>
                        <input type="hidden" class="timer" data-variant-id="{{ $variant->id }}" value="{{ $isoEndTimes[$variant->id] }}">
                        <span id="countdown-timer-{{ $variant->id }}"></span>
                    </div>
                </div>
            @endif
           
            <button type="button"
    class="text-red-500 absolute top-5 right-5 hover:text-red-700 flex items-center" onclick="confirmDelete({{ $item->id }})"
>
    <i class="fas fa-trash-alt mr-2"></i>
</button>

        </div>
    @endif
@endforeach


<meta name="csrf-token" content="{{ csrf_token() }}">



        
          <!-- Validation Message Popup -->
     
          
       
    
          <!-- Repeat Product 2 and Product 3 similar to Product 1 -->
        </div>

      <!-- Order Summary -->

      

      @php
    $originalTotal = 0;
    $bookingAmount = 0;
    

    foreach ($cartItems as $item) {
        $variant = $item->productVariant;
        $quantity = $item->quantity ?? 1;

        if ($variant) {
            $unitPrice = $variant->unit_price ?? 0;
            $discountedPrice = $variant->discounted_price ?? $unitPrice;

            $originalTotal += $unitPrice * $quantity;
            $bookingAmount += $discountedPrice * $quantity;
           
        }
    }

    $voucherSavings = $originalTotal - $bookingAmount;
    $vat = round($bookingAmount * 0.05, 2);
    $total = $bookingAmount + $vat;
@endphp 

<input type="hidden" name="original_total" value="{{ $originalTotal }}">
<input type="hidden" name="booking_amount" value="{{ $bookingAmount }}">
<input type="hidden" name="voucher_savings" value="{{ $voucherSavings }}">
<input type="hidden" name="vat_amount" value="{{ $vat }}">
<input type="hidden" name="total_amount" value="{{ $total }}">
<div class="border rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
    <div class="space-y-2 lg:text-base text-sm">

        <!-- Booking Amount -->
        <div class="flex justify-between lg:py-2">
            <div>Total Amount</div>
            <div class="font-medium text-green-700">AED {{ number_format($bookingAmount, 2) }}</div>
        </div>

        <!-- Nearby Voucher Savings -->
        <div class="flex justify-between lg:py-2">
            <div>Savings from Regular Price</div>
            <div class="text-red-500">- AED {{ number_format($voucherSavings, 2) }}</div>
        </div>

        <!-- VAT -->
        <div class="flex justify-between lg:py-2">
            <div>VAT (5%)</div>
            <div class="font-medium">AED {{ number_format($vat, 2) }}</div>
        </div>

        <hr class="my-2 border-gray-300">

        <!-- Total -->
        <div class="flex justify-between lg:py-2 font-semibold">
            <div>Grand Total</div>
            <div class="text-gray-800">AED {{ number_format($total, 2) }}</div>
        </div>

    </div>
    
    <button type="submit" class="w-full mt-6 px-9 py-3 bg-[#58af0838] text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                Proceed to Checkout
              </button>
</div>

      </div>
      </div>
    </form>
  </div>
@endsection
@push('styles')
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
@endpush
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
  </script>

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
   document.addEventListener("DOMContentLoaded", () => {
    updateCountdownForTimers();
   });
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

  if (endDate <= now) { 
    const countdownElement = document.getElementById(`countdown-timer-${variantId}`);
    if (countdownElement) countdownElement.style.display = 'none';
    return;
  }

  updateCountdown(endDate, variantId);
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
</script>

<script>
  // Function to update the cart on the server
  function updateCartQuantity(Id, quantity) {
    fetch(`/update-cart`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Laravel CSRF token
      },
      body: JSON.stringify({
        id: Id,
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
function decrementQty(Id) {
  const quantityInput = document.getElementById('quantity_' + Id); 
  const incrementBtn = document.getElementById('incrementBtn_' + Id);
  let currentValue = parseInt(quantityInput.value);

  if (currentValue > 1) {
    quantityInput.value = currentValue - 1;
    updateCartQuantity(Id, quantityInput.value);
  }

  // Re-enable the increment button if it was disabled
  if (parseInt(quantityInput.value) < 5) {
    incrementBtn.disabled = false;
    incrementBtn.classList.remove('opacity-50', 'cursor-not-allowed');
  }
}

function incrementQty(Id) {
  const quantityInput = document.getElementById('quantity_' + Id);
  const incrementBtn = document.getElementById('incrementBtn_' + Id);
  let currentValue = parseInt(quantityInput.value) || 0;

  if (currentValue < 5) {
    quantityInput.value = currentValue + 1;
    updateCartQuantity(Id, quantityInput.value);
  }

  // Disable the button if value is now 5
  if (parseInt(quantityInput.value) >= 5) {
    incrementBtn.disabled = true;
    incrementBtn.classList.add('opacity-50', 'cursor-not-allowed');
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
  function confirmDelete(itemId) {
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
      fetch(`/cart`, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({
          id: itemId
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Optional success message
          Swal.fire(
            'Deleted!',
            'The cart item has been removed.',
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

@endpush