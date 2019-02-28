@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Planning horaire de la classe</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Volée :</strong> {{ $classe->volee->label }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Code :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->code }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Lundi matin :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_luam->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Lundi après-midi :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_lupm->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Mardi matin :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_maam->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Mardi après-midi :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_mapm->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Mercredi matin :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_meam->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Mercredi après-midi :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_mepm->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Jeudi matin :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_jeam->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Jeudi après-midi :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_jepm->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Vendredi matin :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_veam->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Vendredi après-midi :</strong> @if (empty($classe->matiere_luam)) @else{{ $classe->matiere_vepm->label }}@endif
                </div>
            </div>
            <div class="col-md-12">
                <form action="{{ route('classe.destroy', $classe->id) }}" method="post">
                    <a href="{{ route('classe.index') }}" class="btn btn-sm btn-success">Retour</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('classe.edit', $classe->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
