<!-- Add this to the bottom of your CSS -->
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
@endpush
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

        @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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
              <select name="gender">
        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
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
                <option value="USA">United Statesccccccccc</option>
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
          <button type="submit" id="save-personal-info"
    class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg text-white font-semibold transition-all duration-300 hover:shadow-lg">
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
                  <!-- <button
                    class="px-4 py-2 text-sm bg-cyan-100 text-cyan-700 rounded-lg hover:bg-cyan-200 transition duration-300">Create
                    Invoice</button> -->
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

   

       
      </div>
    </div>
  </div>

  @push('scripts')
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

@endpush
@section('content')
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
  
          
          </nav>
        </div>
  
        <div class="lg:w-3/4 bg-white">
          <div id="tab-content">
            <div id="personal-info" class="tab-content active py-10 lg:py-8  px-4 lg:p-8 max-w-4xl mx-auto">
              <!-- Title -->
              <h2 class="text-2xl font-semibold text-gray-800 mb-8 flex items-center gap-3">
                <i class="fas fa-user-circle text-blue-500"></i> Profile Information
              </h2>
             <!-- Profile Picture Form -->


             

   
    
              <!-- Form Start -->
              <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data"  class="space-y-6" id="personal-info-form">
              @csrf

             
              <div class="mb-4 flex justify-center">
        <img id="profile-image-preview" 
             src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/100' }}" 
             alt="Profile Picture"
             class="w-28 h-28 rounded-full object-cover border border-gray-300">
    </div>

    <!-- Upload Button -->
    
    <div class="flex flex-col items-center">
        
       
        <input type="file" id="profile-upload" name="profile_picture" 
       accept="image/*" 
       onchange="previewProfileImage(event)" 
       class="block w-full px-3 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">

    </div>
    
    @push('scripts')
<!-- JavaScript for Live Preview -->
<script>
    function previewProfileImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('profile-image-preview').src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
                <!-- Name Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-id-badge text-black text-base mr-2"></i> First Name
                    </label>
                    <input type="text" id="first-name" name="first_name" value="{{ old('first_name', $user->first_name) }}"
    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                  </div>
                  <div>
                    <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-id-card text-black text-base mr-2"></i> Last Name
                    </label>
                    <input type="text" id="last-name" name="last_name" value="{{ old('last_name', $user->last_name) }}"
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
            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
        </select>
                  </div>
                  <div>
                    <label for="birthday" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-birthday-cake text-black text-base mr-2"></i> Birthday
                    </label>
                    <input type="date" id="birthday" name="birthday" 
    value="{{ old('birthday', $user->birthday ? date('Y-m-d', strtotime($user->birthday)) : '') }}"
    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                  </div>
                </div>
  
                <!-- Contact Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-phone-alt text-black text-base mr-2"></i> Phone Number
                    </label>
                    <input type="tel" id="phone" name="phone"
    placeholder="+91 1234567890"
    value="{{ old('phone', $user->phone ?? '') }}"
    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  </div>
                  <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                      <i class="fas fa-envelope text-black text-base mr-2"></i> Email Address
                    </label>
                    <input type="email" id="email" name="email" 
    value="{{ $user->email ?? '' }}" 
    readonly
    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-600 cursor-not-allowed">

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
    <option value="">Select your country</option>
    @foreach(App\Models\Country::all() as $country)
        <option value="{{ $country->country_code }}" 
            {{ (old('country', $user->country) == $country->country_code) ? 'selected' : '' }}>
            {{ $country->country }}
        </option>
    @endforeach
</select>

  
  
                  </div>
                </div>
                <!-- Address Section -->
                <div>
                  <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-map-marker-alt text-black text-base mr-2"></i> Address
                  </label>
                  <textarea id="address" name="address" rows="3" placeholder="Enter your address"
    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('address', $user->address) }}</textarea>

                </div>
  
  
  
  
  
  
                <!-- Save Button -->
                <div class="flex justify-end">
                <button type="submit" id="save-personal-info"
    class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg text-white font-semibold transition-all duration-300 hover:shadow-lg">
    <i class="fas fa-save"></i> Save Changes
</button>
                </div>
              </form>
            </div>
  
  
  
            <div id="change-password" class="tab-content  max-w-4xl mx-auto p-8">
              <h2 class="text-2xl font-bold text-gray-800 mb-6">
                <i class="fas fa-lock text-blue-500 mr-2"></i> Change Password
              </h2>
              <form class="space-y-6" id="change-password-form" method="POST" action="{{ route('user.profile.updatepassword') }}">
    @csrf
    <!-- Current Password -->
    <div>
        <label for="current-password" class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-key text-gray-400 mr-2"></i> Current Password
        </label>
        <div class="relative">
            <input type="password" id="current-password" name="current-password"
                   placeholder="Enter current password"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
        </div>
    </div>

    <!-- Confirm New Password -->
    <div>
        <label for="new-password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-check-circle text-gray-400 mr-2"></i> Confirm New Password
        </label>
        <div class="relative">
            <input type="password" id="new-password_confirmation" name="new-password_confirmation"
                   placeholder="Re-enter new password"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end mt-4">
        <button type="submit" id="change-password-btn"
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
  <input type="text" id="searchInput" placeholder="Search by booking ID"
    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent" />
  <button onclick="filterBookingsAdvanced()" class="px-6 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition duration-300">
    Search
  </button>
</div>
     
                <div class="flex items-center mb-3 space-x-4">
                  <!-- Inactive Radio Button -->
                  <div class="flex space-x-4 mb-4">
  <label class="flex items-center space-x-2 cursor-pointer">
    <input type="radio" name="status" value="all" class="hidden" checked onchange="filterBookings(this)">
    <span class="w-6 h-6 flex items-center justify-center border-2 border--cyan500 bg-cyan-500 text-white rounded-full">
      <i class="fas fa-check-circle"></i>
    </span>
    <span class="text-gray-700">All</span>
  </label>

  <label class="flex items-center space-x-2 cursor-pointer">
    <input type="radio" name="status" value="past" class="hidden" onchange="filterBookings(this)">
    <span class="w-6 h-6 flex items-center justify-center border-2 border-gray-400 rounded-full text-gray-400">
      <i class="fas fa-circle"></i>
    </span>
    <span class="text-gray-700">Past Booking</span>
  </label>

  <label class="flex items-center space-x-2 cursor-pointer">
    <input type="radio" name="status" value="upcoming" class="hidden" onchange="filterBookings(this)">
    <span class="w-6 h-6 flex items-center justify-center border-2 border-gray-400 rounded-full text-gray-400">
      <i class="fas fa-circle"></i>
    </span>
    <span class="text-gray-700">Upcoming Booking</span>
  </label>
</div>

                 
                
                  <!-- Active Radio Button -->
                
                </div>
                
                <div class="space-y-6">
                  <!-- Booking Item 1 -->
                  @forelse ($bookingConfirmations as $item)
                  <div class="booking-card border relative border-cyan-400 rounded-xl shadow-xs p-3 mb-4 transition duration-300"
                  data-status="{{ $item->verification_status }}"> 
                 
      <div class="flex gap-x-3 items-center mb-2">
       
        <div class="text-sm col-span-2 text-gray-600">
          <p>
            <i class="fas fa-calendar-alt mr-2 text-cyan-500"></i>
            <strong>Date:</strong> {{ \Carbon\Carbon::parse($item->booking_created_at)->format('d/m/y') }}
          </p>
        </div>
      </div>

      <div class="flex flex-col md:flex-row gap-4">
        <div class="w-full">
          <div class="grid grid-cols-1 items-center md:grid-cols-3 gap-4">
            <div class="col-span-2">
              <h3 class="text-lg font-medium text-gray-800">Booking Id {{ $item->booking_id }}</h3>
           
              <p class="text-sm text-gray-600">
                Quantity: {{ $item->quantity }} 
              </p>
              <p class="text-sm text-gray-600">
                Total Price: {{ number_format($item->total_price, 2) }}
              </p>
              <p class="text-sm text-gray-600">
                Verification Status: {{ ($item->verification_status) }}
              </p>
              <p class="text-sm text-gray-600">
                Gift Product: {{ $item->giftproduct ? 'Yes' : 'No' }}
              </p>
            </div>
          </div>

          <div class="w-full justify-between flex gap-x-3 mt-3">
            <div class="flex w-full justify-end gap-x-3">
            <a href="{{ route('user.profile.download', $item->id) }}"
       class="mt-4 inline-flex items-center px-3 py-2 bg-green-100 text-black rounded-lg hover:bg-green-200 transition">
      <i class="fas fa-download mr-1"></i> Download PDF
    </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @empty
    <p class="text-gray-500 text-center">No bookings found.</p>
  @endforelse


                      
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
  
            @push('scripts')
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
           @endpush
  
          </div>
        </div>
      </div>
  
    </div>
  </div>
  @endsection
  @push('scripts')
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
  function filterBookingsAdvanced() { 
    const status = document.querySelector('input[name="status"]:checked')?.value || 'all';
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const bookingCards = document.querySelectorAll('.booking-card');

    bookingCards.forEach(card => {
      const bookingId = card.getAttribute('data-booking-id').toLowerCase();
      const bookingStatus = card.getAttribute('data-status');

      const matchesStatus = (status === 'all' || status === bookingStatus);
      const matchesSearch = bookingId.includes(searchInput);

      card.style.display = (matchesStatus && matchesSearch) ? 'block' : 'none';
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    filterBookingsAdvanced();
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
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function () {
        let input = this.previousElementSibling;
        if (input.type === "password") {
            input.type = "text";
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            input.type = "password";
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });
});
</script>

<script>
  function filterBookings(radio) {
    const status = radio.value;
    const cards = document.querySelectorAll('.booking-card');

    cards.forEach(card => {
      const cardStatus = card.getAttribute('data-status');

      if (status === 'all') {
        card.style.display = 'block';
      } else if (status === 'past') {
        card.style.display = (cardStatus === 'completed') ? 'block' : 'none';
      } else if (status === 'upcoming') {
        card.style.display = (cardStatus !== 'completed') ? 'block' : 'none';
      }
    });
  }
</script>

@endpush