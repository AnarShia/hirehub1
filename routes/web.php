<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HireMeController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies.index');
    Route::get('/companies/create', 'create')->name('companies.create');
    Route::post('/companies', 'store')->name('companies.store');
    Route::get('/companies/{post}', 'show')->name('companies.show');
    Route::get('/companies/{post}/edit', 'edit')->name('companies.edit');
    Route::put('/companies/{post}', 'update')->name('companies.update');
    Route::delete('/companies/{post}', 'destroy')->name('companies.destroy');
});
Route::controller(HireMeController::class)->group(function () {
    Route::post('/hire/create', 'store')->name('hireme.store');
});


Route::controller(NavBarController::class)->group(function () {
    Route::get('/', 'homePage')->name('homePage');
    Route::get('/jobs', 'jobsPage')->name('jobsPage');
    Route::get('/login', 'loginPage')->name('loginPage');
    Route::get('/signup', 'signUpPage')->name('signupPage');
    Route::post('/logout', 'logoutPage')->name('logoutPage');
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/login/user', 'login')->name('login.user');
    Route::post('/register', 'register')->name('register.user');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller()->group(function () {
    Route::get('/login/Company', function () {
        return inertia('Login/Login');
    })->name('loginasCompany');

    Route::get('/login/Employee', function () {
        return inertia('Login/Login');
    })->name('loginasEmployee');

    Route::get('/register/Employee', function () {
        return inertia('Register/Signup');
    })->name('registerasEmployee');
    Route::get('/register/Company', function () {
        return inertia('Register/Signup');
    })->name('registerasCompany');
});

require __DIR__ . '/companyauth.php';
