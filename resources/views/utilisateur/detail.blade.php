@extends('layouts.app')
@section('content')
    <style>

        .eleves td, .eleves th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .eleves tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .eleves tr:hover {
            background-color: #ddd;
        }

        .eleves th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #b91d19;
            color: white;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Détails de l'utilisateur</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Institution :</strong> {{ $utilisateur->institution->nom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Titre :</strong> {{ $utilisateur->titre }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nom :</strong> {{ $utilisateur->nom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Prénom :</strong> {{ $utilisateur->prenom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Téléphone :</strong> {{ $utilisateur->telephone }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Adresse :</strong> {{ $utilisateur->adresse }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Date de naissance :</strong> {{ $utilisateur->date_de_naissance }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email :</strong> {{ $utilisateur->email }}
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('utilisateur.destroy', $utilisateur->id) }}" method="post">
                    <a href="{{ route('utilisateur.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('utilisateur.edit', $utilisateur->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
        <hr>
        @if (empty($utilisateur->eleves))

        @else
        <div>
            <table class="eleves">
                <tr>
                    <th><b>Classe</b></th>
                    <th><b>Nom</b></th>
                    <th><b>Prénom</b></th>
                    <th><b></b></th>
                </tr>
                @foreach($utilisateur->eleves as $eleve)
                    <td>{{ $eleve->classe->code }}</td>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                    <td><a href="{{ route('absence', $eleve->id) }}">Lien vers les absences</a></td>
                @endforeach
            </table>
        </div>
        @endif
    </div>
@endsection
