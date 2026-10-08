<?php

use App\Http\Controllers\SignatureController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SignatureController::class, 'index']);

Route::get('/templates', [SignatureController::class, 'templates']);

Route::post(
    '/upload',
    [SignatureController::class, 'upload']
);

Route::post(
    '/generate',
    [SignatureController::class, 'generate']
);
