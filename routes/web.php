<?php

//use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', function () {
    return view('welcome');
});

Route::post('/contactmail', 'HomeController@mail');

Auth::routes();

Route::get('/redirect', function(){
    if(auth()->user()->user_type == 'admin'){
        return redirect("/pending");
    }
    return redirect("/home");
});

Route::get("/jun", function()
{
    dd("fyguh");
});

// Route::get('/app', "SiteController@index");

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/matrix', 'HomeController@matrix')->name('matrix');

Route::get('/not-activated', 'HomeController@notActivated');

Route::get('/activationrequest', 'HomeController@activationRequest');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::post('/profile/{user}', 'HomeController@update');

Route::get('/training', 'HomeController@training');


Route::post('/user-accounts', 'UserAccountController@store');

Route::post('/user-accounts/{userAccount}', 'UserAccountController@update');


Route::get('/app-accounts', 'AppAccountController@index')->middleware('role:admin');

Route::post('/app-accounts', 'AppAccountController@store')->middleware('role:admin');

Route::get('/app-accounts/{appAccount}', 'AppAccountController@destroy')->middleware('role:admin');

Route::post('/app-accounts/{appAccount}', 'AppAccountController@update')->middleware('role:admin');


Route::get('/wallet', 'WalletController@index');

Route::post('/send-payment-request', 'WalletController@sendPaymentRequest');



Route::get('/pending', 'AdminController@pending')->middleware('role:admin');


// Route::get('/staff', 'AdminController@staff')->middleware('role:admin');

// Route::post('/staff', 'AdminController@makeStaff')->middleware('role:admin');

Route::get('/payment', 'AdminController@payment')->middleware('role:admin');

Route::post('/payment/{transaction}', 'AdminController@paymentDone')->middleware('role:admin');

Route::post('/activate-user', 'AdminController@activateUser')->middleware('role:admin');
//->middleware('role:admin');

Route::get('/transactions', 'AdminController@transactions')->middleware('role:admin');

Route::post('/upgrade', 'AdminController@upgrade');

Route::post('/fund', 'AdminController@fund')->middleware('role:admin');

Route::get('/checker', 'AdminController@checkUser');

Route::get('/verify/{reference}', 'AdminController@verify');
