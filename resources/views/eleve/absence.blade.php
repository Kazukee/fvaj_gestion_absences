@extends('layouts.app')
@section('content')
    <h3><b>Liste des absences</b></h3>
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
                    <td><b>{{$absence->name}}</b></td>
                    <td><b>{{$absence->raison}}</b></td>
                    <td><b>{{$absence->date_in}}</b></td>
                    <td><b>{{$absence->date_out}}</b></td>
                </tr>
            @endforeach
            @endif
        </table>
    <form action="{{ route('absences_eleve', $eleve->id) }}" method="post">
        @csrf
        <input type="date" name="date_in" value="<?php echo date('Y-m-d')?>">
        <input type="date" name="date_out" value="<?php echo date('Y-m-d')?>">
        <input type="hidden" name="id" value="35">
        <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
    </form>
@endsection
