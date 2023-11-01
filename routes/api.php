<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\api\UserController;

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

Route::middleware('auth:sanctum')->middleware("can:user")->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("login", [ApiLoginController::class, "login"]);

Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::post("logout", [ApiLoginController::class, "logout"]);
});

Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::get("user", [UserController::class, "show"]);
    Route::put("edit", [UserController::class, "update"]);
    Route::delete("delete", [UserController::class, "destroy"]);
});