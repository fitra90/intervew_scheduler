<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\UsersController;
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

// 
//  Schedule CRUD
//
Route::get('/', [SchedulesController::class, 'viewAll']);
Route::get('/new-schedule', [SchedulesController::class, 'viewNew']);
Route::post('/save-new-schedule', [SchedulesController::class, 'saveNew']);
Route::post('/save-edit-schedule/{id}', [SchedulesController::class, 'saveEdit']);
Route::get('/edit-schedule/{id}', [SchedulesController::class, 'viewEdit']);
Route::delete('/delete-schedule/{id}', [SchedulesController::class, 'delete']);

// 
//  candidates CRUD
//
Route::get('/candidates', [CandidatesController::class, 'viewAll']);
Route::get('/new-candidate', [CandidatesController::class, 'viewNew']);
Route::post('/save-new-candidate', [CandidatesController::class, 'saveNew']);
Route::post('/save-edit-candidate/{id}', [CandidatesController::class, 'saveEdit']);
Route::get('/edit-candidate/{id}', [CandidatesController::class, 'viewEdit']);
Route::delete('/delete-candidate/{id}', [CandidatesController::class, 'delete']);

// 
//  user CRUD
//
Route::get('/users', [UsersController::class, 'viewAll']);
Route::get('/new-user', [UsersController::class, 'viewNew']);
Route::post('/save-new-user', [UsersController::class, 'saveNew']);
Route::post('/save-edit-user/{id}', [UsersController::class, 'saveEdit']);
Route::get('/edit-user/{id}', [UsersController::class, 'viewEdit']);
Route::delete('/delete-user/{id}', [UsersController::class, 'delete']);

//
// Login & Logout
//
Route::get('/login', [UsersController::class, 'login']);
Route::post('/process-login', [UsersController::class, 'getLogin']);
Route::get('/logout', [UsersController::class, 'logout']);