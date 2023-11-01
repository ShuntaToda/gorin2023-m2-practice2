<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Models\User;
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


Route::group(["middleware" => ["noStore"]], function(){

    Route::get("login", [LoginController::class, "index"])->name("login")->middleware("guest");
    Route::post("login", [LoginController::class, "login"]);
    Route::get("logout", [LoginController::class, "logout"])->name("logout")->middleware("auth");
    
    Route::group(["middleware" => ["auth", "is_active"]], function(){
        Route::get("/", function(){
            $users = User::all();
            return view("home", compact("users"));
        })->name("home");
    
        // prefixとasが出てこなかった
        Route::group([["middleware" => ["can:admin"]],"prefix" => "admin", "as" => "admin."], function(){
            Route::get("user/create", [AdminController::class, "createUser"])->name("createUserForm");
            Route::post("user/create", [AdminController::class, "storeUser"])->name("createUser");
            // Route::get("user/{id}", [AdminController::class, "show"])->name("show");
            Route::delete("user/{id}", [AdminController::class, "deleteUser"])->name("deleteUser");
            Route::get("user/edit/{id}", [AdminController::class, "editUser"])->name("editUser");
            Route::get("user/{id}", [AdminController::class, "show"])->name("showUser");
            Route::put("user/edit/{id}", [AdminController::class, "updateUser"])->name("updateUser");
        });
    });
});