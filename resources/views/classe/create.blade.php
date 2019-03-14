@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nouvelle classe</h3>
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

        <form action="{{ route('classe.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Code :</strong>
                    <input type="text" name="code" class="form-control" placeholder="Code" required>
                </div>
                <div class="col-md-12">
                    <strong>Volée :</strong>
                    <select name="volee" class="form-control" required>
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($volees as $volee)
                            <option value="{{ $volee->id }}">{{ $volee->label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Lundi matin :</strong>
                    <select name="luam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Lundi après-midi :</strong>
                    <select name="lupm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mardi matin :</strong>
                    <select name="maam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mardi après-midi :</strong>
                    <select name="mapm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mercredi matin :</strong>
                    <select name="meam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mercredi après-midi :</strong>
                    <select name="mepm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Jeudi matin :</strong>
                    <select name="jeam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Jeudi après-midi :</strong>
                    <select name="jepm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Vendredi matin :</strong>
                    <select name="veam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Vendredi après-midi :</strong>
                    <select name="vepm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('classe.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
