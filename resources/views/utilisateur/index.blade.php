@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Liste des utilisateur</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('utilisateur.create') }}">Ajouter un utilisateur</a>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

        <table class="table table-hover table-sm">
            <tr>
                <th><b>Institution</b></th>
                <th><b>Titre</b></th>
                <th><b>Nom</b></th>
                <th><b>Prénom</b></th>
                <th><b>Téléphone</b></th>
                <th><b>Adresse</b></th>
                <th><b>Date de naissance</b></th>
                <th><b>Email</b></th>
                <th width="220"><b>Action</b></th>
            </tr>

            @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td><b>@if (empty($utilisateur->institution->nom)) @else {{$utilisateur->institution->nom}}@endif</b></td>
                    <td><b>{{$utilisateur->titre}}</b></td>
                    <td><b>{{$utilisateur->nom}}</b></td>
                    <td><b>{{$utilisateur->prenom}}</b></td>
                    <td><b>{{$utilisateur->telephone}}</b></td>
                    <td><b>{{$utilisateur->adresse}}</b></td>
                    <td><b>{{$utilisateur->date_de_naissance}}</b></td>
                    <td><b>{{$utilisateur->email}}</b></td>
                    <td>
                        <form action="{{ route('utilisateur.destroy', $utilisateur->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{ route('utilisateur.show', $utilisateur->id) }}">Voir</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('utilisateur.edit', $utilisateur->id) }}">Modifier</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $utilisateurs->links() !!}
    </div>
@endsection
