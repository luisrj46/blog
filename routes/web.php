<?php

use App\Http\Controllers\Admin\PostController as AdminPost;
use App\Http\Controllers\PosController;
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

Route::get('/', [PosController::class, 'index'])->name('inicio');
Route::get('/post/{post}', [PosController::class, 'show'])->name('post.ver');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/post', [AdminPost::class, 'index'])->name('admin.post.index');
    Route::get('/post.crear', [AdminPost::class, 'create'])->name('admin.post.crear');
    Route::post('/post', [AdminPost::class, 'store'])->name('admin.post.store');
        // Matches The "/admin/users" URL
});

Route::get('/dashboard', function () {
    return view('admin.dasboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
