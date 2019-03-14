@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Modifier l'institution</h3>
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

        <form action="{{ route('institution.update', $institution->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <strong>Nom :</strong>
                    <input type="text" name="nom" class="form-control" value="{{ $institution->nom }}" required>
                </div>
                <div class="col-md-12">
                    <strong>Adresse :</strong>
                    <input type="text" name="adresse" class="form-control" value="{{ $institution->adresse }}" required>
                </div>
                <div class="col-md-12">
                    <strong>Téléphone :</strong>
                    <input type="text" name="telephone" class="form-control" value="{{ $institution->telephone }}" required>
                </div>
                <div class="col-md-12">
                    <strong>Email :</strong>
                    <input type="text" name="email" class="form-control" value="{{ $institution->email }}">
                </div>
                <div class="col-md-12">
                    <a href="{{ route('institution.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
