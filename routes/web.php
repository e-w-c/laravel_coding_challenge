<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/image/{image_id}', [HomeController::class, 'image']);
Route::get('/image', [HomeController::class, 'noImageId']);

Route::post('/image/{image_id}', [VoteController::class, 'postVote']);
Route::get('/results/{field?}', [VoteController::class, 'results']);