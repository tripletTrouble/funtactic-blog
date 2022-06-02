<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Interfaces\CategoryRepositoryInterface;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("categories", function (Request $request, CategoryRepositoryInterface $categoryRepository){
    if ($request->id != null){
        return response()->json($categoryRepository->getCategoryById($request->id), 200);
    }else {
        return response()->json($categoryRepository->getCategories(), 200);
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
