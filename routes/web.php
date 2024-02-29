<?php

use App\Http\Controllers\CantinesController;
use App\Http\Controllers\ChambreEtudiantController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DashboardventesController;
use App\Http\Controllers\DashbordgeneralController;
use App\Http\Controllers\GreenvibesController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\MusculationController;
use App\Http\Controllers\OrdrederecettepdfController;
use App\Http\Controllers\OrdreRecetteController;
use App\Http\Controllers\PainController;
use App\Http\Controllers\PdfCantineController;
use App\Http\Controllers\PdfConsultationController;
use App\Http\Controllers\PdfdejController;
use App\Http\Controllers\PdfLocationOrdreReccetteController;
use App\Http\Controllers\PdfmedicamentController;
use App\Http\Controllers\PdfmedocController;
use App\Http\Controllers\PdfMusculationController;
use App\Http\Controllers\PdfpetitdejController;
use App\Http\Controllers\PdfsalleCafController;
use App\Http\Controllers\PdfterrainmultisportController;
use App\Http\Controllers\PetitdejController;
use App\Http\Controllers\RecetteloctionController;
use App\Http\Controllers\RecetteRestaurationController;
use App\Http\Controllers\SallecafetariaController;
use App\Http\Controllers\TerrainmultisportController;
use App\Http\Controllers\TicketdejController;
use App\Models\ChambreEtudiant;
use App\Models\dashboardventes;
use App\Models\greenvibes;
use App\Models\Pdfmedicament;
use App\Models\PdfMusculation;
use App\Models\Pdfpetitdej;
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
    Route::get('/vente-ticket-petitdej',[PetitdejController::class, 'index'])->name('ticketpetitdej.indexpetitdej');
    Route::get('/vente-ticketdej',[TicketdejController::class, 'index'])->name('ticketdej.indexdej');
    Route::get('/vente-pain',[PainController::class, 'index'])->name('pain.index');

    Route::get('/greenvibes',[GreenvibesController::class, 'index'])->name('greenvibes.index');
    Route::get('/terrain-multisport',[TerrainmultisportController::class, 'index'])->name('terrainmultisport.index');
    Route::get('/sallecafetaria',[SallecafetariaController::class, 'index'])->name('sallecafetaria.index');
    Route::get('/Cantine',[CantinesController::class, 'index'])->name('Cantines.index');
    Route::get('/ChambrEtuadint',[ChambreEtudiantController::class, 'index'])->name('ChambreEtudiant.index');

    // 
    
  });

  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/acceuil-general',[DashbordgeneralController::class, 'index'])->name('dashboardgeneral');

Route::get('/pdf/{id}',[OrdrederecettepdfController::class, 'index'])->name('ordrederecettepdf.index');
Route::get('/pdf-location/{id}',[PdfLocationOrdreReccetteController::class, 'index'])->name('ordrederecettepdf.pdfgreenvibes');
Route::get('/pdf-sallecaf/{id}',[PdfsalleCafController::class, 'index'])->name('ordrederecettepdf.pdfsalleCafetaria');
Route::get('/pdf-terrainmultisport/{id}',[PdfterrainmultisportController::class, 'index'])->name('ordrederecettepdf.pdfterrainmultisport');
Route::get('/pdf-Cantines/{id}',[PdfCantineController::class, 'index'])->name('ordrederecettepdf.pdfCantine');

Route::get('/pdf-consultation/{id}',[PdfConsultationController::class, 'index'])->name('ordrederecettepdf.pdfconsultation');
Route::get('/pdf-musculation/{id}',[PdfMusculationController::class, 'index'])->name('ordrederecettepdf.pdfmusculation');
Route::get('/pdf-petitdej/{id}',[PdfpetitdejController::class, 'index'])->name('ordrederecettepdf.pdfpetitdejeuner');
Route::get('/pdf-dejeuner/{id}',[PdfdejController::class, 'index'])->name('ordrederecettepdf.pdfdejeuner');
Route::get('/pdf-medoc/{id}',[PdfmedocController::class, 'index'])->name('ordrederecettepdf.pdfmedoc');





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

Route::controller(ConsultationController::class)->group(function(){
    Route::get('/createConsultation', 'create')->name('consultation.create');
    Route::post('/createAdd', 'store')->name('consultation.add');

     //Modifier les informations

     Route::get('/consultation/{id}/edit', 'edit')->name('consultation.edit');

     Route::put('/consultation/{id}', 'update')->name('consultation.update');

    //Supprimer une information

     Route::delete('/delete-consultation/{id}','destroy')->name('consultation.destroy');

});

Route::controller(MedicamentController::class)->group(function(){
    Route::get('/createMedicament', 'create')->name('medicament.create');
    Route::post('/createAddmedicament', 'store')->name('medicament.add');

    //Modifier les informations

    Route::get('/medicament/{id}/edit', 'edit')->name('medicament.edit');

    Route::put('/medicament/{id}', 'update')->name('medicament.update');

     //Supprimer les information

     Route::delete('/delete-medicament/{id}','destroy')->name('medicament.destroy');
   
});

Route::controller(MusculationController::class)->group(function(){
    Route::get('/createMusculation', 'create')->name('musculation.create');
    Route::post('/createAddMusculation', 'store')->name('musculation.add');

    //Modifier les informations

    Route::get('/Musculation/{id}/edit', 'edit')->name('musculation.edit');

    Route::put('/Musculation/{id}', 'update')->name('musculation.update');

     //Supprimer les information

     Route::delete('/delete-Musculation/{id}','destroy')->name('musculation.destroy');
   
});

Route::controller(PetitdejController::class)->group(function(){
    Route::get('/createpetitdej', 'create')->name('ticketpetitdej.create');
    Route::post('/createAddpetitdej', 'store')->name('ticketpetitdej.add');

    //Modifier les informations

    Route::get('/petitdej/{id}/edit', 'edit')->name('ticketpetitdej.edit');

    Route::put('/petitdej/{id}', 'update')->name('ticketpetitdej.update');

     //Supprimer les information

     Route::delete('/delete-petitdej/{id}','destroy')->name('ticketpetitdej.destroy');
   
});

Route::controller(TicketdejController::class)->group(function(){
    Route::get('/createdej', 'create')->name('Ticketdej.create');
    Route::post('/createAdddej', 'store')->name('Ticketdej.add');

    //Modifier les informations

    Route::get('/dej/{id}/edit', 'edit')->name('Ticketdej.edit');

    Route::put('/dej/{id}', 'update')->name('Ticketdej.update');

     //Supprimer les information

     Route::delete('/delete-dej/{id}','destroy')->name('Ticketdej.destroy');
   
});

Route::controller(PainController::class)->group(function(){
    Route::get('/createpain', 'create')->name('pain.create');
    Route::post('/createAddpain', 'store')->name('pain.add');

    //Modifier les informations

    Route::get('/pain/{id}/edit', 'edit')->name('pain.edit');

    Route::put('/pain/{id}', 'update')->name('pain.update');

     //Supprimer les information

     Route::delete('/delete-pain/{id}','destroy')->name('pain.destroy');
   
});


Route::controller(ChambreEtudiantController::class)->group(function(){
    Route::get('/createChmbrEt', 'create')->name('ChambreEtudiant.create');
    Route::post('/createAddChmbrEt', 'store')->name('ChambreEtudiant.add');

    //Modifier les informations

    Route::get('/ChmbrEt/{id}/edit', 'edit')->name('ChambreEtudiant.edit');

    Route::put('/ChmbrEt/{id}', 'update')->name('ChambreEtudiant.update');

     //Supprimer les information

     Route::delete('/delete-ChmbrEt/{id}','destroy')->name('ChambreEtudiant.destroy');
   
});

Route::controller(OrdreRecetteController::class)->group(function(){

  
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

//recettes Cantines
Route::controller(CantinesController::class)->group(function(){
    

    Route::get('/CantinesCreate', 'create')->name('Cantines.create');
    
    Route::post('/CantinesAdd', 'store')->name('Cantines.add');

    //Modifier les informations

    Route::get('/cantines/{id}/edit', 'edit')->name('Cantines.edit');

    Route::put('/cantines/{id}', 'update')->name('Cantines.update');

    //Supprimer les information

    Route::delete('/delete-Cantines/{id}','destroy')->name('Cantines.destroy');
    

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










