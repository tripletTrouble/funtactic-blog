<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserProfileController;

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

Route::get('/', function () {
    return view('front-page.home');
});

Route::get('dashboard', function () {
    return view('admin-panel.dashboard');
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index');
    Route::get('/new-article', 'create');
    Route::get('/articles/{uuid}/edit', 'edit');
    Route::post('/articles', 'store');
    Route::put('/articles/{uuid}', 'update');
    Route::delete('/articles/{uuid}', 'destroy');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::put('/categories/{uuid}', 'update');
    Route::delete('/categories/{uuid}', 'destroy');
});

Route::controller(SettingController::class)->group(function() {
    Route::get('site-settings', 'siteSettings');
    Route::get('menu-settings', 'menuSettings');
    Route::put('settings', 'update');
});

Route::controller(UserProfileController::class)->group(function () {
    Route::get('edit-profile', 'edit');
    Route::put('user-profiles', 'update');
});
