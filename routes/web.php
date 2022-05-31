<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return redirect('posts');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([], function () {

    Route::get('/posts/{order?}', [PostController::class, 'index'])
    ->name('posts');

    Route::get('/myPosts/{order?}', [PostController::class, 'myPosts'])
    ->name('myPosts')->middleware('auth');

    Route::get('/createPost', [PostController::class, 'create'])
    ->name('createPost')->middleware('auth');

    Route::post('/storePost', [PostController::class, 'store'])
    ->name('storePost')->middleware('auth');

    Route::get('/showPost/{id}', [PostController::class, 'show'])
    ->name('showPost');
   
});

require __DIR__.'/auth.php';
