<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/dashboard', function () {
    return redirect(route('product.index'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/admin', function () {
    return redirect(route('product.index'));
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show')->middleware('auth.customer');
Route::get('/preview-pesanan/{id_product}', [ProductController::class, 'previewPesanan'])->name('preview-pesanan')->middleware('auth.customer');
Route::post('/product/checkout', [TransactionController::class, 'checkout'])->name('product.checkout')->middleware('auth.customer');
Route::get('/customerorder', [TransactionController::class, 'customerorder'])->name('order.show')->middleware('auth.customer');
Route::get('/detailcustomerorder', [TransactionController::class, 'detailcustomerorder'])->name('detail.order.show')->middleware('auth.customer');

Route::middleware('auth')->group(function () {
    Route::get('/order', [TransactionController::class, 'listOrder'])->name('order.index');
    Route::patch('/order/{id}/complete', [TransactionController::class, 'complete'])->name('order.complete');

});

Route::middleware('auth')->group(function () {
    Route::get('/history', [TransactionController::class, 'listHistory'])->name('history.index');

});

Route::middleware('auth')->group(function () {
    Route::get('/chat', [MessageController::class, 'index'])->name('chat.index');
    Route::get('/chat/{customer}', [MessageController::class, 'show'])->name('chat.show');
    Route::post('/chat/send', [MessageController::class, 'send'])->name('chat.send');
    Route::get('/chat/messages/{customer}', [MessageController::class, 'messages']);
});

// -----------------------------login----------------------------------------//
Route::get('/customerlogin', [App\Http\Controllers\CustomerAuthController::class, 'login'])->name('customerlogin');
Route::post('/customerlogin', [App\Http\Controllers\CustomerAuthController::class, 'authenticate'])->name('customerlogin');
Route::post('/customerlogout', [App\Http\Controllers\CustomerAuthController::class, 'logout'])->name('customerlogout');

// ------------------------------ register ---------------------------------//
Route::get('/customerregister', [App\Http\Controllers\CustomerRegisterController::class, 'register'])->name('customerregister');
Route::post('/customerregister', [App\Http\Controllers\CustomerRegisterController::class, 'storeUser'])->name('customerregister');

Route::get('storage/products/{filename}', function ($filename) {
    $path = storage_path('app/public/products/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }

    $response = Response::file($path);
    $response->headers->set('Access-Control-Allow-Origin', '*');

    return $response;
});
