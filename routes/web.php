<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HolidayController;

Route::get('/', [HolidayController::class, 'index'])->name('holidays.index');
Route::post('/fetch-holidays', [HolidayController::class, 'fetchHolidays'])->name('holidays.fetch');
