<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FestivalController;

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
    return view('Acceuil');
});

Route::get('GestionEtablissement', [FestivalController::class, 'obtenirReqEtablissements']);

Route::get('Detail', [FestivalController::class, 'obtenirDetailEtablissement']);


Route::get('Creation', function () {
    return view('creationEtablissement');
});

Route::post('CreationExec', [FestivalController::class, 'CreaEtab']);

Route::get('Modification', [FestivalController::class, 'obtenirModifEtablissement']);

Route::post('ModificationExec', [FestivalController::class, 'ModifEtab']);

Route::get('Suppresion', [FestivalController::class, 'afficheSuppression']);

Route::get('SuppressionExec', [FestivalController::class, 'suppression']);

Route::get('AttributionChambres', [FestivalController::class, 'obtenirReqEtablissementsOffrantChambres']);

Route::get('EffectuerOuModifiertest', [FestivalController::class, 'afficheAttribution']);

Route::get('EffectuerOuModifier', function () {
    return view('EnTravaux');
});


// Route::get('AttributionChambres', function () {
//     return view('consultationAttributions');
// });
