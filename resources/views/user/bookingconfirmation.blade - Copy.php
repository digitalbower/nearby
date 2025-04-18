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
   
    [x-cloak] { display: none !important; }
</style>
@endpush
@push('scripts')
  <script defer
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
  <div class="container mx-auto px-4 py-8 lg:px-0">
    <!-- Success Message -->
    <div class="flex items-center bg-[#58af0838] text-gray-800  rounded-lg px-4 py-3 mb-6">
      <i class="fas fa-check-circle text-xl"></i>
      <div class="ml-4">
        <h1 class="text-lg font-semibold">Appointment Booked!</h1>
        <p class="text-sm">A confirmation email has been sent to your registered email address.</p>
      </div>
    </div>

    <!-- Main Content -->
    <div class="grid lg:grid-cols-3 relative gap-8">
      <!-- Left Column -->
      <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-3 lg:p-6">
        <!-- Test Center Details -->
        <div class="">
          <!-- User Details Section -->
          <div class="mb-8 border-b border-gray-200 pb-3 ">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">User Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
              <div>
                <p class="text-sm text-gray-600">Full Name</p>
                <p class="font-semibold text-gray-800">Shiva Thullapalli</p>
              </div>
              <div>
                <p class="text-sm text-gray-600">Email Address</p>
                <p class="font-semibold text-gray-800">shiva@example.com</p>
              </div>
              <div>
                <p class="text-sm text-gray-600">Phone Number</p>
                <p class="font-semibold text-gray-800">+91 9876543210</p>
              </div>
              <div>
                <p class="text-sm text-gray-600">Shipping Address</p>
                <p class="font-semibold text-gray-800">#3748, Phase - 6, Kukatpally, Hyderabad</p>
              </div>
            </div>
          </div>
        
          <!-- Booking Confirmation Status -->
          <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Booking Confirmation</h2>
          
            <!-- Confirmation Message -->
            <div class="flex items-center gap-2 mt-4">
              <i class="fas fa-check-circle text-4xl text-green-500"></i>
              <p class="font-semibold text-base lg:text-xl text-green-600">Booking Confirmed</p>
            </div>
          
            <!-- Confirmation Text -->
            <p class="text-gray-600 mt-4 text-base leading-relaxed">
              Thank you for your booking! Your appointment has been successfully confirmed. We're looking forward to your visit!
            </p>
          </div>
          
        
          <!-- Booking Details -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-1">
            <div>
              <p class="text-gray-800 text-sm">Booking ID</p>
              <p class="font-semibold text-gray-800">EKAP7483750</p>
            </div>
            <div class="text-right">
              <p class="text-gray-800 text-sm">Booked for</p>
              <p class="font-semibold text-gray-800">Shiva Thullapalli</p>
            </div>
          </div>
        
          <div class="flex items-center gap-2 text-gray-800 mb-8 border-b border-gray-200 pb-3">
            <i class="far text-gray-900 fa-clock"></i>
            <span>06:00 AM Sat, 08 Feb 2019</span>
          </div>
        
          <!-- Payment and Delivery Information -->
          <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Payment & Delivery</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
              <div>
                <p class="text-sm text-gray-600">Payment Status</p>
                <p class="font-semibold text-green-600">Paid</p>
              </div>
              <div>
                <p class="text-sm text-gray-600">Delivery Status</p>
                <p class="font-semibold text-yellow-500">Pending</p>
              </div>
            </div>
          </div>
        
          <hr class="my-8">
        
          <!-- Purchased Products -->
          
          <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Purchased Products</h3>
            <div class="space-y-6">
              <!-- Product 1 -->
        
              
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
              @push('scripts')
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
              <div class="border rounded-lg overflow-hidden lg:shadow-lg">
                <div class="p-3">
                  <div class="flex gap-3">
                    <div class="relative w-28 h-28 rounded-lg overflow-hidden">
                      <img src="https://via.placeholder.com/100" alt="Experience Ultimate Relaxation with Spa Admission" class="w-full h-full object-cover">
      
                    </div>
                    <div class="flex-1">
                      <h3 class="font-semibold text-base lg:text-xl">Experience Ultimate Relaxation with Spa Admission</h3>
                      <p class="text-sm text-gray-500 mt-0">General Spa Admission for One</p>
                      <p class="text-sm text-gray-500 mt-2"><strong>Quentity</strong> 1</p>
                      <p class="text-sm text-gray-500 mt-2"><strong>Date</strong> 01/04/2024</p>
                    
      
                    </div>
                  </div>
                  <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-4">
                     
                     
                      <div class="flex items-center gap-x-4">
                        <img src="/images/US-UK_Add_to_Apple_Wallet_RGB_101421.svg" class="w-28">
                        <button
                        class="px-2 py-2 text-xs bg-green-100 text-black rounded-lg hover:bg-green-200 transition duration-300 flex items-center">
                        <i class="fas fa-download  text-sm mr-1 "> </i> Download
                      </button>
                     
                      </div>
                    </div>
                    <div class="text-right flex justify-center gap-x-4 items-center">
      
                      <div class="text-4xl font-semibold text-gray-900">$42</div>
                      <div class="text-2xl text-gray-500 line-through">$60</div>
                    </div>
                  </div>
                 
                  <hr class="my-2">
                
                </div>
              </div>
              <div class="border rounded-lg overflow-hidden lg:shadow-lg">
                <div class="p-3">
                  <div class="flex gap-3">
                    <div class="relative w-28 h-28 rounded-lg overflow-hidden">
                      <img src="https://via.placeholder.com/100" alt="Experience Ultimate Relaxation with Spa Admission" class="w-full h-full object-cover">
      
                    </div>
                    <div class="flex-1">
                      <h3 class="font-semibold text-base lg:text-xl">Experience Ultimate Relaxation with Spa Admission</h3>
                      <p class="text-sm text-gray-500 mt-0">General Spa Admission for One</p>
                      <p class="text-sm text-gray-500 mt-2"><strong>Quentity</strong> 1</p>
                      <p class="text-sm text-gray-500 mt-2"><strong>Date</strong> 01/04/2024</p>
                    
      
                    </div>
                  </div>
                  <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-4">
                     
                     
                      <div class="flex items-center gap-x-4">
                        <img src="/images/US-UK_Add_to_Apple_Wallet_RGB_101421.svg" class="w-28">
                        <button
                        class="px-2 py-2 text-xs bg-green-100 text-black rounded-lg hover:bg-green-200 transition duration-300 flex items-center">
                        <i class="fas fa-download  text-sm mr-1 "> </i> Download
                      </button>
                     
                      </div>
                    </div>
                    <div class="text-right flex justify-center gap-x-4 items-center">
      
                      <div class="text-4xl font-semibold text-gray-900">$42</div>
                      <div class="text-2xl text-gray-500 line-through">$60</div>
                    </div>
                  </div>
                 
                  <hr class="my-2">
                
                </div>
              </div>
              <!-- Repeat Product 2 and Product 3 similar to Product 1 -->
            </div>
          </div>
          
          
          
          <hr class="my-8">
        
       

        <!-- Instructions -->
        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-4">Instructions to Follow</h3>
          <ul class="space-y-3">
            <li class="flex items-start gap-2">
              <i class="fas fa-check-circle text-gray-900"></i>
              <p>The selected packages require fasting for 12 hours.</p>
            </li>
            <li class="flex items-start gap-2">
              <i class="fas fa-check-circle text-gray-900"></i>
              <p>Eat a well-balanced meal before fasting.</p>
            </li>
            <li class="flex items-start gap-2">
              <i class="fas fa-check-circle text-gray-900"></i>
              <p>Please carry a valid prescription order (if applicable).</p>
            </li>
          </ul>
        </div>

        <hr class="my-2">

        <!-- FAQs -->
        <div class="lg:p-0">
          <h3 class="text-lg font-bold mb-4 text-gray-800">FAQs</h3>
          <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="border-b pb-4">
              <button 
                class="faq-toggle w-full flex justify-between items-center text-left py-2 text-sm font-medium text-gray-700 focus:outline-none">
                <span>How much time does it take to confirm my appointment?</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div class="faq-content hidden text-sm text-gray-600 pl-6 mt-2">
                <p>Confirmation is typically completed within 30 minutes of booking.</p>
              </div>
            </div>
        
            <!-- FAQ Item 2 -->
            <div class="border-b pb-4">
              <button 
                class="faq-toggle w-full flex justify-between items-center text-left py-2 text-sm font-medium text-gray-700 focus:outline-none">
                <span>How do I download my health voucher?</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div class="faq-content hidden text-sm text-gray-600 pl-6 mt-2">
                <p>You can download your voucher from the confirmation email or the app.</p>
              </div>
            </div>
        
            <!-- FAQ Item 3 -->
            <div>
              <button 
                class="faq-toggle w-full flex justify-between items-center text-left py-2 text-sm font-medium text-gray-700 focus:outline-none">
                <span>Can I reschedule my health checkup?</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div class="faq-content hidden text-sm text-gray-600 pl-6 mt-2">
                <p>Yes, rescheduling can be done from your booking confirmation page.</p>
              </div>
            </div>
          </div>
        </div>
        @push('scripts')
        <!-- JavaScript for FAQ Toggle -->
        <script>
          document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', () => {
              const content = button.nextElementSibling;
              const icon = button.querySelector('svg');
              
              // Toggle visibility without animation
              content.classList.toggle('hidden');
              
              // Rotate icon without animation
              icon.classList.toggle('rotate-180');
            });
          });
        </script>
        @endpush
        
      </div>
    </div>
      <!-- Right Column -->
      <div class="bg-white lg:col-span-1  rounded-lg shadow-md p-6 space-y-6">
        <!-- Booking Summary Header -->
       
        <div class="">
          <!-- Booking Summary Header -->
          <div class="flex items-center justify-between border-b pb-4 mb-6">
            <h3 class="text-xl font-semibold text-gray-800 flex items-center space-x-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 17v.01M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
              </svg>
              <span>Booking Summary</span>
            </h3>
          
          </div>
        
          <!-- Price Breakdown List -->
          <ul class="space-y-5">
            <li class="flex items-center justify-between text-base text-gray-700">
              <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a6 6 0 10-12 0 6 6 0 0012 0z" />
                </svg>
                <span>Complete Blood Picture (CBP)</span>
              </div>
              <span class="font-medium text-gray-800">₹1,500</span>
            </li>
            <li class="flex items-center justify-between text-base text-gray-700">
              <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5-6l3 3-3 3" />
                </svg>
                <span>Health care test</span>
              </div>
              <span class="font-medium text-gray-800">₹2,200</span>
            </li>
            <li class="flex items-center justify-between text-base text-gray-800">
              <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3.333 0-5 1.667-5 5v5h10v-5c0-3.333-1.667-5-5-5zM7 16v2h10v-2" />
                </svg>
                <span>Home Collection</span>
              </div>
              <span class="font-medium text-gray-800">₹150</span>
            </li>
            <li class="flex items-center justify-between text-base text-gray-800">
              <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M12 15V9m-4 4h8" />
                </svg>
                <span>Wallet Deduction</span>
              </div>
              <span class="font-medium text-gray-800">- ₹1,625</span>
            </li>
          </ul>
        
          <!-- Coupon Section (New Table) -->
          <!-- <div class="mt-6">
            <h4 class="text-xl font-semibold text-gray-900 mb-5">Applied Coupons</h4>
            <table class="w-full text-sm text-left text-gray-700 border border-gray-300 rounded-lg shadow-lg">
              <thead class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white">
                <tr>
                  <th class="py-2 px-2 text-sm font-semibold">Coupon Code</th>
                  <th class="py-2 px-2 text-sm font-semibold">Discount</th>
                  <th class="py-2 px-2 text-sm font-semibold">Valid Until</th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white border-b hover:bg-gray-50 transition-all duration-300">
                  <td class="py-3 px-6 text-sm text-gray-800 font-medium">
                    <span class="bg-green-100 text-green-600 py-1 px-2 rounded-lg">SAVE20</span>
                  </td>
                  <td class="py-3 px-6 text-sm text-green-500 font-semibold">₹200</td>
                  <td class="py-3 px-6 text-sm text-gray-700">Dec 31, 2024</td>
                </tr>
                <tr class="bg-white border-b hover:bg-gray-50 transition-all duration-300">
                  <td class="py-3 px-6 text-sm text-gray-800 font-medium">
                    <span class="bg-yellow-100 text-yellow-600 py-1 px-2 rounded-lg">FREESHIP</span>
                  </td>
                  <td class="py-3 px-6 text-sm text-green-500 font-semibold">₹50</td>
                  <td class="py-3 px-6 text-sm text-gray-700">Nov 30, 2024</td>
                </tr>
              </tbody>
            </table>
          </div> -->
          
        
          <!-- Total Amount -->
          <div class="border-t pt-4 mt-6">
            <div class="flex justify-between text-lg font-semibold text-gray-800">
              <span>Total Amount Paid</span>
              <span>₹2,225</span>
            </div>
          </div>
        
          <!-- Reschedule Button -->
         
        </div>
                
        <div class="py-6 bg-white sticky top-10 lg:h-screen  w-full rounded-xl shadow-sm lg:p-4 mb-8">
          <!-- Email Confirmation -->
          <div class="mb-8 ">
              <p class="text-gray-800 mb-3">
                  We've emailed your tickets to 
                  <span class="font-semibold text-gray-900">katielewis@gmail.com</span>
              </p>
              
              <!-- Share Button -->
              <button onclick="shareBooking()" 
                      class="inline-flex items-center text-gray-900 hover:text-cyan-700 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" 
                       class="h-5 w-5 mr-2" 
                       fill="none" 
                       viewBox="0 0 24 24" 
                       stroke="currentColor">
                      <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                  </svg>
                  Share booking
              </button>
          </div>
      
          <!-- Main Content -->
          <div class="">
              <h1 class="text-2xl font-semibold text-gray-800 mb-6">Download or View Your Tickets</h1>
              
              <p class="text-gray-600 text-sm mb-6">
                  You'll need either a digital copy on your mobile device or a printout of your tickets.
              </p>
      
              <!-- Download Options -->
              <div class="space-y-6">
                  <!-- Apple Wallet Button -->
                  <button onclick="addToAppleWallet()" 
                          class="w-full flex items-center justify-center gap-2 bg-black text-white rounded-lg px-4 py-3 hover:bg-gray-800 transition-colors duration-200">
                      <svg xmlns="http://www.w3.org/2000/svg" 
                           class="h-5 w-5" 
                           viewBox="0 0 24 24" 
                           fill="currentColor">
                          <path d="M18.71 19.5C17.88 20.74 17 21.95 15.66 21.97C14.32 22 13.89 21.18 12.37 21.18C10.84 21.18 10.37 21.95 9.09997 22C7.78997 22.05 6.79997 20.68 5.95997 19.47C4.24997 17 2.93997 12.45 4.69997 9.39C5.56997 7.87 7.12997 6.91 8.81997 6.88C10.1 6.86 11.32 7.75 12.11 7.75C12.89 7.75 14.37 6.68 15.92 6.84C16.57 6.87 18.39 7.1 19.56 8.82C19.47 8.88 17.39 10.1 17.41 12.63C17.44 15.65 20.06 16.66 20.09 16.67C20.06 16.74 19.67 18.11 18.71 19.5ZM13 3.5C13.73 2.67 14.94 2.04 15.94 2C16.07 3.17 15.6 4.35 14.9 5.19C14.21 6.04 13.07 6.7 11.95 6.61C11.8 5.46 12.36 4.26 13 3.5Z"/>
                      </svg>
                      Add to Apple Wallet
                  </button>
      
                  <!-- Download Tickets Button -->
                  <button onclick="downloadTickets()" 
                          class="w-full flex justify-center items-center gap-x-2 px-9 py-3 bg-[#58af0838]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" 
                           class="h-5 w-5" 
                           fill="none" 
                           viewBox="0 0 24 24" 
                           stroke="currentColor">
                          <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                      </svg>
                      Download All Tickets
                  </button>
              </div>
          </div>
      </div>
      @push('scripts')
      <script>
          // Share booking functionality
          function shareBooking() {
              if (navigator.share) {
                  navigator.share({
                      title: 'My Booking',
                      text: 'Check out my booking!',
                      url: window.location.href
                  })
                  .catch(error => console.log('Error sharing:', error));
              } else {
                  // Fallback for browsers that don't support Web Share API
                  alert('Booking link copied to clipboard!');
              }
          }
      
          // Add to Apple Wallet functionality
          function addToAppleWallet() {
              // Implementation for adding to Apple Wallet would go here
              alert('Adding to Apple Wallet...');
          }
      
          // Download tickets functionality
          function downloadTickets() {
              // Implementation for downloading tickets would go here
              alert('Downloading tickets...');
          }
      
          // Add loading states to buttons
          document.querySelectorAll('button').forEach(button => {
              button.addEventListener('click', function() {
                  const originalContent = this.innerHTML;
                  this.innerHTML = `
                      <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                  `;
                  setTimeout(() => {
                      this.innerHTML = originalContent;
                  }, 1000);
              });
          });
      </script>
      @endpush
      </div>
      
    

 <!-- App Download Section -->


  </div>

  </div>
  @endsection
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
@endpush
@push('styles')
  <style>
/* Custom Styles for Owl Carousel */
.owl-carousel {
    position: relative;
}

/* Center Left and Right Navigation Buttons */
.owl-prev, .owl-next {
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
.owl-prev, .owl-next span{
    font-size: 40px !important;
    line-height: 40px !important;
    color: #000 !important;
}

.owl-next {
    right: 10px;
}

/* Hover effect for buttons */
.owl-prev:hover, .owl-next:hover {
    background-color: #00bcd4; /* Cyan */
    color: white ;
}

/* Custom icon size adjustment */
.custom-left-icon, .custom-right-icon {
    width: 24px !important;
    border-radius: 100%;
    height: 24px !important ;
    color: #fff !important;
    background-size: cover;
    display: inline-block;
}

/* Custom icons (you can add your own image or SVG) */
.custom-left-icon {
    background-image: url('path-to-your-left-arrow-icon.svg'); /* Replace with your custom left icon */
}

.custom-right-icon {
    background-image: url('path-to-your-right-arrow-icon.svg'); /* Replace with your custom right icon */
}
</style>
@endpush
@push('scripts')
    <script>
  $(document).ready(function(){
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
@endpush