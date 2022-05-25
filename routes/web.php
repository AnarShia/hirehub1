<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies.index');
    Route::get('/companies/create', 'create')->name('companies.create');
    Route::post('/companies', 'store')->name('companies.oksacposa');
    Route::get('/companies/{post}', 'show')->name('companies.show');
    Route::get('/companies/{post}/edit', 'edit')->name('companies.edit');
    Route::put('/companies/{post}', 'update')->name('companies.update');
    Route::delete('/companies/{post}', 'destroy')->name('companies.destroy');
});

Route::controller(NavBarController::class)->group(function () {
    //Route::get('/', 'homePage')->name('homePage');
    Route::get('/jobs', 'jobsPage')->name('jobsPage');
    Route::get('/login', 'loginPage')->name('logpage');
    Route::get('/signup', 'signUpPage')->name('signupPage');
    Route::post('/logout', 'logoutPage')->name('logoutPage');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginCompany')->name('login.company');
    //Route::get('/login', 'login')->name('login.user');
    Route::post('/register', 'registerCompany')->name('register.company');
    Route::post('/register', 'register')->name('register.user');
    Route::post('/logout', 'logout')->name('logout');
});