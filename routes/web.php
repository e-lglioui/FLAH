<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

use App\Http\Controllers\statistiqueController;
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

Route::get('/about', function () {
    return view('about');
});
Route::resource('admin/categorie', CategorieController::class);
Route::get('/admin',[StatistiqueController::class,'index']);
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class,'singin'])->name('singin');

Route::get('/logout/success', function () {
    return view('logout');
})->name('logout.success');
