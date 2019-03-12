@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nouvel élève</h3>
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
        <form action="{{ route('eleve.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Classe :</strong>
                    <select name="classe" class="form-control">
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->code }}</option>
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
                    <strong>Nom :</strong>
                    <input type="text" name="nom" class="form-control" placeholder="Nom">
                </div>
                <div class="col-md-12">
                    <strong>Prénom :</strong>
                    <input type="text" name="prenom" class="form-control" placeholder="Prénom">
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
                    <strong>Email interne :</strong>
                    <input type="text" name="email_interne" class="form-control" placeholder="Email interne">
                </div>
                <div id="email" class="col-md-12">
                    <strong>Email externe :</strong>
                    <input type="text" name="email_externe" class="form-control" placeholder="Email externe">
                </div>
                <div id="user" class="col-md-12">
                    <strong>Responsable :</strong>
                    <select name="users[]" class="form-control">
                        <option hidden disabled selected value> -- Choisir une option -- </option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('eleve.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                    <button type="button" id="addResponsable" class="btn add-more">+</button>
                </div>
            </div>
        </form>
    </div>

    {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#addUser').click(function(){
                i++;

                $('#user').append(
                    '<div class="cold-md-12">'
                    + '<strong>Responsable + i + :</strong>'
                    + '<select id="user" name="user" class="form-control">'
                    + '<option hidden disabled selected value> -- Choisir une option -- </option>'
                    @foreach($users as $user)
                    + '<option value="{{ $user->id }}"> {{ $user->name }}</option>'
                    @endforeach
                    + '</select>'
                    + '<div>'
                );
            });
        });
    </script> --}}
    {{-- Ajout d'un responsable --}}
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
           $(".add-more").click(function(e) {
               e.preventDefault();
               $('#user').append(
                   '<div class="cold-md-12">'
                   + '<strong>Responsable :</strong>'
                   + '<select id="user" name="users[]" class="form-control">'
                   + '<option hidden disabled selected value> -- Choisir une option -- </option>'
                   @foreach($users as $user)
                   + '<option value="{{ $user->id }}"> {{ $user->name }}</option>'
                   @endforeach
                   + '</select>'
                   + '<div>'
               );
           });
        });

    </script>
@endsection
