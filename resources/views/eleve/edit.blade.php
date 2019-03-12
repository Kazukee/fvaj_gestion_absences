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
                    <div id="user" class="col-md-12">
                        @foreach($eleve->users as $user)
                            <strong>Responsable :</strong>
                            <select name="users[]" class="form-control">
                                <option hidden disabled selected value> -- Choisir une option -- </option>
                                @foreach($responsables as $responsable)
                                    <option value="{{ $responsable->id }}" @if ($user->id == $responsable->id) selected="selected" @endif>{{ $responsable->name }}</option>
                                @endforeach
                            </select>
                        @endforeach
                    </div>
                <div class="col-md-12">
                    <a href="{{ route('eleve.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                    <button type="button" id="addResponsable" class="btn add-more">+</button>
                    <button type="button" id="removeResponsable" class="btn remove">-</button>
                </div>
            </div>
        </form>
    </div>
    {{-- Ajout et suppression d'un responsable --}}
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $(".add-more").click(function(e) {
                e.preventDefault();
                $('#user').append(
                    '<strong>Responsable :</strong>'
                    + '<select id="user" name="users[]" class="form-control">'
                    + '<option hidden disabled selected value> -- Choisir une option -- </option>'
                    @foreach($responsables as $responsable)
                    + '<option value="{{ $responsable->id }}"> {{ $responsable->name }}</option>'
                    @endforeach
                    + '</select>'
                );
            });

            $(".remove").click(function(e) {
                e.preventDefault();
                $('#user strong:last').remove();
                $('#user select:last').remove();
            });
        });

    </script>
@endsection
