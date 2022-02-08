<?php

use Illuminate\Support\Facades\Route;

// Dashboard  
Route::post('/customer/register', 'UsersController@register')->name('customer.register');

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard  
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    // Loans  
    Route::get('loans', 'LoansController@index')->name('loans');
    Route::get('loans/view/{id}', 'LoansController@show');
    Route::get('loans/cancel/{id}', 'LoansController@cancel');
    Route::post('loans/approve', 'LoansController@store');
    Route::post('loans/apply', 'LoansController@apply');
    // Repy
    Route::post('repayment/record', 'LoansController@repayment_store');


    // Users  
    Route::get('users', 'UsersController@index')->name('users');
    Route::post('users/create', 'UsersController@store')->name('users.store');
    Route::get('users/edit/{id}', 'UsersController@index')->name('users.edit');
    // User Profile  
    Route::get('profile', 'UsersController@profile');
    Route::post('profile/customer', 'UsersController@customer_profile');
    // User Custoers
    Route::get('customers', 'UsersController@customers');
    Route::get('customers/view/{id}', 'UsersController@customers_view');
    Route::get('download/{document}', 'UsersController@download');
    Route::get('customer/activate/{id}', 'UsersController@customers_activate');
});


require __DIR__.'/auth.php';
