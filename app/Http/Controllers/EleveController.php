<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Utilisateur;
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

        return view('eleve.index', compact('absences_jour', 'absences_semaine', 'absences_mois', 'absences_annee', 'eleves', 'classes'));
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

        return view('eleve.detail', compact('eleve', 'classe', 'absences_jour'));
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

    public function chooseDates(Request $request, $id)
    {
        $request->validate([
           'date_in' => 'required'
        ]);

        $eleve = Eleve::find($id);

        $absences = DB::table('absences')->select(DB::raw("CONCAT(utilisateurs.nom, ' ', utilisateurs.prenom) AS responsable"), 'raison',
            DB::raw("DATE_FORMAT(absences.date_in, '%d.%m.%Y') AS date_in"), DB::raw("DATE_FORMAT(absences.date_out, '%d.%m.%Y') AS date_out"))
            ->join('eleves', 'eleves.id', '=', 'absences.eleve_id')
            ->join('eleve_utilisateur', 'eleve_utilisateur.id', '=', 'absences.eleve_utilisateur_id')
            ->join('utilisateurs', 'utilisateurs.id', '=', 'eleve_utilisateur.utilisateur_id')
            ->whereDate('date_in', '=', '2019-03-01')
            ->whereDate('date_out', '=', '2019-03-01')
            ->where('eleves.id', '=', $eleve)->get();

        dd($absences);

        return redirect()->route('absences_eleve', $absences->id)->with('date_in');
    }

    public function getAbsences($id)
    {
        /*$date = date('2019-03-01');
        $eleve = Eleve::find($id);

        $absences_jour = DB::table('absences')->select(DB::raw("CONCAT(utilisateurs.nom, ' ', utilisateurs.prenom) AS responsable"), 'raison',
            DB::raw("DATE_FORMAT(absences.date_in, '%d.%m.%Y') AS date_in"), DB::raw("DATE_FORMAT(absences.date_out, '%d.%m.%Y') AS date_out"))
            ->join('eleves', 'eleves.id', '=', 'absences.eleve_id')
            ->join('eleve_utilisateur', 'eleve_utilisateur.id', '=', 'absences.eleve_utilisateur_id')
            ->join('utilisateurs', 'utilisateurs.id', '=', 'eleve_utilisateur.utilisateur_id')
            ->whereDate('date_in', '=', $date)
            ->whereDate('date_out', '=', $date)
            ->where('eleves.id', '=', $eleve->id)->get();

        $from_semaine = $request->get(date('date_in'));
        $to_semaine = $request->get(date('date_out'));

        $absences_semaine = DB::table('absences')->select(DB::raw("CONCAT(utilisateurs.nom, ' ', utilisateurs.prenom) AS responsable"), 'raison',
            DB::raw("DATE_FORMAT(absences.date_in, '%d.%m.%Y') AS date_in"), DB::raw("DATE_FORMAT(absences.date_out, '%d.%m.%Y') AS date_out"))
            ->join('eleves', 'eleves.id', '=', 'absences.eleve_id')
            ->join('eleve_utilisateur', 'eleve_utilisateur.id', '=', 'absences.eleve_utilisateur_id')
            ->join('utilisateurs', 'utilisateurs.id', '=', 'eleve_utilisateur.utilisateur_id')
            ->whereBetween('date_in', [$from_semaine, $to_semaine])
            ->whereDate('date_out', '<=', $to_semaine)->get();

        $from_mois = date('2019-02-01');
        $to_mois = date('2019-02-28');
        $absences_mois = DB::table('absences')->select(DB::raw("CONCAT(utilisateurs.nom, ' ', utilisateurs.prenom) AS responsable"), 'raison',
            DB::raw("DATE_FORMAT(absences.date_in, '%d.%m.%Y') AS date_in"), DB::raw("DATE_FORMAT(absences.date_out, '%d.%m.%Y') AS date_out"))
            ->join('eleves', 'eleves.id', '=', 'absences.eleve_id')
            ->join('eleve_utilisateur', 'eleve_utilisateur.id', '=', 'absences.eleve_utilisateur_id')
            ->join('utilisateurs', 'utilisateurs.id', '=', 'eleve_utilisateur.utilisateur_id')
            ->whereBetween('date_in', [$from_mois, $to_mois])
            ->whereDate('date_out', '<=', $to_mois)->get();

        $sub = DB::table('absences')->select('*', DB::raw("CASE WHEN absences.time_in IS NULL AND absences.time_out IS NULL THEN 1 ELSE 0 END AS absence"));
        $absences_annee = DB::table(DB::raw("({$sub->toSql()}) as tbl_absence"))->select(DB::raw("SUM(CASE WHEN absence = 1
                            THEN IF(DATEDIFF(tbl_absence.date_out, tbl_absence.date_in) = 0, 1 * 2, (DATEDIFF(tbl_absence.date_out, tbl_absence.date_in) + 1) * 2)
                            ELSE 1 * 2
                            END) AS nbre_absence"))->get();*/

        $eleve = Eleve::find($id);

        //dd($eleve);

        $absences = DB::table('absences')->select(DB::raw("CONCAT(utilisateurs.nom, ' ', utilisateurs.prenom) AS responsable"), 'raison',
            DB::raw("DATE_FORMAT(absences.date_in, '%d.%m.%Y') AS date_in"), DB::raw("DATE_FORMAT(absences.date_out, '%d.%m.%Y') AS date_out"))
            ->join('eleves', 'eleves.id', '=', 'absences.eleve_id')
            ->join('eleve_utilisateur', 'eleves.id', '=', 'eleve_utilisateur.eleve_id')
            ->join('utilisateurs', 'utilisateurs.id', '=', 'eleve_utilisateur.utilisateur_id')
            ->where('eleves.id', '=', $eleve->id)->get();

        return view('eleve.absence', compact('eleve', 'absences'));
    }
}
