<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShippingCostController;



Route::get('/v1/list', [ShippingCostController::class, 'list'])->name('api.view');