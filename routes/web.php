<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

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
    //redirect to login form
    return redirect('login');
});

Route::middleware('guest')->group(function () {
    //show login form
    Route::get('/login', [AuthController::class, 'showLogin'])->name("login");
});

Route::middleware('auth')->controller(CrewController::class)->group(function () {
    //show the dashboard
    Route::get('/dashboard','dashboard')->name("dashboard");
    Route::get('/crewInfo/{id}','show')->name("showCrew");
    Route::get('/editCrewInfo/{id}','edit')->name("editCrew");
    Route::get('/createCrewInfo','create')->name("createCrewInfo");
    Route::post('/saveCrewInfo','store')->name("saveCrewInfo");
    Route::put('/updateCrewInfo/{id}','update')->name("updateCrewInfo");
    Route::delete('/deleteCrew/{id}','destroy')->name("deleteCrew");
});

Route::middleware('auth')->controller(DocumentController::class)->group(function () {
    //show the dashboard
    Route::delete('/deleteDocument/{id}','destroy')->name("deleteDocument");
    Route::get('/createDocument/{crew_id}','create')->name("createDocument");
    Route::post('/saveDocument','store')->name("saveDocument");
    Route::get('/documentInfo/{id}','show')->name("showDocument");
    Route::get('/editDocumentInfo/{id}','edit')->name("editDocument");
    Route::put('/updateDocumentInfo/{id}','update')->name("updateDocumentInfo");
});



Route::controller(AuthController::class)->group(function() {
    Route::post('/authenticate', 'authenticateLogin')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/userList','index')->name("userList");
        Route::get('/userShow/{id}','show')->name("userShow");
        Route::delete('/userDelete/{id}','destroy')->name("userDelete");
    });

    Route::get('/userAdd','create')->name("userAdd");
    Route::post('/userSave','store')->name("userSave");
});

