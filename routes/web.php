<?php

use App\Facades\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;

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
})->middleware(['auth']);

Route::controller(ArticleController::class)->middleware(['auth'])->group(function () {
    Route::get('/articles', 'index');
    Route::get('/new-article', 'create');
    Route::get('/articles/{uuid}/edit', 'edit');
    Route::post('/articles', 'store');
    Route::put('/articles/{uuid}', 'update');
    Route::delete('/articles/{uuid}', 'destroy');
});

Route::controller(CategoryController::class)->middleware(['auth'])->group(function() {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::put('/categories/{uuid}', 'update');
    Route::delete('/categories/{uuid}', 'destroy');
});

Route::controller(SettingController::class)->middleware(['auth'])->group(function() {
    Route::get('site-settings', 'siteSettings');
    Route::get('menu-settings', 'menuSettings');
    Route::put('settings', 'update');
});

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('profile', 'App\Http\Controllers\UserProfileController@edit');
    Route::put('profile', 'App\Http\Controllers\UserProfileController@update');
    Route::get('credential', function () {
        return view('admin-panel.user-credential');
    });
});