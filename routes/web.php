<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ArticleController;

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/test', function () {
    return 'Test route works!';
});
Route::get('/test-view', function () {
    return view('test');
});

Route::post('/articles/{article}/attach-category', [ArticleController::class, 'attachCategory'])->name('articles.attachCategory');
Route::post('/articles/{article}/detach-category/{category}', [ArticleController::class, 'detachCategory'])->name('articles.detachCategory');
Route::get('/articles/{article}/categories', [ArticleController::class, 'showCategories']);
Route::get('/categories/{category}/articles', [ArticleController::class, 'showArticles']);

use App\Http\Controllers\UserController;

Route::get('create-user', [UserController::class, 'create'])->name('createUser');
Route::post('store-user', [UserController::class, 'store'])->name('storeUser');
