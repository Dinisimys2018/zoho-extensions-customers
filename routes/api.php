<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Zoho\MarketController;

Route::prefix('zoho')
    ->group(function () {
        Route::prefix('market')
            ->controller(MarketController::class)
            ->group(function () {
                Route::get('install', 'install');
                Route::get('uninstall', 'uninstall');
                Route::get('purchase', 'purchase');
                Route::get('downgrade', 'downgrade');
            });
    });
