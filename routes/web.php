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

//generic routes
Route::get('/', 'HomeController@getindex')->middleware('auth');

Route::get('/home', 'HomeController@getindex')->middleware('auth')->name('home-page');

Route::get('/about', 'UserController@getAboutPage')->name('about-page');

Route::get('/add-item', 'ItemController@getAddNewItemPage')->middleware('auth')->name('add-item-page');

Route::get('/inventory', 'UserController@getInventoryPage')->middleware('auth')->name('inventory-page');

Route::get('/edit-item/{itemId}', 'ItemController@getEditItemPage')->middleware('auth')->name('edit-item-page');

Route::get('/profile', 'UserController@getProfilePage')->middleware('auth')->name('profile-page');

Route::get('/info-item/{itemId}', 'ItemController@getInfoItemPage')->middleware('auth')->name('info-item-page');

Route::get('/rent-item-page/{itemId}', 'RentNotificationController@getRentItemPage')->middleware('auth')->name('rent-item-page');

Route::get('/rent-request/{notificationId}', 'RentNotificationController@getNotificationInfo')->middleware('auth')->name('notification-info-page');

Route::get('/ongoing-rents', 'UserController@getOngoingRentsPage')->middleware('auth')->name('ongoing-rents-page');

Route::get('/ongoing-rentals', 'UserController@getOngoingRentalsPage')->middleware('auth')->name('ongoing-rentals-page');

// create item
Route::post('/upload-item', 'ItemController@uploadItem')->middleware('auth')->name('upload-item');

//update item
Route::put('/update-item/{itemId}', 'ItemController@updateItem')->middleware('auth')->name('update-item');

// delete item
Route::delete('/delete-item/{itemId}', 'ItemController@deleteItem')->middleware('auth')->name('delete-item');

// sent rent item request
Route::post('/sent-rent-item-request/{itemId}', 'RentNotificationController@sentRentItemRequest')->middleware('auth')->name('sent-rent-item-request');

// accept rent request
Route::post('/accept-rent-item-request/{notificationId}', 'RentController@acceptRentRequest')->middleware('auth')->name('accept-rent-item-request');

// delete notification
Route::post('/delete-notification/{notificationId}', 'RentNotificationController@deleteNotification')->middleware('auth')->name('delete-notification');

// delete ongoing rent
Route::delete('/item-returned/{rentId}', 'RentController@itemReturned')->middleware('auth')->name('item-returned');

// update profile
Route::put('/update-profile', 'UserController@updateProfile')->middleware('auth')->name('update-profile');

// filter and sort items
Route::get('/home-filters', 'HomeController@filterItems')->middleware('auth')->name('filter-items');

// search an item by name
Route::get('/search-item', 'HomeController@searchItem')->middleware('auth')->name('search-item');


// admin routes
Route::middleware(['admin', 'auth'])->name('admin.')->group(function () {
    Route::get('/all-users', 'AdminController@getAllUsersPage')->name('all-users-page');
    Route::get('/all-users/search', 'AdminController@searchUser')->name('search-user');

    Route::post('/make-user-admin/{userId}', 'AdminController@makeAdmin')->name('make-user-admin');
    Route::delete('/delete-user/{userId}', 'AdminController@deleteUser')->name('delete-user');
});




// Auth routes found at: https://stackoverflow.com/questions/43224300/override-default-auth-routes-in-laravel-5-4
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@getRegisterPage')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
