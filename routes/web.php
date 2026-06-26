<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;

Route::get('/assinatura', [SignatureController::class, 'index']);
Route::post('/assinatura/upload', [SignatureController::class, 'upload']);
Route::get('/', function () {
    return view('welcome');
});
