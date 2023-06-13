<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
include(app_path().'/global_constants.php');

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

Route::get('/', [TodoController::class, 'index'])->name('index');
Route::post('/', [TodoController::class, 'add'])->name('add');
Route::post('/updatestatus/{id}',[TodoController::class,'updatestatus'])->name('updatestatus');
Route::get("delete/{id}", [TodoController::class, 'delete'])->name('delete');

