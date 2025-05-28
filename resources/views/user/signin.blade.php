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
  .w-8{
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
        .swiper-pagination-bullet-active{
          background-color: #2b3147 !important;
          backdrop-filter: blur(10px);
        }
        .swiper-pagination{
          color: #fff !important;
          overflow: visible;
          bottom: 10px !important;
          z-index: 999999;
        }
        .swiper-pagination-bullet{
       
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
@endpush
@section('content')



   <div class="overflow-hidden   z-10  py-8  bg-[#58af0838] border-b-2 border-[#58af0838]">

    <div
    class="relative lg:flex container px-4 mx-auto w-full  ">
    <!-- Left side with illustration -->
   
    <!-- Right side with form -->
    <div class=" w-full lg:max-w-2xl relative z-40 bg-white rounded-xl mx-auto p-6 space-y-8">
      <div class="mb-8">
        <h1 class="mb-2 text-3xl font-bold text-[#2D3748]">Sign in to Nearby Vouchers</h1>
        <p class="text-[#718096]">Login to access your dashboard and manage your account securely.</p>
      </div>
    {{-- Show success message --}}
@if(session('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-300 flex justify-between items-center">
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="text-green-700 hover:text-green-900 text-xl leading-none">&times;</button>
    </div>
@endif
@if(session('error'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         class="mb-4 p-4 rounded-md bg-red-100 text-red-800 border border-red-300 flex justify-between items-center">
        <span>{{ session('error') }}</span>
        <button @click="show = false" class="text-red-700 hover:text-red-900 text-xl leading-none">&times;</button>
    </div>
@endif

{{-- Show validation errors --}}
@if ($errors->any())
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         class="mb-4 p-4 rounded-md bg-red-100 text-red-800 border border-red-300 flex justify-between items-start gap-4">
        <ul class="mb-0 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button @click="show = false" class="text-red-700 hover:text-red-900 text-xl leading-none mt-1">&times;</button>
    </div>
@endif
      <form method="POST" action="{{ route('user.login.submit') }}" class="space-y-6">
      @csrf
      <div class="space-y-4">
        <div>
            <label for="email" class="mb-1 block text-base font-medium text-gray-800 ml-4 mb-2">
                E-mail
            </label>
            <input id="email" name="email" type="email" placeholder="Enter your e-mail" required
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 focus:ring-[#6C5CE7] focus:ring-opacity-20 outline-none transition">
        </div>
        <div>
            <label for="password" class="mb-1 block text-base font-medium text-gray-800 ml-4 mb-2">
                Password
            </label>
          <div class="relative">
            <input id="password" name="password" type="password" placeholder="Enter your password" required
                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 focus:ring-[#6C5CE7] focus:ring-opacity-20 outline-none transition">
            <button type="button" onclick="togglePassword()"
              class="absolute right-4 top-1/2 -translate-y-1/2 text-[#718096]">
              <i id="passwordToggle" class="fas fa-eye"></i>
            </button>
          </div>
        </div>
    </div>
       
        <input type="hidden" name="redirect" value="{{ request()->input('redirect', '/') }}">
        <div class="w-full px-2">
          <button type="submit"
            class="px-6 py-2 text-black rounded-lg w-full  bg-[#58af0838] hover:bg-[#4a910954] transition duration-300">
            Login in
          </button>
        </div>

        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-[#E2E8F0]"></div>
          </div>
          <div class="relative flex justify-center text-lg">
            <span class=" font-medium px-2 text-gray-800">Or Login in
              with</span>
          </div>
        </div>

        <div class="grid grid-cols-1 gap-4 px-2">
    <a href="{{ route('user.auth.google', ['mode' => 'signin']) }}"
       class="px-6 py-2 text-black rounded-lg bg-[#58af0838] hover:bg-[#4a910954] transition duration-300 flex items-center justify-center">
        <i class="fab fa-google mr-2"></i> Google
    </a>
</div>

      </form>

      <div class="mt-8 text-center text-base text-gray-800">
        Already have an account?
        <a href="{{ route('user.signup') }}"
          class="font-semibold text-primary hover:underline">
          Sign Up  here
        </a>
      </div>
    </div>
    <div class="w-full absolute top-0 z0 h-full w-full overflow-hidden">
      <div
        class="absolute b -right-16 -top-16 h-48 w-48 rounded-full z-10  bg-cyan-400/20"></div>
        <div
        class="absolute b left-1/3 -top-24 h-48 w-48 rounded-full z-10  bg-cyan-400/20"></div>
      <div
        class="absolute b -bottom-10 right-1/2 h-24 w-24 rounded-full z-10  bg-cyan-400/20 "></div>
      <div
        class="absolute b -left-8 top-32 h-24 w-24 rounded-full z-10  bg-cyan-400/20 "></div>
    </div>
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
    <script>
      function togglePassword() {
          const passwordInput = document.getElementById('password');
          const passwordToggle = document.getElementById('passwordToggle');
          if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
              passwordToggle.classList.remove('fa-eye');
              passwordToggle.classList.add('fa-eye-slash');
          } else {
              passwordInput.type = 'password';
              passwordToggle.classList.remove('fa-eye-slash');
              passwordToggle.classList.add('fa-eye');
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
 @endpush
