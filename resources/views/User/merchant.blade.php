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
  <!-- Hero Section -->
  <section class="container px-4 py-16 mx-auto">
    <div class="grid gap-12 md:grid-cols-2 items-center">
      <div class="space-y-8 bg-[#58af0838] rounded-lg p-10 ">
        <div class="space-y-4">
          <h1 class="lg:text-3xl text-base font-bold text-black">
            Transform Your Business Growth
          </h1>
          <p class="text-base text-gray-600">
            Join thousands of successful businesses reaching new heights with our platform.
          </p>
        </div>

        <div class="backdrop-blur-sm  rounded-xl">
          <div class="space-y-4 p-0">
            <div class="grid gap-4 md:grid-cols-2">
              <input type="text" placeholder="Business Name" class="bg-white p-2 rounded-md border py-3 text-gray-800" />
              <input type="text" placeholder="Your Name" class="bg-white p-2 rounded-md border py-3 text-gray-800" />
            </div>
            <input type="email" placeholder="Email Address" class="bg-white p-2 rounded-md border py-3 text-gray-800 w-full" />
            <input type="tel" placeholder="Phone Number" class="bg-white p-2 rounded-md border py-3 text-gray-800 w-full" />

            <select class="bg-white p-2 rounded-md border py-3 text-gray-800 w-full">
              <option value="tech">Technology</option>
              <option value="retail">Retail</option>
              <option value="service">Service</option>
              <option value="food">Food & Beverage</option>
            </select>

            <button class="w-full px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]   text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
              Start Free Trial
            </button>

            <p class="text-sm text-center text-gray-500">
              No credit card required • 14-day free trial
            </p>
          </div>
        </div>
      </div>

      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-blue-400 rounded-3xl blur-3xl opacity-20"></div>
        <div class="relative grid grid-cols-2 gap-4">
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl"></div>
          </div>
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl"></div>
          </div>
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl"></div>
          </div>
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <div class="relative w-full py-20 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-[#58af0838] opacity-10"></div>
    <div class="absolute top-0 left-0 w-96 h-96 bg-[#58af08] rounded-full filter blur-[128px] opacity-20 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#58af08] rounded-full filter blur-[128px] opacity-20 translate-x-1/2 translate-y-1/2"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4">
      <!-- Stats Section -->
      <div class="mb-24 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-16 ">
          Unmatched Reach. Unlimited Potential.
        </h2>
        <div class="grid md:grid-cols-2 gap-8">
          <div class="relative group">
            <div class="absolute inset-0 transition-transform duration-300"></div>
            <div class="relative backdrop-blur-sm bg-white/30 rounded-2xl p-8 border border-[#58af08]/20">
              <div class="text-6xl font-bold mb-4 ">
                <span>19</span>M+
              </div>
              <div class="text-xl text-gray-700">Active global customers</div>
            </div>
          </div>
          <div class="relative group">
            <div class="absolute inset-0 transition-transform duration-300"></div>
            <div class="relative backdrop-blur-sm bg-white/30 rounded-2xl p-8 border border-[#58af08]/20">
              <div class="text-6xl font-bold mb-4 ">
                <span>1</span>M+
              </div>
              <div class="text-xl text-gray-700">Merchants worked with Groupon to date</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="mb-24 text-center max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-bold mb-8 leading-tight">
          The Marketplace For
          <span class="">
            Local Experiences
          </span>
        </h1>
        <p class="text-xl text-gray-600">
          More than deals - we're where the world explores local possibilities.
          Discover how Groupon Merchant transforms your business reach.
        </p>
      </div>

      <!-- Feature Cards -->
      <div class="grid md:grid-cols-3 gap-8">
        <div class="relative bg-[#58af0838] p-4 rounded-lg group">
         
          <div class="relative w-16 h-16 rounded-full bg-[#58af0838] flex items-center justify-center">
            <i class="fas fa-users text-black text-3xl"></i>
          </div>
          <div class="text-2xl font-semibold mb-4">Find New Audiences</div>
          <p class="text-gray-600 leading-relaxed">We invest millions in marketing campaigns across web and mobile to bring customers to the Groupon platform.</p>
        </div>

        <div class="relative bg-[#58af0838] p-4 rounded-lg group">
         
          <div class="relative w-16 h-16 rounded-full bg-[#58af0838] flex items-center justify-center">
            <i class="fas fa-brain text-black text-3xl"></i>
          </div>
          <div class="text-2xl font-semibold mb-4">Boost Brand Loyalty</div>
          <p class="text-gray-600 leading-relaxed">Groupon is an all-in-one marketing solution with no upfront cost that helps your business to build brand recognition.</p>
        </div>

        <div class="relative bg-[#58af0838] p-4 rounded-lg group">
         
          <div class="relative w-16 h-16 rounded-full bg-[#58af0838] flex items-center justify-center">
            <i class="fas fa-map-pin text-black text-3xl"></i>
          </div>
          <div class="text-2xl font-semibold mb-4">Become the Destination</div>
          <p class="text-gray-600 leading-relaxed">People are always looking for their new favorite thing to do. We'll use our tools to help them find you.</p>
        </div>
      </div>
    </div>
  </div>


  <!-- Features Section -->
  <section class="py-20">
    <div class="container px-4 mx-auto">
      <div class="text-center max-w-2xl mx-auto mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Everything You Need to Succeed</h2>
        <p class="text-gray-600 text-lg">
          Powerful tools and insights to take your business to the next level
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="space-y-4 p-6 bg-[#58af0838] rounded-xl">
          <div class="w-12 h-12 rounded-full bg-[#4a910954] flex items-center justify-center">
            <i class="fas fa-rocket text-black text-xl"></i>
          </div>
          <h3 class="text-xl font-semibold">Quick Launch</h3>
          <p class="text-gray-600">Get started in minutes with our intuitive onboarding process</p>
        </div>

        <div class="space-y-4 p-6 bg-[#58af0838] rounded-xl">
          <div class="w-12 h-12 rounded-full bg-[#4a910954] flex items-center justify-center">
            <i class="fas fa-crown text-black text-xl"></i>
          </div>
          <h3 class="text-xl font-semibold">Premium Features</h3>
          <p class="text-gray-600">Access advanced tools and analytics to grow your business</p>
        </div>

        <div class="space-y-4 p-6 bg-[#58af0838] rounded-xl">
          <div class="w-12 h-12 rounded-full bg-[#4a910954] flex items-center justify-center">
            <i class="fas fa-lightbulb text-black text-xl"></i>
          </div>
          <h3 class="text-xl font-semibold">Smart Insights</h3>
          <p class="text-gray-600">Make data-driven decisions with real-time analytics</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-20 bg-gray-50">
    <div class="container px-4 mx-auto">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Business?</h2>
        <p class="text-xl text-gray-600 mb-8">Join thousands of successful businesses already growing with us</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="w-full px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]   text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
            Get Started Now
          </button>
          <button class="border-2 border-black w-full hover:bg-[#4a910954] hover:text-black p-2 rounded-md">
            Schedule Demo
          </button>
        </div>
      </div>
    </div>
  </section>
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
