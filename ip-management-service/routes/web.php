<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IpAddressController;

Route::get('/ipaddress', [IpAddressController::class, 'index']);
Route::get('/ipaddress/create', [IpAddressController::class, 'create']);
Route::post('/ipaddress/store', [IpAddressController::class, 'store']);
Route::get('/ipaddress/show/{id}', [IpAddressController::class, 'show']);
Route::post('/ipaddress/update/{id}', [IpAddressController::class, 'update']);
