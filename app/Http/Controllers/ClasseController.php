<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Matiere;
use App\Notifications\AbsenceCreated;
use App\Notifications\AttendanceCreated;
use App\User;
use App\Volee;
use function GuzzleHttp\Promise\exception_for;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

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

        return view('classe.index', compact('classes'));
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

    public function getPresence(Request $request, $id)
    {
        $classe = Classe::find($id);
        $today = date('N');
        $time = date('H');

        $presences = DB::table('eleves')->select('eleves.id', 'eleves.nom', 'eleves.prenom', 'users.name', 'classes.code')
                        ->join('classes', 'eleves.classe_id', '=', 'classes.id')
                        ->join('eleve_utilisateur', 'eleves.id', '=', 'eleve_utilisateur.eleve_id')
                        ->join('users', 'users.id', '=', 'eleve_utilisateur.user_id')
                        ->where([
                            ['users.role', '=', 'Référent'],
                            ['classes.id', '=', $classe->id]
                        ])->get();

        $eleve_utilisateur = DB::table('eleve_utilisateur')->select('eleve_utilisateur.id')
            ->join('users', 'eleve_utilisateur.user_id', '=', 'users.id')
            ->where('users.id', '=', Auth::id())->get();

        $users = DB::table('users')->select('users.name')
            ->join('eleve_utilisateur', 'eleve_utilisateur.user_id', '=', 'users.id')
            ->join('eleves', 'eleves.id', '=', 'eleve_utilisateur.eleve_id')
            ->where('eleves.id', '=', $request->get('id'))->get();

        if (!empty($request->except('_token'))) {
            $array = $request->all();

            for ($i = 0; $i < count(collect($request)->get('id')); $i++) {
                if ($array['raison'][$i] != 'Présent') {
                    DB::table('absences')->insert([
                        'eleve_id' => $array['id'][$i],
                        'eleve_utilisateur_id' => $eleve_utilisateur[0]->id,
                        'date_in' => date('Y-m-d'),
                        'date_out' => date('Y-m-d'),
                        'raison' => $array['raison'][$i],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);

                    $arr = [
                        'classe_eleve' => DB::table('eleves')->select('classes.code')->join('classes', 'classes.id', '=', 'eleves.classe_id')->where('eleves.id', '=', $array['id'][$i])->get(),
                        'titre_eleve' => DB::table('eleves')->select('eleves.titre')->where('id', '=', $array['id'][$i])->get(),
                        'nom_eleve' => DB::table('eleves')->select('eleves.nom')->where('id', '=', $array['id'][$i])->get(),
                        'prenom_eleve' => DB::table('eleves')->select('eleves.prenom')->where('id', '=', $array['id'][$i])->get(),
                        'adresse_eleve' => DB::table('eleves')->select(DB::raw("SUBSTRING_INDEX(eleves.adresse, ',', 1) as 'adresse'"))->where('id', '=', $array['id'][$i])->get(),
                        'localite_eleve' => DB::table('eleves')->select(DB::raw("TRIM(SUBSTRING_INDEX(eleves.adresse, ',', -1)) as 'localite'"))->where('id', '=', $array['id'][$i])->get(),
                        'date' => date('Y-m-d'),
                        'raison' => $array['raison'][$i],
                    ];

                    foreach ($users as $user) {
                        Notification::send(User::where('name', $user->name)->get(), new AttendanceCreated($arr));
                    }
                }
            }
        }

        return view('presence.index', compact('classe', 'time', 'today', 'presences'));
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
