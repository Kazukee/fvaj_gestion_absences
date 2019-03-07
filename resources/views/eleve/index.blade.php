@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3><b>Liste des élèves</b></h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('eleve.create') }}">Ajouter un élève</a>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

        <table class="table table-hover table-sm">
            <tr>
                <th><b>Classe</b></th>
                <th><b>Titre</b></th>
                <th><b>Nom</b></th>
                <th><b>Prénom</b></th>
                <th><b>Téléphone</b></th>
                <th><b>Adresse</b></th>
                <th><b>Email interne</b></th>
                <th><b>Email externe</b></th>
                <th width="220"><b>Action</b></th>
            </tr>

            @foreach($eleves as $eleve)
                <tr>
                    <td><b>{{$eleve->classe->code}}</b></td>
                    <td><b>{{$eleve->titre}}</b></td>
                    <td><b>{{$eleve->nom}}</b></td>
                    <td><b>{{$eleve->prenom}}</b></td>
                    <td><b>{{$eleve->telephone}}</b></td>
                    <td><b>{{$eleve->adresse}}</b></td>
                    <td><b>{{$eleve->email_interne}}</b></td>
                    <td><b>{{$eleve->email_externe}}</b></td>
                    <td>
                        <form action="{{ route('eleve.destroy', $eleve->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{ route('eleve.show', $eleve->id) }}">Voir</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('eleve.edit', $eleve->id) }}">Modifier</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- <hr>
        <h3><b>Absence(s) par jour</b></h3>
        <table class="table table-hover table-sm">
            <tr>
                <th><b>Absence reportée par</b></th>
                <th><b>Cause</b></th>
                <th><b>Date de début</b></th>
                <th><b>Date de fin</b></th>
            </tr>
            @foreach($absences_jour as $absence_jour)
            <tr>
                <td><b>{{$absence_jour->responsable}}</b></td>
                <td><b>{{$absence_jour->raison}}</b></td>
                <td><b>{{$absence_jour->date_in}}</b></td>
                <td><b>{{$absence_jour->date_out}}</b></td>
            </tr>
            @endforeach
        </table>
        <hr>
        <h3><b>Absence(s) par semaine</b></h3>
        <table class="table table-hover table-sm">
            <tr>
                <th><b>Absence reportée par</b></th>
                <th><b>Cause</b></th>
                <th><b>Date de début</b></th>
                <th><b>Date de fin</b></th>
            </tr>
            @foreach($absences_semaine as $absence_semaine)
                <tr>
                    <td><b>{{$absence_semaine->responsable}}</b></td>
                    <td><b>{{$absence_semaine->raison}}</b></td>
                    <td><b>{{$absence_semaine->date_in}}</b></td>
                    <td><b>{{$absence_semaine->date_out}}</b></td>
                </tr>
            @endforeach
        </table>
        <hr>
        <h3><b>Absence(s) par mois</b></h3>
        <table class="table table-hover table-sm">
            <tr>
                <th><b>Absence reportée par</b></th>
                <th><b>Cause</b></th>
                <th><b>Date de début</b></th>
                <th><b>Date de fin</b></th>
            </tr>
            @foreach($absences_mois as $absence_mois)
                <tr>
                    <td><b>{{$absence_mois->responsable}}</b></td>
                    <td><b>{{$absence_mois->raison}}</b></td>
                    <td><b>{{$absence_mois->date_in}}</b></td>
                    <td><b>{{$absence_mois->date_out}}</b></td>
                </tr>
            @endforeach
        </table>
        <hr>
        <h3><b>Absence(s) à l'année</b></h3>
        <table class="table table-hover table-sm">
            <tr>
                <th><b>Nombre de demi-jounrées d'absence</b></th>
            </tr>
            @foreach($absences_annee as $absence_annee)
                <tr>
                    <td><b>{{$absence_annee->nbre_absence}}</b></td>
                </tr>
            @endforeach
        </table>--}}
        {!! $eleves->links() !!}
    </div>
@endsection
