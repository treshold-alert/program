<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::put('/products/{id}/update-stock', [ProductController::class, 'updateStock'])->name('products.updateStock');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/', [ProductController::class, 'viewProduct'])->name('products.view');
Route::post('/products/add', [ProductController::class, 'addProduct'])->name('products.add');
Route::put('/products/{id}', [ProductController::class, 'editProduct'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct'])->name('products.destroy');
Route::post('/products/stock-in', [ProductController::class, 'stockIn'])->name('products.stock-in');
Route::post('/products/stock-out', [ProductController::class, 'stockOut'])->name('products.stock.out');


Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.view');

Route::get('/log', [LogController::class, 'showLog'])->name('log.view');



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/page', function () {
    return view('page');
})->name('page');

require __DIR__ . '/auth.php';
