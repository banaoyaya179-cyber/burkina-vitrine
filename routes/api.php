<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegionController;

Route::get('/regions',        [RegionController::class, 'index']);
Route::get('/regions/{slug}', [RegionController::class, 'show']);
Route::get('/search',         [RegionController::class, 'search']);
Route::get('/stats',          [RegionController::class, 'stats']);
