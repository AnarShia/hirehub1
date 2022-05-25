<?php

use App\Http\Controllers\Job_PostController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;
use App\Models\Post;


Route::controller(Job_PostController::class)->group(function () {
    Route::get('/jobs', 'create')->name('jobs.create');
    Route::post('/jobs', 'store')->name('jobs.store');
    Route::get('/jobs/{post}', 'show')->name('jobs.show');
    Route::get('/jobs/{post}/edit', 'edit')->name('jobs.edit');
    Route::put('/jobs/{post}', 'update')->name('jobs.update');
    Route::delete('/jobs/{post}', 'destroy')->name('jobs.destroy');
});
Route::controller(PostController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies.index');
    Route::get('/companies/create', 'create')->name('companies.create');
    Route::post('/companies','store')->name('companies.oksacposa');
    Route::get('/companies/{post}', 'show')->name('companies.show');
    Route::get('/companies/{post}/edit', 'edit')->name('companies.edit');
    Route::put('/companies/{post}', 'update')->name('companies.update');
    Route::delete('/companies/{post}', 'destroy')->name('companies.destroy');
});

Route::get('/', function () {
    return Inertia::render('HomePage');
});

Route::get('/jobs', function () {
    return Inertia::render('Jobs');
});
Route::get('/login', function () {
    return Inertia::render('Login');
});

Route::get('/signup', function () {
    return Inertia::render('Signup');
});


Route::get('/nav', function () {
    return Inertia::render('Navy');
});


Route::post('/logout', function () {
    return Inertia::render('HomePage');
});
