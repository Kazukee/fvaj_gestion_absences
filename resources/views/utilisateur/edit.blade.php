@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Modifier l'utilisteur</h3>
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

        <form action="{{ route('utilisateur.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <strong>Institution :</strong>
                    <select name="institution" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}" @if ($institution->id == $user->institution_id) selected="selected" @endif>{{ $institution->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Titre :</strong>
                    <select name="titre" class="form-control">
                        <option value="Madame" @if ($user->titre == 'Madame') selected="selected" @endif>Madame</option>
                        <option value="Monsieur" @if ($user->titre == 'Monsieur') selected="selected" @endif>Monsieur</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Nom - Prénom :</strong>
                    <input type="text" name="nom" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="col-md-12">
                    <strong>Téléphone :</strong>
                    <input type="text" name="telephone" class="form-control" value="{{ $user->telephone }}">
                </div>
                <div class="col-md-12">
                    <strong>Adresse :</strong>
                    <input type="text" name="adresse" class="form-control" value="{{ $user->adresse }}">
                </div>
                <div class="col-md-12">
                    <strong>Date de naissance :</strong>
                    <input type="date" name="date_de_naissance" class="form-control" value="{{ $user->date_de_naissance }}">
                </div>
                <div class="col-md-12">
                    <strong>Email :</strong>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="col-md-12">
                    <a href="{{ route('utilisateur.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
