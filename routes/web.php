<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/project/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/category/{slug}', [PortfolioController::class, 'byCategory'])->name('portfolio.category');
Route::get('/layanan', [PortfolioController::class, 'services'])->name('portfolio.services');