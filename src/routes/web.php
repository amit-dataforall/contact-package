<?php

use Avalon\Contact\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('contact', [ContactController::class, 'index'])->name('contact');

Route::post('contact', [ContactController::class, 'send']);