<?php

use Illuminate\Support\Facades\Route;


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
});

require __DIR__.'/auth.php';
