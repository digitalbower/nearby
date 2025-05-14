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
    @endpush
    @section('content')
  <div class="relative lg:flex   mx-auto w-full overflow-hidden  bg-[#58af0838] border-b-2 border-[#58af0838] hover:bg-[#4a910954] border-b-2 ">
    <!-- Left side with illustration -->

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
    <!-- Right side with form -->
    <div class="lg:w-1/2 mx-auto p-4   w-full space-y-8">
      <div class="w-full lg:max-w-2xl relative z-40 bg-white rounded-xl mx-auto p-6 space-y-8">
        <div class="text-center">
          <h1 class="text-3xl font-bold text-gray-900">Join TravelBoard</h1>
          <p class="mt-2 text-sm text-gray-600">Start your journey today</p>
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
    
        <form method="POST" action="{{ route('user.register') }}" class="space-y-6">
        @csrf
          <!-- Name fields -->
          <div class="grid grid-cols-2 gap-4">
            <input
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
              type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}" required>
            <input
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
              type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" required>
          </div>

          <!-- Email field -->
          <input
            class="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
            type="email" name="email" placeholder="Email" value="{{old('email')}}" required>

            <div class="flex items-center gap-2">
    <!-- Country Code Dropdown -->
    <select 
        class="w-1/4 rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
        name="country_code_id" required>
        <option value="">Select Country Code</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}"
                {{ old('country_code_id', $user->country_code_id ?? '') == $country->id ? 'selected' : '' }}>
                +{{ $country->phonecode }} ({{ $country->name }})
            </option>
        @endforeach
    </select>

    <!-- Phone Number Input -->
    <input
        class="w-3/4 rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
        type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone', $user->phone ?? '') }}" required>
</div>

<!-- Country -->
 
<select name="country_id"  class="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    <option value="">Select your nationality</option>
    @foreach($countries as $country)
        <option value="{{ $country->id }}"
            {{ old('country_id', $user->country_id ?? '') == $country->id ? 'selected' : '' }}>
            {{ $country->name }}
        </option>
    @endforeach
</select>

<!-- Country of Residence -->
<select name="country_of_residence_id"  class="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    <option value="">Select your country of residence</option>
    @foreach($countries as $country)
        <option value="{{ $country->id }}"
            {{ old('country_of_residence_id', $user->country_of_residence_id ?? '') == $country->id ? 'selected' : '' }}>
            {{ $country->name }}
        </option>
    @endforeach
</select>



          <!-- Password field -->
          <div class="relative w-full mt-4">
  <input
    class="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
    placeholder="Create a password" required type="password" name="password" id="password">
  
  <span onclick="togglePassword('password', this)" class="absolute right-4 top-5 cursor-pointer text-gray-500">
    👁️
  </span>
</div>

<div class="relative w-full mt-4">
  <input
    class="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-4 text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
    placeholder="Confirm Password" required type="password" name="password_confirmation" id="password_confirmation">
  
  <span onclick="togglePassword('password_confirmation', this)" class="absolute right-4 top-5 cursor-pointer text-gray-500">
    👁️
  </span>
</div>

          <!-- Terms and conditions -->


          <div>
  <div class="flex items-center ml-2">
    <input type="checkbox" id="terms" name="terms" class="rounded w-4 h-4 border-[#E2E8F0]" {{ old('terms') ? 'checked' : '' }}>
    <label for="terms" class="ml-2 text-base text-[#718096]">
      I agree to the <a href="#" class="text-primary hover:underline">Terms and Conditions</a>
    </label>
  </div>
  <div class="flex items-center ml-2 mt-2">
    <input type="checkbox" id="market_policy" name="market_policy" class="rounded w-4 h-4 border-[#E2E8F0]" {{ old('market_policy') ? 'checked' : '' }}>
    <label for="market_policy" class="ml-2 text-base text-[#718096]">
      I agree to the <a href="#" class="text-primary hover:underline">market policies</a>
    </label>
  </div>

  @error('terms')
    <p class="text-red-500 text-sm mt-1 ml-2">{{ $message }}</p>
  @enderror
  @error('market_policy')
    <p class="text-red-500 text-sm mt-1 ml-2">{{ $message }}</p>
  @enderror
</div>
          <div class="w-full px-2">
            <button type="submit"
              class="px-6 py-2 bg-[#a5dd7294] text-black rounded-lg w-full hover:bg-[#709b4bbf] transition duration-300">
              Create your account
            </button>
          </div>

          <div class="relative">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t border-[#E2E8F0]"></div>
            </div>
            <div class="relative flex justify-center text-lg">
              <span class=" font-medium px-2 text-gray-800">Or Sign Up
                with</span>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 px-2">
            <a href="{{ route('user.auth.google') }}"
            class="px-6 py-2 text-black rounded-lg bg-[#58af0838] hover:bg-[#4a910954] transition duration-300 flex items-center justify-center">
             <i class="fab fa-google mr-2"></i> Google
           </a>
          </div>
        </form>

        <p class="text-center text-xl text-gray-600">
          Already have an account? <a href="{{route('user.login')}}" class="text-blue-500 hover:underline">Log in</a>
        </p>
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
    function validatePassword() {
        const password = document.getElementById("password").value;
        const help = document.getElementById("passwordHelp");

        const requirements = [
            { regex: /.{8,}/, message: "Minimum 8 characters" },
            { regex: /[A-Z]/, message: "At least one uppercase letter" },
            { regex: /[a-z]/, message: "At least one lowercase letter" },
            { regex: /[0-9]/, message: "At least one number" },
            { regex: /[!@#$%^&*]/, message: "At least one special character (!@#$%^&*)" }
        ];

        const unmet = requirements.filter(req => !req.regex.test(password));
        
        if (unmet.length === 0) {
            help.textContent = "Strong password ✅";
            help.className = "text-green-600 text-sm mt-1";
        } else {
            help.textContent = "Password must have: " + unmet.map(u => u.message).join(", ");
            help.className = "text-red-600 text-sm mt-1";
        }
    }
</script>
<script>
function togglePassword(fieldId, icon) {
  const field = document.getElementById(fieldId);
  if (field.type === 'password') {
    field.type = 'text';
    icon.textContent = '🙈'; // change icon
  } else {
    field.type = 'password';
    icon.textContent = '👁️'; // change icon
  }
}
</script>

@endpush