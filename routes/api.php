<?php

use App\Http\Controllers\AptekaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MuolajaController;
use App\Http\Controllers\SkladController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('register',[AuthController::class,'register'])->name('register');
// Route::post('login',[AuthController::class,'login'])->name('login');

// Route::middleware('auth:sanctum')->group(function(){

Route::get('index',[ClientController::class,'index']);
Route::post('create',[ClientController::class,'create']);
Route::put('update/{id}',[ClientController::class,'update']);
Route::delete('delete/{id}',[ClientController::class,'delete']);

Route::get('indexMuolaja',[MuolajaController::class,'indexMuolaja']);
Route::post('createMuolaja',[MuolajaController::class,'createMuolaja']);
Route::put('updateMuolaja/{id}',[MuolajaController::class,'updateMuolaja']);
Route::delete('deleteMuolaja/{id}',[MuolajaController::class,'deleteMuolaja']);

Route::post('service',[TransactionController::class,'service']);
Route::get('indexTrans',[TransactionController::class,'indexTrans']);

Route::get('indexApt',[AptekaController::class,'indexApt']);
Route::post('createApt',[AptekaController::class,'createApt']);
Route::put('updateApt/{id}',[AptekaController::class,'updateApt']);
Route::delete('deleteApt/{id}',[AptekaController::class,'deleteApt']);

Route::get('indexSklad',[SkladController::class,'indexSklad']);
Route::post('buyApteka',[SkladController::class,'buyApteka']);

// });

