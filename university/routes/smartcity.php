<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('getData', [EventController::class, 'getData']);
