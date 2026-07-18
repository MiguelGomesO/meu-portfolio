<?php

use App\Http\Controllers\FaviconController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index']);

Route::get('/favicon.svg', [FaviconController::class, 'svg']);
Route::get('/favicon.ico', [FaviconController::class, 'png']);
