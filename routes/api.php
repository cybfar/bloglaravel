<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/categories', [ArticleController::class, 'getcategories']);

Route::get('/articles/category/{id}', [ArticleController::class, 'sortcategories']);

Route::post('/article/create', [ArticleController::class, 'create']);

Route::delete('/article/delete/{id}', [ArticleController::class, 'destroy']);

Route::get('/article/edit/{id}', [ArticleController::class, 'edit']);

Route::post('/article/update/{id}', [ArticleController::class, 'update']);

Route::get('/article/view/{id}', [ArticleController::class, 'show']);
