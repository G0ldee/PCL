<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'create']);
Route::get('/logout', [UserController::class, 'create']);
Route::get('//home/', [UserController::class, 'create_home']);
Route::get('/docsearch', [UserController::class, 'document_search']);
Route::get('/newuser', [UserController::class, 'new_user']);
Route::get('/newmember', [UserController::class, 'new_member']);
Route::get('/loanpage', [UserController::class, 'show_loan_page']);
Route::get('/newloan', [UserController::class, 'create_new_loan_page']);
Route::get('/newrequest', [UserController::class, 'show_request_form']);
Route::get('/returnform', [UserController::class, 'show_return_form']);
Route::get('/processrequestpage', [UserController::class, 'process_request_page']);
Route::get('/tablespage', [UserController::class, 'show_tables_page']);

Route::post('/home', [UserController::class, 'login']);
Route::post('/search', [UserController::class, 'search']);
Route::post('/createuser', [UserController::class, 'create_user']);
Route::post('/createmember', [UserController::class, 'create_member']);
Route::post('/accept', [UserController::class, 'accept_request']);
Route::post('/createrequest', [UserController::class, 'create_request']);
Route::post('/processrequest', [UserController::class, 'process_request']);
Route::post('/makeloan', [UserController::class, 'create_loan']);
Route::post('/returndoc', [UserController::class, 'return_doc']);
