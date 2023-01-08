<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/save-register', [AuthController::class, 'saveregister'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/', [UserDashboardController::class, 'dashboard']);

Route::middleware('auth')->group(
    function () {
        Route::get('/user-book-detail/{id}', [UserDashboardController::class, 'userbookdetail']);
        Route::get('/mytransaction', [UserDashboardController::class, 'mytransaction']);
        Route::post('/transaction-store', [TransactionController::class, 'store']);
    }
);



Route::middleware(['auth', 'must-admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'dashboard']);

    Route::get('/books', [BookController::class, 'index']);
    Route::post('/book-store', [BookController::class, 'store']);
    Route::get('/book/{id}', [BookController::class, 'show']);
    Route::get('/book-edit/{id}', [BookController::class, 'edit']);
    Route::put('/book-update/{id}', [BookController::class, 'update']);
    Route::delete('/book-delete/{id}', [BookController::class, 'destroy']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/category-store', [CategoryController::class, 'store']);
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/category-update/{id}', [CategoryController::class, 'update']);
    Route::delete('/category-delete/{id}', [CategoryController::class, 'destroy']);

    Route::get('/students', [UserController::class, 'index']);
    Route::delete('/student-delete/{id}', [UserController::class, 'destroy']);

    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::put('/transaction-accept/{id}', [TransactionController::class, 'accept']);
    Route::put('/transaction-denied/{id}', [TransactionController::class, 'denied']);
});
