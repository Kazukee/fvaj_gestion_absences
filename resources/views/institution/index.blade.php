@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Liste des institution</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('institution.create') }}">Ajouter une institution</a>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="table-responsive-md">
            <table class="table table-hover table-sm">
                <tr>
                    <th><b>Nom</b></th>
                    <th><b>Adresse</b></th>
                    <th><b>Téléphone</b></th>
                    <th><b>Email</b></th>
                    <th width="220px"><b>Action</b></th>
                </tr>

                @foreach($institutions as $institution)
                    <tr>
                        <td><b>{{$institution->nom}}</b></td>
                        <td><b>{{$institution->telephone}}</b></td>
                        <td><b>{{$institution->adresse}}</b></td>
                        <td><b>{{$institution->email}}</b></td>
                        <td style="white-space: nowrap;" align="center">
                            <form action="{{ route('institution.destroy', $institution->id) }}" method="post">
                                <a class="btn btn-sm btn-success" href="{{ route('institution.show', $institution->id) }}">Voir</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('institution.edit', $institution->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {!! $institutions->links() !!}
    </div>
@endsection

