<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

// Регистрация
Route::post('/reg', [UserController::class, 'create']);
// Авторизация
Route::post('/login', [AuthController::class, 'login']);
// Выход
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);


              // Функционал администратора \\

Route::middleware(['auth:api', 'role:admin'])->group(function () {

    // Просмотр списка всех сотрудников
    Route::get('/users', [UserController::class, 'index']);

    // Запрос на изменение данных сотрудника
    Route::patch('/users/{id}', [UserController::class, 'update']);

    // Добавление сотрудника
    Route::post('/user/add', [UserController::class, 'add']);

    // Добавление карточки товара
    Route::post('/products', [ProductController::class, 'create']);

    // Редактирование карточки товара
    Route::patch('/products/edit/{id}', [ProductController::class, 'update']);

    // Удаление карточки товара
    Route::delete('/products/{id}', [ProductController::class, 'delete']);
});


              // Функционал кондитера и курьера \\

Route::middleware(['auth:api', 'role:confectioner|delivery'])->group(function () {

    //  позволяет просматривать все заказы
    Route::get('/orders', [OrderController::class, 'index']);

    // Изменение статуса заказа
    Route::patch('/orders/{id}/change-status', [OrderController::class, 'update']);
});


              // Функционал курьера \\

Route::middleware(['auth:api', 'role:delivery'])->group(function () {

    // просмотр пользовательских данных
    Route::get('/orders/{id}',[OrderController::class,'show']);
});

              // Функционал пользователя \\

Route::middleware(['auth:api', 'role:user'])->group(function () {

    // оформление заказа \\
    Route::post('/order-create',[OrderController::class,'AddList']);
});



Route::get('/roles', [RoleController::class, 'index']);
Route::post('/roles', [RoleController::class, 'create']);
Route::post('/category', [CategoryController::class, 'create']);
Route::get('/product', [ProductController::class, 'index']);


