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

//Route::get('/test-view', function () {
//    return view('test');
//});

//session 5th
Route::post('/articles/{article}/attach-category', [ArticleController::class, 'attachCategory'])->name('articles.attachCategory');
Route::post('/articles/{article}/detach-category/{category}', [ArticleController::class, 'detachCategory'])->name('articles.detachCategory');
Route::get('/articles/{article}/categories', [ArticleController::class, 'showCategories']);
Route::get('/categories/{category}/articles', [ArticleController::class, 'showArticles']);


//session 6th
use App\Http\Controllers\UserController;

Route::post('/UserForm', [UserController::class, 'Store'])->name('UserForm.store');
Route::get('/UserForm', [UserController::class, 'create'])->name('UserForm.create');
