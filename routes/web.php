<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DashboardventesController;
use App\Http\Controllers\DashbordgeneralController;
use App\Http\Controllers\GreenvibesController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\MusculationController;
use App\Http\Controllers\OrdrederecettepdfController;
use App\Http\Controllers\OrdreRecetteController;
use App\Http\Controllers\PdfLocationOrdreReccetteController;
use App\Http\Controllers\PdfsalleCafController;
use App\Http\Controllers\PdfterrainmultisportController;
use App\Http\Controllers\PetitdejController;
use App\Http\Controllers\RecetteloctionController;
use App\Http\Controllers\RecetteRestaurationController;
use App\Http\Controllers\SallecafetariaController;
use App\Http\Controllers\TerrainmultisportController;
use App\Http\Controllers\TicketdejController;
use App\Models\dashboardventes;
use App\Models\greenvibes;
use App\Models\Pdfterrainmultisport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login') ;
});

Auth::routes();

Route::middleware(['auth', 'isadmin'])->group(function(){
    
    Route::get('/consultations',[ConsultationController::class, 'index'])->name('consultation.index');
    Route::get('/medicaments',[MedicamentController::class, 'index'])->name('medicament.index');
    Route::get('/musculations',[MusculationController::class, 'index'])->name('musculation.index');
    Route::get('/vente-ticket-petitdej',[PetitdejController::class, 'index'])->name('TicketRestauration.indexpetidej');
    Route::get('/vente-ticketdej',[TicketdejController::class, 'index'])->name('TicketRestauration.indexdej');

    Route::get('/greenvibes',[GreenvibesController::class, 'index'])->name('greenvibes.index');
    Route::get('/terrain-multisport',[TerrainmultisportController::class, 'index'])->name('terrainmultisport.index');
    Route::get('/sallecafetaria',[SallecafetariaController::class, 'index'])->name('sallecafetaria.index');

    // 
    
  });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/acceuil-general',[DashbordgeneralController::class, 'index'])->name('dashboardgeneral');

Route::get('/pdf/{id}',[OrdrederecettepdfController::class, 'index'])->name('ordrederecettepdf.index');
Route::get('/pdf-location/{id}',[PdfLocationOrdreReccetteController::class, 'index'])->name('ordrederecettepdf.pdfgreenvibes');
Route::get('/pdf-sallecaf/{id}',[PdfsalleCafController::class, 'index'])->name('ordrederecettepdf.pdfsalleCafetaria');
Route::get('/pdf-terrainmultisport/{id}',[PdfterrainmultisportController::class, 'index'])->name('ordrederecettepdf.pdfterrainmultisport');



/*
* Routes pour les ordre de recette provenant des consultations
*/


/*
* Routes pour les ordre de recette provenant des médicaments
*/



/*
* Routes pour les ordre de recette provenant de la salle Musculation
*/




/*
* Routes pour l'ordre de recette général
*(ajout nouvel ordre, dashboard général)
*/
Route::controller(OrdreRecetteController::class)->group(function(){

    Route::get('/createOrdreRecette', 'create')->name('ordreRecette.create');
    Route::post('/storeOrdreRecette', 'store')->name('ordreRecette.add');

    //route pour modifier les informations saisies
    Route::get('/ordrerecette/{id}/edit', [OrdreRecetteController::class,'edit'])->name('ordreRecette.edit');
    Route::put('/ordrerecette/{id}', [OrdreRecetteController::class, 'update'])->name('ordreRecette.update');

    //route pour supprimer les informations saisies
    Route::delete('/delete-ordrerecette/{id}',[OrdreRecetteController::class, 'destroy'])->name('ordreRecette.destroy');

    Route::get('/acceuil-ventes',[OrdreRecetteController::class, 'index'])->name('ventes.home');
});
    // Fin recette Ventes



    //debut reccette location pour greenvibes
    Route::controller(GreenvibesController::class)->group(function(){
    

    Route::get('/greenvibesCreate', 'create')->name('greenvibes.create');
    
    Route::post('/greenvibesAdd', 'store')->name('greenvibes.add');

    //Modifier les informations

    Route::get('/greenvibes/{id}/edit', 'edit')->name('greenvibes.edit');

    Route::put('/greenvibes/{id}', 'update')->name('greenvibes.update');

    //Supprimer les information

    Route::delete('/delete-greenvibes/{id}','destroy')->name('greenvibes.destroy');

});

Route::controller(TerrainmultisportController::class)->group(function(){
    


    Route::get('/terrain-multisportCreate', 'create')->name('terrainmultisport.create');

    Route::post('/terrain-multisportCreate', 'store')->name('terrainmultisport.add');

    //Modifier les informations

    Route::get('/terrain-multisport/{id}/edit', 'edit')->name('terrainmultisport.edit');

    Route::put('/terrain-multisport/{id}', 'update')->name('terrainmultisport.update');

    //Supprimer les informations

    Route::delete('/terrain-multisport/{id}','destroy')->name('terrainmultisport.destroy');




});


Route::controller(SallecafetariaController::class)->group(function(){
    
    Route::get('/sallecafetaria', 'index')->name('sallecafetaria.index');

    Route::get('/sallecreateCreate', 'create')->name('sallecafetaria.create');

    Route::post('/SallecafetariaAdd', 'store')->name('sallecafetaria.add');

    //Modifier les informations

    Route::get('/sallecafetaria/{id}/edit', 'edit')->name('sallecafetaria.edit');

    Route::put('/sallecafetaria/{id}', 'update')->name('sallecafetaria.update');

    //Supprimer les information 

    Route::delete('/delete-sallecafetaria/{id}','destroy')->name('sallecafetaria.destroy');


});


/*
* Routes pour recette Location générale
*(ajout nouvel ordre, dashboard général)
*/
Route::get('/acceuil-Location',[RecetteloctionController::class, 'index'])->name('location.home');


/*
* Routes pour le Dashboard Général
*(ajout nouvel ordre, dashboard général)
*/

Route::get('/dashboard/filter',[DashbordgeneralController::class, 'index'])->name('dashboard.filter');
// Route::get('/dashboard/filter', 'DashboardController@filter')->name('dashboard.filter');










