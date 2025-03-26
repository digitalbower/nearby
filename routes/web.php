<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\Auth\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\Product\CompanyTermController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\VendorController;
use App\Http\Controllers\Admin\Product\VendorTermController;
use App\Http\Controllers\Admin\NavigationMenuController;
use App\Http\Controllers\Admin\Product\ProductVariantController;

use App\Http\Controllers\Admin\LocationScopeController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeroCarouselController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuickCardController;
use App\Http\Controllers\Admin\TrendingProductController;
use App\Http\Controllers\Admin\PopularProductController;
use App\Http\Controllers\Admin\SupportSectionController;
use App\Http\Controllers\Admin\UnitTypeController;
use App\Http\Controllers\Admin\CategoryUnitMasterController;
use App\Http\Controllers\User\ProductController as UserProductController;



// ✅ User Routes

// ✅ Google Authentication Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::prefix('user')->group(function () {

    // ✅ Guest Routes (Only for Unauthenticated Users)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/login', [AuthController::class, 'loginsubmit'])->name('login.submit');
    });

    // ✅ Authenticated Routes (Only for Logged-in Users)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // ✅ Home & Product Routes
        
        Route::get('/products', [UserProductController::class, 'index'])->name('user.products.index');
        Route::get('/products/{id}', [UserProductController::class, 'show'])->name('user.products.show');

        // ✅ E-commerce & Booking Routes
        Route::get('/bookingconfirmation', [HomeController::class, 'bookingconfirmation'])->name('home.bookingconfirmation');
        Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');

        // ✅ Profile Management Routes
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
        Route::post('/profile/upload-picture', [ProfileController::class, 'uploadPicture'])->name('profile.upload-picture');
    });
});



    

 
    
// ✅ Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Authentication
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'adminLogin'])->name('login');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Admin Panel Routes (Requires Admin Middleware)
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create'); 
            Route::post('/', [ProductController::class, 'store'])->name('store'); 
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit'); 
            Route::put('/{product}', [ProductController::class, 'update'])->name('update'); 
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy'); 
            Route::post('/change-status', [ProductController::class, 'changeProductStatus'])->name('status');
            Route::get('/subcategories', [ProductController::class, 'getSubcategories'])->name('subcategories');
            Route::get('/company-terms', [CompanyTermController::class, 'index'])->name('company_terms.index');
            Route::get('/company-terms/{term}/edit', [CompanyTermController::class, 'edit'])->name('company_terms.edit');
            Route::put('/company-terms/{term}', [CompanyTermController::class, 'update'])->name('company_terms.update');
            Route::resource('vendors', VendorController::class);
            Route::post('/vendors/change-status', [VendorController::class, 'changeVendorStatus'])->name('vendors.status');
            Route::resource('vendor_terms', VendorTermController::class);
            Route::resource('product_variants', ProductVariantController::class);
            Route::post('/product_variants/change-status', [ProductVariantController::class, 'changeVariantStatus'])->name('product_variants.status');
            Route::get('/unit-types', [ProductVariantController::class, 'getCategoryUnitTypes'])->name('unit_types');
        });
        Route::prefix('logos')->name('logos.')->group(function () {
            Route::get('/', [LogoController::class, 'index'])->name('index'); 
            Route::get('/{id}/edit', [LogoController::class, 'edit'])->name('edit'); 
            Route::post('/update', [LogoController::class, 'update'])->name('update'); 
        });

        // Navigation Menu Management Routes
        Route::prefix('navigation')->name('navigation.')->group(function () {
            Route::get('/', [NavigationMenuController::class, 'index'])->name('index');
            Route::get('/create', [NavigationMenuController::class, 'create'])->name('create');
            Route::post('/', [NavigationMenuController::class, 'store'])->name('store');
            Route::get('/{navigationMenu}/edit', [NavigationMenuController::class, 'edit'])->name('edit');
            Route::put('/{navigationMenu}', [NavigationMenuController::class, 'update'])->name('update');
            Route::delete('/{navigationMenu}', [NavigationMenuController::class, 'destroy'])->name('destroy');

        });

        Route::prefix('locations')->name('locations.')->group(function () {
            Route::get('/', [LocationScopeController::class, 'index'])->name('index');
            Route::get('/create', [LocationScopeController::class, 'create'])->name('create');
            Route::post('/', [LocationScopeController::class, 'store'])->name('store');
            Route::get('/{location}/edit', [LocationScopeController::class, 'edit'])->name('edit');
            Route::put('/{location}', [LocationScopeController::class, 'update'])->name('update');
            Route::delete('/{location}', [LocationScopeController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('footer')->name('footer.')->group(function () {
            Route::get('/', [FooterController::class, 'index'])->name('manage');

            Route::post('/navigation', [FooterController::class, 'updateNavigation'])->name('navigation.update');
            Route::post('/social', [FooterController::class, 'updateSocial'])->name('social.update');
            Route::post('/contact', [FooterController::class, 'updateContact'])->name('contact.update');
            Route::post('/newsletter', [FooterController::class, 'updateNewsletter'])->name('newsletter.update');
            Route::post('/legal', [FooterController::class, 'updateLegal'])->name('legal.update');
            Route::post('/quick', [FooterController::class, 'updateQuick'])->name('quick.update');
            Route::post('/payment', [FooterController::class, 'updatePayment'])->name('payment.update');

        });

        Route::prefix('hero-carousel')->name('hero-carousel.')->group(function () {
            Route::get('/', [HeroCarouselController::class, 'index'])->name('index');
            Route::get('/create', [HeroCarouselController::class, 'create'])->name('create');
            Route::post('/store', [HeroCarouselController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [HeroCarouselController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [HeroCarouselController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [HeroCarouselController::class, 'destroy'])->name('destroy');
        });


        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
            
        });

       

        Route::prefix('subcategories')->name('subcategories.')->group(function () {
            Route::get('/', [SubcategoryController::class, 'index'])->name('index');
            Route::get('/create', [SubcategoryController::class, 'create'])->name('create');
            Route::post('/', [SubcategoryController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [SubcategoryController::class, 'edit'])->name('edit');
            Route::put('/{id}', [SubcategoryController::class, 'update'])->name('update');
            Route::delete('/{id}', [SubcategoryController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('quick')->name('quick.')->group(function () {
            Route::get('/', [QuickCardController::class, 'index'])->name('index');
            Route::get('/create', [QuickCardController::class, 'create'])->name('create');
            Route::post('/', [QuickCardController::class, 'store'])->name('store');
            Route::get('/{quickCard}/edit', [QuickCardController::class, 'edit'])->name('edit');
            Route::put('/{quickCard}', [QuickCardController::class, 'update'])->name('update');
            Route::delete('/{quickCard}', [QuickCardController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('trending')->name('trending.')->group(function () {
            Route::get('/', [TrendingProductController::class, 'index'])->name('index');
            Route::get('/create', [TrendingProductController::class, 'create'])->name('create');
            Route::post('/', [TrendingProductController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [TrendingProductController::class, 'edit'])->name('edit');
            Route::put('/{id}', [TrendingProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [TrendingProductController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('popular')->name('popular.')->group(function () {
            Route::get('/', [PopularProductController::class, 'index'])->name('index');
            Route::get('/create', [PopularProductController::class, 'create'])->name('create');
            Route::post('/', [PopularProductController::class, 'store'])->name('store');
            Route::get('/edit', [PopularProductController::class, 'edit'])->name('edit');
            Route::put('/update', [PopularProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [PopularProductController::class, 'destroy'])->name('destroy');
        });


        Route::prefix('support')->name('support.')->group(function () {
            Route::get('/', [SupportSectionController::class, 'index'])->name('index');
            Route::get('/create', [SupportSectionController::class, 'create'])->name('create');
            Route::post('/', [SupportSectionController::class, 'store'])->name('store');
            Route::get('/edit', [SupportSectionController::class, 'edit'])->name('edit');
            Route::put('/update', [SupportSectionController::class, 'update'])->name('update');
            Route::delete('/{id}', [SupportSectionController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('unit_types')->name('unit_types.')->group(function () {
        Route::get('/', [UnitTypeController::class, 'index'])->name('index'); 
        Route::get('/create', [UnitTypeController::class, 'create'])->name('create'); 
        Route::post('/', [UnitTypeController::class, 'store'])->name('store'); 
        Route::get('/{unitType}/edit', [UnitTypeController::class, 'edit'])->name('edit'); 
        Route::put('/{unitType}', [UnitTypeController::class, 'update'])->name('update'); 
        Route::delete('/{unitType}', [UnitTypeController::class, 'destroy'])->name('destroy'); 
        
       });
 
       Route::prefix('category_unit')->name('category_unit.')->group(function () {
        Route::get('/', [CategoryUnitMasterController::class, 'index'])->name('index'); 
        Route::get('/create', [CategoryUnitMasterController::class, 'create'])->name('create'); 
        Route::post('/', [CategoryUnitMasterController::class, 'store'])->name('store'); 
        Route::get('/{categoryUnitMaster}/edit', [CategoryUnitMasterController::class, 'edit'])->name('edit'); 
        Route::put('/{categoryUnitMaster}', [CategoryUnitMasterController::class, 'update'])->name('update'); 
        Route::delete('/{categoryUnitMaster}', [CategoryUnitMasterController::class, 'destroy'])->name('destroy'); 
    });

    });
});


