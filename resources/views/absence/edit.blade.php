@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Modifier l'absence</h3>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Oops</strong>, il y a des erreurs dans vos entrées.<br>
                <ul>
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('absence.update', $absence->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <strong>Eleve :</strong>
                    <select name="eleve" class="form-control">
                        @foreach($eleves as $eleve)
                            <option value="{{ $eleve->id }}" @if ($eleve->id == $absence->eleve_id) selected="selected" @endif>{{ $eleve->nom }} {{ $eleve->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Date de début :</strong>
                    <input type="date" name="date_in" value="{{ $absence->date_in }}">
                </div>
                <div class="col-md-12">
                    <strong>Date de fin :</strong>
                    <input type="date" name="date_out" value="{{ $absence->date_out }}">
                </div>
                <div class="col-md-12">
                    <strong>Heure de début :</strong>
                    <input type="time" name="time_in" @if (empty($absence->time_in)) @else value="{{ $absence->time_in }}" @endif>
                </div>
                <div class="col-md-12">
                    <strong>Heure de fin :</strong>
                    <input type="time" name="time_out" @if (empty($absence->time_out)) @else value="{{ $absence->time_out }}" @endif>
                </div>
                <div class="col-md-12">
                    <strong>Raison :</strong>
                    <select name="raison" class="form-control">
                        <option value="Maladie" @if ($absence->raison == 'Maladie') selected="selected" @endif>Maladie</option>
                        <option value="Absence" @if ($absence->raison == 'Absence') selected="selected" @endif>Absence</option>
                        <option value="Stage interne" @if ($absence->raison == 'Stage interne') selected="selected" @endif>Stage interne</option>
                        <option value="Stage externe" @if ($absence->raison == 'Stage externe') selected="selected" @endif>Stage externe</option>
                        <option value="Accident" @if ($absence->raison == 'Accident') selected="selected" @endif>Accident</option>
                        <option value="Demande de congé" @if ($absence->raison == 'Demande de congé') selected="selected" @endif>Demande de congé</option>
                        <option value="Retard" @if ($absence->raison == 'Retard') selected="selected" @endif>Retard</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('absence.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
