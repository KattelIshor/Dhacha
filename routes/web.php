<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Auth\AdminLogoutController;
use App\Http\Controllers\Backend\Auth\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\NewslaterController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PostCategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReturnRequestController;
use App\Http\Controllers\Backend\RolePermissionController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\Auth\ChangePasswordController;
use App\Http\Controllers\Frontend\Auth\Password\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\UserAuthController;
use App\Http\Controllers\Frontend\Auth\UserLogoutController;
use App\Http\Controllers\Frontend\Auth\UserProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontNewslaterController;
use App\Http\Controllers\Frontend\FrontPostController;
use App\Http\Controllers\Frontend\FrontProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\WishlistController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Routes

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'proccessLogin']);
    Route::post('/logout', [AdminLogoutController::class, 'proccessLogout'])->name('admin.logout');
    Route::get('/change/password', [AdminProfileController::class, 'index'])->name('change.password');
    Route::post('/change/password', [AdminProfileController::class, 'changePassword']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // categories section
    Route::group(['middleware' => ['permission:categories section']], function () {
        // Categories
        Route::resource('categories', CategoryController::class)->except([
            'create', 'show'
        ]);
    });

    // products section
    Route::group(['middleware' => ['permission:products section']], function () {
        // Products
        Route::post('products/inactive/{id}', [ProductController::class, 'inactive'])->name('inactive.store');
        Route::post('products/active/{id}', [ProductController::class, 'active'])->name('active.store');
        Route::get('get/subcategory/{category_id}', [ProductController::class, 'getSubCategory']);
        Route::resource('products', ProductController::class);
    });

    // posts section
    Route::group(['middleware' => ['permission:posts section']], function () {
        // Post Categories
        Route::resource('post-categories', PostCategoryController::class)->except([
            'create', 'show'
        ]);

        // Posts
        Route::post('posts/inactive/{id}', [PostController::class, 'inactive'])->name('posts.inactive.store');
        Route::post('posts/active/{id}', [PostController::class, 'active'])->name('posts.active.store');
        Route::resource('posts', PostController::class);
    });

    // tools sections
    Route::group(['middleware' => ['permission:tools sections']], function () {
        // Sliders
        Route::post('sliders/inactive/{id}', [SliderController::class, 'inactive'])->name('sliders.inactive.store');
        Route::post('sliders/active/{id}', [SliderController::class, 'active'])->name('sliders.active.store');
        Route::resource('sliders', SliderController::class);

        // Newslaters
        Route::resource('newslaters', NewslaterController::class)->only([
            'index', 'store', 'destroy'
        ]);

        // Coupons
        Route::resource('coupons', CouponController::class)->only([
            'index', 'store', 'destroy'
        ]);

        // Brands
        Route::resource('brands', BrandController::class)->except([
            'create', 'show'
        ]);
    });

    // orders section
    Route::group(['middleware' => ['permission:orders section']], function () {

        // Admin order route
        Route::group(['middleware' => ['permission:pandding order']], function () {
            Route::get('/orders/pandding', [OrderController::class, 'orderPandding'])->name('orders.pandding');

            Route::put('/order/accept/{id}', [OrderController::class, 'orderAccept'])->name('order.accept');
            Route::put('/order/cancel/{id}', [OrderController::class, 'orderCancel'])->name('order.cancel');
        });

        Route::group(['middleware' => ['permission:payment accept']], function () {
            Route::get('/orders/accept/payment', [OrderController::class, 'acceptPayment'])->name('accept.payment');
            Route::put('/orders/proccess/payment/{id}', [OrderController::class, 'proccessPayment'])->name('proccess.payment');
        });

        Route::group(['middleware' => ['permission:proccess delivery']], function () {
            Route::get('/orders/proccess/delivery', [OrderController::class, 'proccessDelivery'])->name('proccess.delivery');
            Route::put('/orders/delivery/done/{id}', [OrderController::class, 'deliveryDone'])->name('delivery.done');
        });

        Route::group(['middleware' => ['permission:proccess delivery|payment accept|pandding order']], function () {
            Route::get('/order/view/{id}', [OrderController::class, 'viewOrder'])->name('order.view');
        });

        Route::group(['middleware' => ['permission:deleverd orders|cancel orders']], function () {
            Route::get('/orders/deleverd/list', [OrderController::class, 'deleverd'])->name('order.deleverd');
            Route::get('/orders/cancel/list', [OrderController::class, 'cancelList'])->name('order.cancel.list');
        });
    });

    // Return Product Request
    Route::group(['middleware' => ['permission:return product']], function () {
        Route::get('/return/request', [ReturnRequestController::class, 'returnRequest'])->name('admin.return.request');
        Route::get('/return/request/view/{id}', [ReturnRequestController::class, 'returnRequestView'])->name('return.request.view');
        Route::get('/return/accept/all', [ReturnRequestController::class, 'returnAcceptAll'])->name('return.accept.all');
        Route::put('/return/request/accept/{id}', [ReturnRequestController::class, 'returnRequestAccept'])->name('return.request.accept');
        Route::put('/return/request/cancel/{id}', [ReturnRequestController::class, 'returnRequestCancel'])->name('return.request.cancel');
        Route::get('/return/cancel/all', [ReturnRequestController::class, 'returnCancelAll'])->name('return.cancel.all');
    });

    // super-admin
    Route::group(['middleware' => ['role:super-admin']], function () {

        Route::resource('admins', AdminController::class)->except([
            'create'
        ])->middleware('role:super-admin');

        // Role and Permission
        Route::get('/roles', [RolePermissionController::class, 'roleIndex'])->name('role.index');
        Route::post('/roles', [RolePermissionController::class, 'createRole'])->name('role.store');
        Route::delete('/roles/{id}', [RolePermissionController::class, 'deleteRole']);

        Route::get('/permission', [RolePermissionController::class, 'permissionIndex'])->name('permission.index');
        Route::post('/permission', [RolePermissionController::class, 'createPermission'])->name('permission.store');
        Route::delete('/permission/{id}', [RolePermissionController::class, 'deletePermission']);

        Route::get('/roletopermission/{id}', [RolePermissionController::class, 'roleToPermission'])->name('role.permission');
        Route::post('/givepermissionto', [RolePermissionController::class, 'givePermissionTo'])->name('role.givepermissionto');
        Route::get('revoke/permission/{roleId}/{permissionId}', [RolePermissionController::class, 'revokePermissionTo'])->name('role.revoke.permission');
        Route::get('/remove/role/{roleId}/{adminId}', [RolePermissionController::class, 'removeRole'])->name('remove.role');
    });

    // seo section
    Route::group(['middleware' => ['permission:settings sections']], function () {

        // Setting
        Route::resource('settings', SettingController::class)->only([
            'index', 'update'
        ]);

        // SEO Setting
        Route::resource('seos', SeoController::class)->only([
            'index', 'update'
        ]);

        // Site Settings
        Route::resource('site-settings', SiteSettingController::class)->only([
            'index', 'update'
        ]);
    });
});

// User Logn & Ragistration
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'proccessLogin']);
Route::get('/register', [UserAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'proccessRegister']);
Route::get('/activate/{token}', [UserAuthController::class, 'activate'])->name('activate');
Route::post('/logout', [UserLogoutController::class, 'logout'])->name('logout');

// Forget Password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// User Profile Controller
Route::get('/profile/{slug}', [UserProfileController::class, 'index'])->name('profile');
Route::get('/profile/{slug}/orders', [UserProfileController::class, 'profileOrder'])->name('profile.order');
Route::get('/user/change-password', [ChangePasswordController::class, 'index'])->name('password.change');
Route::post('/user/change-password', [ChangePasswordController::class, 'changePassword']);

// Home Controller for home page route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Store Newsletter
Route::post('/newsletter/store', [FrontNewslaterController::class, 'store'])->name('newsletter.store');

// Products Route
Route::prefix('products')->group(function () {

    // Add Wishlist
    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/add', [WishlistController::class, 'storeWishlist'])->name('add.wishlist');
    Route::delete('/remove/wishlist/{id}', [WishlistController::class, 'removeWishlist'])->name('remove.wishlist');

    // Add To Cart
    Route::get('/show/cart', [CartController::class, 'showCart'])->name('show.cart');
    Route::post('/update/cart/item', [CartController::class, 'updateCartItem'])->name('update.cartitem');
    Route::delete('/remove/cart/{rowId}', [CartController::class, 'removeCart'])->name('remove.cart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/apply/coupon', [CartController::class, 'storeCoupon'])->name('apply.coupon');

    // Products
    Route::get('/details/{slug}', [FrontProductController::class, 'productView'])->name('products.details');
    Route::post('/details/{slug}', [FrontProductController::class, 'addProductCart']);
    Route::get('/queck/{slug}', [FrontProductController::class, 'productQueckView'])->name('products.queck');
    Route::get('/categories/{slug}', [FrontProductController::class, 'category'])->name('products.categories');
    Route::get('/subcategories/{slug}', [FrontProductController::class, 'subcategory'])->name('products.subcategories');
    Route::get('/products-all', [FrontProductController::class, 'products'])->name('products');
    Route::get('/hotdeals', [FrontProductController::class, 'hotDeal'])->name('products.hotdeal');
    Route::get('/bestseller', [FrontProductController::class, 'bestSeller'])->name('products.bestseller');
    Route::get('/specialoffer', [FrontProductController::class, 'specialOffer'])->name('products.specialoffer');
    Route::get('/trand', [FrontProductController::class, 'trand'])->name('products.trand');
    Route::get('/newarrival', [FrontProductController::class, 'newArrival'])->name('products.newarrival');

    // Payment system
    Route::post('/payment/proccess', [PaymentController::class, 'payment'])->name('payment.proccess');
    Route::post('/payment/stripe', [PaymentController::class, 'stripe'])->name('payment.stripe');

    // Order Tracking
    Route::post('/order/tracking', [UserProfileController::class, 'track'])->name('order.tracking');

    // Return Product
    Route::get('/return/order/{slug}', [UserProfileController::class, 'returnProduct'])->name('return.product');
    Route::get('/return/request/{id}', [UserProfileController::class, 'returnRequest'])->name('return.request');

    // Product Search 
    Route::post('search', [FrontProductController::class, 'search'])->name('search');
});

// Blogs route
Route::prefix('blogs')->group(function () {

    Route::get('/posts', [FrontPostController::class, 'postIndex'])->name('blog.posts');
    Route::get('/lan/english', [FrontPostController::class, 'english'])->name('lng.english');
    Route::get('/lan/bangla', [FrontPostController::class, 'bangla'])->name('lng.bangla');
    Route::get('/single/{slug}', [FrontPostController::class, 'singlePost'])->name('blog.single');
});

// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::fallback(function () {
    return view('frontend.404');
});

// ---- For Checking Route ----

Route::get('/check/cart', function () {
    // Cart::destroy();
    // return response()->json(Cart::content());
    dd(Cart::content());
});

Route::get('test', function () {
    return App\Models\Category::with('parent_category')->whereNotNull('category_id')->where('id', 6)->get();
});
