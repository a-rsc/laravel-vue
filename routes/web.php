<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueController;

Route::get('/lessons/{page?}', VueController::class);
