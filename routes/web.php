<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserProfileController;
use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\UserServiceInterface;
use App\Models\Article;

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

Route::get('/', function (UserServiceInterface $userServiceInterface, ArticleRepositoryInterface $articleRepositoryInterface) {
    return view('front-page.home', [
        'owner' => $userServiceInterface->getOwnerInfo(['full_name']),
        'articles' => $articleRepositoryInterface->getArticles()
    ]);
});

Route::get('dashboard', function () {
    return view('admin-panel.dashboard');
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index');
    Route::get('/new-article', 'create');
    Route::get('/edit-article', 'edit');
    Route::post('/articles', 'store');
    Route::put('/articles', 'update');
    Route::delete('/articles', 'destroy');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::put('/categories', 'update');
    Route::delete('/categories', 'destroy');
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
