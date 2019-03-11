<?php

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
    $eleves = DB::table('eleves')->select('eleves.id', 'classe_id', 'titre', 'nom', 'prenom', 'telephone', 'adresse', 'email_interne',
        'email_externe', 'classes.volee_id', 'classes.fk_luam', 'classes.fk_lupm', 'classes.fk_maam', 'classes.fk_mapm', 'classes.fk_meam',
        'classes.fk_mepm', 'classes.fk_jeam', 'classes.fk_jepm', 'classes.fk_veam', 'classes.fk_vepm', 'classes.code')
        ->join('classes', 'classes.id', '=', 'eleves.classe_id')->get();

    return view('welcome', compact('eleves'));
})->name('accueil');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Route de gestions des tables de notre base de données */
ROute::get('eleve.absence', 'EleveController@method');

Route::resource('eleve', 'EleveController');

Route::resource('institution', 'InstitutionController');

Route::resource('utilisateur', 'UtilisateurController');

Route::resource('classe', 'ClasseController');

Route::resource('absence', 'AbsenceController');

Route::get('eleve/{id}/absences/{date_in}/{date_out}', 'EleveController@chooseDates', function(Request $request, $id) {
    $id = Eleve::find($id);

    $date_in = $request->get('date_in');
    $date_out = $request->get('date_out');

    return view('absences.date', compact('eleve', 'date_in', 'date_out'));
})->name('dates_absences');

Route::get('eleve/{id}/absences/', 'EleveController@getAbsences', function($id) {
   $eleve = App\Eleve::find($id);

   return view('eleve.absence', compact('eleve'));
})->name('absences_eleve');
