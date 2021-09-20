<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShorturlController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('generate-short-url', [ShorturlController::class, 'generateShortUrl']);

Route::get('short/{code}', [ShorturlController::class, 'shortenUrl']);

Route::get('short-look-up/{code}', [ShorturlController::class, 'shortenUrlLookedUp']);

