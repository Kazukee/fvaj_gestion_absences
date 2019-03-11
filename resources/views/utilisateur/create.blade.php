@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nouvel utilisateur</h3>
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

        <form action="{{ route('utilisateur.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Institution :</strong>
                    <select name="institution" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}">{{ $institution->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Titre :</strong>
                    <select name="titre" class="form-control">
                        <option value="Madame">Madame</option>
                        <option value="Monsieur">Monsieur</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Nom - Prénom:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nom Prénom">
                </div>
                <div class="col-md-12">
                    <strong>Téléphone :</strong>
                    <input type="text" name="telephone" class="form-control" placeholder="Téléphone">
                </div>
                <div class="col-md-12">
                    <strong>Adresse :</strong>
                    <input type="text" name="adresse" class="form-control" placeholder="Adresse, NPA Localité">
                </div>
                <div class="col-md-12">
                    <strong>Date de naissance :</strong>
                    <input type="date" name="date_de_naissance" class="form-control">
                </div>
                <div class="col-md-12">
                    <strong>Email :</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-12">
                    <a href="{{ route('utilisateur.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
