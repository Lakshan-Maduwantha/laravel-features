<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\QuotationController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/prescription/upload', [PrescriptionController::class, 'upload'])->name('prescription.upload');
Route::get('/prescriptions/upload', [PrescriptionController::class, 'showUploadForm'])->name('prescriptions.upload.form');


Route::get('/register-pharmacy', [PharmacyController::class, 'showRegistrationForm'])->name('pharmacy.register');
Route::post('/register-pharmacy', [PharmacyController::class, 'register']);


Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('index');


Route::post('/quotation/create/{prescription}', [QuotationController::class, 'create'])->name('quotation.create');


Route::post('/quotation/accept/{prescription}', [QuotationController::class, 'accept'])->name('quotation.accept');
Route::post('/quotation/reject/{prescription}', [QuotationController::class, 'reject'])->name('quotation.reject');
