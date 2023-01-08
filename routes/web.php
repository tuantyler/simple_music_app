<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as admin;


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

Route::get('login', [admin::class , "login"])->name("login");
Route::post('login' , [admin::class , "postLogin"])->name("postLogin");
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/' , [admin::class , "index"])->name("adminIndex");
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route("login");
    })->name("logout");
});


// Route::get('create_account/{username}/{password}', [admin::class , "createAccount"]);

Route::get('/', function(){
    return "This is homepage";
});