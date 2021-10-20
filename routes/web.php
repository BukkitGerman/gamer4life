<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::middleware(['auth'])->group(function(){
    Route::prefix('/backend')->middleware(['role:admin|permission:access backend'])->group(function() {
        Route::get('/', [AdminController::class, 'index'])
            ->name('backend');

        Route::prefix('/users')->middleware(['role:admin|permission:access user management'])->group(function() {
            // GET ROUTES
            Route::get('/', [UserController::class, 'index'])
                ->name('backend.users.list');
            Route::get('/create', [UserController::class, 'create'])
                ->name('backend.users.create');


            //POST ROUTES
            Route::POST('/', [UserController::class, 'index'])
                ->name('backend.users.list.search');
        });
    });
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();


