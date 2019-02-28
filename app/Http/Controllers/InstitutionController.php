<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::orderBy('nom')->paginate(20);
        return view('institution.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institution.create');
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
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);

        Institution::create($request->all());

        return redirect()->route('institution.index')
            ->with('success', 'Nouvelle institution ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institution = Institution::find($id);

        return view('institution.detail', compact('institution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution = Institution::find($id);

        return view('institution.edit', compact('institution'));
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
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);

        $institution = Institution::find($id);
        $institution->nom = $request->get('nom');
        $institution->adresse = $request->get('adresse');
        $institution->telephone = $request->get('telephone');
        $institution->email = $request->get('email');

        $institution->save();

        return redirect()->route('institution.index')
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
        $institution = Institution::find($id);
        $institution->delete();

        return redirect()->route('institution.index')
            ->with('success', 'L\'institution a été supprimée avec succès !');
    }
}
