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
    $eleves = DB::table('eleves')->select('*')->join('classes', 'classes.id', '=', 'eleves.classe_id')->get();

    return view('welcome', compact('eleves'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Route de gestions des tables de notre base de données */
ROute::get('eleve.absence', 'EleveController@method');

Route::resource('eleve', 'EleveController');

Route::resource('institution', 'InstitutionController');

Route::resource('utilisateur', 'UtilisateurController');

Route::resource('classe', 'ClasseController');

Route::resource('absence', 'AbsenceController');
