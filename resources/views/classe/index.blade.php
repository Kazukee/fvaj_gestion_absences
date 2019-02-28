@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Liste des classes</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('classe.create') }}">Ajouter une classe</a>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

        <table class="table table-hover table-sm">
            <tr>
                <th><b>Volée</b></th>
                <th><b>Code</b></th>
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
                <th width="220px"><b>Action</b></th>
            </tr>

            @foreach($classes as $classe)
                <tr>
                    <td><b>{{$classe->volee->label}}</b></td>
                    <td><b>{{$classe->code}}</b></td>
                    <td><b>@if (empty($classe->matiere_luam->label)) @else {{$classe->matiere_luam->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_lupm->label)) @else {{$classe->matiere_lupm->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_maam->label)) @else {{$classe->matiere_maam->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_mapm->label)) @else {{$classe->matiere_mapm->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_meam->label)) @else {{$classe->matiere_meam->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_mepm->label)) @else {{$classe->matiere_mepm->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_jeam->label)) @else {{$classe->matiere_jeam->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_jepm->label)) @else {{$classe->matiere_jepm->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_veam->label)) @else {{$classe->matiere_veam->label}}@endif</b></td>
                    <td><b>@if (empty($classe->matiere_vepm->label)) @else {{$classe->matiere_vepm->label}}@endif</b></td>
                    <td>
                        <form action="{{ route('classe.destroy', $classe->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{ route('classe.show', $classe->id) }}">Voir</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('classe.edit', $classe->id) }}">Modifier</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $classes->links() !!}
    </div>
@endsection
