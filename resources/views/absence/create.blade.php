@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nouvelle absence</h3>
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

        <form action="{{ route('absence.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Elève:</strong>
                    <select name="eleve" class="form-control" required>
                        @foreach($eleves as $eleve)
                            <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Date de début :</strong>
                    <input type="date" name="date_in" value="" required>
                </div>
                <div class="col-md-12">
                    <strong>Date de fin :</strong>
                    <input type="date" name="date_out" value="" required>
                </div>
                <div class="col-md-12">
                    <strong>Heure de début :</strong>
                    <input type="time" name="time_in">
                </div>
                <div class="col-md-12">
                    <strong>Heure de fin :</strong>
                    <input type="time" name="time_out">
                </div>
                <div class="col-md-12">
                    <strong>Raison :</strong>
                    <select name="raison" class="form-control" required>
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        <option value="Maladie">Maladie</option>
                        <option value="Absence">Absence</option>
                        <option value="Stage interne">Stage interne</option>
                        <option value="Stage externe">Stage externe</option>
                        <option value="Accident">Accident</option>
                        <option value="Demande de congé">Demande de congé</option>
                        <option value="Retard">Retard</option>
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
