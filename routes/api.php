<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('rol-show',[RolesController::class,'show'] )->name('rol-show');
Route::get('get.roles',[RolesController::class,'getRoles'] )->name('get.roles');
Route::post('user-show',[RolesController::class,'showUser'])->name('user-show');
Route::get('tipos-estudios',[DashboardController::class,'getTiposEstudios'])->name('tipos-estudios');
Route::get('count.estudios',[DashboardController::class,'countEstudios'])->name('count.estudios');
Route::post('get.items',[DashboardController::class,'getItems'])->name('get.items');
Route::get('clave.reset', function () {
    return view('sessions.password.reset');
})->name('clave.reset');
Route::post('reset-password-2', [DashboardController::class, 'reset'])->middleware('guest')->name('password.update.2');
