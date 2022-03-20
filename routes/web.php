<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Company Resource
Route::resource('company', CompanyController::class)->middleware('auth');
Route::get('company/{id}/delete',[CompanyController::class,'destroy'])->middleware('auth');
// Employee Resource
Route::resource('employee', EmployeeController::class)->middleware('auth');
Route::get('employee/{id}/delete',[EmployeeController::class,'destroy'])->middleware('auth');
