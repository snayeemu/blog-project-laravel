<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/categories', [CategoryController::class, 'index'])->name('categories_index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories_create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories_store');


Route::get('/lists', [ListController::class, 'index'])->name("lists_index");
Route::get('/lists/create', [ListController::class, 'create'])->name("list_create");
Route::post("/lists", [ListController::class, 'store'])->name("lists_store");
Route::get("/lists/edit/{list_id}", [ListController::class, 'edit'])->name("lists_edit");
Route::post("list/edit", [ListController::class, 'update'])->name("lists_update");
Route::delete("lists/{task_id}", [ListController::class, 'destroy'])->name("lists_delete");

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');