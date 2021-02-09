<?php

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
Route::get("/", "MainController@home");

Route::group(['prefix' => '/main/'], function () {
    Route::get('checkout','MainController@checkout');
    Route::post('checkout','MainController@afterpayment')->name('checkout.credit-card');
    Route::get('register', "MainController@registerPage");
    Route::post('register', "MainController@register");
    Route::get('verify', "MainController@verifyPage");
    Route::get('verify/verificationId={hash}', "MainController@verify");
    Route::get('login', "MainController@loginPage");
    Route::post('login', "MainController@login");
    Route::get('forgot-password', "MainController@forgotPage");
    Route::get('forgot-password/reset-pass', "MainController@resetPass");
    Route::get('forgot-password/reset-password={id}', "MainController@resetPassword");
    Route::post('forgot-password/reset-password/email={email}', "MainController@reset");

    Route::get('category/{slug}', "MainController@catSlug");
    Route::get('category/{slug}/product/{id}', "MainController@fullDetails");
    Route::get('cart', "MainController@cart");
    Route::get('add-to-cart/{id}', 'MainController@addToCart');
    Route::patch('update-cart', "MainController@editCart");
    Route::delete('cart/{id}', "MainController@delCart");
    Route::post('cart/{id}', "MainController@savePage");


    Route::get('about', "MainController@about");
    Route::get('career', "MainController@career");
    Route::get('blog', "MainController@blog");
    Route::get('contact', "MainController@contact");
    Route::get('category/{slug}/{id}', "MainController@proDetails");
    Route::get('partner', "MainController@partner");
    Route::get('partner', "MainController@partner");
    Route::get('vendors', "MainController@vendor");

    Route::any('search', "MainController@search");
});


Auth::routes();

Route::get('/pages/login', 'AuthenticateController@index')->name('index');

Route::post('/pages/login', 'AuthenticateController@login')->name('login');

Route::get('/pages/register', 'AuthenticateController@regIndex')->name('regIndex');

Route::post('/pages/register', 'AuthenticateController@register')->name('register');

// Route::get('/app', "SiteController@index");

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/index', 'HomeController@index')->name('home');

Route::get('/index/orders', 'HomeController@ordersPage')->name('order');

Route::get('/index/save-for-later', 'HomeController@saveProduct');

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/matrix', 'HomeController@matrix')->name('matrix');

Route::get('/not-activated', 'HomeController@notActivated');

Route::get('/activationrequest', 'HomeController@activationRequest');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::post('/profile/{user}', 'HomeController@update');

Route::get('/training', 'HomeController@training');


Route::post('/user-accounts', 'UserAccountController@store');

Route::post('/user-accounts/{userAccount}', 'UserAccountController@update');



//Vendor

Route::get('/vendor', 'HomeController@index')->middleware("vendor");

//Admin

Route::get('/users', 'AdminController@users')->middleware("admin");

Route::get('/users/delete/{id}', 'AdminController@delUser')->middleware("admin");

Route::put("/users/make-vendor/{id}", "AdminController@makeVendor")->middleware("admin");



Route::get('/vendors', 'AdminController@vendor')->middleware("admin");

Route::put("/vendors/make-user/{id}", "AdminController@makeUser")->middleware("admin");

Route::get('/orders', 'AdminController@ordersPage')->middleware("higher");

Route::get('/vendor/orders', 'HomeController@VenOrdersPage')->middleware("vendor");

Route::get("categories", "AdminController@categories")->middleware("higher");
Route::get("/add-category", "AdminController@addCategoryPage")->middleware("higher");
Route::post("/add-category", "AdminController@addCategory")->middleware("higher");
Route::delete("/categories/{id}", "AdminController@deleteCategory")->middleware("higher");
Route::patch("/categories/edit/{id}", "AdminController@editCategory")->middleware("higher");

Route::get("products", "AdminController@products")->middleware("higher");
Route::get("/add-products", "AdminController@addProductsPage")->middleware("higher");
Route::post("/add-products", "AdminController@addProducts")->middleware("higher");

Route::delete("/products/{id}", "AdminController@deleteProduct")->middleware("higher");
Route::patch("/products/edit/{id}", "AdminController@editProduct")->middleware("higher");

Route::get('/app-accounts', 'AppAccountController@index')->middleware("admin");

Route::post('/app-accounts', 'AppAccountController@store')->middleware("admin");

Route::get('/app-accounts/{appAccount}', 'AppAccountController@destroy')->middleware("admin");

Route::post('/app-accounts/{appAccount}', 'AppAccountController@update')->middleware("admin");

Route::get('/wallet', 'WalletController@index');

Route::post('/send-payment-request', 'WalletController@sendPaymentRequest');



Route::get('/pending', 'AdminController@pending')->middleware("admin");

Route::get('/payment', 'AdminController@payment')->middleware("admin");

Route::post('/payment/{transaction}', 'AdminController@paymentDone')->middleware("admin");

Route::post('/activate-user', 'AdminController@activateUser')->middleware("admin");

Route::get('/transactions', 'AdminController@transactions')->middleware("admin");

Route::post('/fund', 'AdminController@fund')->middleware("admin");









Route::post('/upgrade', 'AdminController@upgrade');






Route::get('/checker', 'AdminController@checkUser');

Route::get('/verify/{reference}', 'AdminController@verify');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
