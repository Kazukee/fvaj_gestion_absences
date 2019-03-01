@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Détails de l'absence</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Elève :</strong> {{ $absence->eleve->nom }} {{ $absence->eleve->prenom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Date de début :</strong> {{ $absence->date_in }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Date de fin :</strong> {{ $absence->date_out }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Heure de début :</strong> {{ $absence->time_in }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Heure de fin :</strong> {{ $absence->time_out }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Raison :</strong> {{ $absence->raison }}
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('absence.destroy', $absence->id) }}" method="post">
                    <a href="{{ route('absence.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('absence.edit', $absence->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
