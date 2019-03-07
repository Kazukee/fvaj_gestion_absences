@extends('layouts.app')
@section('content')
{{--    <h3><b>Liste des absences</b></h3>
    <table class="table table-hover table-sm">
        @if(empty($absences->count()))
            <p>Cet élève n'a jamais été absent.</p>
        @else
            <tr>
                <th><b>Absence reportée par</b></th>
                <th><b>Cause</b></th>
                <th><b>Date de début</b></th>
                <th><b>Date de fin</b></th>
            </tr>
            @foreach($absences as $absence)
                <tr>
                    <td><b>{{$absence->responsable}}</b></td>
                    <td><b>{{$absence->raison}}</b></td>
                    <td><b>{{$absence->date_in}}</b></td>
                    <td><b>{{$absence->date_out}}</b></td>
                </tr>
            @endforeach
    </table>--}}
    @endif
@endsection
