<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users',  App\Http\Controllers\UsersController::class);

Route::get('schedules/user/{id}',[App\Http\Controllers\SchedulesController::class, 'viewUserSchedules'])->name('schedules.viewUserSchedules');
Route::resource('schedules',  App\Http\Controllers\SchedulesController::class);
Route::resource('subjects',  App\Http\Controllers\SubjectsController::class);
Route::resource('userSchedules',  App\Http\Controllers\UserScheduleController::class);
Route::resource('roles',  App\Http\Controllers\RolesController::class);
Route::resource('userRoles',  App\Http\Controllers\UserRoleController::class);

