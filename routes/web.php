<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\InvoiceController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [InvoiceController::class,'index'])->name('invoice.index');

Route::get('/invoice', [InvoiceController::class,'index']);
Route::get('invoice/create',[InvoiceController::class,'create'])->name('invoice.create');
Route::post('invoice/store',[InvoiceController::class,'store'])->name('invoice.store');

Route::get('invoice/{id}',[InvoiceController::class,'show'])->name('invoice.show');
Route::get('invoice/{id}/calculate', [InvoiceController::class,'calculate']);

Route::get('services',[ServicesController::class, 'index'])->name('services.index');
Route::get('services/{id}',[ServicesController::class, 'show']);

