<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Absence::all();

        return view('absence.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eleves = Eleve::orderBy('nom')->get();

        return view('absence.create', compact('eleves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eleve_utilisateur = DB::table('eleve_utilisateur')->select('eleve_utilisateur.id')
                                ->join('users', 'eleve_utilisateur.user_id', '=', 'users.id')
                                ->where('users.id', '=', Auth::id())->get();

        $request->validate([
            'eleve' => 'required',
            'date_in' => 'required',
            'date_out' => 'required',
            'time_in' => 'nullable',
            'time_out' => 'nullable',
            'raison' => 'required',
        ]);

        $absence = new Absence;

        $absence->eleve_id = $request->get('eleve');
        $absence->eleve_utilisateur_id = $eleve_utilisateur[0]->id;
        $absence->date_in = $request->get('date_in');
        $absence->date_out = $request->get('date_out');
        $absence->time_in = $request->get('time_in');
        $absence->time_out = $request->get('time_out');
        $absence->raison = $request->get('raison');

        $absence->save();

        return redirect()->route('absence.index')
            ->with('success', 'Nouvelle absence créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absence = Absence::find($id);

        return view('absence.detail', compact('absence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absence = Absence::find($id);
        $eleves= Eleve::orderBy('nom')->get();

        return view('absence.edit', compact('absence', 'eleves'));
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
            'eleve' => 'required',
            'date_in' => 'required',
            'date_out' => 'required',
            'time_in' => 'nullable',
            'time_out' => 'nullable',
            'raison' => 'required',
        ]);

        $absence = Absence::find($id);
        $absence->eleve_id = $request->get('eleve');
        $absence->date_in = $request->get('date_in');
        $absence->date_out = $request->get('date_out');
        $absence->time_in = $request->get('time_in');
        $absence->time_out = $request->get('time_out');
        $absence->raison = $request->get('raison');

        $absence->save();

        return redirect()->route('absence.index')
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
        $absence = Absence::find($id);
        $absence->delete();

        return redirect()->route('absence.index')
            ->with('success', 'L\'absence a été supprimée avec succès !');
    }

    public function getAbsences(Request $request, $id)
    {
        $eleve = Eleve::find($id);

        if(empty($request->except('_token'))) {
            $absences = DB::table('absences')->select('users.name', 'absences.raison', 'absences.date_in', 'absences.date_out')
                            ->join('eleves', 'absences.eleve_id', '=', 'eleves.id')
                            ->join('eleve_utilisateur', 'absences.eleve_utilisateur_id', '=', 'eleve_utilisateur.id')
                            ->join('users', 'eleve_utilisateur.user_id', '=', 'users.id')
                            ->where('absences.eleve_id', '=', $eleve->id)->get();
        } else {
            $absences = DB::table('absences')->select('users.name', 'absences.raison', 'absences.date_in', 'absences.date_out')
                            ->join('eleves', 'absences.eleve_id', '=', 'eleves.id')
                            ->join('eleve_utilisateur', 'absences.eleve_utilisateur_id', '=', 'eleve_utilisateur.id')
                            ->join('users', 'eleve_utilisateur.user_id', '=', 'users.id')
                            ->where([
                                ['eleves.id', '=', $eleve->id],
                                ['absences.date_in', '>=', $request->get('date_in')],
                                ['absences.date_out', '<=', $request->get('date_out')]
                            ])->orWhere([
                                ['eleves.id', '=', $eleve->id],
                                ['absences.date_in', '<', $request->get('date_in')],
                                ['absences.date_out', '>=', $request->get('date_in')]
                            ])->orWhere([
                                ['eleves.id', '=', $eleve->id],
                                ['absences.date_in', '<', $request->get('date_out')],
                                ['absences.date_out', '>=', $request->get('date_out')]
                            ])->orWhere([
                                ['eleves.id', '=', $eleve->id],
                                ['absences.date_in', '<', $request->get('date_in')],
                                ['absences.date_out', '>', $request->get('date_out')]
                            ])->get();
        }

        return view('eleve.absence', compact('eleve', 'absences'));
    }

    public function showPlanning(Request $request, $id)
    {

    }
}
