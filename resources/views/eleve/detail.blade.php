@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Détails de l'élève</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Classe :</strong> {{ $eleve->classe->code }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Titre :</strong> {{ $eleve->titre }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nom :</strong> {{ $eleve->nom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Prénom :</strong> {{ $eleve->prenom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Téléphone :</strong> {{ $eleve->telephone }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Adresse :</strong> {{ $eleve->adresse }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email interne :</strong> {{ $eleve->email_interne }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email externe :</strong> {{ $eleve->email_externe }}
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('eleve.destroy', $eleve->id) }}" method="post">
                    <a href="{{ route('eleve.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('eleve.edit', $eleve->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
