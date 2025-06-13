<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\ProfileCustomerController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/product/getAll', [ProductController::class, 'getAll'])->name('api.product.getAll');
    Route::get('/product/{id}', [ProductController::class, 'getById'])->name('api.product.getById');

    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('api.checkout');

    Route::get('/listOrder', [TransactionController::class, 'listOrder'])->name('api.listOrder');

    Route::get('/listHistory', [TransactionController::class, 'listHistory'])->name('api.listHistory');

    Route::patch('/transaction/{id}/complete', [TransactionController::class, 'complete'])->name('api.transaction.complete');

    Route::get('/customers', [ProfileCustomerController::class, 'getAll'])->name('api.customers.getAll');
    Route::post('/customers', [ProfileCustomerController::class, 'create'])->name('api.customers.create');
    Route::get('/customers/{id}', [ProfileCustomerController::class, 'getById'])->name('api.customers.getById');
    Route::post('/customers', [ProfileCustomerController::class, 'update2'])->name('api.customers.update');
    Route::delete('/customers/{id}', [ProfileCustomerController::class, 'delete'])->name('api.customers.delete');

    Route::post('/message/send', [MessageController::class, 'send'])->name('api.message.send');
    Route::get('/message/chat', [MessageController::class, 'getChat'])->name('api.message.getChat');
});
