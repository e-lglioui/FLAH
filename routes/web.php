<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//AUTH CONTROLLER
use App\Http\Auth\Controllers\AuthController;
//admin controller 
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\statistiqueController;
//Fornisseur
use App\Http\Controllers\Fornisseur\ProduitController;
//Agriculteur Controller
use App\Http\Controllers\Agriculteur\PanierController;
use App\Http\Controllers\Agriculteur\RendezVousController;
// Veterinarian controller
use App\Http\Controllers\Veterinarian\VeterinarianController;
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
Route::post('/contact', [DemandeController::class,'demmande'])->name('demmande')->middleware('auth');;

Route::get('/logout/success', function () {
    return view('logout');
})->name('logout.success');





Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin',[StatistiqueController::class,'index'])->name('admin');
    Route::resource('admin/categorie', CategorieController::class);
    Route::get('/admin/demande', [DemandeController::class,'index'])->name('demande');
    Route::delete('/admin/demande/{id}', [DemandeController::class, 'destroy'])->name('destroy');
    Route::get('/admin/demande/veterinaire/{id}', [DemandeController::class, 'veterinaire'])->name('veterinaireDemmande');
    Route::get('/admin/demande/fornissuer/{id}', [DemandeController::class, 'fornissuer'])->name('fornissuerDemmande');
     
});


Route::middleware(['auth', 'fornissuer'])->group(function () {
    Route::get('/fornisseur', [StatistiqueController::class, 'fornissuer'])
        ->name('fornissuerStatistique'); 
    Route::resource('fornisseur/produit', ProduitController::class);
});
Route::get('categories', [ProduitController::class, 'newProduit'])->name('produit.new');
Route::get('categories/{id}', [ProduitController::class, 'filterByCategory'])->name('produit.category');
Route::get('categories/detail/{id}', [ProduitController::class, 'show'])->name('produit.detail');
Route::post('/panier/ajouter', [PanierController::class, 'ajouterAuPanier'])->name('panier.ajouter');
Route::get('/Veterinarian', [RendezVousController::class, 'veterinaire'])->name('Veterinarian');
Route::post('/Veterinarian', [RendezVousController::class, 'veterinaireFiltter'])->name('VeterinarianFiltter');
Route::get('/Veterinarian/{id}', [RendezVousController::class, 'rendezvous'])->name('rendezvous')->middleware('auth');
Route::post('/Veterinarian/rendezvous', [RendezVousController::class, 'reservation'])->name('reservation');
Route::fallback(function () {
    return response()->view('404', [], 404); 
});

Route::middleware(['auth', 'fornissuer'])->group(function () {
    Route::get('/dashboard', [VeterinarianController::class, 'statistiques'])
        ->name('VeterinarianStatistique'); 
});