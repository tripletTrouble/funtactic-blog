<?php

use App\Facades\Articles;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    if ($request->wantsJson()){
        return response()->json(Articles::published(12));
    }
    return view('front-page.home', [
        'title' => 'Homepage',
        'articles' => Articles::published(12)
    ]);
});

Route::get('/articles/{slug}', function (string $slug) {
    return view('front-page.article', [
        'title' => Articles::find($slug)['title'],
        'article' => Articles::find($slug)
    ]);
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
    Route::post('settings/reset-menu', 'resetMenus');
});

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('profile', 'App\Http\Controllers\UserProfileController@edit');
    Route::put('profile', 'App\Http\Controllers\UserProfileController@update');
    Route::get('credential', function () {
        return view('admin-panel.user-credential');
    });
});