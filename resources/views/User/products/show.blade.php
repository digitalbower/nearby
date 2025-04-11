
@extends('user.layouts.main')
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/custom/front/product.css')}}">
<style>
  #about  ul {
    list-style: disc;
    margin-left: 1.25rem;
  }
  #fine-print  ul {
    list-style: disc;
    margin-left: 1.25rem;
  }
</style>
@endpush
@section('content')
  <section class="w-full">
    <div class="container mx-auto py-10 px-4 lg:px-0 ">
      <!-- Promo Banner -->
      <div
        class="flex items-center p-4 mb-8 w-auto px-9 py-3 bg-[#58af0838]  text-gray-800 font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
        <i class="fas fa-tag text-2xl mr-3"></i>
        <div>
          <p class="lg:text-2xl text-lg font-semibold">Extra $13.8 off</p>
          <p class="lg:text-base font-medium text-base">
            Promo <span class=" font-semibold text-lg">EARLYBIRD24</span> ends in: 
            <span id="countdown" class="font-medium text-base"></span>
          </p>
        </div>
      </div>
      <div id="flash-message" class="hidden p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert"></div>
      <!-- Main Content -->
      <div class="lg:grid md:grid-cols-12 grid-cols-1 relative gap-10">
        <!-- Left Column -->
        <div class="col-span-7">
          <!-- Deal Title -->
          <h1 class="md:text-2xl text-base font-bold text-gray-800 mb-4">
          {{$product->name}}
          </h1>
          <div class="flex items-center gap-6 mb-6">
            <a href="#" class="text-gray-800 text-sm lg:text-base hover:underline font-medium"> {{$product->emirate->name}}</a>
            <div class="flex items-center text-gray-600 gap-2">
              <i class="fas fa-star text-yellow-500"></i>
              <span class="font-semibold">{{$averageRating}}</span>
              <span class="text-xs lg:text-sm">({{$totalReviews}} reviews)</span>
            </div>
          </div>

          <!-- Tags -->
          <div class="flex gap-1 lg:gap-3 mb-6">
            <span
              class="bg-black text-white px-2 md:px-4 py-2 rounded-full text-xs md:text-sm flex items-center gap-2">
              <i class="fas fa-fire"></i> {{$tag_name}}
            </span>
            <span
              class="bg-yellow-100 text-yellow-800 px-2 md:px-4 py-2 rounded-full text-xs md:text-sm flex items-center gap-2">
              <i class="fas fa-star"></i> Best Rated
            </span>
            <span
              class="bg-[#4a910954] text-black px-2 md:px-4 py-2 rounded-full text-xs md:text-sm flex items-center gap-2">
              <i class="fas fa-shopping-cart"></i> 10,000+ Bought
            </span>
          </div>
          <div class="relative overflow-hidden">
            <!-- Include Splide.js CSS and JS -->
            <link
              rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
            />
            <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
          
            <!-- Main Image Slider -->
            <section id="main-slider" class="splide" aria-label="Main Image Slider">
              <div class="splide__track">
                <ul class="splide__list rounded-md">
                  @foreach ($gallery as $image)
                  <li class="splide__slide rounded-md">
                    <img
                      src="{{ asset('storage/'.$image) }}"
                      alt="Product Image"
                      class="w-full rounded-lg object-cover shadow-md"
                    />
                  </li>
                  @endforeach
                </ul>
              </div>
            </section>
          
            <!-- Thumbnail Slider -->
            <section
              id="thumbnail-slider"
              class="splide mt-4"
              aria-label="Thumbnail Slider"
            >
              <div class="splide__track">
                <ul class="splide__list">
                  @foreach ($gallery as $image)
                  <li class="splide__slide rounded-md">
                    <img
                      src="{{ asset('storage/'.$image) }}"
                      alt="Thumbnail 1"
                      class=" object-cover rounded-lg cursor-pointer"
                    />
                  </li>
                  @endforeach
                </ul>
              </div>
            </section>

          </div>
          
          
          <!-- Include Swiper.js CSS and JS -->
        

          <div class="max-w-4xl mx-auto mt-2 lg:mt-10 bg-white rounded-lg shadow-lg p-3 lg:p-6 space-y-6">
            <!-- Header Section -->
            <div>
              <h1 class="lg:text-2xl text-base font-bold text-gray-800">{{$product->name}}</h1>
              <p class="text-gray-600 text-sm lg:text-base">{{$product->short_description}}</p>
            </div>

            <!-- Tabs Section -->
            <div>

              <div class="flex justify-start space-x-0 bg-gray-50 rounded-lg p-2">
                <!-- Modern Tabs -->
                <button id="tab-about" role="tab"
                  class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none "
                  onclick="openTab(event, 'about')">
                  About
                </button>
                <button id="tab-fine-print" role="tab"
                  class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none "
                  onclick="openTab(event, 'fine-print')">
                  Fine Print
                </button>
                <button id="tab-reviews" role="tab"
                  class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none "
                  onclick="openTab(event, 'reviews')">
                  Reviews
                </button>
                <button id="tab-location" role="tab"
                  class="lg:px-10 px-2 py-2 text-sm font-medium transition focus:outline-none"
                  onclick="openTab(event, 'location')">
                  Location
                </button>
              </div>
              <!-- Tab Contents -->

              <div id="about" class="tab-content mt-4">
               {!! $product->about_description !!}
              </div>
              <div id="fine-print" class="tab-content hidden mt-4  bg-white">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Fine
                  Print</h3>
                
                  @foreach ($product->vendorTerms as $vendor_term)
                    {!! $vendor_term->terms !!}
                  @endforeach
                  @foreach ($nbvterms as $nbvterm)
                    {!! $nbvterm->terms !!}
                  @endforeach
                
                <div class="mt-6 bg-blue-100 text-blue-800 p-4 rounded-lg">
                  <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                  <span>Please read the full terms and conditions carefully
                    before availing of this offer.</span>
                </div>
              </div>

              <div id="reviews" class="tab-content text-sm lg:text-base hidden mt-4">
                <div class="space-y-3 mt-4 lg:mt-12 ">
                  <div class="mx-auto ">
                    <div class="flex flex-col md:flex-row items-center justify-between items-start mb-3">
                      <div>
                        <h2 class="text-3xl font-bold text-gray-900">Customer Reviews</h2>
                      </div>
                      <div>
                        <button id="reviewButton" onclick="toggleReviewForm()"
                          class="mt-0 md:mt-0 text-black flex items-center gap-2">
                          <i class="fas fa-plus w-4 h-4"></i> Write a Review
                        </button>
                      </div>
                    </div>

                    @auth
                    <div id="review-form" class="hidden mb-8 p- bg-white">
                      <h3 class="text-2xl font-semibold mb-6 text-gray-800">Add Your Review</h3>
                      <form onsubmit="addReview(event)">
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">

                        <!-- Name Field -->
                        <div class="mb-6">
                          <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                          <input type="text" id="name" name="review_title"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm"
                            placeholder="Enter your name" required>
                        </div>

                        <!-- Rating Field -->
                        <div class="mb-6">
                          <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                          <div class="flex gap-2 rating-stars">
                            <button type="button" onclick="setRating(1)"
                              class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                              <i class="fas fa-star w-6 h-6"></i>
                            </button>
                            <button type="button" onclick="setRating(2)"
                              class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                              <i class="fas fa-star w-6 h-6"></i>
                            </button>
                            <button type="button" onclick="setRating(3)"
                              class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                              <i class="fas fa-star w-6 h-6"></i>
                            </button>
                            <button type="button" onclick="setRating(4)"
                              class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                              <i class="fas fa-star w-6 h-6"></i>
                            </button>
                            <button type="button" onclick="setRating(5)"
                              class="p-2 text-gray-300 hover:text-yellow-500 transition-colors">
                              <i class="fas fa-star w-6 h-6"></i>
                            </button>
                          </div>
                        </div>

                        <!-- Comment Field -->
                        <div class="mb-6">
                          <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Your
                            Comment</label>
                          <textarea id="comment" rows="4"
                          name="review_description"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm"
                            placeholder="Write your review here..." required></textarea>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end gap-4">
                          <button type="button" onclick="cancelReview()"
                            class="px-6 py-3 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                            Cancel
                          </button>
                          <button type="submit"
                            class="px-6 py-3 bg-[#58af0838] hover:bg-[#4a910954] text-black rounded-lg  transition-colors">
                            Submit Review
                          </button>
                        </div>
                      </form>
                    </div>

                    <div class="flex items-center gap-2 mb-1">
                      <span class="text-3xl font-bold text-gray-900">{{$averageRating}}</span>
                      <div class="flex">
                        @for ($i = 0; $i < 5; $i++)
                        <i class="fas fa-star {{ $i < floor($averageRating) ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                       @endfor
                      </div>
                    </div>
                    <p class="text-sm text-gray-600">based on {{$totalReviews}} reviews</p>

                    <div class="bg-gray-50 rounded-lg p-4 my-8">
                      <div class="flex items-center gap-2 mb-4">
                        <i class="fas fa-check-circle text-green-600 w-5 h-5"></i>
                        <span class="font-semibold">100% Verified Reviews</span>
                      </div>
                      <p class="text-sm text-gray-600">All reviews are from customers who redeemed deals. Review
                        requests are sent by email to customers who purchased the deal.</p>
                    </div>

                    <div class="mb-8">
                      <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">5 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                              <div class="h-full bg-[#4a910954] transition-all duration-500" style="width: {{ $percentages[5] }}%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">{{ round($percentages[5]) }}%</span>
                      </div>
                  
                      <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">4 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                              <div class="h-full bg-[#4a910954] transition-all duration-500" style="width: {{ $percentages[4] }}%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">{{ round($percentages[4]) }}%</span>
                      </div>
                  
                      <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">3 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                              <div class="h-full bg-[#4a910954] transition-all duration-500" style="width: {{ $percentages[3] }}%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">{{ round($percentages[3]) }}%</span>
                      </div>
                  
                      <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">2 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                              <div class="h-full bg-[#4a910954] transition-all duration-500" style="width: {{ $percentages[2] }}%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">{{ round($percentages[2]) }}%</span>
                      </div>
                  
                      <div class="flex items-center gap-4 mb-2">
                          <span class="w-16 text-sm text-gray-600">1 star</span>
                          <div class="flex-1 h-3 bg-gray-200 rounded-full overflow-hidden">
                              <div class="h-full bg-[#4a910954] transition-all duration-500" style="width: {{ $percentages[1] }}%"></div>
                          </div>
                          <span class="w-12 text-sm text-gray-600">{{ round($percentages[1]) }}%</span>
                      </div>
                    </div>

                    <div class="mb-5">
                      <button onclick="toggleReviews()"
                        class="w-auto px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                        Show Reviews
                      </button>
                    </div>

                    <div id="reviews-list" class="space-y-6 hidden">
                      <!-- Reviews will be dynamically added here -->
                    </div>
                    @endauth
                  </div>
                </div>
              </div>


              <div id="location" class="tab-content hidden text-sm lg:text-base mt-4">
                <h3 class="text-lg font-semibold text-gray-800 md:text-base text-sm">Our
                  Location</h3>
                <div class="mt-4   space-y-4">
                  <!-- Address -->
                  <div>
                    <h4 class="font-medium text-gray-900">Address</h4>
                    <p class="text-gray-600">{{$product->productlocation_address}}</p>
                  </div>
                  <!-- Map Placeholder -->
                  {{-- <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                      <p class="text-gray-500">[Map Placeholder]</p>
                  </div> --}}
                  <!-- Contact Details -->
                  <div class="pb-4">
                    <h4 class="font-medium text-gray-900">Contact Us</h4>
                    <p class="text-gray-600">
                      Phone: <a href="tel:+1234567890" class="text-gray-800 hover:underline">{{$product->product_support_phone}}</a><br>
                      Email: <a href="mailto:{{$product->product_support_email}}"
                        class="text-gray-800 hover:underline">{{$product->product_support_email}}</a>
                    </p>
                  </div>
                  <!-- Directions Button -->
                  <div class="">
                    <a href="{{ $product->productlocation_link }}" target="_blank" rel="noopener noreferrer"
                      class="w-auto px-9 py-3 bg-[#58af0838]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                      Get Directions
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

        <!-- Right Column -->
        <div class=" lg:mt-0 mt-5 w-full pb-20 col-span-5 sticky top-0  h-[120vh]  bg-[#58af0838] rounded-lg  p-3 lg:p-5 space-y-6">
          <!-- Option Selector -->
        <!-- Options -->
          <form action="{{route('user.products.add_cart')}}" id="addCartForm" method="POST">
            @csrf
            <div class="space-y-4">
              <h2 class="md:text-2xl text-base font-bold text-gray-800 mb-0">
                Choose a Variant
              </h2>
              @if ($errors->any())
              <div class="bg-red-500 text-white p-4 rounded-lg shadow-md">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
                @foreach ($variants as $index=>$variant)
                <div
                  class="rounded-lg border bg-white text-card-foreground shadow-sm w-full overflow-hidden hover:shadow-xl f transition-all duration-300 ease-in-out transform hover:border-cyan-300 hover:ring-2 hover:ring-cyan-600">
                  <div class="flex flex-col space-y-2 p-4 pb-2">
                    <h3 class="tracking-tight text-base lg:text-2xl font-bold">{{$variant->title}}</h3>
                    <div class="gap-x-4 flex items-center">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="lucide lucide-bed h-5 w-5 text-gray-800">
                          <path d="M2 4v16"></path>
                          <path d="M2 8h18a2 2 0 0 1 2 2v10"></path>
                          <path d="M2 17h20"></path>
                          <path d="M6 8v9"></path>
                        </svg>
                      </div>
                      <p class="text-sm text-muted-foreground flex items-center gap-2">
                        <span>{{$variant->short_description}}</span>
                      </p>
                    </div>
                  </div>
                
                  <div class="p-4 pt-0 space-y-3">
                    <div class="flex items-center justify-between">
                      <div class="space-y-1">
                        <div class="flex items-center gap-2">
                          <span class="text-sm font-medium text-muted-foreground">From</span>
                          <span class="text-sm line-through text-muted-foreground">{{$variant->unit_price}}</span>
                          <div
                            class="inline-flex items-center rounded-full border px-2 py-1 text-xs transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 text-green-600 bg-green-100 font-semibold"
                            data-v0-t="badge">-{{$variant->discounted_percentage}}%</div>
                        </div>
                        <div class="flex items-center gap-2">
                          <span class="text-3xl font-bold text-primary">${{$variant->discounted_price}}</span>
                          <span class="text-sm text-muted-foreground">/{{$variant->types->product_type}}</span>
                
                          <div class="flex items-center space-x-1 bg-white p-0 rounded-xl shadow-lg border border-gray-200">
                            <!-- Decrement Button -->
                            <button
                              type="button"
                              class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-l-md hover:bg-red-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-300"
                             onclick="decrementQty({{ $variant->id }})"
                              aria-label="Decrease Quantity">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                              </svg>
                            </button>
                
                            <!-- Quantity Display -->
                            <input
                              type="number" name="variants[{{ $variant->id }}][quantity]" data-variant-id="{{ $variant->id }}"
                              id="quantity_{{ $variant->id }}" 
                              value="{{ old('quantity', $variant->cart->quantity ?? 0) }}"                               
                              min="0"
                              class="w-12 h-8 pl-4 text-center flex justify-center rounded-lg text-lg font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 variant-quantity"
                              aria-label="Quantity" />
                            
                            <!-- Increment Button -->
                            <button
                              type="button"
                              class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-r-md hover:bg-green-500 hover:text-white transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-300"
                              onclick="incrementQty({{ $variant->id }})" 
                              aria-label="Increase Quantity">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                              </svg>
                            </button>
                          </div>
                         
                        </div>
                      </div>
                      <div
                        class="bg-primary text-primary-foreground rounded-full p-2 hover:bg-primary/90 transition-colors duration-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="lucide lucide-arrow-right h-6 w-6">
                          <path d="M5 12h14"></path>
                          <path d="m12 5 7 7-7 7"></path>
                        </svg>
                      </div>
                    </div>
                    <span id="quantity-error-{{$variant->id}}"></span>
                    <div
                      class="text-xs  bg-[#58af0838] rounded-md p-2 text-black flex gap-x-4 items-center rounded-lg p-3">
                      <p class="font-medium">{{$variant->short_info}}</p>
                      <p class="text-primary font-semibold">Learn more</p>
                    </div>
                
                    <div class="flex items-center justify-between text-sm text-muted-foreground">
                      <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="lucide lucide-users h-5 w-5 text-gray-800">
                          <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                          <circle cx="9" cy="7" r="4"></circle>
                          <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                          <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="font-medium">10,000+ booked</span>
                      </span>
                      <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="lucide lucide-calendar h-4 w-4 text-purple-500">
                          <path d="M8 2v4"></path>
                          <path d="M16 2v4"></path>
                          <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                          <path d="M3 10h18"></path>
                        </svg>
                        <span class="font-medium">{{$variant->short_legend}}</span>
                      </span>
                    </div>
                    <input type="hidden" name="variants[{{ $variant->id }}][product_variant_id]" value="{{ $variant->id }}" />
                  </div>
                </div>
                @endforeach
            
            </div>
            <div class="space-y-4 mt-6">
            <!-- Continue Button -->
            @auth
            <button type="button"onclick="redirectToCart()" 
              class="w-full px-9 py-3 bg-[#58af0838] hover:bg-[#4a910954]   text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
              Continue
            </button>
            @endauth
            <button type="button" onclick="checkAuthAndSubmit()"
            class="relative px-6 w-full py-3  bg-[#58af0838] hover:bg-[#4a910954] text-black font-semibold rounded-lg shadow-md  transition-transform transform  duration-300 ease-in-out"
            >
            <i class="fas fa-shopping-cart mr-2"></i>
            Add to Cart
            </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
<script src="{{asset('assets/js/custom//front/product.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script>
  const isUserLoggedIn = @json(auth()->check()); 

    function redirectToCart(){
      window.location.href = "{{ route('user.cart') }}";
    }
      let reviews = [];

      let hasReviewed = false;

      function toggleReviewForm() {
        if (!isUserLoggedIn) {
          const redirectUrl = "/user/login?redirect=" + encodeURIComponent(window.location.href);
          window.location.href = redirectUrl
        } else {
          const reviewButton = document.getElementById("reviewButton");
          const reviewForm = document.getElementById("review-form");

          if (!hasReviewed) {
            reviewForm.classList.remove("hidden");
            reviewButton.innerHTML = "<i class='fas fa-edit w-4 h-4'></i> Edit Review";
            hasReviewed = true;
          } else {
            reviewForm.classList.add("hidden");
            reviewButton.innerHTML = "<i class='fas fa-plus w-4 h-4'></i> Write a Review";
            hasReviewed = false;
          }
        }
      }
      function setRating(rating) {
        const stars = document.querySelectorAll('.rating-stars .fa-star');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('text-yellow-500'); 
                star.classList.remove('text-gray-300'); 
            } else {
                star.classList.remove('text-yellow-500');  
                star.classList.add('text-gray-300'); 
            }
        });
      }




      function cancelReview() {
        const reviewForm = document.getElementById("review-form");
        reviewForm.classList.add("hidden");
        hasReviewed = false;
        document.getElementById("reviewButton").innerHTML = "<i class='fas fa-plus w-4 h-4'></i> Write a Review";
      }

      function addReview(event) {
        event.preventDefault();

        const product_id = document.getElementById("product_id").value;
        const review_title = document.getElementById("name").value;
        const review_rating = Array.from(document.querySelectorAll('.rating-stars .fa-star.text-yellow-500')).length;
        const review_description  = document.getElementById("comment").value;
        const user_id = document.getElementById("user_id").value; 

        const reviewData = {
          review_title,
          user_id,
          product_id,
          review_rating,
          review_description,
        };
        fetch('/user/products/store-review', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')  // CSRF protection
            },
            body: JSON.stringify(reviewData)
        })
        .then(response => response.json())
        .then(data => {
          showFlashMessage(data.message);
          cancelReview();
            displayReviews(); 
        })
        .catch(error => {
            console.error('Error:', error);
            alert("There was an error adding the review. Please try again.");
        });
    }
    function showFlashMessage(message) {
      const flashMessage = document.getElementById("flash-message");
      flashMessage.textContent = message;
      flashMessage.classList.remove("hidden");

      // Optional: Auto-hide after 4 seconds
      setTimeout(() => {
          flashMessage.classList.add("hidden");
          flashMessage.textContent = "";
      }, 4000);
    }
      function displayReviews() {
        if (isUserLoggedIn) {
          const productId = document.getElementById("product_id").value;
          const reviewList = document.getElementById("reviews-list");
          reviewList.innerHTML = "";

          fetch(`/user/products/show-review/${productId}`) 
            .then(response => response.json())
            .then(reviews => {
              reviews.forEach(review => {
                const reviewDiv = document.createElement("div");
                reviewDiv.classList.add("p-2", "bg-white", "rounded-lg", "border", "border-gray-200", "space-y-4");

                const reviewHeader = document.createElement("div");
                reviewHeader.classList.add("flex", "justify-between", "items-center", "mb-4");

                const reviewerName = document.createElement("span");
                reviewerName.classList.add("font-semibold", "text-lg", "text-gray-800");
                reviewerName.textContent = review.review_title;

                const reviewDate = document.createElement("span");
                reviewDate.classList.add("text-sm", "text-gray-500");
                reviewDate.textContent = review.formatted_date;

                reviewHeader.appendChild(reviewerName);
                reviewHeader.appendChild(reviewDate);

                const reviewRating = document.createElement("div");
                reviewRating.classList.add("flex", "gap-1");

                for (let i = 0; i < 5; i++) {
                  const starIcon = document.createElement("i");
                  starIcon.classList.add("fas", "fa-star", i < review.review_rating ? "text-yellow-500" : "text-gray-300");
                  reviewRating.appendChild(starIcon);
                }

                const reviewComment = document.createElement("p");
                reviewComment.classList.add("text-sm", "text-gray-600");
                reviewComment.textContent = review.review_description;

                reviewDiv.appendChild(reviewHeader);
                reviewDiv.appendChild(reviewRating);
                reviewDiv.appendChild(reviewComment);

                reviewList.appendChild(reviewDiv);
              });

              reviewList.classList.remove("hidden");
            })
            .catch(error => {
              console.error("Error fetching reviews:", error);
            });
          }
        }
      function toggleReviews() {
        const reviewsList = document.getElementById("reviews-list");
        reviewsList.classList.toggle("hidden");
      }

      document.addEventListener("DOMContentLoaded", function() {
      displayReviews();
    });
</script>
<script>
   // Set the target date for the promo end time
   const promoEndDate = new Date("2024-12-31T23:59:59");

// Function to calculate and display the countdown
function updateCountdown() {
  const now = new Date();
  const timeRemaining = promoEndDate - now;

  if (timeRemaining <= 0) {
    document.getElementById("countdown").textContent = "Promo ended!";
    return;
  }

  const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

  // Update the countdown text
  document.getElementById("countdown").textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
}

// Initialize the countdown and set it to update every second
updateCountdown();
setInterval(updateCountdown, 1000);
// Splide.js Initialization
document.addEventListener("DOMContentLoaded", function () {
  // Main Slider
  var mainSlider = new Splide("#main-slider", {
    type: "fade", // Smooth fade transition
    heightRatio: 0.5,
    pagination: false,
    arrows: true,
    cover: true,
  }).mount();

  // Thumbnail Slider
  var thumbnailSlider = new Splide("#thumbnail-slider", {
    fixedWidth: 100,
    fixedHeight: 60,
    isNavigation: true, // Sync thumbnails to main slider
    gap: 10,
    focus: "center",
    pagination: false,
    cover: true,
    arrows: false,
  }).mount();

  // Sync both sliders
  mainSlider.sync(thumbnailSlider);
});

// Function to handle tab switching
function openTab(event, tabId) {
// Hide all tab contents
const tabContents = document.querySelectorAll('.tab-content');
tabContents.forEach((content) => content.classList.add('hidden'));

// Remove active state from all tabs
const tabs = document.querySelectorAll('[role="tab"]');
tabs.forEach((tab) =>
  tab.classList.remove('bg-[#4a910954]', 'rounded-md')
);

// Show the active tab content
const activeContent = document.getElementById(tabId);
if (activeContent) {
  activeContent.classList.remove('hidden');
} else {
  console.error(`Tab content with ID '${tabId}' not found.`);
}

// Set the active tab
event?.currentTarget.classList.add('bg-[#4a910954]', 'rounded-md');
}

// Initialize the default active tab on page load
document.addEventListener('DOMContentLoaded', () => {
const defaultTab = document.getElementById('tab-about'); // Default tab ID
const defaultTabContentId = 'about'; // Default tab content ID

if (defaultTab && document.getElementById(defaultTabContentId)) {
  defaultTab.classList.add('bg-[#4a910954]', 'rounded-md');
  document.getElementById(defaultTabContentId).classList.remove('hidden');
} else {
  console.error('Default tab or tab content not found.');
}
});

// Function to decrement the quantity
function decrementQty(variantId) {
  const quantityInput = document.getElementById('quantity_' + variantId); 
  let currentValue = parseInt(quantityInput.value);

if (currentValue > 0) { // Prevent decrementing below zero
  quantityInput.value = currentValue - 1;
}
}

// Function to increment the quantity
function incrementQty(variantId) {
  const quantityInput = document.getElementById('quantity_' + variantId);
  let currentValue = parseInt(quantityInput.value) || 0; // Ensure a valid number
quantityInput.value = currentValue + 1;
}
</script>
<script>
   function checkAuthAndSubmit() {
        if (!isUserLoggedIn) {
            const redirectUrl = "/user/login?redirect=" + encodeURIComponent(window.location.href);
            window.location.href = redirectUrl;  
        } else {
            $("#addCartForm").valid();  
            if ($("#addCartForm").valid()) {
                document.getElementById('addCartForm').submit();  
            }
        }
  }
  $(document).ready(function () { 
    var rules = {};
    var messages = {};
    var numVariants = $(".variant-quantity").length; 
    $(".variant-quantity").each(function (index) {
        var variant_id = $(this).data('variant-id'); 

        var quantityName = "variants[" + variant_id + "][quantity]";

        rules[quantityName] = { required: true, min: 1 };
        
        messages[quantityName] = {
            required: "Minimum 1 quantity is required",
            min: "Minimum 1 quantity is required"
        };
    });
    
    $("#addCartForm").validate({
        rules: rules,    
        messages: messages,  
        errorPlacement: function (error, element) {
            var variant_id = element.data('variant-id');
            
            var errorContainerId = "#quantity-error-" + variant_id;

            if ($(errorContainerId).length) {
                $(errorContainerId).html(error); 
                $(errorContainerId).show(); 
            } else {
                error.insertAfter(element);
            }
        }
    });
  });
</script>

@endpush
