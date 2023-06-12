<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\HistoryController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Frontend\LandingController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/', [LandingController::class, 'landing'])->name('landing');
Route::get('/profile', [LandingController::class, 'profile'])->name('profile')->middleware(['auth', 'Only_customer']);
Route::get('/allbook', [LandingController::class, 'allbook'])->name('allbook');
Route::get('allbook/view/{id}', [LandingController::class, 'viewallbook'])->name('allbook.view');
Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');

Route::middleware('Only_guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postregister'])->name('postregister');
});


Route::middleware('Only_admin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware(['auth', 'Only_admin']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // user
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users-inactive', [UserController::class, 'inactive'])->name('user.inactive');
    Route::put('/users/activate{user}', [UserController::class, 'activate'])->name('user.activate');
    Route::get('users/view/{id}', [UserController::class, 'view'])->name('user.view');

    // category
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // book
    Route::get('books', [BookController::class, 'index'])->name('book.index');
    Route::get('books/create', [BookController::class, 'create'])->name('book.create');
    Route::get('books/view/{id}', [BookController::class, 'view'])->name('book.view');
    Route::post('books/store', [BookController::class, 'store'])->name('book.store');
    Route::get('books/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('books/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('books/delete/{id}', [BookController::class, 'delete'])->name('book.delete');

    // history
    Route::get('/histories', [HistoryController::class, 'index'])->name('history.index');
    Route::get('histories/create', [HistoryController::class, 'create'])->name('history.create');
    Route::post('histories/store', [HistoryController::class, 'store'])->name('history.store');
    Route::get('histories/return', [HistoryController::class, 'return'])->name('history.return');
    Route::post('histories/return/save', [HistoryController::class, 'returnSave'])->name('history.return.save');
});
