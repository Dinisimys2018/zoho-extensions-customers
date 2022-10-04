<?php

use Illuminate\Support\Facades\Route;

Route::any('requests-dto-test', [\App\Http\Controllers\RequestsDTO\PackageController::class, 'test']);
