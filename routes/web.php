<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/feeds/create', [FeedController::class, 'create'])->name('feeds.create');
Route::post('/feeds', [FeedController::class, 'store'])->name('feeds.store');

Route::group(['prefix' => 'admin', 'as' => '', 'middleware' => ['auth']], function ()
{

// User routes
Route::get('users', [UserController::class, 'index'])->name('users.index'); // List users
Route::get('users/create', [UserController::class, 'create'])->name('users.create'); // Show form to create a user
Route::post('users', [UserController::class, 'store'])->name('users.store'); // Store a new user
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show'); // Show a single user
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Show form to edit a user
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update'); // Update a user
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete a user

// Feed routes
Route::get('feeds', [FeedController::class, 'index'])->name('feeds.index'); // List feeds
Route::get('feeds/create', [FeedController::class, 'create'])->name('feeds.create'); // Show form to create a feed
Route::post('feeds', [FeedController::class, 'store'])->name('feeds.store'); // Store a new feed
Route::get('feeds/{id}', [FeedController::class, 'show'])->name('feeds.show'); // Show a single feed
Route::get('feeds/{id}/edit', [FeedController::class, 'edit'])->name('feeds.edit'); // Show form to edit a feed
Route::put('feeds/{id}', [FeedController::class, 'update'])->name('feeds.update'); // Update a feed
Route::delete('feeds/{id}', [FeedController::class, 'destroy'])->name('feeds.destroy'); // Delete a feed

    Route::get('/dashboard',  [DashboardController::class, 'adminDashboard'])->name('dashboard');
});

Route::group(['prefix' => 'vendor', 'as' => '', 'middleware' => ['auth']], function ()
{
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
});

    Route::group(['middleware' => ['auth']], function () {
         // profiles Route
    Route::get('/profile/edit/{id}', [DashboardController::class, 'profile_edit']);
    Route::post('/profile/edit_post', [DashboardController::class, 'profile_edit_post']);
    });
