@extends('layouts.app')
@section('content')
    <h3><b>Liste des absences</b></h3>
    <div class="table-responsive-md">
    <table class="table table-hover">
        @if(empty($absences->count()))
            <p>Cet élève n'a jamais été absent.</p>
        @else

            <tr>
                <th scope="col"><b>Absence reportée par</b></th>
                <th scope="col"><b>Cause</b></th>
                <th scope="col"><b>Date de début</b></th>
                <th scope="col"><b>Date de fin</b></th>
            </tr>
            @foreach($absences as $absence)
                <tr>
                    <td>{{$absence->name}}</td>
                    <td>{{$absence->raison}}</td>
                    <td>{{date_format(new DateTime($absence->date_in), 'd.m.Y')}}</td>
                    <td>{{date_format(new DateTime($absence->date_out), 'd.m.Y')}}</td>
                </tr>
            @endforeach
            @endif
        </table>
    </div>
    <form action="{{ route('absences_eleve', $eleve->id) }}" method="post">
        @csrf
        <input type="date" name="date_in" value="<?php echo date('Y-m-d')?>">
        <input type="date" name="date_out" value="<?php echo date('Y-m-d')?>">
        <input type="hidden" name="id" value="35">
        <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
    </form>
@endsection
