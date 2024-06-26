<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('tasks', [TaskController::class, 'index'])->name('task.index');;
Route::get('task/{task}', [TaskController::class, 'show'])->name('task.show');;
Route::post('task', [TaskController::class, 'store'])->name('task.store');
Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::put('task/{task}', [TaskController::class, 'update'])->name('task.update');
