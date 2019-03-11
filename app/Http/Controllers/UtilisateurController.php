<?php

namespace App\Http\Controllers;

use App\User;
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
        $users = User::orderBy('name')->paginate(20);

        return view('utilisateur.index', compact('users', 'institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::orderBy('nom', 'asc')->get();

        return view('auth.register', compact('institutions'));
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
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = new User;

        $user->institution_id = $request->get('institution');
        $user->titre = $request->get('titre');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->telephone = $request->get('telephone');
        $user->date_de_naissance = $request->get('date_de_naissance');
        $user->adresse = $request->get('adresse');

        $user->save();

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
        $user = User::find($id);

        return view('utilisateur.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $institutions = Institution::orderBy('nom', 'asc')->get();

        return view('utilisateur.edit', compact('user', 'institutions'));
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
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user->institution_id = $request->get('institution');
        $user->titre = $request->get('titre');
        $user->nom = $request->get('name');
        $user->telephone = $request->get('telephone');
        $user->adresse = $request->get('adresse');
        $user->date_de_naissance = $request->get('date_de_naissance');
        $user->email = $request->get('email');

        $user->save();

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
        $user = User::find($id);
        $user->delete();

        return redirect()->route('utilisateur.index')
            ->with('success', 'L\'utilisateur a été supprimé avec succès !');
    }
}
