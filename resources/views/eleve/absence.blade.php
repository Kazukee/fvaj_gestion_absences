@if($absences_jour->isEmpty()) Cet élève n'était pas absent ce jour-là. @else
    <h3><b>Absence(s) du {{ $absences_jour[0]->date_in }}</b></h3>
    <table class="table table-hover table-sm">
        <tr>
            <th><b>Absence reportée par</b></th>
            <th><b>Cause</b></th>
            <th><b>Date de début</b></th>
            <th><b>Date de fin</b></th>
        </tr>
        @foreach($absences_jour as $absence_jour)
            <tr>
                <td><b>{{$absence_jour->responsable}}</b></td>
                <td><b>{{$absence_jour->raison}}</b></td>
                <td><b>{{$absence_jour->date_in}}</b></td>
                <td><b>{{$absence_jour->date_out}}</b></td>
            </tr>
        @endforeach
    </table>

    <form action="#" method="post">
        @method('PUT')
        @csrf
        <input type="date" name="date_in">
        <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
    </form>
@endif
