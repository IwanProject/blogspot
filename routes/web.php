<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home', [
        'title' => 'Home',
        'categories' => Category::all(),
        'post' => Post::where('published_at', '=',1)->get(),
        'news' =>Post::where('published_at', '=',1)->latest()->filter(request(['search','category','author']))->paginate(3)->withQueryString(),
        'first' => Post::where('published_at', '=',1)->latest()->first()


    ]);
});

Route::get('/page', function () {
    return view('page', [
        'title' => 'Search',
        'categories' => Category::all(),
        'news' =>Post::latest()->filter(request(['search','category','author']))->paginate(3)->withQueryString(),



    ]);
});

Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => $category->name ,
        'categories' => Category::all()
    ]);
});

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function(){
    return view('dashboard.index', ['title' => 'Dashboard','posts' => Post::count(),'categories'=> Category::count(), 'users'=> User::count()]);
})->middleware('admin');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/account', AccountController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/users', UsersController::class)->middleware('admin');

Route::get('dashboard/post_review',[ReviewController::class, 'index']);
Route::post('dashboard/post_review/publish',[ReviewController::class, 'publish']);
Route::post('dashboard/post_review/unpublish',[ReviewController::class, 'unpublish']);

Route::get('dashboard/comments_review',[ReviewController::class, 'comments_review']);
Route::post('dashboard/comments_review/publish',[ReviewController::class, 'comments_publish']);
Route::post('dashboard/comments_review/unpublish',[ReviewController::class, 'comments_unpublish']);


Route::get('dashboard/comments',[CommentsController::class, 'index']);
