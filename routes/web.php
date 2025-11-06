<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;

Route::prefix('{company}/{driver}')->group(function () {

    Route::get('/', [QRController::class, 'form'])->name('form');

    Route::post('/qr', [QRController::class, 'generateQR'])->name('generateQR');

});
