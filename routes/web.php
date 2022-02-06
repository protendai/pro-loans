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
    // Users  
    Route::get('users', 'UsersController@index')->name('users');
    Route::post('users/create', 'UsersController@store')->name('users.store');
    Route::get('users/edit/{id}', 'UsersController@index')->name('users.edit');
    // Users  
    Route::get('profile', 'UsersController@profile');
    Route::post('profile/customer', 'UsersController@customer_profile');
});


require __DIR__.'/auth.php';
