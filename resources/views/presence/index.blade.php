@extends('layouts.app')
@section('content')
@php $i = 0; @endphp
    <head>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
        <!-- MDBootstrap Datatables  -->
        <link href="{{ asset('css/addons/datatables.min.css') }}" rel="stylesheet">
        <style>
            th {
                vertical-align: middle !important;
            }
        </style>
    </head>

<body>
    <h3><b>Liste des présences</b></h3>
    <div class="table-responsive-md">
        <form action="{{ route('presences_classe', $classe->id) }}" method="post">
            <table id="dataPresence" class="table table-hover table-sm">
                <thead>
                <tr>
                    <th scope="col"><b>Nom</b></th>
                    <th scope="col"><b>Prénom</b></th>
                    <th scope="col"><b>Réf.</b></th>
                    <th scope="col">
                        <b> @if ($today == 1)
                                Lundi
                            @elseif ($today == 2)
                                Mardi
                            @elseif ($today == 3)
                                Mercredi
                            @elseif ($today == 4)
                                Jeudi
                            @else
                                Vendredi
                            @endif

                            @if ($time < 12)
                                matin
                            @else
                                après-midi
                            @endif
                        </b>
                    </th>
                    <th scope="col"><b>Présent</b></th>
                    <th scope="col"><b>Retard</b></th>
                    <th scope="col"><b>Absence justifiée</b></th>
                    <th scope="col"><b>Absence injustifiée</b></th>
                </tr>
                </thead>
                @csrf
                @foreach($presences as $presence)
                    <tr>
                        <td><input type="hidden" name="id[@php echo $i @endphp]" value="{{ $presence->id }}">{{ $presence->nom }}</td>
                        <td>{{ $presence->prenom }}</td>
                        <td>{{ $presence->name }}</td>
                        <td>{{ $presence->code }}</td>
                        <td><input type="radio" name="raison[@php echo $i @endphp]" value="Présent" checked></td>
                        <td><input type="radio" name="raison[@php echo $i @endphp]" value="Retard"></td>
                        <td><input type="radio" name="raison[@php echo $i @endphp]" value="Absence justifiée"></td>
                        <td><input type="radio" name="raison[@php echo $i @endphp]" value="Absence injustifiée"></td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </table>
            <p><button type="submit" class="btn btn-sm btn-primary" name="Envoyer">Envoyer</button></p>
        </form>
    </div>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#dataPresence').DataTable({
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4, 5, 6]
                }]
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</body>
@endsection
