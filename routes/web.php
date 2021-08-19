<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','has.permission']],function(){
    Route::resource('departments',DepartmentController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('leaves',LeaveController::class);

    Route::resource('notices',NoticeController::class);
    //Route::get("leaves/view",[LeaveController::class,'view'])->name('leaves.recent');
    Route::post('leaves/{leave}/accept',[App\Http\Controllers\LeaveController::class,'accept'])->name('leave.accept');
    Route::post('leaves/{leave}/reject',[App\Http\Controllers\LeaveController::class,'reject'])->name('leave.reject');

    Route::get('/', function () {
        return view('welcome');
    });

});


