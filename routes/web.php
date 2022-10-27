<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PalindromeController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//defining middleware for all routes
Route::group(['middleware' => 'auth'], function () {

//company routes
Route::get('/add-task',[TaskController::class,'add_task_interface']);
Route::post('/add-task',[TaskController::class,'store']);

Route::get('/list-tasks',[TaskController::class,'list']);

Route::get('/task/edit/{id}',[TaskController::class,'edit_interface']);
Route::post('/task/edit/{id}',[TaskController::class,'edit']);

Route::delete('/task/delete/{id}',[TaskController::class,'delete']);

Route::post('/task/complete/{id}',[TaskController::class,'set_complete']);

Route::get('/completed-tasks',[TaskController::class,'list_completed']);
Route::get('/pending-tasks',[TaskController::class,'list_incomplete']);



//palindrome routes
Route::get('/check-palindrome',[PalindromeController::class,'view']);
Route::post('/check-palindrome',[PalindromeController::class,'check_palindrome']);


});
require __DIR__.'/auth.php';
