<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/* 
    Public Route
*/

//Auth
Route::post('/register', [AuthController::class, 'registerUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/admin/login', [AuthController::class, 'loginAdmin']);
Route::post('/admin/register', [AuthController::class, 'registerAdmin']);

//Destination
Route::get('/destination', [DestinationController::class, 'index']);
Route::get('/destination/{id}', [DestinationController::class, 'show']);
Route::get('/destination/{name}', [DestinationController::class, 'search']);

//Protected Route
Route::group(['middleware' => ['auth:sanctum']], function () {
    //destination
    Route::post('/destination/{id}', [DestinationController::class, 'update']);
    Route::delete('/destination/{id}', [DestinationController::class, 'delete']);
    Route::post('/destination', [DestinationController::class, 'store']);
    Route::put('/destination/{id}', [DestinationController::class, 'update']);

    //user details
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::get('/user', [UserController::class, 'index']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    //plan
    Route::get('/plan/{id}', [PlanController::class, 'showUserPlan']);
    Route::post('/plan', [PlanController::class, 'store']);

    Route::delete('/plan/{id}', [PlanController::class, 'delete']);
});

Route::post('/user/{user}/plan', [UserController::class, 'addPlan']);
Route::get('/user/{user}/plan', [UserController::class, 'showPlan']);
