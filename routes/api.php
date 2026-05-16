<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionApiController;

Route::post('/transactions', [
    TransactionApiController::class,
    'store'
]);