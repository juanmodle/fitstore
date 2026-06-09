<?php

use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DiscountController as AdminDiscountController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\GiveawayController as AdminGiveawayController;
use App\Http\Controllers\Admin\MediaAssetController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\AccountController as CustomerAccountController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\GiveawayController as CustomerGiveawayController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['en', 'es']), 404);
    session(['locale' => $locale]);

    return back()->withCookie(cookie('fitstore_locale', $locale, 60 * 24 * 365));
})->name('language.switch');

Route::post('/language/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['en', 'es']), 404);
    session(['locale' => $locale]);

    return back()->withCookie(cookie('fitstore_locale', $locale, 60 * 24 * 365));
})->name('language.change');

Route::view('/api-documentation', 'api.documentation')->name('api.documentation');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/catalog', [ProductController::class, 'index'])->name('catalog.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{post:slug}/comments', [BlogController::class, 'storeComment'])->middleware('auth')->name('blog.comments.store');
Route::get('/vip', [HomeController::class, 'vip'])->name('vip.show');
Route::get('/vip-info', [HomeController::class, 'vip'])->name('vip.info');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.show');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact.create');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [CustomerAccountController::class, 'index'])->name('dashboard');
    Route::get('/account', [CustomerAccountController::class, 'index'])->name('customer.dashboard');
    Route::view('/cart', 'cart.index')->name('cart.index');
    Route::post('/cart/items', [CheckoutController::class, 'addCartItem'])->name('cart.items.store');
    Route::delete('/cart/items/{cartItem}', [CheckoutController::class, 'removeCartItem'])->name('cart.items.destroy');
    Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/confirmation/{order}', [CustomerOrderController::class, 'confirmation'])->name('checkout.confirmation');
    Route::get('/orders', [CustomerOrderController::class, 'index'])->name('customer.orders.index');
    Route::get('/orders/{order}', [CustomerOrderController::class, 'show'])->name('customer.orders.show');
    Route::get('/orders/{order}/invoice', [CustomerOrderController::class, 'invoice'])->name('customer.orders.invoice');
    Route::get('/payments', [CustomerAccountController::class, 'payments'])->name('customer.payments.index');
    Route::get('/vip/subscription', [CustomerAccountController::class, 'vip'])->name('customer.vip.show');
    Route::post('/vip/subscription', [CustomerAccountController::class, 'storeVip'])->name('customer.vip.store');
    Route::post('/vip-subscription', [CustomerAccountController::class, 'storeVip'])->name('vip-subscription.store');
    Route::post('/vip/subscription/cancel', [CustomerAccountController::class, 'cancelVip'])->name('customer.vip.cancel');
    Route::get('/giveaways', [CustomerGiveawayController::class, 'index'])->name('customer.giveaways.index');
    Route::post('/giveaways/{giveaway}/join', [CustomerGiveawayController::class, 'join'])->name('customer.giveaways.join');
    Route::post('/giveaway-entries/{giveaway}', [CustomerGiveawayController::class, 'store'])->name('giveaway-entries.store');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->middleware('permission:view_reports')->name('dashboard');
    Route::resource('products', AdminProductController::class)->except(['show'])->middleware('permission:manage_products');
    Route::resource('categories', AdminCategoryController::class)->except(['show'])->middleware('permission:manage_categories');
    Route::resource('brands', AdminBrandController::class)->except(['show'])->middleware('permission:manage_products');
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update'])->middleware('permission:manage_orders');
    Route::resource('users', AdminUserController::class)->only(['index', 'show', 'update'])->middleware('permission:manage_users');
    Route::resource('discounts', AdminDiscountController::class)->except(['show'])->middleware('permission:manage_discounts');
    Route::resource('coupons', AdminCouponController::class)->except(['show'])->middleware('permission:manage_coupons');
    Route::resource('giveaways', AdminGiveawayController::class)->except(['show'])->middleware('permission:manage_giveaways');
    Route::post('giveaways/{giveaway}/winner', [AdminGiveawayController::class, 'chooseWinner'])->middleware('permission:manage_giveaways')->name('giveaways.winner');
    Route::resource('posts', AdminPostController::class)->except(['show'])->middleware('permission:manage_posts');
    Route::resource('documents', AdminDocumentController::class)->except(['show'])->middleware('permission:manage_documents');
    Route::get('media-assets', [MediaAssetController::class, 'index'])->middleware('permission:manage_documents')->name('media-assets.index');
    Route::post('media-assets/upload', [MediaAssetController::class, 'store'])->middleware('permission:manage_documents')->name('media-assets.store');
    Route::get('reports', [ReportController::class, 'index'])->middleware('permission:view_reports')->name('reports.index');
    Route::get('reports/sales/pdf', [ReportController::class, 'salesPdf'])->middleware('permission:view_reports')->name('reports.sales-pdf');
    Route::get('reports/products/pdf', [ReportController::class, 'productsPdf'])->middleware('permission:view_reports')->name('reports.products-pdf');
    Route::get('reports/vip/pdf', [ReportController::class, 'vipPdf'])->middleware('permission:view_reports')->name('reports.vip-pdf');
    Route::get('reports/giveaways/pdf', [ReportController::class, 'giveawaysPdf'])->middleware('permission:view_reports')->name('reports.giveaways-pdf');
    Route::get('audit-logs', [AuditLogController::class, 'index'])->middleware('permission:view_audit_logs')->name('audit-logs.index');
});
