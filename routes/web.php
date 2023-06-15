<?php

use App\Http\Controllers\TradeController;
use App\Http\Controllers\RegisterController;
use App\Models\Papertrade;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('register-page', [RegisterController::class, 'registerPage']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [TradeController::class, 'view'])->name('dashboard');

    // form save function
    Route::post('save-trade', [TradeController::class, 'saveTrade']);
    Route::get('list-data', [TradeController::class, 'listData']);

    //    edit route
    Route::get('edit-trade/{id}', [TradeController::class, 'editTrade']);
    // update form
    Route::post('update-trade', [TradeController::class, 'updateTrade']);
    //delete route
    Route::get('delete-trade/{id}', [TradeController::class, 'deleteTrade']);

    //history route
    Route::get('closed-trade', [TradeController::class, 'closedData']);
});
