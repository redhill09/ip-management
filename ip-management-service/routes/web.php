<?php

use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IpAddressController;

//Auth
Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

//IpAddress
Route::get('/ipaddress', [IpAddressController::class, 'index']);
Route::get('/ipaddress/create', [IpAddressController::class, 'create']);
Route::post('/ipaddress/store', [IpAddressController::class, 'store']);
Route::get('/ipaddress/edit/{id}', [IpAddressController::class, 'edit']);
Route::post('/ipaddress/update/{id}', [IpAddressController::class, 'update']);
Route::get('/ipaddress/delete/{id}', [IpAddressController::class, 'destroy']);

//Audit Logs
Route::prefix('audit-logs')->middleware('role:super-admin')->group(function () {
    Route::get('/', [AuditLogController::class, 'index'])->name('audit-logs.index');
});
