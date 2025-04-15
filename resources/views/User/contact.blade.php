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
<script>
  document.addEventListener("DOMContentLoaded", function() {
  const currentPage = window.location.pathname;  // Get current page URL
  if (currentPage.includes("contactus")) {  // Check if the page is "contactus"
  document.getElementById("mainHeader").classList.add("relative", "z-50");
  document.getElementById("mainFooter").classList.add("border-t-2", "border-[#58af0838]");
}
});


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
<div class="w-full z-50 py-8 lg:px-10 bg-[#58af0838] p-4 relative overflow-hidden">
  <div class="container mx-auto lg:w-1/2 gap-12">
    <!-- Form Section -->
    <div>
      <h1 class="text-gray-800 text-opacity/80 text-3xl md:text-4xl font-bold mb-6">Let's talk</h1>
      <p class="text-gray-600 mb-8">
        To request a quote or want to meet up for coffee, contact us directly or fill out the form and we will get back to you promptly.
      </p>

      <form action="{{ route('contactus.submit') }}" method="POST" class="space-y-6">
        @csrf

        <input type="text" name="name" placeholder="Your Name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 outline-none" required />

        <input type="email" name="email" placeholder="Your Email" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 outline-none" required />

        <textarea name="message" placeholder="Type something if you want..." rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-[#6C5CE7] focus:ring-2 outline-none resize-none" required></textarea>

        <button type="submit" class="flex items-center justify-center text-gray-800 rounded-full bg-[#58af0838] hover:bg-[#4a910954] px-4 py-2 gap-3">
          Send Message
          <i class="fas fa-paper-plane w-4 h-4"></i>
        </button>
      </form>
    </div>

    <div class="mt-auto lg:flex bg-white rounded-lg lg:mt-10 gap-x-4 py-6 lg:px-10">
      <div class="space-y-6">
        <!-- Address Section -->
        <p class="flex items-center gap-3 text-gray-700">
          <span class="text-2xl text-gray-800">
            <i class="fas fa-phone-alt"></i>
          </span>
          +1 (203) 302-9545
        </p>
        <p class="flex items-center gap-3 text-gray-700">
          <span class="text-2xl text-gray-800">
            <i class="fas fa-map-marker-alt"></i>
          </span>
          151 New Park Ave, Hartford, CT 06106 United States
        </p>
      </div>

      <!-- Contact Email -->
      <div>
        <p class="flex items-center gap-3 text-gray-700">
          <span class="text-2xl text-gray-800">
            <i class="fas fa-envelope"></i>
          </span>
          <a href="mailto:contactus@inventissoft.com" class="text-black hover:underline-none">contactus@inventissoft.com</a>
        </p>

        <!-- Social Media Links -->
        <div class="flex gap-6 mt-6">
          <a href="#" class="w-12 h-12 rounded-full hover:bg-[#4a910954] bg-[#58af0838] text-gray-900 flex items-center justify-center transition-transform transform hover:scale-110">
            <i class="fab fa-facebook-f text-lg"></i>
          </a>
          <a href="#" class="w-12 h-12 rounded-full hover:bg-[#4a910954] bg-[#58af0838] text-gray-900 flex items-center justify-center transition-transform transform hover:scale-110">
            <i class="fab fa-twitter text-lg"></i>
          </a>
          <a href="#" class="w-12 h-12 rounded-full hover:bg-[#4a910954] bg-[#58af0838] text-gray-900 flex items-center justify-center transition-transform transform hover:scale-110">
            <i class="fab fa-instagram text-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Background Design (Behind Form) -->
<div class="w-full absolute top-0 z-0 h-full w-full overflow-hidden pointer-events-none">
  <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-cyan-400/10"></div>
  <div class="absolute left-1/3 -top-24 h-48 w-48 rounded-full bg-cyan-400/10"></div>
  <div class="absolute -bottom-10 right-1/2 h-24 w-24 rounded-full bg-cyan-400/10"></div>
  <div class="absolute -left-8 top-32 h-24 w-24 rounded-full bg-cyan-400/10"></div>
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