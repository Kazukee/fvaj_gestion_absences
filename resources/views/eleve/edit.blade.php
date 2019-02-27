@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Modifier l'élève</h3>
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

        <form action="{{ route('eleve.update', $eleve->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <strong>Classe :</strong>
                    <select name="classe" class="form-control">
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}" @if ($classe->id == $eleve->classe_id) selected="selected" @endif>{{ $classe->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Titre :</strong>
                    <select name="titre" class="form-control">
                        <option value="Madame" @if ($eleve->titre == 'Madame') selected="selected" @endif>Madame</option>
                        <option value="Monsieur" @if ($eleve->titre == 'Monsieur') selected="selected" @endif>Monsieur</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Nom :</strong>
                    <input type="text" name="nom" class="form-control" value="{{ $eleve->nom }}">
                </div>
                <div class="col-md-12">
                    <strong>Prénom :</strong>
                    <input type="text" name="prenom" class="form-control" value="{{ $eleve->prenom }}">
                </div>
                <div class="col-md-12">
                    <strong>Téléphone :</strong>
                    <input type="text" name="telephone" class="form-control" value="{{ $eleve->telephone }}">
                </div>
                <div class="col-md-12">
                    <strong>Adresse :</strong>
                    <input type="text" name="adresse" class="form-control" value="{{ $eleve->adresse }}">
                </div>
                <div class="col-md-12">
                    <strong>Email interne :</strong>
                    <input type="text" name="email_interne" class="form-control" value="{{ $eleve->email_interne }}">
                </div>
                <div class="col-md-12">
                    <strong>Email externe :</strong>
                    <input type="text" name="email_externe" class="form-control" value="{{ $eleve->email_externe }}">
                </div>
                <div class="col-md-12">
                    <a href="{{ route('eleve.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
