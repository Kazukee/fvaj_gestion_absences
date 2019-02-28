<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use App\Institution;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateurs = Utilisateur::orderBy('nom')->paginate(20);
        return view('utilisateur.index', compact('utilisateurs', 'institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::orderBy('nom', 'asc')->get();

        return view('utilisateur.create', compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
        ]);

        $utilisateur = new Utilisateur;

        $utilisateur->institution_id = $request->get('institution');
        $utilisateur->titre = $request->get('titre');
        $utilisateur->nom = $request->get('nom');
        $utilisateur->prenom = $request->get('prenom');
        $utilisateur->email = $request->get('email');
        $utilisateur->telephone = $request->get('telephone');
        $utilisateur->date_de_naissance = $request->get('date_de_naissance');
        $utilisateur->adresse = $request->get('adresse');

        $utilisateur->save();

        return redirect()->route('utilisateur.index')
            ->with('success', 'Nouvel utilisateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilisateur = Utilisateur::find($id);

        return view('utilisateur.detail', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateur = Utilisateur::find($id);
        $institutions = Institution::orderBy('nom', 'asc')->get();

        return view('utilisateur.edit', compact('utilisateur', 'institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
        ]);

        $utilisateur = Utilisateur::find($id);
        $utilisateur->institution_id = $request->get('institution');
        $utilisateur->titre = $request->get('titre');
        $utilisateur->nom = $request->get('nom');
        $utilisateur->prenom = $request->get('prenom');
        $utilisateur->telephone = $request->get('telephone');
        $utilisateur->adresse = $request->get('adresse');
        $utilisateur->date_de_naissance = $request->get('date_de_naissance');
        $utilisateur->email = $request->get('email');

        $utilisateur->save();

        return redirect()->route('utilisateur.index')
            ->with('success', 'Modifications apportées avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::find($id);
        $utilisateur->delete();

        return redirect()->route('utilisateur.index')
            ->with('success', 'L\'utilisateur a été supprimé avec succès !');
    }
}
