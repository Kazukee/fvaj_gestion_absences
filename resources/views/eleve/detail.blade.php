@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Détails de l'élève</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Classe :</strong> {{ $eleve->classe->code }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Titre :</strong> {{ $eleve->titre }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nom :</strong> {{ $eleve->nom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Prénom :</strong> {{ $eleve->prenom }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Téléphone :</strong> {{ $eleve->telephone }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Adresse :</strong> {{ $eleve->adresse }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email interne :</strong> {{ $eleve->email_interne }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email externe :</strong> {{ $eleve->email_externe }}
                </div>
            </div>
            <div class="table-responsive-md">
                <table class="table table-hover table-sm">
                    <tr>
                        <th><b>Lundi matin</b></th>
                        <th><b>Lundi après-midi</b></th>
                        <th><b>Mardi matin</b></th>
                        <th><b>Mardi après-midi</b></th>
                        <th><b>Mercredi matin</b></th>
                        <th><b>Mercredi après-midi</b></th>
                        <th><b>Jeudi matin</b></th>
                        <th><b>Jeudi après-midi</b></th>
                        <th><b>Vendredi matin</b></th>
                        <th><b>Vendredi après-midi</b></th>
                    </tr>
                        <tr>
                            <td><b>@if (empty($eleve->classe->matiere_luam->label)) @else {{$eleve->classe->matiere_luam->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_lupm->label)) @else {{$eleve->classe->matiere_lupm->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_maam->label)) @else {{$eleve->classe->matiere_maam->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_mapm->label)) @else {{$eleve->classe->matiere_mapm->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_meam->label)) @else {{$eleve->classe->matiere_meam->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_mepm->label)) @else {{$eleve->classe->matiere_mepm->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_jeam->label)) @else {{$eleve->classe->matiere_jeam->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_jepm->label)) @else {{$eleve->classe->matiere_jepm->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_veam->label)) @else {{$eleve->classe->matiere_veam->label}}@endif</b></td>
                            <td><b>@if (empty($eleve->classe->matiere_vepm->label)) @else {{$eleve->classe->matiere_vepm->label}}@endif</b></td>
                        </tr>
                </table>
            </div>
            <div class="col-md-12">
                <form action="{{ route('eleve.destroy', $eleve->id) }}" method="post">
                    <a href="{{ route('eleve.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('eleve.edit', $eleve->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
