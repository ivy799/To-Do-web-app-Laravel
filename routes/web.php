<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;


Route::get('/', function () {
    return view('welcome');
});


//todo app route
Route::get('/todoApp', [TodoController::class, 'todo'])->name('todoApp');
Route::post('/todoApp', [TodoController::class, 'store'])->name('store');
Route::delete('/todoApp/{id}', [TodoController::class, 'delete'])->name('delete'); // Route for deleting a single task
Route::delete('/todoApp', [TodoController::class, 'deleteAll'])->name('deleteAll'); // Route for deleting all tasks
Route::post('/todoApp/{id}', [TodoController::class, 'update'])->name('update'); 


