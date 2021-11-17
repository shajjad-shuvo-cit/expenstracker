<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\SubCatagoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseReportController;

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

//Routes For Catagory
Route::middleware(['auth'])->group(function(){
    Route::get('/catagory/add',[CatagoryController::class,'create'])->name('catagory.create');
    Route::post('/catagory/store',[CatagoryController::class,'store'])->name('catagory.store');
    Route::get('/catagory/view',[CatagoryController::class,'index'])->name('catagory.index');
    Route::get('/catagory/deactive/{id}',[CatagoryController::class,'deactive'])->name('catagory.deactive');
    Route::get('/catagory/active/{id}',[CatagoryController::class,'active'])->name('catagory.active');
    Route::get('/catagory/delete/{id}',[CatagoryController::class,'delete'])->name('catagory.delete');
    Route::get('/catagory/trash',[CatagoryController::class,'trash'])->name('catagory.trashed');
    Route::get('/catagory/restore/{id}',[CatagoryController::class,'restore'])->name('catagory.restore');
    Route::get('/catagory/forcedelete/{id}',[CatagoryController::class,'forcedelete'])->name('catagory.forcedelete');
    Route::get('/catagory/edit/{id}',[CatagoryController::class,'edit'])->name('catagory.edit');
    Route::post('/catagory/update',[CatagoryController::class,'update'])->name('catagory.update');
});

//Routes For Sub Catagory
Route::middleware(['auth'])->group(function(){
    Route::get('/subcatagory/add',[SubCatagoryController::class,'create'])->name('subcatagory.create');
    Route::post('/subcatagory/store',[SubCatagoryController::class,'store'])->name('subcatagory.store');
    Route::get('/subcatagory/view',[SubCatagoryController::class,'index'])->name('subcatagory.index');
    Route::get('/subcatagory/deactive/{id}',[SubCatagoryController::class,'deactive'])->name('subcatagory.deactive');
    Route::get('/subcatagory/active/{id}',[SubCatagoryController::class,'active'])->name('subcatagory.active');
    Route::get('/subcatagory/delete/{id}',[SubCatagoryController::class,'delete'])->name('subcatagory.delete');
    Route::get('/subcatagory/trash',[SubCatagoryController::class,'trash'])->name('subcatagory.trashed');
    Route::get('/subcatagory/restore/{id}',[SubCatagoryController::class,'restore'])->name('subcatagory.restore');
    Route::get('/subcatagory/forcedelete/{id}',[SubCatagoryController::class,'forcedelete'])->name('subcatagory.forcedelete');
    Route::get('/subcatagory/edit/{id}',[SubCatagoryController::class,'edit'])->name('subcatagory.edit');
    Route::post('/subcatagory/update',[SubCatagoryController::class,'update'])->name('subcatagory.update');
});

//Routes For Expenses
Route::middleware(['auth'])->group(function(){
    Route::get('/expense/add',[ExpenseController::class,'create'])->name('expense.create');
    Route::post('/expense/getsubcatagory',[ExpenseController::class,'getsubcatagory']);
    Route::post('/expense/store',[ExpenseController::class,'store'])->name('expense.store');
    Route::get('/expense/view',[ExpenseController::class,'index'])->name('expense.index');
    Route::get('/expense/report/view',[ExpenseReportController::class,'index'])->name('expense.report');
    Route::post('/expense/catagory/report',[ExpenseReportController::class,'catagorytable']);
});
