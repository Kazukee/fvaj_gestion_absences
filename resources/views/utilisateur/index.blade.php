@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Liste des utilisateurs</h3>
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
        <div class="table-responsive-md">
            <table class="table table-hover table-sm">
                <tr>
                    <th><b>Institution</b></th>
                    <th><b>Rôle</b></th>
                    <th><b>Titre</b></th>
                    <th><b>Nom - Prénom</b></th>
                    <th><b>Téléphone</b></th>
                    <th><b>Adresse</b></th>
                    <th><b>Date de naissance</b></th>
                    <th><b>Email</b></th>
                    <th width="220"><b>Action</b></th>
                </tr>

                @foreach($users as $user)
                    <tr>
                        <td><b>@if (empty($user->institution->nom)) @else {{$user->institution->nom}}@endif</b></td>
                        <td><b>{{$user->role}}</b></td>
                        <td><b>{{$user->titre}}</b></td>
                        <td><b>{{$user->name}}</b></td>
                        <td><b>{{$user->telephone}}</b></td>
                        <td><b>{{$user->adresse}}</b></td>
                        <td><b>{{$user->date_de_naissance}}</b></td>
                        <td><b>{{$user->email}}</b></td>
                        <td style="white-space: nowrap;" align="center">
                            <form action="{{ route('utilisateur.destroy', $user->id) }}" method="post">
                                <a class="btn btn-sm btn-success" href="{{ route('utilisateur.show', $user->id) }}">Voir</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('utilisateur.edit', $user->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {!! $users->links() !!}
    </div>
@endsection
