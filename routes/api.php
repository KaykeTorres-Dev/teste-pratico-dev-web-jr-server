<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/get-users', [UserController::class, 'index']); // GET - http://127.0.0.1:8000/api/get-users
Route::get('/get-user/{user}', [UserController::class, 'show']); // GET - http://127.0.0.1:8000/api/get-user/1
Route::post('/create-user', [UserController::class, 'store']); // POST - http://127.0.0.1:8000/api/create-user/
Route::put('/update-user/{user}', [UserController::class, 'update']); // PUT - http://127.0.0.1:8000/api/update-user/1
Route::delete('/delete-user/{user}', [UserController::class, 'destroy']); // DELETE - http://127.0.0.1:8000/api/delete-user/1


