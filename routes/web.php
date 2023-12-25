<?php


use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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
    // $posts = [];
    // if (auth()->check()) {
    //     $posts = auth()->user()->usersCoolPosts()->latest()->get();
    // }
    $posts = Post::all();
    return view('home', ['posts' => $posts]);
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


// route for our blog
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Blog post related routes
Route::get('/login', function () {
    
    return view('login');
});
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);