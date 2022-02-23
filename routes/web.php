<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShippingCostController;


Route::get('/', function () {
    return redirect()->route('shipping.index');
});


Route::resource('shipping', ShippingCostController::class);