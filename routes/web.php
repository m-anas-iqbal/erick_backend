<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfFeedController;
use App\Http\Controllers\HomeController;
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

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'index'])->name('login');

Route::group(['prefix' => 'admin', 'as' => '', 'middleware' => ['auth','admin']], function ()
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
// pdf routes
Route::get('pdf', [PdfFeedController::class, 'index'])->name('pdf.index'); // List pdf
Route::get('pdf/create', [PdfFeedController::class, 'create'])->name('pdf.create'); // Show form to create a feed
Route::post('pdf', [PdfFeedController::class, 'store'])->name('pdf.store'); // Store a new feed
Route::get('pdf/{id}', [PdfFeedController::class, 'show'])->name('pdf.show'); // Show a single feed
Route::get('pdf/{id}/edit', [PdfFeedController::class, 'edit'])->name('pdf.edit'); // Show form to edit a feed
Route::put('pdf/{id}', [PdfFeedController::class, 'update'])->name('pdf.update'); // Update a feed
Route::delete('pdf/{id}', [PdfFeedController::class, 'destroy'])->name('pdf.destroy'); // Delete a feed

Route::get('/qoutation',  [DashboardController::class, 'qoutation'])->name('qoutation');
Route::get('/newsletter',  [DashboardController::class, 'newsletter'])->name('newsletter');
Route::get('/contact',  [DashboardController::class, 'contact'])->name('contact');
Route::get('/partner',  [DashboardController::class, 'partner'])->name('partner');
Route::get('/dashboard',  [DashboardController::class, 'adminDashboard'])->name('dashboard');
});

Route::group(['prefix' => 'vendor', 'as' => '', 'middleware' => ['auth','vendor']], function ()
{
    Route::get('/video', [DashboardController::class, 'clientDashboard'])->name('videos');
    Route::get('/pdf', [DashboardController::class, 'pdf'])->name('pdfs');
});

    Route::group(['middleware' => ['auth']], function () {
         // profiles Route
    Route::get('/profile/edit/{id}', [DashboardController::class, 'profile_edit']);
    Route::post('/profile/edit_post', [DashboardController::class, 'profile_edit_post']);
    });
