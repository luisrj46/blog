<?php

use App\Http\Controllers\Admin\PostController as AdminPost;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\PhotosController as AdminPhotos;
use App\Http\Controllers\Admin\UserPermissionController as AdminPermission;
use App\Http\Controllers\Admin\RolesController as AdminRoles;
use App\Http\Controllers\Admin\PermissionsController as AdminPermissions;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\TagController;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
// DB::listen(function($query){
//     var_dump($query->sql);
// });
Route::get('/mail',function(){
    return new App\Mail\LoginCredentials(User::first(),'ewrwrewer');
});
Route::get('/', [PosController::class, 'index'])->name('inicio');
Route::get('/nosotros', [PosController::class, 'about'])->name('inicio.nosotros');
Route::get('/archivos', [PosController::class, 'archive'])->name('inicio.archivos');
Route::get('/contactos', [PosController::class, 'contact'])->name('inicio.contactos');

Route::get('/post/{post}', [PosController::class, 'show'])->name('post.ver');
Route::get('posts/categories/{category}', [CategoryController::class, 'show'])->name('category.ver');
Route::get('posts/tags/{tag}', [TagController::class, 'show'])->name('tag.ver');


Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Route::resource('posts', 'AdminPost::class',['except'=>'show']);
    Route::name('admin')->resource('user', AdminUser::class);
    Route::name('admin')->resource('permissions', AdminPermissions::class)->only(['index','edit','update']);
    Route::name('admin')->resource('role', AdminRoles::class)->except(['show']);
    Route::name('admin')->resource('post', AdminPost::class,)->except(['show']);

    // Route::name('admin')->resource('roles',UserRoleController::class);//->only('update');
    // Route::get('/post', [AdminPost::class, 'index'])->name('admin.post.index');
    // Route::get('/post.crear', [AdminPost::class, 'create'])->name('admin.post.crear');
    // Route::post('/post', [AdminPost::class, 'store'])->name('admin.post.store');
    // Route::get('/post/{post}', [AdminPost::class, 'edit'])->name('admin.post.edit');
    // Route::put('/post/{post}', [AdminPost::class, 'update'])->name('admin.post.update');
    // Route::delete('/post/{post}', [AdminPost::class, 'destroy'])->name('admin.post.destroy');

    Route::middleware('role:Admin')->put('/roles/{user}/roles',[AdminRoles::class, 'update'])->name('admin.roles.update');
    Route::middleware('role:Admin')->put('/roles/{user}/permission',[AdminPermission::class, 'update'])->name('admin.permission.update');

    Route::post('/posts/{post}/photos', [AdminPhotos::class, 'store'])->name('admin.post.photos.store');

    Route::delete('/posts/{photo}', [AdminPhotos::class, 'destroy'])->name('admin.photo.destroy');
        // Matches The "/admin/users" URL
        Route::get('/dashboard', function () {
            return view('admin.dasboard');
        })->middleware(['auth'])->name('dashboard');

});


require __DIR__.'/auth.php';
