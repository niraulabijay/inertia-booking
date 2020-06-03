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
Route::get('/create-super/{email}','authentication\RegistrationController@createAdmin');
Route::group([
    'prefix' => '/admin',
    'namespace'=>'authentication',
    'middleware' => 'visitor'
], function () {
    Route::get('/register', 'RegistrationController@register')->name('register');
//    Route::get('/login','LogController@admin_login')->name('admin_login');
    Route::get('/login', 'LogController@login')->name('admin_login');
    Route::get('/forgot_password','ForgotPasswordController@forgot_password')->name('forgot_password');
    Route::POST('/post_forgot_password','ForgotPasswordController@post_forgot_password')->name('post_forgot_password');

    //activation
    Route::get('/activate/{email}/{activationCode}','authentication\ActivationController@activate');

    Route::post('/store', 'authentication\RegistrationController@store')->name('register_user');

    //forgot_password
    Route::get('/reset_password/{email}/{code}','authentication\ForgotPasswordController@reset');
    Route::post('/reset_password/{email}/{code}','authentication\ForgotPasswordController@post_reset')->name('post_password_reset');

});
Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'namespace'=>'admin',
    'middleware' => ['admin']
], function () {
    Route::get('/dashboard','IndexController@dashboard')->name('dashboard');

    Route::get('/amenities','AmenityController@index')->name('amenities');

    Route::get('/services','AmenityController@index')->name('services');

});

//Authentication
Route::post('/logout', 'authentication\LogController@logout')->name('logout');
Route::post('/admin/login/', 'authentication\LogController@check')->name('login_check');







































// Auth
Route::get('login')->name('login')->uses('Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('loginnn')->name('login.attempt')->uses('Auth\LoginController@login')->middleware('guest');
Route::post('logout')->name('logout')->uses('Auth\LoginController@logout');

// Dashboard
Route::get('/')->name('dashboard')->uses('DashboardController')->middleware('auth');

// Users
Route::get('users')->name('users')->uses('UsersController@index')->middleware(); //'remember', 'auth'
Route::get('users/create')->name('users.create')->uses('UsersController@create')->middleware(); //'auth'
Route::post('users')->name('users.store')->uses('UsersController@store')->middleware(); //'auth'
Route::get('users/{user}/edit')->name('users.edit')->uses('UsersController@edit')->middleware(); //'auth'
Route::put('users/{user}')->name('users.update')->uses('UsersController@update')->middleware(); //'auth'
Route::delete('users/{user}')->name('users.destroy')->uses('UsersController@destroy')->middleware(); //'auth'
Route::put('users/{user}/restore')->name('users.restore')->uses('UsersController@restore')->middleware(); //'auth'

// Images
Route::get('/img/{path}', 'ImagesController@show')->where('path', '.*');

// Organizations
Route::get('organizations')->name('organizations')->uses('OrganizationsController@index')->middleware(); //'remember', 'auth'
Route::get('organizations/create')->name('organizations.create')->uses('OrganizationsController@create')->middleware(); //'auth'
Route::post('organizations')->name('organizations.store')->uses('OrganizationsController@store')->middleware(); //'auth'
Route::get('organizations/{organization}/edit')->name('organizations.edit')->uses('OrganizationsController@edit')->middleware(); //'auth'
Route::put('organizations/{organization}')->name('organizations.update')->uses('OrganizationsController@update')->middleware(); //'auth'
Route::delete('organizations/{organization}')->name('organizations.destroy')->uses('OrganizationsController@destroy')->middleware(); //'auth'
Route::put('organizations/{organization}/restore')->name('organizations.restore')->uses('OrganizationsController@restore')->middleware(); //'auth'

// Contacts
Route::get('contacts')->name('contacts')->uses('ContactsController@index')->middleware(); //'remember', 'auth'
Route::get('contacts/create')->name('contacts.create')->uses('ContactsController@create')->middleware(); //'auth'
Route::post('contacts')->name('contacts.store')->uses('ContactsController@store')->middleware(); //'auth'
Route::get('contacts/{contact}/edit')->name('contacts.edit')->uses('ContactsController@edit')->middleware(); //'auth'
Route::put('contacts/{contact}')->name('contacts.update')->uses('ContactsController@update')->middleware(); //'auth'
Route::delete('contacts/{contact}')->name('contacts.destroy')->uses('ContactsController@destroy')->middleware(); //'auth'
Route::put('contacts/{contact}/restore')->name('contacts.restore')->uses('ContactsController@restore')->middleware(); //'auth'

// Reports
Route::get('reports')->name('reports')->uses('ReportsController')->middleware(); //'auth'

// 500 error
Route::get('500', function () {
    echo $fail;
});
