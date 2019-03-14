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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $eleves = DB::table('eleves')->select('eleves.id', 'eleves.nom', 'eleves.prenom', 'classes.code')
        ->join('classes', 'classes.id', '=', 'eleves.classe_id')
        ->join('eleve_utilisateur', 'eleves.id', '=', 'eleve_utilisateur.eleve_id')
        ->join('users', 'eleve_utilisateur.user_id', '=', 'users.id')
        ->where('users.id', '=', Auth::id())->get();

    $role = DB::table('users')->select('role')
                ->where('id', '=', Auth::id())->get();

    return view('welcome', compact('eleves'));
})->name('accueil');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Route de gestions des tables de notre base de données */

Route::resource('eleve', 'EleveController');

Route::resource('institution', 'InstitutionController');

Route::resource('utilisateur', 'UtilisateurController');

Route::resource('classe', 'ClasseController');

Route::resource('absence', 'AbsenceController');

Route::any('eleve/{id}/absences/', 'AbsenceController@getAbsences', function($id) {
   $eleve = App\Eleve::find($id);

   return view('eleve.absence', compact('eleve'));
})->name('absences_eleve');

/* Autocomplete users */
Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@searchUsers')->name('autocompleteUsers');
