<?php

use App\Http\Controllers\InstructorController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/instructor'], function () {
    Route::get('/home', function () {
        return ('home');
    })->name('instructor.home');
    Route::get('/register', [InstructorController::class, 'registerPage'])->name('instructor.register_page');
    Route::post('/register', [InstructorController::class, 'register'])->name('instructor.register');
    Route::get('/login', [InstructorController::class, 'loginPage'])->name('instructor.login_page');
    Route::post('/login', [InstructorController::class, 'login'])->name('instructor.login');
});
