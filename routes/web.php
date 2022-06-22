<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
})->name('top');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('post/mypost', [PostController::class, 'mypost'])->name('post.mypost');
Route::resource('post', PostController::class);
Route::post('/post/preview',  [PostController::class, 'preview'])->name('post.preview');
/*
Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
*/
Route::post('post/comment/store', [CommentController::class, 'store'])->name('comment.store');
// お問い合わせ
Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
// 管理者画面
Route::middleware(['can:admin'])->group(function(){
    Route::get('profile/index', [ProfileController::class, 'index'])->name('profile.index');
});