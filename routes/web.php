<?php

use App\Facades\Articles;
use App\Facades\Categories;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    if ($request->wantsJson()) {
        return response()->json(Articles::published(12));
    }

    return view('front-page.home', [
        'title' => 'Homepage',
        'articles' => Articles::published(12),
    ]);
});

Route::get('/about-me', function () {
    return view('front-page.about', [
        'title' => 'Tentang Saya',
    ]);
});

Route::prefix('articles')->group(function () {
    Route::get('categories', function () {
        return view('front-page.categories', [
            'title' => 'Semua Kategori',
            'categories' => Categories::get(),
        ]);
    });

    Route::get('categories/{slug}', function (string $slug) {
        return view('front-page.category', [
            'title' => 'Kategori: ' . Categories::find($slug)->name,
            'category' => Categories::find($slug),
            'articles' => Categories::find($slug)->articles()->paginate(12),
        ]);
    });

    Route::get('search', 'App\Http\Controllers\ArticleController@search');

    Route::controller(ArticleController::class)->middleware(['auth'])->group(function () {
        Route::get('/', 'index');
        Route::get('new', 'create');
        Route::get('{uuid}/edit', 'edit');
        Route::post('/', 'store');
        Route::put('{uuid}', 'update');
        Route::delete('{uuid}', 'destroy');
    });

    Route::get('{slug}', 'App\Http\Controllers\ArticleController@show');
});

Route::get('dashboard', function () {
    return view('admin-panel.dashboard');
})->middleware(['auth']);

Route::controller(CategoryController::class)->middleware(['auth'])->group(function () {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::put('/categories/{uuid}', 'update');
    Route::delete('/categories/{uuid}', 'destroy');
});

Route::controller(SettingController::class)->middleware(['auth'])->group(function () {
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
