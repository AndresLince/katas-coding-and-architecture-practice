<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatasController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', [KatasController::class, 'index']);
Route::get('/employee', [EmployeeController::class, 'index']);

Route::post('/posts', function () {
    return view('posts');
});
Route::post('/patch', function () {
    return view('posts');
});
