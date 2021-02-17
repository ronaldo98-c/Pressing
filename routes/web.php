<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pressing;

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
//Auth::routes();
Route::get('/login',function(){
    return view('auth.login');
})->name('login'); 
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login-user'); 

Route::get('/register',function(){
    $pressings = Pressing::all();
    return view('auth.register',compact('pressings'));
})->name('register-create');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register');

Route::get('/pressing',[App\Http\Controllers\PressingController::class, 'create']); 
Route::post('/storePressing',[App\Http\Controllers\PressingController::class, 'store'])->name('pressing-store'); 

Route::get('/forgot-password', function () {
    return view('forgot-password');
});
Route::post('/forgot-password',[App\Http\Controllers\Auth\LoginController::class, 'reset'])->name('reset-user'); 

Route::middleware(['auth','active'])->group(function () {
    Route::get('/', [App\Http\Controllers\AccueilController::class, 'index'])->name('index')->middleware('can:user-action');
    Route::get('/archive', [App\Http\Controllers\ArchiveController::class, 'index'])->name('archive')->middleware('can:user-action');
    Route::get('/showArchive/{entree}', [App\Http\Controllers\ArchiveController::class, 'show'])->name('archive-show')->middleware('can:user-action');

    Route::get('/entree', [App\Http\Controllers\EntreeController::class, 'index'])->name('entree-all');
    Route::get('/newEntree/{client}',[App\Http\Controllers\EntreeController::class, 'create'])->name('entree-create');
    Route::post('/entree/{client}',[App\Http\Controllers\EntreeController::class, 'store'])->name('entree-store');
    Route::delete('/entree/{entree}',[App\Http\Controllers\EntreeController::class, 'destroy'])->name('entree-destroy')->middleware('can:user-action');
    Route::get('/remettreEntree/{entree}',[App\Http\Controllers\EntreeController::class, 'remettre'])->name('entree-remettre');
    Route::get('/printEntree/{entree}',[App\Http\Controllers\EntreeController::class, 'print'])->name('entree-print');


    Route::get('/newClient',[App\Http\Controllers\ClientController::class, 'create'])->name('newClient');
    Route::get('/showClient/{client}',[App\Http\Controllers\ClientController::class, 'show'])->name('client-show');
    Route::get('/editClient/{client}',[App\Http\Controllers\ClientController::class, 'edit'])->name('client-edit');
    Route::post('/postClient',[App\Http\Controllers\ClientController::class, 'store'])->name('client-store');
    Route::put('/updateClient/{client}',[App\Http\Controllers\ClientController::class, 'update'])->name('client-update');
    Route::delete('/deleteClient/{client}',[App\Http\Controllers\ClientController::class, 'destroy'])->name('client-destroy')->middleware('can:user-action');
    Route::get('/messageClient',function(){
        $pressing = Pressing::find(1);
        return view('client.message',compact('pressing'));
    });

    
    Route::get('/sortieNonRemi', [App\Http\Controllers\SortieController::class, 'getNonRemi'])->name('sortieNonRemi-all');
    Route::get('/sortieRemi', [App\Http\Controllers\SortieController::class, 'getRemi'])->name('sortieRemi-all');
    Route::get('/showSortie/{entree}', [App\Http\Controllers\SortieController::class, 'show'])->name('sortie-show');



    Route::get('/compteUtilisateur', [App\Http\Controllers\CompteUtilisateurController::class, 'index'])->name('compte-all')->middleware('can:user-action');
    Route::get('/newUtilisateur', [App\Http\Controllers\CompteUtilisateurController::class, 'create'])->name('compte-create')->middleware('can:user-action');
    Route::get('/showUtilisateur/{user}',[App\Http\Controllers\CompteUtilisateurController::class, 'show'])->name('compte-show')->middleware('can:user-action');
    Route::post('/storeUtilisateur',[App\Http\Controllers\CompteUtilisateurController::class, 'store'])->name('compte-store')->middleware('can:user-action');
    Route::put('/updateUtilisateur/{user}',[App\Http\Controllers\CompteUtilisateurController::class, 'update'])->name('compte-update')->middleware('can:user-action');
    Route::delete('/deleteUtilisateur/{user}',[App\Http\Controllers\CompteUtilisateurController::class, 'destroy'])->name('compte-destroy')->middleware('can:user-action');
    Route::get('/bloquerUtilisateur/{user}',[App\Http\Controllers\CompteUtilisateurController::class, 'bloquer'])->name('compte-bloquer')->middleware('can:user-action');
    Route::get('/activerUtilisateur/{user}',[App\Http\Controllers\CompteUtilisateurController::class, 'activer'])->name('compte-activer')->middleware('can:user-action');

    //categorie
    Route::get('/categorie',[App\Http\Controllers\CategorieController::class, 'index'])->name('categorie-all')->middleware('can:user-action');
    Route::get('/newCategorie',[App\Http\Controllers\CategorieController::class, 'create'])->name('categorie-create')->middleware('can:user-action');
    Route::get('/editCategorie/{categorie}',[App\Http\Controllers\CategorieController::class, 'edit'])->name('categorie-edit')->middleware('can:user-action');
    Route::post('/storeCategorie',[App\Http\Controllers\CategorieController::class, 'store'])->name('categorie-store')->middleware('can:user-action');
    Route::put('/updateCategorie/{categorie}',[App\Http\Controllers\CategorieController::class, 'update'])->name('categorie-update')->middleware('can:user-action');
    Route::delete('/deleteCategorie/{categorie}',[App\Http\Controllers\CategorieController::class, 'destroy'])->name('categorie-destroy')->middleware('can:user-action');

    //remise
    Route::get('/remise',[App\Http\Controllers\RemiseController::class, 'index'])->name('remise-all')->middleware('can:user-action');
    Route::get('/newRemise',[App\Http\Controllers\RemiseController::class, 'create'])->name('remise-create')->middleware('can:user-action');
    Route::get('/editRemise/{remise}',[App\Http\Controllers\RemiseController::class, 'edit'])->name('remise-edit')->middleware('can:user-action');
    Route::post('/storeRemise',[App\Http\Controllers\RemiseController::class, 'store'])->name('remise-store')->middleware('can:user-action');
    Route::put('/updateRemise/{remise}',[App\Http\Controllers\RemiseController::class, 'update'])->name('remise-update')->middleware('can:user-action');
    Route::delete('/deleteRemise/{remise}',[App\Http\Controllers\RemiseController::class, 'destroy'])->name('remise-destroy')->middleware('can:user-action');

    //statistique
    Route::get('/getStatistique',[App\Http\Controllers\StatistiqueController::class, 'index'])->name('statistique-all')->middleware('can:user-action');
    Route::post('/statistique',[App\Http\Controllers\StatistiqueController::class, 'store'])->name('statistique-store')->middleware('can:user-action');

    
    Route::post('/detailEntree/{entree}',[App\Http\Controllers\DetailController::class, 'store'])->name('detail-store');
    Route::get('/getdetailEntree/{entree}',[App\Http\Controllers\DetailController::class, 'show'])->name('detail-get');
    Route::put('/modifierdetailEntree/{entree}',[App\Http\Controllers\DetailController::class, 'modifierdetailEntree'])->name('modifier-detail');
    Route::get('/detail/{detail}',[App\Http\Controllers\DetailController::class, 'edit'])->name('edit-detail');
    Route::put('/modifier/{detail}',[App\Http\Controllers\DetailController::class, 'update'])->name('update-detail');



    Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil-all');
   
    Route::get('/sign-up', function () {
        return view('sign-up');
    });
    Route::get('/403', function () {
        return view('403');
    });
    Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout'); 
});



