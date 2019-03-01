<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;
use App\Eleve;
use App\Classe;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eleves = Eleve::orderBy('classe_id')->paginate(20);

        return view('eleve.index', compact('eleves', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::orderBy('code', 'asc')->get();
        $utilisateurs = Utilisateur::orderBy('nom')->get();

        return view('eleve.create', compact('classes', 'utilisateurs'));
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
            'classe' => 'required',
            'titre' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email_interne' => 'required',
        ]);

        $eleve = new Eleve;

        $eleve->classe_id = $request->get('classe');
        $eleve->titre = $request->get('titre');
        $eleve->nom = $request->get('nom');
        $eleve->prenom = $request->get('prenom');
        $eleve->telephone = $request->get('telephone');
        $eleve->adresse = $request->get('adresse');
        $eleve->email_interne = $request->get('email_interne');
        $eleve->email_externe = $request->get('email_externe');

        $eleve->save();

        $eleve->utilisateurs()->attach($request->get('utilisateur'));

        return redirect()->route('eleve.index')
                            ->with('success', 'Nouvel élève ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleve = Eleve::find($id);

        return view('eleve.detail', compact('eleve', 'classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eleve = Eleve::find($id);
        $classes = Classe::orderBy('code', 'asc')->get();

        return view('eleve.edit', compact('eleve', 'classes'));
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
            'classe' => 'required',
            'titre' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email_interne' => 'required',
        ]);

        $eleve = Eleve::find($id);
        $eleve->classe_id = $request->get('classe');
        $eleve->titre = $request->get('titre');
        $eleve->nom = $request->get('nom');
        $eleve->prenom = $request->get('prenom');
        $eleve->telephone = $request->get('telephone');
        $eleve->adresse = $request->get('adresse');
        $eleve->email_interne = $request->get('email_interne');
        $eleve->email_externe = $request->get('email_externe');

        $eleve->save();

        return redirect()->route('eleve.index')
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
        $eleve = Eleve::find($id);
        $eleve->delete();

        return redirect()->route('eleve.index')
                            ->with('success', 'L\'élève a été supprimé avec succès !');
    }
}
