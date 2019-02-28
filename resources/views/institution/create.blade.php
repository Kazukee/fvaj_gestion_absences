@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nouvelle institution</h3>
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

        <form action="{{ route('institution.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Nom :</strong>
                    <input type="text" name="nom" class="form-control" placeholder="Nom">
                </div>
                <div class="col-md-12">
                    <strong>Adresse :</strong>
                    <input type="text" name="adresse" class="form-control" placeholder="Adresse, NPA Localité">
                </div>
                <div class="col-md-12">
                    <strong>Téléphone :</strong>
                    <input type="text" name="telephone" class="form-control" placeholder="Téléphone">
                </div>
                <div class="col-md-12">
                    <strong>Email :</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-12">
                    <a href="{{ route('institution.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
