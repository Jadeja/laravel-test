<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/',[HomeController::class,'home']);
Route::get('/add',[HomeController::class,'add'])->name('add');
Route::get('/add-project',[HomeController::class,'addProject'])->name('add-project');
Route::post('/store',[HomeController::class,'store'])->name('store');
Route::post('/store-project',[HomeController::class,'storeProject'])->name('store-project');
Route::post('/update/{id}',[HomeController::class,'update'])->name('update');
Route::post('/reorder-list',[HomeController::class,'reorderList'])->name('reorder-list');
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('edit');
Route::post('/delete/{id}',[HomeController::class,'delete'])->name('delete');
Route::post('/project-wise-list',[HomeController::class,'ProjectWiseList'])->name('project-wise-list');

