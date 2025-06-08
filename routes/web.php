<?php

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


// Dashboard Home Controller
Route::namespace('Dashboard\DashHome')->prefix('dashboard')->middleware('can:all-users')->group(function () {
    Route::get('/index', 'DashController@index')->name('dashboard.index');
});

// Dashboard Auth Controller 
Route::namespace('Dashboard\Auth')->prefix('dashboard')->group(function () {
    Route::get('/login', 'LoginController@index')->name('dashboard.login');
    Route::post('/login/process', 'LoginController@process')->name('login.process');

    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/register', 'RegisterController@index')->name('dashboard.register');
    Route::post('/register/process', 'RegisterController@store')->name('dashboard.register.store');

    Route::post('/forget/process', 'ForgotPasswordController@forgetprocess')->name('dashboard.forget.store');
    Route::put('/forget/reset/process/{user}', 'ForgotPasswordController@resetprocess')->name('dashboard.forget.reset.update');
});

// Dashboard Auth Controller 
Route::namespace('Dashboard\Auth')->group(function () {
    Route::get('/verify', 'RegisterController@verifyUser')->name('verify.User');
    Route::get('/reset', 'ForgotPasswordController@verifypassword')->name('forget.reset');
});

/* Dashboard User Management */
Route::namespace('Dashboard\Users')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('/users/index', 'UserManagementController@index')->name('user.index');
    Route::get('/customer/index', 'UserManagementController@custindex')->name('custuser.index');
    Route::get('/suplier/index', 'UserManagementController@suplierindex')->name('suplier.index');

    Route::get('/role/index', 'UserManagementController@roleindex')->name('role.index');
    Route::get('/role/create', 'UserManagementController@create')->name('role.create');
    Route::delete('/role/{role}', 'UserManagementController@destroy')->name('role.destroy');
    Route::get('role/{role}/edit', 'UserManagementController@edit')->name('role.edit');
    Route::put('/role/{role}', 'UserManagementController@update')->name('role.update');
    Route::post('/role/store', 'UserManagementController@store')->name('role.store');

    Route::get('/user/create', 'UserManagementController@create')->name('user.create');
    Route::post('/user/store', 'UserManagementController@store')->name('user.store');
    Route::get('user/{user}/edit', 'UserManagementController@edit')->name('user.edit');
    Route::put('/user/{user}', 'UserManagementController@update')->name('user.update');
    Route::get('/user/{user}', 'UserManagementController@destroy')->name('user.destroy');
});

/* Dashboard User Management */
Route::namespace('Dashboard\Users')->prefix('dashboard')->name('dashboard.')->middleware('can:all-users')->group(
    function () {
        Route::get('/user/profile/{user}/', 'UserManagementController@profile')->name('user.profile');
    }
);

/* Dashboard Product Category Management */
Route::namespace('Dashboard\Category')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('/category/index', 'ProductCategoryController@index')->name('category.index');
    Route::get('/category/create', 'ProductCategoryController@create')->name('category.create');
    Route::post('/category/store', 'ProductCategoryController@store')->name('category.store');
    Route::get('category/{productcategory}/edit', 'ProductCategoryController@edit')->name('category.edit');
    Route::put('/category/{productcategory}', 'ProductCategoryController@update')->name('category.update');
    //Route::get('/category/{slug}', 'ProductCategoryController@show')->name('category.show');
    Route::get('/category/{productcategory}', 'ProductCategoryController@destroy')->name('category.destroy');
});

/* Dashboard Product Management */
Route::namespace('Dashboard\Product')->prefix('dashboard')->name('dashboard.')
    ->middleware('can:normal-dashboard-users')->group(function () {

        Route::get('/product/index', 'ProductController@index')->name('product.index');
        Route::get('/product/create', 'ProductController@create')->name('product.create');
        Route::post('/product/store', 'ProductController@store')->name('product.store');
        Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
        Route::put('/product/{product}', 'ProductController@update')->name('product.update');
        Route::get('/product/{product}', 'ProductController@destroy')->name('product.destroy');
    });

/* Dashboard Order Management */
Route::namespace('Dashboard\OrderManagement')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('/order/index', 'OrderController@index')->name('order.index');
    Route::get('/order/create', 'OrderController@create')->name('order.create');
    Route::post('/order/store', 'OrderController@store')->name('order.store');
    Route::get('order/{order}/edit', 'OrderController@edit')->name('order.edit');
    Route::put('/order/{order}', 'OrderController@update')->name('order.update');
    //Route::get('/order/{slug}', 'OrderController@show')->name('order.show');
    Route::get('/order/{order}', 'OrderController@destroy')->name('order.destroy');
});

/* Dashboard Delivery Management */
Route::namespace('Dashboard\DeliveryManagement')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('/delivery/index', 'DeliveryControl@index')->name('delivery.index');
    Route::get('/delivery/create', 'DeliveryControl@create')->name('delivery.create');
    Route::post('/delivery/store', 'DeliveryControl@store')->name('delivery.store');
    Route::get('delivery/{delivery}/edit', 'DeliveryControl@edit')->name('delivery.edit');
    Route::put('/delivery/{delivery}', 'DeliveryControl@update')->name('delivery.update');
    //Route::get('/delivery/{slug}', 'DeliveryControl@show')->name('delivery.show');
    Route::delete('/delivery/{delivery}', 'DeliveryControl@destroy')->name('delivery.destroy');
});

/* Dashboard Report Management */
Route::namespace('Dashboard\Reports')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('/report/index', 'ReportController@index')->name('report.index');
    Route::get('/report/order/index', 'ReportController@orderIndex')->name('report.order.index');
    Route::get('/report/cust/index', 'ReportController@custIndex')->name('report.cust.index');

    //generate Orders report
    Route::post('/report/order/filer', 'ReportController@orderFilter')->name('report.order.filer');

    //generate employee report
    Route::get('/report/employee/index', 'ReportController@employee')->name('report.employee.index');
    Route::post('/report/employee/generate', 'ReportController@employeegenerate')->name('report.employee.generate');

    // generate customer report
    Route::get('/report/customer/index', 'ReportController@customer')->name('report.customer.index');
    Route::post('/report/customer/generate', 'ReportController@customergenerate')->name('report.customer.generate');

    // generate Supplier report
    Route::get('/report/supplier/index', 'ReportController@supplier')->name('report.supplier.index');
    Route::post('/report/supplier/generate', 'ReportController@suppliergenerate')->name('report.supplier.generate');

    // generate Product report
    Route::get('/report/product/index', 'ReportController@product')->name('report.product.index');
    Route::post('/report/product/generate', 'ReportController@productgenerate')->name('report.product.generate');

    // generate Delivery report
    Route::get('/report/delivery/index', 'ReportController@delivery')->name('report.delivery.index');
    Route::post('/report/delivery/generate', 'ReportController@deliveryfilter')->name('report.delivery.filter');

    // generate Profit report
    Route::get('/report/profit/index', 'ReportController@profit')->name('report.profit.index');
    Route::post('/report/profit/generate', 'ReportController@profitfilter')->name('report.profitfilter');

    // generate instock report
    Route::get('/report/instock/index', 'ReportController@instock')->name('report.instock.index');
    Route::post('/report/instock/generate', 'ReportController@instockgenerate')->name('report.instockgenerate');
});

/* Dashboard portal Management */
Route::namespace('Dashboard\TicketManagement')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('/ticket/index', 'TicketController@allticket')->name('ticket.index');
    Route::get('/ticket/{id}', 'TicketController@showticket')->name('ticket.show');
    Route::get('/support_ticket/create', 'TicketController@createticket')->name('ticket.create');
    Route::post('/ticket/store', 'TicketController@ticketstore')->name('ticket.store');
    Route::post('/replyticket/store', 'TicketController@replystore')->name('ticketreply.store');
    Route::get('/ticket/{ticket}/edit', 'TicketController@editticket')->name('ticket.edit');
});

/* Dashboard Supplier Management */
Route::namespace('Dashboard\SupplierManagement')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('/supplier/quotation/index', 'SupplierController@quotationindex')->name('supplier.quotation.index');
    Route::get('/supplier/quotation/create', 'SupplierController@quotationcreate')->name('supplier.quotation.create');
    Route::post('/supplier/quotation/store', 'SupplierController@quotationstore')->name('supplier.quotation.store');
    Route::get('/supplier/{supplier}/edit', 'SupplierController@quotationedit')->name('supplier.quotation.edit');
    Route::get('/supplier/{supplier}/show', 'SupplierController@quotationshow')->name('supplier.quotation.show');
    //Route::put('/supplier/{supplier}', 'SupplierController@update')->name('supplier.quotation.update');
    Route::delete('/supplier/{supplier}', 'SupplierController@supplierdestroy')->name('supplier.quotation.destroy');
});

// shipping charges
Route::namespace('Dashboard\Shipping')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')
    ->middleware('can:normal-dashboard-users')->group(function () {

        Route::get('/shipping/index', 'ShippingChargeController@index')->name('shipping.index');
        Route::get('/shipping/create', 'ShippingChargeController@create')->name('shipping.create');
        Route::post('/shipping/store', 'ShippingChargeController@store')->name('shipping.store');
        Route::get('shipping/{shippingcharge}/edit', 'ShippingChargeController@edit')->name('shipping.edit');
        Route::put('/shipping/{shippingcharge}', 'ShippingChargeController@update')->name('shipping.update');
        Route::delete('/shipping/{shippingcharge}', 'ShippingChargeController@destroy')->name('shipping.destroy');
    });

// Coupon Code 
Route::namespace('Dashboard\CouponManagement')->prefix('dashboard')->name('dashboard.')->middleware('can:normal-dashboard-users')->group(function () {
    Route::get('coupon/index', 'CouponController@index')->name('coupon.index');
    Route::get('/coupon/create', 'CouponController@create')->name('coupon.create');
    Route::post('coupon/store', 'CouponController@store')->name('coupon.store');
    Route::get('coupon/{coupon}/edit', 'CouponController@edit')->name('coupon.edit');
    Route::put('/coupon/{coupon}', 'CouponController@update')->name('coupon.update');
    Route::get('coupon/delete/{coupon}', 'CouponController@destroy')->name('coupon.destroy');
});


/* ======================================================================================= */
// FrontEnd Management -------------------------------------------------------------------
/* ======================================================================================= */

/* Home Page */
Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::get('/', 'HomepageController@index')->name('index');
});
// Product Page Controller
Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::get('/show/{slug}', 'Shop\ProductPageController@showproduct')->name('product_view');
    // Buy and Add Cart Store method
    Route::post('/checkout', 'Shop\ProductPageController@store')->name('productpage');
    //add Item with Get Method
    Route::get('add/cart/{slug}', 'Shop\ProductPageController@store')->name('add_to_cart');
    //show Cart Page
    Route::get('cart', 'Shop\ProductPageController@showcart')->name('cart');
});

// Product Cart Management
Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::put('cart/{id}', 'Shop\CartController@updatecart')->name('updatecart');
    Route::delete('cart/delete/{id}', 'Shop\CartController@deletecart')->name('deletecart');
});

//Wish List CRUD
Route::namespace('Frontend')->name('frontend.')->middleware('can:frontend-users')->group(function () {
    Route::get('/wishlist', 'Shop\WishListController@showwishlist')->name('show_wishlist');
    Route::get('/add_to_wishlist/{slug}', 'Shop\WishListController@storewishlist')->name('add_to_wishlist');
    Route::delete('/wishlist/{wishlist}', 'Shop\WishListController@destroy')->name('wishlist.destroy');
});

// Order Management 
Route::namespace('Frontend')->name('frontend.')->middleware('can:frontend-users')->group(function () {
    Route::get('/checkout', 'Shop\CheckoutController@checkout')->name('checkout');
    Route::post('/checkout/store', 'Shop\CheckoutController@store')->name('order.store');
    Route::get('/checkout/completed', 'Shop\CheckoutController@completed')->name('completed');
});

// Frontend Auth Controller 
Route::namespace('Frontend\Auth')->group(function () {
    Route::get('/user-login', 'LoginController@index')->name('login');
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::get('/forget', 'ForgetController@forget')->name('forget');
});


/* Frontend MyAccount Management */
Route::namespace('Frontend\MyAccount')->prefix('MyAccount')->name('frontend.')->middleware('can:frontend-users')->group(function () {

    //user Account
    Route::get('/user/index', 'MyAccountController@index')->name('user.index');
    Route::get('/{user}/edits', 'MyAccountController@edit')->name('user.edit');

    //Route::put('/order/{order}', 'OrderController@update')->name('order.update');
    Route::put('/user/{user}', 'MyAccountController@update')->name('user.update');

    // myorderlist
    Route::get('/myorders', 'MyAccountController@myorderlist')->name('order.index');

    // myorder list items
    Route::get('/myorders/{order}', 'MyAccountController@orderlistitem')->name('order.show');
});

/* Frontend MyAccount tracking Management */
Route::namespace('Frontend\MyAccount')->prefix('MyAccount')->name('frontend.')->group(function () {
    Route::get('/tracking/{id}', 'MyAccountController@trackingshow')->name('tracking.show');
});

/* Frontend MyAccount tracking Management guest */
Route::namespace('Frontend\MyAccount')->name('frontend.')->group(function () {
    //Route::get('/tracking/guest/{id}', 'MyAccountController@guesttrackingshow')->name('guest.tracking.show');
    Route::post('/tracking/store', 'MyAccountController@trackingstore')->name('tracking.store');
    Route::get('/tracking/index', 'MyAccountController@trackingindex')->name('tracking.index');
});

//Customer Support
Route::namespace('Frontend\Ticket')->prefix('MyAccount')->name('frontend.')->middleware('can:frontend-users')->group(function () {
    Route::get('/ticket/index', 'TicketController@allticket')->name('ticket.index');
    Route::get('/ticket/{id}', 'TicketController@showticket')->name('ticket.show');
    Route::get('/support_ticket/create', 'TicketController@createticket')->name('ticket.create');
    Route::post('/ticket/store', 'TicketController@ticketstore')->name('ticket.store');
    Route::post('/replyticket/store', 'TicketController@replystore')->name('ticketreply.store');
    Route::get('/ticket/{ticket}/edit', 'TicketController@editticket')->name('ticket.edit');
});

/* Frontend Review Management */
Route::namespace('Frontend\Shop')->name('frontend.')->group(function () {
    // Route::get('/index', 'ReviewController@index')->name('review.index');
    Route::get('/create', 'ReviewController@create')->name('review.create');
    Route::post('/store', 'ReviewController@store')->name('review.store');
    // Route::get('/{user}/edit', 'ReviewController@edit')->name('review.edit');
    // Route::put('/{user}', 'ReviewController@update')->name('review.update');
    // Route::delete('/{user}', 'ReviewController@destroy')->name('review.destroy');
});


//Categories Support
Route::namespace('Frontend\Category')->prefix('category')->name('frontend.')->group(function () {
    Route::get('/index', 'CategoryController@index')->name('category.index');
    Route::get('/show/{slug}/', 'CategoryController@show')->name('category.show');
    // Route::get('/filter-category', 'CategoryController@filterc')->name('category.filterc');
});

//Shop
Route::namespace('Frontend\Category')->name('frontend.')->group(function () {
    // Route::get('/index', 'CategoryController@index')->name('category.index');
    Route::get('/shop/index', 'CategoryController@shop')->name('shop.show');
    // Route::get('/filter-category', 'CategoryController@filterc')->name('category.filterc');
});

Route::namespace('Frontend\Shop')->prefix('compare')->name('frontend.')->group(function () {
    Route::get('/index', 'CompareController@index')->name('compare.index');
    Route::get('/edit/{product}/', 'CompareController@edit')->name('compare.edit');
    Route::get('compare/delete/{slug}', 'CompareController@delete')->name('compare.delete');
});

// Pages 
Route::namespace('Frontend\PagesManagement')->name('frontend.')->group(function () {
    Route::get('/privacy-policy', 'PageController@privacy')->name('privacy.index');
    Route::get('/about-us', 'PageController@aboutUs')->name('aboutUs.index');
    Route::get('/faq', 'PageController@faq')->name('faq.index');
    Route::get('/refund', 'PageController@refund')->name('refund.index');
    Route::get('location', 'PageController@location')->name('location.index');
    Route::get('/tof', 'PageController@tof')->name('tof.index');
});

// Header Search Bar
Route::namespace('Frontend\Livesearch')->group(function () {
    Route::get('/search/result', 'LiveSearchController@search')->name('search');
});

// shipping charges
Route::namespace('Frontend\Shipping')->name('frontend.')->group(function () {
    Route::post('/shipping/calculate', 'ShippingController@store')->name('shipping.calculte');
});

// Contact Us 
Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::get('contact-us', 'ContactController@getContact')->name('get.contact');
    Route::post('contact-us/store', 'ContactController@saveContact')->name('save.contact');
});

// Coupon Code 
Route::namespace('Frontend')->name('frontend.')->group(function () {
    Route::get('coupon-code', 'CouponController@getContact')->name('get.coupon');
    Route::get('coupon-code/delete/{coupon}', 'CouponController@deleteContact')->name('delete.coupon');
    Route::post('coupon-code/store', 'CouponController@saveContact')->name('save.coupon');
});
