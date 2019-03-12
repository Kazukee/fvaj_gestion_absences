<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Eleve;
use App\Classe;
use Illuminate\Support\Facades\DB;

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

        return view('eleve.index', compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::orderBy('code', 'asc')->get();
        $users = User::orderBy('name')->get();

        return view('eleve.create', compact('classes', 'users'));
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
        'nom' => 'required|max:45',
        'prenom' => 'required|max:45',
        'telephone' => 'required|max:13',
        'adresse' => 'required|max:255',
        'email_interne' => 'required|max:45',
        'email_externe' => 'nullable|max:45',
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

        foreach($request->get('users') as $user) {
            $eleve->users()->attach($user);
        }


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

        return view('eleve.detail', compact('eleve'));
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
        $responsables = User::all();

        return view('eleve.edit', compact('eleve', 'classes', 'responsables'));
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
            'nom' => 'required|max:45',
            'prenom' => 'required|max:45',
            'telephone' => 'required|max:13',
            'adresse' => 'required|max:255',
            'email_interne' => 'required|max:45',
            'email_externe' => 'nullable|max:45',
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

        $eleve->users()->detach();

        foreach($request->get('users') as $user) {
            $eleve->users()->attach($user);
        }

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
