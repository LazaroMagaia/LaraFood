<?php

use App\Http\Controllers\Admin\DetailPansController;
use App\Http\Controllers\Admin\PlansController;
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
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    /**
     * Routes detail plans
     */
    Route::get('plans/{url}/details/create',[DetailPansController::class,'create'])
    ->name('plan.details.create');
    Route::delete('plans/{url}/details/{idDetail}',[DetailPansController::class,'destroy'])
    ->name('plan.details.destroy');
    Route::get('plans/{url}/details/{idDetail}',[DetailPansController::class,'show'])
    ->name('plan.details.show');
    Route::put('plans/{url}/details/{idDetail}',[DetailPansController::class,'update'])
    ->name('plan.details.update');
    Route::get('plans/{url}/details/{idDetail}/edit',[DetailPansController::class,'edit'])
    ->name('plan.details.edit');
    Route::post('plans/{url}/details',[DetailPansController::class,'store'])
    ->name('plan.details.store');
    Route::get('plans/{url}/details',[DetailPansController::class,'index'])
    ->name('plan.details.index');


    /**
     * Plans route
     */
    Route::get('plans/create',[PlansController::class,'create'])->name('plans.create');
    Route::put('plans/{url}',[PlansController::class,'update'])->name('plans.update');
    Route::get('plans/{url}/edit',[PlansController::class,'edit'])->name('plans.edit');
    Route::get('/',[PlansController::class,'index'])->name('admin.index');
    Route::any('plans/search',[PlansController::class,'search'])->name('plans.search');
    Route::post('plans',[PlansController::class,'store'])->name('plans.store');
    Route::get('plans/{url}',[PlansController::class,'show'])->name('plans.show');
    Route::delete('plans/{url}',[PlansController::class,'destroy'])->name('plans.destroy');
    Route::get('plans',[PlansController::class,'index'])->name('plans.index');

    /**
     *Dashboard
     */
});
