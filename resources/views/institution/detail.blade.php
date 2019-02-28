@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Détails de l'institution</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nom :</strong> {{ $institution->nom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Adresse :</strong> {{ $institution->adresse }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Téléphone :</strong> {{ $institution->telephone }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email :</strong> {{ $institution->email }}
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('institution.destroy', $institution->id) }}" method="post">
                    <a href="{{ route('institution.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('institution.edit', $institution->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
