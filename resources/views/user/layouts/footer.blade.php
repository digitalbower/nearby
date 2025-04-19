 <!-- Footer -->
 <footer id="mainFooter" class="bg-[#58af0838] lg:block hidden text-gray-900 py-16 shadow-lg">
  <div class="container mx-auto  px-4 lg:px-0">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
      <!-- Brand Section -->
      <div> 
        <div class="flex items-center gap-2 text-white text-2xl font-bold mb-4">
        <img src="{{ asset('images/NearByVoucherswide.svg') }}" alt="logo" class="w-36 object-fit">
        </div>
        <p class="mb-6">Don't just get there, get there in
          style</p>   
        <div class="space-y-3">
          <div class="flex items-center gap-3">
            <i class="fas fa-location-dot"></i>
            <span>901 Thornridge Cir Shiloh, Hawaii
              81063</span>
          </div>
          <div class="flex items-center gap-3">
            <i class="fas fa-phone"></i>
            <span>(308) 555-0121</span>
          </div>
          <div class="flex items-center gap-3">
            <i class="fas fa-envelope"></i>
            <span>hello@travelwp.com</span>
          </div>
        </div>
      </div>

      <!-- Top Destination -->
      <div>
      <h3 class="text-black text-base lg:text-xl font-bold mb-6">Top Destination</h3>
<ul class="space-y-3 text-sm lg:text-base">
  @foreach ($topDestinations as $item)
      <li>
          <a href="{{ $item->link ?? '#' }}" class="hover:text-black transition-colors">
              {{ $item->item_text }}
          </a>
      </li>
  @endforeach
</ul>
</div>
      <!-- Information -->
      <div>
<h3 class="text-black text-base lg:text-xl font-bold mb-6">Information</h3>
<ul class="space-y-3 text-sm lg:text-base">
  @foreach ($informationLinks as $item)
    <li>
      <a href="{{ $item->link ?? '#' }}" class="hover:text-black transition-colors">
        {{ $item->item_text }}
      </a>
    </li>
  @endforeach
</ul>
</div>


      <!-- Follow Us & Payment -->
      <div>
<h3 class="text-black text-base lg:text-xl font-bold mb-6">Follow Us</h3>
<div class="flex gap-4 mb-8">
  @foreach ($followus->where('type', 'Follow Us')->where('status', 1) as $item)
    <a href="{{ $item->link ?? '#' }}"
      class="bg-[#58af0838] p-1 justify-center rounded-full w-10 h-10 flex items-center hover:bg-cyan-600 transition-colors">
      <i class="{{ $item->icon }}"></i>
    </a>
  @endforeach
</div>


      <h3 class="text-black text-base lg:text-xl font-bold mb-6">Payment Channels</h3>
            <div class="grid grid-cols-4 gap-4">
              @foreach ($payment_channels->where('type', 'payment_channels')->where('status', 1) as $item)
                <img src="{{ asset($item->icon) }}" alt="{{ $item->item_text }}" class="h-9">
              @endforeach
        </div>

        <button
          class="mt-8 border border-gray-700 rounded-lg px-4 py-2 flex items-center gap-2 hover:border-gray-500 transition-colors">
          <i class="fas fa-globe"></i>
          English | USD
        </button>
      </div>
    </div>

    <div class="mt-16 pt-8 border-t border-gray-800 text-center">
      Copyright © 2024 Travel WP. All Rights Reserved.
    </div>
  </div>
</footer>

<footer class=" lg:hidden block bg-[#58af0838] text-gray-900 py-16 shadow-lg">
  <div class="container mx-auto lg:px-0 px-4 lg:px-4">
    <div class="grid grid-cols-1 gap-8">
      <!-- Brand Section -->
      <div>
        <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
          onclick="toggleFooterSection('brand-section')">
          Brand Info
          <i class="fas fa-chevron-down" id="brand-section-icon"></i>
        </button>
        <div id="brand-section" class="hidden"> 
          <div class="flex items-center gap-2 text-white text-2xl font-bold mb-4">
          <img src="{{ asset('images/NearByVoucherswide.svg') }}" alt="logo" class="w-36 object-fit">
          </div>
          <p class="mb-6 text-sm lg:text-base">Don't just get there, get there in style</p>
          <div class="space-y-3 text-sm lg:text-base">
            <div class="flex items-center gap-3">
              <i class="fas fa-location-dot"></i>
              <span>901 Thornridge Cir Shiloh, Hawaii 81063</span>
            </div>
            <div class="flex items-center gap-3">
              <i class="fas fa-phone"></i>
              <span>(308) 555-0121</span>
            </div>
            <div class="flex items-center gap-3">
              <i class="fas fa-envelope"></i>
              <span>hello@travelwp.com</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Top Destination -->
      <div>
        <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
          onclick="toggleFooterSection('top-destination')">
          Top Destination
          <i class="fas fa-chevron-down" id="top-destination-icon"></i>
        </button>
        <div id="top-destination" class="hidden">
          <ul class="space-y-3 text-sm lg:text-base">
            <li><a href="#" class="hover:text-black transition-colors">Bali</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Bangkok</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Cancun</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Nha Trang</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Phuket</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Tokyo</a></li>
            <li><a href="#" class="hover:text-black transition-colors">More Destinations</a></li>
          </ul>
        </div>
      </div>

      <!-- Information -->
      <div>
        <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
          onclick="toggleFooterSection('information')">
          Information
          <i class="fas fa-chevron-down" id="information-icon"></i>
        </button>
        <div id="information" class="hidden">
          <ul class="space-y-3 text-sm lg:text-base">
            <li><a href="#" class="hover:text-black transition-colors">Help & FAQs</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Careers</a></li>
            <li><a href="#" class="hover:text-black transition-colors">About us</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Contact us</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Privacy policy</a></li>
            <li><a href="#" class="hover:text-black transition-colors">Blogs</a></li>
          </ul>
        </div>
      </div>

      <!-- Follow Us & Payment -->
      <div>
        <button class="w-full text-left flex justify-between items-center py-2 text-base lg:text-xl font-bold"
          onclick="toggleFooterSection('follow-payment')">
          Follow Us & Payment
          <i class="fas fa-chevron-down" id="follow-payment-icon"></i>
        </button>
        <div id="follow-payment" class="hidden">
          <div class="flex gap-4 mb-8">
            <a href="#" class="bg-[#58af0838] rounded-full p-2 hover:bg-cyan-600 transition-colors">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="bg-blue-400 p-2 rounded-full hover:bg-blue-500 transition-colors">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="bg-red-600 p-2 rounded-full hover:bg-red-700 transition-colors">
              <i class="fab fa-youtube"></i>
            </a>
            <a href="#" class="bg-pink-600 p-2 rounded-full hover:bg-pink-700 transition-colors">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
          <h3 class="text-black text-base lg:text-xl font-bold mb-6">Payment Channels</h3>
          <div class="grid grid-cols-4 gap-4">
            <img src="https://via.placeholder.com/50x30" alt="Union Pay" class="h-8">
            <img src="https://via.placeholder.com/50x30" alt="Visa" class="h-8">
            <img src="https://via.placeholder.com/50x30" alt="Mastercard" class="h-8">
            <img src="https://via.placeholder.com/50x30" alt="JCB" class="h-8">
            <img src="https://via.placeholder.com/50x30" alt="American Express" class="h-8">
            <img src="https://via.placeholder.com/50x30" alt="Apple Pay" class="h-8">
            <img src="https://via.placeholder.com/50x30" alt="Google Pay" class="h-8">
            <img src="https://via.placeholder.com/50x30" alt="Alipay" class="h-8">
          </div>
          <button
            class="mt-8 border border-gray-700 rounded-lg px-4 py-2 flex items-center gap-2 hover:border-gray-500 transition-colors">
            <i class="fas fa-globe"></i>
            English | USD
          </button>
        </div>
      </div>
    </div>

    <div class="mt-16 pt-8 border-t border-gray-800 text-center">
      Copyright © 2024 Travel WP. All Rights Reserved.
    </div>
  </div>
</footer>
