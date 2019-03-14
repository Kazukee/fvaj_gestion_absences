<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Matiere;
use App\Volee;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::orderBy('code')->paginate(20);
        return view('classe.index', compact('classes', 'matieres', 'volees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matieres = Matiere::orderBy('id')->get();
        $volees = Volee::orderBy('label')->get();

        return view('classe.create', compact('matieres', 'volees'));
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
            'volee' => 'required',
            'luam' => 'nullable',
            'lupm' => 'nullable',
            'maam' => 'nullable',
            'mapm' => 'nullable',
            'meam' => 'nullable',
            'mepm' => 'nullable',
            'jeam' => 'nullable',
            'jepm' => 'nullable',
            'veam' => 'nullable',
            'vepm' => 'nullable',
            'code' => 'required|max:4',
        ]);

        $classe = new Classe;

        $classe->volee_id = $request->get('volee');
        $classe->fk_luam = $request->get('luam');
        $classe->fk_lupm = $request->get('lupm');
        $classe->fk_maam = $request->get('maam');
        $classe->fk_mapm = $request->get('mapm');
        $classe->fk_meam = $request->get('meam');
        $classe->fk_mepm = $request->get('mepm');
        $classe->fk_jeam = $request->get('jeam');
        $classe->fk_jepm = $request->get('jepm');
        $classe->fk_veam = $request->get('veam');
        $classe->fk_vepm = $request->get('vepm');
        $classe->code = $request->get('code');

        $classe->save();

        return redirect()->route('classe.index')
            ->with('success', 'Nouvelle classe ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = Classe::find($id);

        return view('classe.detail', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::find($id);
        $matieres = Matiere::orderBy('id')->get();
        $volees = Volee::orderBy('label')->get();

        return view('classe.edit', compact('classe', 'matieres', 'volees'));
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
            'volee' => 'required',
            'luam' => 'nullable',
            'lupm' => 'nullable',
            'maam' => 'nullable',
            'mapm' => 'nullable',
            'meam' => 'nullable',
            'mepm' => 'nullable',
            'jeam' => 'nullable',
            'jepm' => 'nullable',
            'veam' => 'nullable',
            'vepm' => 'nullable',
            'code' => 'required|max:4',
        ]);

        $classe = Classe::find($id);
        $classe->volee_id = $request->get('volee');
        $classe->fk_luam = $request->get('luam');
        $classe->fk_lupm = $request->get('lupm');
        $classe->fk_maam = $request->get('maam');
        $classe->fk_mapm = $request->get('mapm');
        $classe->fk_meam = $request->get('meam');
        $classe->fk_mepm = $request->get('mepm');
        $classe->fk_jeam = $request->get('jeam');
        $classe->fk_jepm = $request->get('jepm');
        $classe->fk_veam = $request->get('veam');
        $classe->fk_vepm = $request->get('vepm');
        $classe->code = $request->get('code');

        $classe->save();

        return redirect()->route('classe.index')
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
        $classe = Classe::find($id);
        $classe->delete();

        return redirect()->route('classe.index')
            ->with('success', 'La classe a été supprimée avec succès !');
    }
}
