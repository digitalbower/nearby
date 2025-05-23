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

.owl-stage-outer {
    padding: 3px 0px;
}

.w-8 {
    width: 40px !important;
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

.fixed-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #fff;
    /* Blue color */
    color: white;

    z-index: 10;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Keyframes for slide-in animations */
@keyframes slideInTop {
    0% {
        transform: translateY(-100px);
        opacity: 0;
    }

    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideInBottom {
    0% {
        transform: translateY(100px);
        opacity: 0;
    }

    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Apply animations */
.animate-slideInTop {
    animation: slideInTop 1s ease-out forwards;
}

.animate-slideInBottom {
    animation: slideInBottom 1s ease-out forwards;
}

.to-blue-500 {
    --tw-gradient-to: #3b82f6 var(--tw-gradient-to-position);
}

/* Update the body to use the Poppins font */
body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
}

.owl-stage-outer {
    padding: 3px 0px;
}

.w-8 {
    width: 40px !important;
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
    right: 80px;
    top: -45px;

}

.owl-prev,
.owl-next span {
    font-size: 40px !important;
    line-height: 40px !important;
    color: #000 !important;
}

.owl-next {
    right: 10px;
    top: -45px;
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

.owl-carousel .owl-dots.disabled,
.owl-carousel .owl-nav.disabled {
    display: block;
}

.custom-right-icon {
    background-image: url('path-to-your-right-arrow-icon.svg');
    /* Replace with your custom right icon */
}

@media (max-width: 768px) {

    .owl-prev,
    .owl-next {
        width: 40px;
        height: 40px;
    }

    .owl-prev {
        right: 60px;


    }

    .owl-prev {
        top: -35px;

    }

    .owl-next {

        top: -35px;
    }

    .owl-prev,
    .owl-next span {
        font-size: 25px !important;
    }
}

#cover {
  position: fixed;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  background: #FFFFFF;
  z-index: 9999;
  font-size: 65px;
  text-align: center;
  padding-top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0 20px;
  color: #141526;
  font-family:tahoma;
}

.w3-spin {
  width: 48px;
  height: 48px;
  border: 5px solid #000;
  border-bottom-color: transparent;
  border-radius: 50%;
  display: inline-block;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
}

@keyframes rotation {
0% {
    transform: rotate(0deg);
}
100% {
    transform: rotate(360deg);
}
} 

</style>

@endpush
@section('content')

<div id="cover"> <span class="glyphicon glyphicon-refresh w3-spin preloader-Icon"></span> loading...</div>
<section class="">
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-300 flex justify-between items-center">
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="text-green-700 hover:text-green-900">&times;</button>
    </div>
    @endif
    <div class="container mx-auto relative border-b">
        <div class=" grid h-full bg-[#58af0838] grid-cols-1  md:grid-cols-5">
            <aside
                class="lg:col-span-1 lg:order-1 order-1 sm:col-span-2 w-full shadow-lg  bg-[#58af0838] overflow-hidden relative">
                <!-- Mobile Menu Icon -->
                <div class="md:hidden flex justify-between items-center p-4 bg-[#58af0838]">
                    <h2 class="text-2xl font-bold text-gray-700">Categories</h2>
                    <button id="menuToggle" class="text-gray-700 focus:outline-none">
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                </div>

                <!-- Sidebar Content -->
                <div id="menuContent" class="hidden md:block p-4">
                    <h2 class="hidden lg:block text-2xl ml-5 font-bold mb-6 text-gray-700">Categories</h2>
                    <nav class="space-y-2 ml-5">
                        @foreach ($categories as $category)
                        <a href="{{ url('/products') }}?category={{ urlencode($category->name) }}"
                            class="flex items-center justify-between py-3 px-4 rounded hover:bg-white/40 transition-colors duration-200 text-gray-700">
                            <div class="flex items-center gap-3">
                                <i class="{{ $category->categoryicon }} h-5 w-5"></i>
                                <span class="font-medium">{{ strtoupper($category->name) }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right h-4 w-4 ml-2"></i>
                            </div>

                        </a>
                        @endforeach
                    </nav>
                    <div class="mt-8 pt-6 ml-5 border-t border-white/20">
                        <a href="{{ url('/products') }}"
                            class="inline-flex rounded-lg p-2 px-3 items-center text-gray-700 hover:bg-white/40 transition-colors duration-200 text-gray-700 font-medium  transition-all">
                            ALL CATEGORIES
                            <i
                                class="fas fa-chevron-right h-4 w-4 ml-1 transition-transform transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </aside>


            <main class="lg:col-span-4 lg:order-2 order-2 sm:col-span-3 h-full lg:p-10 py-4 relative px-4">
                <div class="swiper mySwiper w-full h-full">
                    <div class="swiper-wrapper">

                        @foreach ($products as $product)
                        <div class="swiper-slide">
                            <div class="lg:flex w-full relative mb-10 items-center justify-center">
                                <!-- Left Section (Top Animation) -->
                                <div id="left-section"
                                    class="w-full left-10 rounded-xl z-20 transform translate-x-[-50px] opacity-0">
                                    <div class="rounded-xl lg:w-3/5">
                                        <img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}"
                                            class="w-full h-auto max-h-[300px] lg:pb-0 pb-0 lg:max-h-[500px] rounded-xl object-cover">
                                    </div>
                                </div>

                                <!-- Right Section (Bottom Animation) -->
                                <div id="right-section"
                                    class="lg:absolute flex flex-col w-full lg:w-1/2 bg-white text-gray-800 rounded-lg p-3 lg:p-8 shadow-xl z-20 right-0 transform translate-x-[50px] opacity-0">

                                    <h1
                                        class="lg:text-2xl text-lg font-extrabold mb-0 leading-tight text-gray-900 leading-snug">
                                        {{ $product->name }}
                                    </h1>

                                    <div>
                                        <h2 class="lg:text-lg text-base font-bold text-gray-900">
                                            {!! $product->productlocation_address !!}
                                        </h2>
                                        <div class="flex items-center space-x-2 text-gray-600">
                                            @for ($i = 0; $i < 5; $i++) <span
                                                class="fas fa-star {{ $i < floor($product->average_rating) ? 'text-yellow-400' : 'text-gray-300' }}">
                                                </span>
                                                @endfor
                                                <span class="text-sm">({{ $product->average_rating}} /
                                                    {{$product->total_review}} reviews)</span>
                                        </div>
                                    </div>

                                    <p class="text-gray-600 text-sm lg:text-base leading-relaxed">
                                        {{ $product->short_description }}
                                    </p>

                                    <div class="flex items-center space-x-4">
                                        <span class="text-3xl font-bold text-red-600">
                                            AED {{$product->min_discounted_price  }}
                                        </span>
                                        <span class="text-xl text-gray-400 line-through">
                                            AED {{ $product->min_original_price   }}
                                        </span>
                                    </div>

                                    <span class="text-lg text-green-600 font-semibold">
                                        {{ $product->min_discounted_percentage }} %
                                    </span>

                                    <div>
                                        <a href="{{route('user.products.show',$product->slug)}}">
                                            <button
                                                class="w-auto px-9 py-3 bg-[#58af0838] text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:bg-[#4a910954]">
                                                VIEW MORE
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="swiper-pagination"></div>
                </div>
        </div>
    </div>
    </div>

    </div>
    </main>
    </div>
    </div>
</section>
<section class="w-full container lg:px-0 px-4 mx-auto lg:py-20 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:mb-0 mb-8">
        <!-- Adoption Section -->
        <div
            class="bg-gradient-to-r from-teal-500 via-[#58af0838] to-blue-500 rounded-xl shadow-lg lg:p-8 p-4 flex items-center  transition-transform duration-300">
            <div class="flex-1">
                <h2 class="lg:text-2xl text-base font-extrabold text-white mb-4">
                    Give Shoppers a Deal They Can’t Resist
                </h2>
                <p class="lg:text-base text-sm text-white lg:mb-6 mb-4">
                    Got something great to offer? Let’s team up and help more people discover your products!
                </p>
                <a href="{{ route('user.merchant') }}">
                    <button
                        class="bg-white text-gray-900 lg:text-base text-sm font-semibold rounded-full lg:px-6 px-4 lg:py-3 py-2 shadow-md hover:bg-white/80 transition-colors duration-200  hover:shadow-lg transition duration-300">
                        Let’s Partner Up
                    </button>
                </a>
            </div>
            <div class="flex-shrink-0">
                <img alt="Adopt a pet"
                    class="lg:w-40 lg:h-40 w-20 h-20 ml-6 object-cover rounded-full shadow-md border-4 border-white"
                    src="{{ asset('images/banner.png') }}" />
            </div>
        </div>

        <!-- Find Best Friend Section -->
        <div
            class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 rounded-xl shadow-lg lg:p-8 p-4 flex items-center  transition-transform duration-300">
            <div class="flex-1">
                <h2 class="lg:text-2xl text-base font-extrabold text-white mb-4">
                    Sign Up & Save More
                </h2>
                <p class="lg:text-base text-sm text-white lg:mb-6 mb-4">
                    Create your free account and get access to special discounts, new arrivals, and personalized
                    offers—only for members!
                </p>
                <a href="{{ route('user.signup') }}">
                    <button
                        class="bg-white text-pink-500 lg:text-base text-sm font-semibold rounded-full lg:px-6 px-4 lg:py-3 py-2 shadow-md hover:bg-white/80 hover:shadow-lg transition duration-300">
                        Register Now
                    </button>
                </a>
            </div>

            <div class="flex-shrink-0">
                <img alt="Find a friend"
                    class="lg:w-40 lg:h-40 w-20 h-20 ml-6 object-cover rounded-full shadow-md border-4 border-white"
                    src="{{ asset('images/banner.png') }}" />
            </div>
        </div>
    </div>
</section>
<section class="bg-[#58af0838] lg:pt-20 py-10 lg:px-4 from-cyan-50 to-blue">
    <div class="mb-8 container mb-10 mx-auto px-4 lg:px-0">
        <div class="flex justify-between items-center mb-4">
            <h2 class="lg:text-3xl text-base font-bold text-black">Deal of the Day – Trending in UAE</h2>
        </div>

        <div class="owl-carousel1 owl-carousel owl-theme">
            @foreach($trendingProducts as $product)
            @php
            $variants = $product->filtered_variants ?? collect([]);
            $minVariant = $variants->sortBy('unit_price')->first();
            @endphp
            @php
            $reviews = $product->reviews;
            $totalRatings = $reviews->sum('review_rating');
            $totalReviews = $reviews->count();
            $averageRating = $totalReviews > 0 ? $totalRatings / $totalReviews : 0;
            $averageRating = number_format($averageRating, 1);

            $originalPrice = number_format($minVariant->unit_price ?? 0);
            $discountedPrice = number_format($minVariant->discounted_price ?? 0);
            $variantId = $minVariant ? $minVariant->id : null;
            $discountedPercentage = $minVariant ? $minVariant->discounted_percentage : null;
            $timer = $minVariant ? $minVariant->timer_flag : null;
            $endTime =$minVariant ? $minVariant->end_time : null;
            $showTimer = false;

            if ($timer === 1 && $endTime) {
            $parsedEndTime = \Carbon\Carbon::parse($endTime);
            $now = \Carbon\Carbon::now();
            $showTimer = $parsedEndTime->gt($now);
            }

            @endphp
            <div class="item">
                <a href="{{ url('/products/' . $product->slug) }}">
                    <div class="rounded-lg hover:shadow-xl hover:border-[#58af0838] shadow-lg min-h-[480px] h-full hover:shadow-xl  border bg-white shadow-lg overflow-hidden transition-transform duration-300"
                        data-v0-t="card">
                        <!-- Product Image -->
                        <div class="relative">
                            <img alt="{{ $product->name }}" class="w-full h-48 object-cover"
                                src="{{ asset('storage/' . $product->image) }}">

                            <!-- Discount & Countdown -->
                            <div class="w-full flex items-center justify-between text-[#fe8500] text-2xl p-2 font-bold">
                                <div class="flex items-center mt-1">
                                    <img src="{{ asset('images/discount_7939803.png') }}" class="w-8" />
                                    <span class="ml-0.5 text-base text-black">{{ $discountedPercentage}}%</span>
                                </div>
                                @if ($showTimer)
                                <div class="flex items-center ml-auto py-0 rounded-md px-2 gap-x-1 text-[#000] font-semibold countdown-timer"
                                    data-endtime="{{ \Carbon\Carbon::parse($endTime)->toIso8601String() }}">
                                    <span class="text-sm flex mt-1 text-red-400">
                                        <img src="{{ asset('images/clock_4241462.png') }}"
                                            class="w-8 h-9 pr-1" /></span>
                                    <div class="flex items-center gap-x-1 text-center">
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="days-{{ $variantId }}">0</span>
                                        </div>
                                        <div class="text-red-500 text-base">:</div>
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="hours-{{ $variantId }}">00</span>
                                        </div>
                                        <div class="text-red-500 text-base">:</div>
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="minutes-{{ $variantId }}">00</span>
                                        </div>
                                        <div class="text-red-500 text-base">:</div>
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="seconds-{{ $variantId }}">00</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                            <h3 class="text-xl font-semibold leading-tight">{{ $product->name }}</h3>

                            <div class="flex items-center text-sm text-gray-500 gap-1">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $product->emirate->name ?? 'UAE' }}</span>
                            </div>

                            <div class="flex items-center gap-0">
                                @for ($i = 0; $i < 5; $i++) <i
                                    class="fas fa-star {{ $i < floor($averageRating) ? 'text-yellow-500' : 'text-gray-300' }}">
                                    </i>
                                    @endfor
                                    <span class="text-sm text-gray-500">{{$averageRating}} ({{$totalReviews}})</span>
                            </div>

                            <p class="text-gray-700 text-sm leading-relaxed">
                                {{ $product->short_description }}
                            </p>

                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <span class="text-3xl font-semibold text-gray-800" style="font-size: 1.375rem;">AED
                                        {{  $discountedPrice  }}</span>
                                    <span class="text-lg text-gray-400 line-through" style="font-size: 1.375rem;">AED
                                        {{  $originalPrice  }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>



@foreach($carouselCategories as $categoryName => $products)
<section class="bg-white lg:p-4  lg:py-20 py-10 ">
    <div class="container mx-auto lg:px-0 px-4">
        <h2 class="lg:text-3xl text-base font-bold text-black mb-3">What’s Hot in {{$categoryName}}</h2>
        <div class="owl-carousel1  owl-carousel owl-theme">
            @foreach($products as $product)
            @php
            $reviews = $product->reviews;
            $totalRatings = $reviews->sum('review_rating');
            $totalReviews = $reviews->count();
            $averageRating = $totalReviews > 0 ? $totalRatings / $totalReviews : 0;
            $averageRating = number_format($averageRating, 1);
            $variants = $product->filtered_variants ?? collect([]);

            $minVariant = $variants->isNotEmpty() ? $variants->sortBy('unit_price')->first() : null;
            $originalPrice = number_format($minVariant->unit_price ?? 0);
            $discountedPrice = number_format($minVariant->discounted_price ?? 0);

            $variantId = $minVariant ? $minVariant->id : null;
            $discountedPercentage = $minVariant ? $minVariant->discounted_percentage : null;
            $timer = $minVariant ? $minVariant->timer_flag : null;
            $endTime =$minVariant ? $minVariant->end_time : null;
            $showTimer = false;

            if ($timer === 1 && $endTime) {
            $parsedEndTime = \Carbon\Carbon::parse($endTime);
            $now = \Carbon\Carbon::now();
            $showTimer = $parsedEndTime->gt($now);
            }
            @endphp
            <div class="item">
                <a href="{{ url('/products/' . $product->slug) }}">
                    <div class="rounded-lg hover:shadow-xl hover:border-[#58af0838] shadow-lg min-h-[500px] h-full hover:shadow-xl  border bg-white shadow-lg overflow-hidden transition-transform duration-300 "
                        data-v0-t="card">
                        <!-- Image with Wave Shape -->

                        <div class="relative">
                            <img alt="{{ $product->name }}" class="w-full h-48 object-cover"
                                src="{{ asset('storage/' . $product->image) }}">



                            <!-- Discount Badge -->
                            <div class="w-full flex items-center justify-between text-[#fe8500] text-2xl p-2 font-bold">
                                <div class="flex items-center mt-1">
                                    <img src="{{ asset('images/discount_7939803.png') }}" class="w-8" />
                                    <span class="ml-0.5 text-base text-black">{{ $discountedPercentage}}%</span>
                                </div>
                                @if ($showTimer)
                                <div class="flex items-center ml-auto py-0 rounded-md px-2 gap-x-1 text-[#000] font-semibold countdown-timer"
                                    data-endtime="{{ \Carbon\Carbon::parse($endTime)->toIso8601String() }}">
                                    <span class="text-sm flex mt-1 text-red-400">
                                        <img src="{{ asset('images/clock_4241462.png') }}"
                                            class="w-8 h-9 pr-1" /></span>
                                    <div class="flex items-center gap-x-1 text-center">
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="days-{{ $variantId }}">0</span>
                                        </div>
                                        <div class="text-red-500 text-base">:</div>
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="hours-{{ $variantId }}">00</span>
                                        </div>
                                        <div class="text-red-500 text-base">:</div>
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="minutes-{{ $variantId }}">00</span>
                                        </div>
                                        <div class="text-red-500 text-base">:</div>
                                        <div class="flex flex-col items-center w-4">
                                            <span class="block text-sm font-semibold mt-1"
                                                id="seconds-{{ $variantId }}">00</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="px-4 pb-4 space-y-2 mt-1 relative z-50">
                            <h3 class="text-xl font-semibold leading-tight">
                                {{ $product->name }}
                            </h3>

                            <div class="flex items-center text-sm text-gray-500 gap-1">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{$product->emirate->name}}</span>
                            </div>
                            <div class="flex items-center gap-0">
                                @for ($i = 0; $i < 5; $i++) <i
                                    class="fas fa-star {{ $i < floor($averageRating) ? 'text-yellow-500' : 'text-gray-300' }}">
                                    </i>
                                    @endfor
                                    <span class="text-sm text-gray-500">{{$averageRating}}
                                        ({{$totalReviews}})</span>
                            </div>
                            <p class="text-gray-700 line-clamp-3 text-sm leading-relaxed">{{$product->short_description}}
                            </p>

                            <div class="flex justify-between items-center">
                                <!-- Price Section -->
                                <div class="flex items-center space-x-4">
                                    <span class="text-3xl font-semibold text-gray-800" style="font-size: 1.375rem;">AED
                                        {{$discountedPrice}}</span>
                                    <span class="text-lg text-gray-400 line-through" style="font-size: 1.375rem;">AED
                                        {{$originalPrice}}</span>
                                </div>

                            </div>

                            <!-- Coupon Code Section -->

                        </div>

                    </div>

                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach


<section class="bg-[#58af0838] text-black  lg:px-0  lg:py-20 py-10 px-4 lg:px-0">
    <div class="container mx-auto">
        <div class=" flex flex-col lg:px-0 px-6 md:flex-row items-center  justify-between">
            <div class="flex items-center lg:gap-8 gap-4">
                <img src="{{ asset('images/help.jpg') }}" alt="Support illustration"
                    class="lg:w-48 w-10 rounded-full shadow-md">
                <div>
                    <div class="flex items-center gap-2 text-sm mb-2">
                        <i class="fas fa-arrow-left"></i>
                        <span class="font-semibold">CONTACT US</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <h1 class="text-xl md:text-2xl font-extrabold leading-tight">Expert Travel Assistance – Available
                        During Business Hours</h1>
                </div>
            </div>
            <a href="#"
                class="mt-6 md:mt-0 bg-white text-black lg:px-6 lg:py-3 px-4 py-2 rounded-full lg:text-base text-sm hover:bg-[#4a910954] transition-colors transform shadow-md"
                id="openModalButton">
                TALK TO A SPECIALIST <i class="fas fa-arrow-right ml-2"></i>
            </a>

        </div>
    </div>
</section>


<section id="newsletterSection" class="bg-white container mx-auto lg:px-0 px-4 lg:py-20 py-10">
    <form method="POST" action="{{ route('subscribe') }}"
        class="flex flex-col md:flex-row items-center justify-between gap-8">
        @csrf
        <!-- input fields -->

        <h2 class="text-3xl text-black lg:text-3xl text-base font-bold text-black font-extrabold">
            Get the Latest Deals and Updates Delivered to Your Inbox!
        </h2>
        <div class="lg:flex w-full md:w-auto gap-4">
            <input name="email" type="email" placeholder="Enter Email"
                class="flex-1 lg:w-80 px-6 py-4 rounded-full border-2 lg:w-auto w-full lg:mb-0 mb-5 focus:outline-none focus:ring-2 focus:ring-cyan-700 bg-white text-black placeholder-gray-500 shadow-md"
                required>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <button type="submit"
                class="w-full lg:w-auto px-9 py-3 bg-[#58af0838] text-black font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                Subscribe Now <i class="fas fa-paper-plane ml-2"></i>
            </button>
        </div>
    </form>
</section>


<style>
[x-cloak] {
    display: none !important;
}
</style>
<!-- Modal Structure -->
<div id="modal" x-data="{
    show: false,
    successMessageShown: {{ session('modal_success') ? 'true' : 'false' }},
  }" x-init="
    if (successMessageShown) {
      show = true;
      setTimeout(() => {
        show = false;
      }, 3000);
    }
  " x-cloak :class="show ? 'flex' : 'hidden'"
    class="fixed inset-0 bg-gray-500 bg-opacity-50 z-50 items-center justify-center transition-opacity duration-300 ease-in-out">
    <div
        class="bg-[#daedc9]  p-8 rounded-xl shadow-2xl w-full max-w-md mx-auto transform transition-all scale-95 relative">
        <!-- Close Button in Top-Right Corner -->
        <button id="closeModalButton" class="absolute top-3 right-3 text-gray-800 text-xl font-bold focus:outline-none"
            @click="show = false">
            &times;
        </button>

        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Talk to a Specialist</h2>

        @if(session('modal_success'))
        <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-300 text-center">
            {{ session('modal_success') }}
        </div>
        @endif

        <form id="modalForm" class="" action="{{ route('specialist.submit') }}" method="POST">
            @csrf
            <!-- Name Field -->
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-800">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
                    placeholder="Enter your name" required>
            </div>

            <!-- Email Field -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
                    placeholder="Enter your email" required>
            </div>

            <!-- Phone Number Field -->
            <div class="mb-5">
                <label for="number" class="block text-sm font-medium text-gray-800">Phone Number</label>
                <div class="flex items-center space-x-3">


                    <select id="countryCode" name="countryCode"
                        class="p-3 border border-transparent rounded-lg bg-white focus:ring-2 focus:ring-blue-400 transition-all">
                        @foreach($countryCodes as $country)
                        <option value="{{ $country->id }}"
                            {{ old('country_code_id', isset($user) ? $user->country_code_id : '') == $country->id ? 'selected' : '' }}>
                            {{ $country->country_code }}
                        </option>
                        @endforeach

                        <!-- Add more country codes as needed -->
                    </select>
                    <input type="tel" id="phone" name="phone"
                        class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
                        placeholder="Enter phone number" required>
                </div>
            </div>

            <!-- Message Field -->
            <div class="mb-5">
                <label for="message" class="block text-sm font-medium text-gray-800">Message</label>
                <textarea id="message" name="message"
                    class="mt-2 p-3 border border-transparent rounded-lg w-full bg-white focus:ring-2 focus:ring-blue-400 transition-all"
                    rows="4" placeholder="Your message" required></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between mt-6">
                <button type="submit"
                    class="from-cyan-300 to-blue-300 bg-gradient-to-r w-full text-gray-800 px-6 py-3 rounded-md hover:bg-blue-700 transition-all transform duration-200">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
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
            body: ["Poppins", "sans-serif"],
            /* Set Poppins as the body font */
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
const menuToggle = document.getElementById('menuToggle');
const menuContent = document.getElementById('menuContent');

menuToggle.addEventListener('click', () => {
    menuContent.classList.toggle('hidden');
});

$(window).on('load', function () {
$("#cover").fadeOut(750);
});
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
// Initialize Swiper
var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: 'bullets',
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// IntersectionObserver to trigger animations when sections are in view
const observerOptions = {
    root: null, // Observing within the viewport
    rootMargin: "0px",
    threshold: 0.5, // Trigger when 50% of the element is in view
};

const sections = document.querySelectorAll('#left-section, #right-section');

const animateSectionInView = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.id === 'left-section') {
                entry.target.classList.add('animate-slideInTop'); // Trigger top animation for left section
            } else if (entry.target.id === 'right-section') {
                entry.target.classList.add(
                'animate-slideInBottom'); // Trigger bottom animation for right section
            }
            observer.unobserve(entry.target);
        }
    });
};

const observer = new IntersectionObserver(animateSectionInView, observerOptions);

sections.forEach(section => {
    observer.observe(section);
});
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
function initCountdownTimers() {
    const timers = document.querySelectorAll('.countdown-timer:not(.cloned)');

    timers.forEach(timer => {
        const endTimeStr = timer.dataset.endtime;
        const endTime = new Date(endTimeStr);

        const daysEl = timer.querySelector('[id^="days-"]');
        const hoursEl = timer.querySelector('[id^="hours-"]');
        const minutesEl = timer.querySelector('[id^="minutes-"]');
        const secondsEl = timer.querySelector('[id^="seconds-"]');

        function update() {
            const now = new Date();
            const diff = endTime - now;

            if (diff <= 0) {
                daysEl.textContent = '00';
                hoursEl.textContent = '00';
                minutesEl.textContent = '00';
                secondsEl.textContent = '00';
                return;
            }

            const days = String(Math.floor(diff / (1000 * 60 * 60 * 24))).padStart(2, '0');
            const hours = String(Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2,
            '0');
            const minutes = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
            const seconds = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');

            daysEl.textContent = days;
            hoursEl.textContent = hours;
            minutesEl.textContent = minutes;
            secondsEl.textContent = seconds;
        }

        update();
        setInterval(update, 1000);

        timer.classList.add('cloned');
    });
}

$(document).ready(function() {
    $(".owl-carousel, .owl-carousel1").owlCarousel({
        items: 1,
        loop: false,
        margin: 16,
        nav: true,
        autoHeight: false, // Disable dynamic height
        dots: true,
        autoplay: false,
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
        },
        onInitialized: function() {
            initCountdownTimers(); // run once after carousel is loaded
        },
        onChanged: function() {
            setTimeout(initCountdownTimers,
            50); // run after slide change (use timeout to allow DOM to update)
        }
    });

    // Also run on page load
    initCountdownTimers();
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
document.addEventListener("DOMContentLoaded", () => {
    const dropdown = document.getElementById("dropdown");

    if (!dropdown) return; // Prevent error if dropdown not found

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
});
</script>

<script>
// Get modal and button elements
const openModalButton = document.getElementById('openModalButton');
const modal = document.getElementById('modal');
const closeModalButton = document.getElementById('closeModalButton');

// Open the modal when the button is clicked
openModalButton.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent default link behavior
    modal.classList.remove('hidden'); // Show the modal
});

// Close the modal when the close button is clicked
closeModalButton.addEventListener('click', () => {
    modal.classList.add('hidden'); // Hide the modal
});

// Optional: Close the modal if user clicks outside the modal content
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.add('hidden');
    }
});
</script>
@if($errors->any())
<script>
document.addEventListener("DOMContentLoaded", () => {
    const section = document.getElementById("newsletterSection");

    if (section) {
        const emailInput = section.querySelector('input[name="email"]');
        if (emailInput) {
            emailInput.focus();
        }
    }
});


</script>
@endif

@endpush