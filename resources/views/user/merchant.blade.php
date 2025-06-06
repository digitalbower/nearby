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
  <!-- Hero Section -->
  <section class="container px-4 py-5 lg:py-16 mx-auto">
    <div class="grid md:grid-cols-2 gap-2 items-center">
      <div class="w-full h-full rounded-2xl overflow-hidden aspect-square rounded-2xl bg-white shadow-lg p-4">
        <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl">
          <img src="{{asset('images/half-img.jpg')}}" alt="" class="w-full h-full object-cover">
        </div>
      </div>

      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-blue-400 rounded-3xl blur-3xl opacity-20"></div>
        <div class="relative grid grid-cols-2 gap-4">
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl">
              <img src="{{asset('images/hero-1.jpg')}}" alt="" class="w-full h-full object-cover">
            </div>
          </div>
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl">
              <img src="{{asset('images/hero-2.jpg')}}" alt="" class="w-full h-full object-cover">
            </div>
          </div>
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl">
              <img src="{{asset('images/hero-3.jpg')}}" alt="" class="w-full h-full object-cover">
            </div>
          </div>
          <div class="aspect-square rounded-2xl bg-white shadow-lg p-4">
            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl">
              <img src="{{asset('images/hero-4.jpg')}}" alt="" class="w-full h-full object-cover">
            </div>
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
          <!-- Unmatched Reach. Unlimited Potential. -->
           UAE’s Thriving Deal Economy
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="relative group">
            <div class="absolute inset-0 transition-transform duration-300"></div>
            <div class="relative backdrop-blur-sm bg-white/30 rounded-2xl p-8 border border-[#58af08]/20">
              <div class="xl:text-6xl text-4xl font-bold mb-4 ">
                <span>9.8</span>M +
              </div>
              <div class="text-xl text-gray-700">UAE residents actively use digital platforms to discover services and offers</div>
            </div>
          </div>

          <div class="relative group">
            <div class="absolute inset-0 transition-transform duration-300"></div>
            <div class="relative backdrop-blur-sm bg-white/30 rounded-2xl p-8 border border-[#58af08]/20">
              <div class="xl:text-6xl text-4xl font-bold mb-4 ">
                <span>500</span>K +
              </div>
              <div class="text-xl text-gray-700">Monthly searches in the UAE for discounts, experiences, and local deals</div>
            </div>
          </div>

          <div class="relative group">
            <div class="absolute inset-0 transition-transform duration-300"></div>
            <div class="relative backdrop-blur-sm bg-white/30 rounded-2xl p-8 border border-[#58af08]/20">
              <div class="xl:text-6xl text-4xl font-bold mb-4 ">
                <span>100</span>+
              </div>
              <div class="text-xl text-gray-700">Businesses have already joined our launch-phase to reach more customers</div>
            </div>
          </div>

        </div>
      </div>

      <!-- Main Content -->
      <div class="mb-24 text-center max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold mb-8 leading-tight">
          Why Merchants Choose Us
          <!-- <span class="">
            Local Experiences
          </span> -->
        </h1>
        <p class="text-xl text-gray-600">
          We promote your business across digital channels — from social media to search — to help you stand out.
        </p>
      </div>

      <!-- Feature Cards -->
      <div class="grid md:grid-cols-4 gap-8">
        <div class="relative bg-[#58af0838] p-4 rounded-lg group">
         
          <div class="relative w-16 h-16 rounded-full bg-[#58af0838] flex items-center justify-center">
            <!-- <i class="fas fa-users text-black text-3xl"></i> -->
             <i class="fa-solid fa-briefcase text-black text-3xl"></i>
          </div>
          <div class="text-2xl font-semibold mb-4 mt-3">Get Discovered</div>
          <p class="text-gray-600 leading-relaxed">We promote your business across digital channels — from social media to search — to help you stand out.</p>
        </div>

        <div class="relative bg-[#58af0838] p-4 rounded-lg group">
         
          <div class="relative w-16 h-16 rounded-full bg-[#58af0838] flex items-center justify-center">
            <!-- <i class="fas fa-brain text-black text-3xl"></i> -->
             <i class="fa-solid fa-money-bill text-black text-3xl"></i>
          </div>
          <div class="text-2xl font-semibold mb-4 mt-3">No Upfront Cost</div>
          <p class="text-gray-600 leading-relaxed">It’s free to list. You only pay when customers redeem your offers.</p>
        </div>

        <div class="relative bg-[#58af0838] p-4 rounded-lg group">
         
          <div class="relative w-16 h-16 rounded-full bg-[#58af0838] flex items-center justify-center">
            <i class="fa-solid fa-users text-black text-3xl"></i>
          </div>
          <div class="text-2xl font-semibold mb-4 mt-3">Easy Onboarding</div>
          <p class="text-gray-600 leading-relaxed">List your business and offers with just a few simple steps — no technical skills needed.</p>
        </div>

        <div class="relative bg-[#58af0838] p-4 rounded-lg group">
         
          <div class="relative w-16 h-16 rounded-full bg-[#58af0838] flex items-center justify-center">
            <!-- <i class="fas fa-users text-black text-3xl"></i> -->
             <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512 365.7c60.6 0 109.7-49.1 109.7-109.7S572.6 146.3 512 146.3 402.3 195.4 402.3 256 451.4 365.7 512 365.7z m0-146.3c20.2 0 36.6 16.4 36.6 36.6s-16.4 36.6-36.6 36.6-36.6-16.4-36.6-36.6 16.4-36.6 36.6-36.6zM417.4 398.5L384.8 333c-98 48.7-158.9 146.9-158.9 256.3H299c0.1-81.5 45.4-154.6 118.4-190.8zM378.9 755.5l-45.8 57.1c50.5 40.5 114 62.8 178.8 62.8s128.3-22.3 178.8-62.8l-45.8-57.1c-76 61.1-189.8 61.1-266 0zM724.9 589.3H798c0-109.4-60.9-207.6-158.9-256.3l-32.5 65.5c73 36.2 118.3 109.3 118.3 190.8zM219.4 621.7c-60.6 0-109.7 49.1-109.7 109.7s49.1 109.7 109.7 109.7S329.1 792 329.1 731.4 280 621.7 219.4 621.7z m0 146.3c-20.2 0-36.6-16.4-36.6-36.6 0-20.2 16.4-36.6 36.6-36.6 20.2 0 36.6 16.4 36.6 36.6 0 20.2-16.4 36.6-36.6 36.6zM804.6 621.7c-60.6 0-109.7 49.1-109.7 109.7S744 841.1 804.6 841.1 914.3 792 914.3 731.4s-49.1-109.7-109.7-109.7z m0 146.3c-20.2 0-36.6-16.4-36.6-36.6 0-20.2 16.4-36.6 36.6-36.6s36.6 16.4 36.6 36.6c-0.1 20.2-16.5 36.6-36.6 36.6z" fill="#0F1F3C" /></svg>
          </div>
          <div class="text-2xl font-semibold mb-4 mt-3">Direct Customer Access</div>
          <p class="text-gray-600 leading-relaxed">Get notified when someone buys your offer. We’ll provide basic insights and support to help you grow.</p>
        </div>
      </div>

      <div class="text-center mt-10">
        <!-- <button onclick="document.getElementById('myModal').classList.remove('hidden')"
          class="text-black font-bold py-3 px-8 rounded bg-[#58af0838] hover:bg-[#4a910954] shadow-md hover:shadow-lg">
          List your Business Now
        </button> -->

        <!-- Modal Backdrop -->
        <div id="myModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
          <!-- Modal Content -->
          <div class="relative top-10 md:top-20 mx-2 md:mx-auto max-w-2xl rounded-md bg-white">
            <div class="mt-3 text-center">
              <!-- Modal Body -->
              <div class="space-y-8 bg-[#58af0838] rounded-lg p-5 md:p-10">
                <button onclick="document.getElementById('myModal').classList.add('hidden')"
                  class="text-gray-400 absolute top-5 right-5 bg-transparent hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                </button>
                <div class="space-y-4">
                  <h1 class="lg:text-3xl text-base font-bold text-black">
                    Transform Your Business Growth
                  </h1>
                  <p class="text-base text-gray-600">
                    Join thousands of successful businesses reaching new heights with our platform.
                  </p>
                </div>
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                  <strong class="font-bold">Success!</strong>
                  <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                <div class="backdrop-blur-sm  rounded-xl">
                  <form action="{{route('user.merchant_store')}}" id="merchantForm" method="POST">
                    @csrf
                    <div class="space-y-4 p-0">
                      <div class="grid gap-4 md:grid-cols-2">
                        <div>
                          <input type="text" name="business_name" placeholder="Business Name" class="w-full bg-white p-2 rounded-md border py-3 text-gray-800" />
                        </div>
                        <div>
                          <input type="text" name="name" placeholder="Your Name" class="w-full bg-white p-2 rounded-md border py-3 text-gray-800" />
                        </div>
                      </div>
                      <input type="email" name="email" placeholder="Email Address" class="bg-white p-2 rounded-md border py-3 text-gray-800 w-full" />
                      <input type="tel" name="phone" placeholder="Phone Number" class="bg-white p-2 rounded-md border py-3 text-gray-800 w-full" />

                      <select name="category_id" class="bg-white p-2 rounded-md border py-3 text-gray-800 w-full">
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                      </select>

                      <button class="w-full px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]   text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                        Start Free Trial
                      </button>
                  
                      <p class="text-sm text-center text-gray-500">
                        No credit card required • 14-day free trial
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Features Section -->
  <section class="py-20 hidden">
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
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Be Among the First</h2>
        <p class="text-xl text-gray-600 mb-8">Join us during our launch phase and enjoy priority visibility and dedicated onboarding support.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="document.getElementById('myModal').classList.remove('hidden')" class="w-full px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]   text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
            List Your Business Now
          </button>
          {{-- <button class="border-2 border-black w-full hover:bg-[#4a910954] hover:text-black p-2 rounded-md">
            Schedule Demo
          </button> --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $("#merchantForm").validate({
      rules: {
          business_name: { required: true},
          name: { required: true},
          email: { required: true,email:true},
          category_id: { required: true},


      },
      messages: {
        business_name: { required: "Business Name is required"},
        name: { required: "Name is required"},
        email: { required: "Email is required","email":"Please enter a valid email"},
        category_id: { required: "Category is required"},
      },
      errorPlacement: function (error, element) {
          error.addClass("text-red-500 text-sm mt-1 block w-full");
          error.insertAfter(element);
        },
        highlight: function (element) {
          $(element).addClass("border-red-500");
        },
        unhighlight: function (element) {
          $(element).removeClass("border-red-500");
        }
    });
  });

  // Get the modal
const modal = document.getElementById("myModal");

// Get the button that opens the modal
const btn = document.querySelector("[data-modal-toggle='myModal']");

// Get the element that closes the modal
const closeBtn = document.querySelector("[data-modal-hide='myModal']");

// When the user clicks the button, open the modal 
btn.addEventListener('click', () => {
  modal.classList.remove('hidden');
});

// When the user clicks on close button, close the modal
closeBtn.addEventListener('click', () => {
  modal.classList.add('hidden');
});

// When the user clicks anywhere outside the modal, close it
window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.classList.add('hidden');
  }
});

btn.addEventListener('click', () => {
  modal.classList.remove('hidden');
  setTimeout(() => {
    modal.classList.remove('opacity-0');
  }, 20);
});

closeBtn.addEventListener('click', () => {
  modal.classList.add('opacity-0');
  setTimeout(() => {
    modal.classList.add('hidden');
  }, 300);
});
</script>
@endpush
