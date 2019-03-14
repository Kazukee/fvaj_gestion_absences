@extends('layouts.app')
@section('content')
    <div class="container-fluid">
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
        <div class="table-responsive-md">
            <table class="table table-hover table-sm">
                <tr>
                    <th scope="col"><b>Classe</b></th>
                    <th scope="col"><b>Titre</b></th>
                    <th scope="col"><b>Nom</b></th>
                    <th scope="col"><b>Prénom</b></th>
                    <th scope="col"><b>Téléphone</b></th>
                    <th scope="col"><b>Adresse</b></th>
                    <th scope="col"><b>Email interne</b></th>
                    <th scope="col"><b>Email externe</b></th>
                    <th scope="col"><b>Action</b></th>
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
                        <td style="white-space: nowrap;" align="center">
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
        </div>
        {!! $eleves->links() !!}
    </div>
@endsection
