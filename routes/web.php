<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicApiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['calendrific.rate.limit'])->group(function () {
    Route::get('/',[PublicApiController::class, 'getHolidays'])->name('getHolidays');
});
Route::get('/insertHolidays',[PublicApiController::class, 'insertHolidays'])->name('insertHolidays');
Route::get('/displayPage',[PublicApiController::class, 'displayPage'])->name('displayPage');
Route::get('/events',[PublicApiController::class, 'showCalender']);