@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Modifier la classe</h3>
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

        <form action="{{ route('classe.update', $classe->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <strong>Code :</strong>
                    <input type="text" name="code" class="form-control" value="{{ $classe->code }}">
                </div>
                <div class="col-md-12">
                    <strong>Volée :</strong>
                    <select name="volee" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($volees as $volee)
                            <option value="{{ $volee->id }}" @if ($volee->id == $classe->volee_id) selected="selected" @endif>{{ $volee->label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Lundi matin :</strong>
                    <select name="luam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_luam) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Lundi après-midi :</strong>
                    <select name="lupm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_lupm) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mardi matin :</strong>
                    <select name="maam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_maam) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mardi après-midi :</strong>
                    <select name="mapm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_mapm) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mercredi matin :</strong>
                    <select name="meam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_meam) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Mercredi après-midi :</strong>
                    <select name="mepm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_mepm) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Jeudi matin :</strong>
                    <select name="jeam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_jeam) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Jeudi après-midi :</strong>
                    <select name="jepm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_jepm) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Vendredi matin :</strong>
                    <select name="veam" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_veam) selected="selected" @endif>{{ $matiere->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Vendredi après-midi :</strong>
                    <select name="vepm" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" @if ($matiere->id == $classe->fk_vepm) selected="selected" @endif>{{ $matiere->label}}</option>
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
