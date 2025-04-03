@extends('User.layouts.main')
@section('content')
  <div x-data="products()" x-init="fetchProducts()" class="container mx-auto   lg:pt-20 py-2 lg:px-0 px-4">
    <!-- Sidebar -->
    <div x-data="{ showFilter: false }" class="my-8  md:flex-row md:items-center justify-between gap-8">
      <!-- Deals Count -->
     <div class="flex justify-between items-center">
      <div class="flex gap-x-3 items-center">
        <button @click="showFilter = !showFilter"
        class="w-auto px-9 py-3 bg-[#58af0838]  text-black font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex gap-x-2 items-center">
        <i :class="showFilter ? 'fas fa-times' : 'fas fa-filter'"></i>
        <span class="md:block hidden" x-text="showFilter ? 'Hide Filter' : 'Show Filter'"></span>
      </button>

      <span class="md:text-xl text-sm font-bold text-gray-800 tracking-wide" x-text="products.length + ' Deals Found'">
        <!-- Replace `filteredDeals` with actual deals count dynamically -->
      </span>
      </div>
      <div x-data="{ showFilters: false }" class="my-0 flex flex-col md:flex-row md:items-center justify-between gap-8">
        <!-- Deals Count -->
      
        <!-- Dropdown Container -->
        <div class="relative lg:w-64 w-full ml-auto">
          <!-- Dropdown Toggle Button -->
          <button
            @click="showFilters = !showFilters"
            class="w-full border border-gray-300 rounded-lg bg-white px-2 md:pl-12 md:pr-8 py-3 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 flex items-center justify-between"
          >
            <span class="flex items-center gap-2">
              <i class="fas" :class="showFilters ? 'fa-times text-red-500' : 'fa-filter text-blue-500'"></i>
              Filter
            </span>
            <i class="fas fa-chevron-down text-gray-400"></i>
          </button>
      
          <!-- Dropdown Options -->
          <ul
            x-show="showFilters"
            x-cloak
            class="absolute left-0 top-10 mt-2 w-full bg-white border border-gray-200 rounded-lg shadow-lg z-10"
          >
            <li
              class="px-4 py-2 flex items-center gap-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-thumbs-up text-blue-500"></i>
              Recommended
            </li>
            <li
              class="px-4 py-2 flex items-center gap-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-arrow-down text-green-500"></i>
              Price: Low to High
            </li>
            <li
              class="px-4 py-2 flex items-center gap-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-arrow-up text-red-500"></i>
              Price: High to Low
            </li>
            <li
              class="px-4 py-2 flex items-center gap-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-star text-yellow-500"></i>
              Rating
            </li>
          </ul>
        </div>
      </div>
      
     </div>


      <div class="mt-4 p-0  md:flex gap-x-4   w-full">

        <div x-show="showFilter" class="md:w-1/4" x-cloak>

          <div x-data="{ 
              openSections: ['category', 'location', 'giftable', 'rating', 'price', 'discounts'],
              toggleSection(section) {
                  if (this.openSections.includes(section)) {
                      this.openSections = this.openSections.filter(s => s !== section);
                  } else {
                      this.openSections.push(section);
                  }
              },
              isOpen(section) {
                  return this.openSections.includes(section);
              },
              minPrice: 0,  // Added min price value
              maxPrice: 500, // Added max price value
              formatPrice(price) {
                  return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(price);
              }
            }" class="lg:w-full bg-white p-3 rounded-lg shadow-md space-y-2">
            <h2 class="text-2xl font-bold text-gray-800">Filters</h2>
            <div class="border-b pb-2">
              <button @click="toggleSection('category')" class="flex justify-between items-center w-full text-gray-700">
                  <span class="font-medium">Category</span>
                  <i :class="isOpen('category') ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
              </button>
              
              <div x-show="isOpen('category')" class="mt-2 space-y-2">
                  <template x-for="category in categories" :key="category.id">
                      <div class="flex items-center">
                          <input type="checkbox" :id="'category' + category.id" :value="category.name"
                              x-model="selectedCategories"  
                              class="form-checkbox rounded text-blue-500">
                          <label :for="'category' + category.id" class="ml-2 text-sm text-gray-600" x-text="category.name"></label>
                      </div>
                  </template>
              </div>
          </div>
      
          <!-- Subcategory Filter -->
          <div x-show="availableSubcategories.length > 0" class="border-b pb-2 mt-4">
              <span class="font-medium text-gray-700">Subcategories</span>
              <div class="mt-2 space-y-2">
                  <template x-for="sub in availableSubcategories" :key="sub.id">
                      <div class="flex items-center">
                          <input type="checkbox" :id="'subcategory' + sub.id" :value="sub.name"
                              x-model="selectedSubcategories" class="form-checkbox rounded text-green-500">
                          <label :for="'subcategory' + sub.id" class="ml-2 text-sm text-gray-500" x-text="sub.name"></label>
                      </div>
                  </template>
              </div>
          </div>

            <!-- Location Filter -->
            <div class="border-b pb-2">
              <button @click="toggleSection('location')" class="flex justify-between items-center w-full text-gray-700">
                <span class="font-medium">Location</span>
                <i :class="isOpen('location') ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
              </button>
              <div x-show="isOpen('location')" class="mt-2">
                <input type="text" placeholder="Search locations"
                  class="w-full border rounded-md p-2 text-sm text-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <div class="mt-2 space-y-2 max-h-32 overflow-y-auto">
                  <div class="flex items-center">
                    <input type="checkbox" id="location1" value="Location 1"
                      class="form-checkbox rounded text-blue-500">
                    <label for="location1" class="ml-2 text-sm text-gray-600">Location 1</label>
                  </div>
                  <div class="flex items-center">
                    <input type="checkbox" id="location2" value="Location 2"
                      class="form-checkbox rounded text-blue-500">
                    <label for="location2" class="ml-2 text-sm text-gray-600">Location 2</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Giftable Deals -->
            
            <div class="border-b pb-4">
              <button @click="toggleSection('giftable')"
                  class="flex justify-between items-center w-full text-gray-800 hover:text-blue-600 transition-all duration-300 ease-in-out">
                  <span class="font-medium">Giftable Deals <i class="fas fa-gift text-gray-600 text-base"></i></span>
                  <i :class="isOpen('giftable') ? 'fa-chevron-up' : 'fa-chevron-down'"
                      class="fas text-xs text-gray-600 transition-all"></i>
              </button>
              <div x-show="isOpen('giftable')"    x-init="$watch('showGiftable', value => console.log(filteredProducts))"  class="mt-4 transition-all duration-300 ease-in-out">
                  <label for="giftable" class="flex items-center space-x-3 cursor-pointer">
                      <div class="relative">
                          <input type="checkbox" id="giftable" name="giftable" class="sr-only peer" x-model="showGiftable" />
                          <div class="block w-10 h-5 bg-gray-300 rounded-full peer-checked:bg-blue-600 transition-all"></div>
                          <div class="dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition-all peer-checked:translate-x-4"></div>
                      </div>
                      <span class="text-sm text-gray-700">Enable Giftable Deals</span>
                  </label>
              </div>
          </div>
          



            <!-- Rating -->
            <div class="border-b pb-2">
              <button @click="toggleSection('rating')" class="flex justify-between items-center w-full text-gray-700">
                <span class="font-medium">Rating</span>
                <i :class="isOpen('rating') ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
              </button>
              <div x-show="isOpen('rating')" class="mt-2 space-y-2">
                <div class="flex items-center">
                  <input type="radio" id="rating4" name="rating" value="4+" class="form-radio text-blue-500">
                  <label for="rating4" class="ml-2 text-sm text-gray-600 flex items-center">
                    <span class="flex text-yellow-400">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star text-gray-300"></i>
                    </span>
                    <span class="ml-1">& Up (297)</span>
                  </label>
                </div>
                <div class="flex items-center">
                  <input type="radio" id="rating3" name="rating" value="3+" class="form-radio text-blue-500">
                  <label for="rating3" class="ml-2 text-sm text-gray-600 flex items-center">
                    <span class="flex text-yellow-400">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star text-gray-300"></i>
                      <i class="far fa-star text-gray-300"></i>
                    </span>
                    <span class="ml-1">& Up (350)</span>
                  </label>
                </div>
              </div>
            </div>

            <!-- Price -->
            <div class="border-b pb-4">
              <button @click="toggleSection('price')"
                class="flex justify-between items-center w-full text-gray-700 transition-all duration-300 ease-in-out">
                <span class="font-semibold ">Price</span>
                <i :class="isOpen('price') ? 'fa-chevron-up' : 'fa-chevron-down'"
                  class="fas text-xs text-gray-600 transition-all"></i>
              </button>
              <div x-show="isOpen('price')" class="mt-4 transition-all duration-300 ease-in-out">
                <!-- Min Price Slider -->
            
                <input type="range" min="0" max="500" x-model="minPrice"
                  class="w-full accent-blue-500 rounded-lg h-2 hover:accent-blue-600 focus:outline-none">
                <p class="text-base font-semibold text-gray-800 mt-2">Min: <span x-text="formatPrice(minPrice)" class="font-semibold text-blue-600"></span></p>
        
                <!-- Max Price Slider -->
           
                <input type="range" min="0" max="500" x-model="maxPrice"
                  class="w-full accent-blue-500 rounded-lg h-2 hover:accent-blue-600 focus:outline-none">
                <p class="text-base font-semibold text-gray-800 mt-2">Max: <span x-text="formatPrice(maxPrice)" class="font-semibold text-blue-600"></span></p>
              </div>
            </div>


            <!-- Discounts -->
            <div class="border-b pb-2">
              <button @click="toggleSection('discounts')"
                class="flex justify-between items-center w-full text-gray-700">
                <span class="font-medium">Discounts</span>
                <i :class="isOpen('discounts') ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs"></i>
              </button>
              <div x-show="isOpen('discounts')" class="mt-2 space-y-2">
                <div class="flex items-center">
                  <input type="radio" id="discount50" name="discount" value="50%" class="form-radio text-blue-500">
                  <label for="discount50" class="ml-2 text-sm text-gray-600">All</label>
                </div>
                <div class="flex items-center">
                  <input type="radio" id="discount25" name="discount" value="25%" class="form-radio text-blue-500">
                  <label for="discount25" class="ml-2 text-sm text-gray-600">25% or more</label>
                </div>
                <div class="flex items-center">
                  <input type="radio" id="discount50" name="discount" value="50%" class="form-radio text-blue-500">
                  <label for="discount50" class="ml-2 text-sm text-gray-600">50% or more</label>
                </div>
                <div class="flex items-center">
                  <input type="radio" id="discount25" name="discount" value="25%" class="form-radio text-blue-500">
                  <label for="discount25" class="ml-2 text-sm text-gray-600">25% or more</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div :class="showFilter ? 'lg:grid gap-6 md:grid-cols-2 lg:grid-cols-3 w-full' : 'grid gap-6 md:grid-cols-2 lg:grid-cols-4 w-full'" class="transition-all duration-300">
          <template x-for="product in filteredProducts" :key="product.id">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <div class="relative">
                <img :src="product.image" :alt="product.title" class="w-full h-48 object-cover">

                <div class="absolute top-2 left-2 flex gap-1">
                   <span x-text="product.tags.tag_name" class="bg-blue-500 text-white font-semibold text-xs px-2 py-1 rounded"></span>
                </div>
              </div>
              <div class="p-4">
                <h3 x-text="product.title" class="font-semibold text-lg mb-2"></h3>
              <div class="flex gap-x-1">
                <i class="fas fa-map-marker-alt"></i>
                <p x-text="product.location" class="text-sm text-gray-600 mb-2"></p>
              </div>
                <div class="flex items-center mb-2">
                  <span class="text-sm mr-1">★</span>
                  <span class="text-sm mr-1">★</span>
                  <span class="text-sm mr-1">★</span>
                  <span class="text-sm mr-1">★</span>
                  <span class="text-sm mr-1">★</span>

                  <span x-text="product.rating.toFixed(1)" class="text-sm mr-1"></span>
                  
                  <span x-text="'(' + product.reviews.toLocaleString() + ')'" class="text-sm text-gray-600 mr-2"></span>
                 
                   
                  <span x-text="product.distance + ' mi'" class="text-sm text-gray-600"></span>
                </div>
               <p class="text-gray-700 text-sm mb-2 leading-relaxed" x-text="product.description"></p>
                <div class="flex items-center justify-between">
                  <div>
                    <span x-text="'$' + product.discountedPrice.toFixed(2)" class="text-xl font-bold"></span>
                    <span x-text="'$' + product.originalPrice" class="text-sm text-gray-500 line-through ml-1"></span>
                    <p x-show="product.code" x-text="'with code ' + product.code" class="text-xs text-gray-600"></p>
                  </div>
                  <span x-text="'-' + product.discount + '%'"
                    class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded"></span>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>

      <div class="flex flex-col md:flex-row gap-8">

        <style>
          input:checked~.dot {
            transform: translateX(100%);
            background-color: #3b82f6;
          }
        </style>

        <!-- Main Content -->

      </div>
      <!-- Filter Section -->

    </div>


  </div>
  @endsection
  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script>
  function products() {
    return {
        products: [],
        categories: [],
        selectedCategories: [],
        selectedSubcategories: [],
        favorites: [],
        sortBy: 'recommended',
        openSections: '',
        showGiftable: false, 
        async fetchProducts() {
            try {
                let response = await fetch('/user/products/list'); // Replace with your actual API endpoint
                let data = await response.json();
                this.products = data.products.map(product => {
                 const firstVariant = product.variants?.[0] ?? {};
                  console.log(product.tags);
            return {
              id: product.id,
              title: product.name ?? 'No title',
              short_description: product.short_description ?? 'No description',
              image: product.image_url ?? 'default-image.jpg',
              location: product.location ?? 'Unknown',
              rating: Number(product.rating ?? 4.5),
              reviews: Number(product.reviews ?? 0),
              priceRange: {
                min: parseFloat(product.price_range?.min ?? 0).toFixed(2),
                max: parseFloat(product.price_range?.max ?? 0).toFixed(2),
              },
              discountedPriceRange: {
                min: parseFloat(product.discounted_price_range?.min ?? 0).toFixed(2),
                max: parseFloat(product.discounted_price_range?.max ?? 0).toFixed(2),
              },
              originalPrice: parseFloat(firstVariant.unit_price ?? 0),
              discountedPrice: parseFloat(firstVariant.discounted_price ?? 0),
              discount: parseFloat(firstVariant.discount ?? 0),
              code: product.code ?? '',
              tags: product.tags ?? [],
            };
          });
         

        this.categories = data.categories.map(category => ({
            id: category.id,
            name: category.name,
            subCategories: category.subcategories || [],  // Ensure subCategories exist
        }));

        this.tags = data.tags
        .filter(tag => tag.giftable_deals === 1) // Filter only giftable tags
        .map(tag => ({
            id: tag.id,
            name: tag.tag_name,
        }));

        console.log("All Products:", this.products);
        console.log("Filtered Giftable Products:", this.products.filter(product => product.tags?.giftable_deals === 1));// Debugging
            } catch (error) {
                console.error("Error fetching products:", error);
            }
        },
        get availableSubcategories() {
            const subcategories = this.categories
                .filter(category => this.selectedCategories.includes(category.name))
                .flatMap(category => category.subCategories);    

            console.log("Filtered Subcategories:", subcategories); // Debugging
            return subcategories;
        },
        get filteredProducts() {
            return this.products.filter(product => {
                const categoryMatch = this.selectedCategories.length === 0 ||
                    product.categories?.some(cat => this.selectedCategories.includes(cat.name));

                const subCategoryMatch = this.selectedSubcategories.length === 0 ||
                    product.subCategories?.some(sub => this.selectedSubcategories.includes(sub.name));

                // Ensure product.tags is an object (not an array)
                const giftableMatch = this.showGiftable 
                    ? product.tags && product.tags.giftable_deals === 1  // Directly check the single tag
                    : true;

                return categoryMatch && subCategoryMatch && giftableMatch;
            });
        },




        get sortedproducts() {
            return [...this.products].sort((a, b) => {
                switch (this.sortBy) {
                    case 'price_low_high':
                        return a.discountedPrice - b.discountedPrice;
                    case 'price_high_low':
                        return b.discountedPrice - a.discountedPrice;
                    case 'rating':
                        return b.rating - a.rating;
                    default:
                        return 0; // 'recommended' - no sorting
                }
            });
        },

        toggleFavorite(id) {
          const index = this.favorites.indexOf(id);
          if (index === -1) {
            this.favorites.push(id);
          } else {
            this.favorites.splice(index, 1);
          }
        },
        toggleFavorite(id) {
            const index = this.favorites.indexOf(id);
            if (index === -1) {
                this.favorites.push(id);
            } else {
                this.favorites.splice(index, 1);
            }
        },

        toggleSection(section) {
            this.openSections = this.openSections === section ? '' : section;
        },

        isOpen(section) {
            return this.openSections === section;
        },
        init() {
        this.fetchProducts();
        }
    }
}
</script>
  @endpush