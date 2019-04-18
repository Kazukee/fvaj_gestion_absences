@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h3>Liste des absences</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('absence.create') }}">Ajouter une absence</a>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="table-responsive-sm">
            <table class="table table-hover">
                <tr>
                    <th scope="col"><b>Eleve</b></th>
                    <th scope="col"><b>Date de début</b></th>
                    <th scope="col"><b>Date de fin</b></th>
                    <th scope="col"><b>Heure de début</b></th>
                    <th scope="col"><b>Heure de fin</b></th>
                    <th scope="col"><b>Raison</b></th>
                    <th scope="col"><b>Action</b></th>
                </tr>

                @foreach($absences as $absence)
                    <tr>
                        <td><b>{{$absence->eleve->nom}} {{$absence->eleve->prenom }}</b></td>
                        <td><b>{{date_format(new DateTime($absence->date_in), 'd.m.Y')}}</b></td>
                        <td><b>{{date_format(new DateTime($absence->date_out), 'd.m.Y')}}</b></td>
                        <td><b>{{$absence->time_in}}</b></td>
                        <td><b>{{$absence->time_out}}</b></td>
                        <td><b>{{$absence->raison}}</b></td>
                        <td style="white-space: nowrap;" align="center">
                            <form action="{{ route('absence.destroy', $absence->id) }}" method="post">
                                <a class="btn btn-sm btn-success" href="{{ route('absence.show', $absence->id) }}">Voir</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('absence.edit', $absence->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {!! $absences->links() !!}
    </div>
@endsection
