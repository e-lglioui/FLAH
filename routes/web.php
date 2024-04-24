<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\statistiqueController;
use App\Http\Controllers\PanierController;
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

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class,'singin'])->name('singin');
Route::get('/contact', [DemandeController::class,'contact'])->name('contact');
Route::get('/contact', [DemandeController::class,'contact'])->name('contact');

Route::get('/logout/success', function () {
    return view('logout');
})->name('logout.success');





Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin',[StatistiqueController::class,'index'])->name('admin');
    Route::resource('admin/categorie', CategorieController::class);
    Route::get('/admin/demande', [DemandeController::class,'index'])->name('demande');
    Route::delete('/admin/demande/{id}', [DemandeController::class, 'destroy'])->name('destroy');
    Route::get('/admin/demande/{id}', [DemandeController::class,'veterinaire'])->name('veterinaire');
    Route::get('/admin/demande/{id}', [DemandeController::class,'fornissuer'])->name('fornissuer');  
});


Route::middleware(['auth', 'fornissuer'])->group(function () {
    Route::get('/fornisseur', [StatistiqueController::class, 'fornissuer'])
        ->name('fornissuerStatistique'); 
    Route::resource('fornisseur/produit', ProduitController::class);
});
Route::get('categories', [ProduitController::class, 'newProduit'])->name('produit.new');
Route::get('categories/{id}', [ProduitController::class, 'filterByCategory'])->name('produit.category');
Route::get('/produt/detail/{id}', [ProduitController::class, 'detail'])->name('produit.detail');
Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');

Route::fallback(function () {
    return response()->view('404', [], 404); 
});
