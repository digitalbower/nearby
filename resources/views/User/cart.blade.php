@extends('User.layouts.main')
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
                $product = $item->varient?->checkout;
            @endphp

            @if ($product)
              <input type="hidden" name="booking_amount" value="{{number_format($total)}}">
              <input type="hidden" name="discount_amount" value="{{$item->varient->sum('discounted_price');}}">
              <input type="hidden" name="total_amount" value="{{number_format($total)}}">
              <input type="hidden" name="payment_type" value="card">
              <input type="hidden" name="orders[{{ $item->varient->id }}][product_variant_id]" value="{{ $item->varient->id }}" />
              <input type="hidden" name="orders[{{ $item->varient->id }}][unit_price]" value="{{$item->varient->unit_price}}"/>
              <input type="hidden" name="orders[{{ $item->varient->id }}][total_price]" value="{{  $item->varient->discounted_price }}"/>
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

                         

                            <input type="number" id="quantity-{{ $item->id }}" name="orders[{{ $item->id }}][quantity]"
                                value="{{ old('quantity',  $item->quantity ?? 0) }}"   
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
                        {{-- <form method="POST" action="{{ route('user.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-500 absolute top-5 right-5 hover:text-red-700 flex items-center">
                                <i class="fas fa-trash-alt mr-2"></i>
                            </button>
                        </form> --}}
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
                      <input type="checkbox" name="orders[{{ $item->varient->id }}][giftproduct]" class="mt-1 w-4 h-4" />
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

            <button type="submit" class="w-full mt-6 px-9 py-3 bg-[#58af0838] text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                Proceed to Checkout
              </button>
            
          
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
  function startCountdown(endTimeStr) {
    const endTime = new Date(endTimeStr).getTime();
    const timerEl = document.getElementById('countdown-timer');
    const timerInterval = setInterval(updateTimer, 1000);
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

@endpush