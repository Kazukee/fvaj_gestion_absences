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
            th, td {
                vertical-align: middle !important;
                text-align: center;
            }

            #cours {
                color: #B91D19 !important;
            }

            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
    <h3><b>Planning horaire</b></h3>
    <div class="table-responsive-md">
            <table id="planning" class="table table-hover table-sm">
                <thead>
                <tr>
                    <td scope="col"></td>
                    <th scope="col"><b>Raiffeisen 1</b></th>
                    <th scope="col"><b>Raiffeisen 2</b></th>
                    <th scope="col"><b>Raiffeisen 3</b></th>
                    <th scope="col"><b>Ronquoz 1</b></th>
                    <th scope="col"><b>Ronquoz 2</b></th>
                    <th scope="col"><b>Ronquoz 3</b></th>
                </tr>
                </thead>
                    <tr>
                        <th><b>Semaines</b></th>
                        <th>Français et culture générale</th>
                        <th>Mathématiques, expression écrite et tests</th>
                        <th>Travaux personnels</th>
                        <th>Recherches, appuis et savoir-être</th>
                        <th>Atelier technique</th>
                        <th>Travaux personnels</th>
                    </tr>
                <tr>
                    <th>Lu matin</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time < 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 1 (FD)</a>"; } else { echo 'Classe 1 (FD)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time < 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 6B (NS)</a>"; } else { echo 'Classe 6B (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time < 12) { echo "<a id='cours' href='/lieu/3/presences'>ADB1 (NS)</a>"; } else { echo 'ADB1 (NS)'; } @endphp</td>
                    <td>Pas de cours</td>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time < 12) { echo "<a id='cours' href='/lieu/6/presences'>MED2 (NS)</a>"; } else { echo 'MED2 (NS)'; } @endphp</td>
                </tr>
                <tr>
                    <th>Lu apm</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time > 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 2 (FD)</a>"; } else { echo 'Classe 2 (FD)'; } @endphp</td>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time > 12) { echo "<a id='cours' href='/lieu/3/presences'>ADB2 (NS)</a>"; } else { echo 'ADB2 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time > 12) { echo "<a id='cours' href='/lieu/4/presences'>Classe 6B (NS)</a>"; } else { echo 'Classe 6B (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 1 && $time > 12) { echo "<a id='cours' href='/lieu/5/presences'>MED2 (NS)</a>"; } else { echo 'MED2 (NS)'; } @endphp</td>
                    <td>Pas de cours</td>
                </tr>
                <tr>
                    <th>Ma matin</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time < 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 3 (VF)</a>"; } else { echo 'Classe 3 (VF)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time < 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 1 (FD)</a>"; } else { echo 'Classe 1(FD)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time < 12) { echo "<a id='cours' href='/lieu/3/presences'>EC1 (NS)</a>"; } else { echo 'EC1 (NS)'; } @endphp</td>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time < 12) { echo "<a id='cours' href='/lieu/5/presences'>ADB1 (NS)</a>"; } else { echo 'ADB1 (NS)'; } @endphp</td>
                    <td>Pas de cours</td>
                </tr>
                <tr>
                    <th>Ma apm</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time > 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 4 (VF)</a>"; } else { echo 'Classe 4 (VF)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time > 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 2 (FD)</a>"; } else { echo 'Classe 2 (FD)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time > 12) { echo "<a id='cours' href='/lieu/3/presences'>EC2 (NS)</a>"; } else { echo 'EC2 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time > 12) { echo "<a id='cours' href='/lieu/4/presences'>Classe 6A (NS)</a>"; } else { echo 'Classe 6A (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time > 12) { echo "<a id='cours' href='/lieu/5/presences'>ADB2 (NS)</a>"; } else { echo 'ADB2 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 2 && $time > 12) { echo "<a id='cours' href='/lieu/6/presences'>MED1 (NS)</a>"; } else { echo 'MED1 (NS)'; } @endphp</td>
                </tr>
                <tr>
                    <th>Me matin</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time < 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 4 5A (NV)</a>"; } else { echo 'Classe 5A (NV)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time < 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 3 (VF)</a>"; } else { echo 'Classe 3 (VF)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time < 12) { echo "<a id='cours' href='/lieu/3/presences'>EC3 (NS)</a>"; } else { echo 'EC3 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time < 12) { echo "<a id='cours' href='/lieu/4/presences'>Classe 1 (FD)</a>"; } else { echo 'Classe 1 (FD)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time < 12) { echo "<a id='cours' href='/lieu/5/presences'>EC1 (NS)</a>"; } else { echo 'EC1 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time < 12) { echo "<a id='cours' href='/lieu/6/presences'>ADB1 (NS)</a>"; } else { echo 'ADB1 (NS)'; } @endphp</td>
                </tr>
                <tr>
                    <th>Me apm</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time > 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 5B (NV)</a>"; } else { echo 'Classe 5B (NV)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time > 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 4 (VF)</a>"; } else { echo 'Classe 4 (VF)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time > 12) { echo "<a id='cours' href='/lieu/3/presences'>INF3 (NS)</a>"; } else { echo 'INF3 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time > 12) { echo "<a id='cours' href='/lieu/4/presences'>Classe  (FD)</a>"; } else { echo 'Classe 2 (FD)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time > 12) { echo "<a id='cours' href='/lieu/5/presences'>EC2 (NS)</a>"; } else { echo 'EC2 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 3 && $time > 12) { echo "<a id='cours' href='/lieu/6/presences'>ADB2 (NS)</a>"; } else { echo 'ADB2 (NS)'; } @endphp</td>
                </tr>
                <tr>
                    <th>Je matin</th>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time < 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 5A (NV)</a>"; } else { echo 'Classe 5A (NV)'; } @endphp</td>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time < 12) { echo "<a id='cours' href='/lieu/4/presences'>Classe 3 (VF)</a>"; } else { echo 'Classe 3 (VF)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time < 12) { echo "<a id='cours' href='/lieu/5/presences'>EC3 (NS)</a>"; } else { echo 'EC3 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time < 12) { echo "<a id='cours' href='/lieu/6/presences'>EC1 (NS)</a>"; } else { echo 'EC1 (NS)'; } @endphp</td>
                </tr>
                <tr>
                    <th>Je apm</th>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time > 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 5B (NV)</a>"; } else { echo 'Classe 5B (NV)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time > 12) { echo "<a id='cours' href='/lieu/3/presences'>MED2 (NS)</a>"; } else { echo 'MED2 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time > 12) { echo "<a id='cours' href='/lieu/4/presences'>Classe 4 (VF)</a>"; } else { echo 'Classe 4 (VF)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time > 12) { echo "<a id='cours' href='/lieu/5/presences'>INF3 (NS)</a>"; } else { echo 'INF3 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 4 && $time > 12) { echo "<a id='cours' href='/lieu/6/presences'>EC2 (NS)</a>"; } else { echo 'EC2 (NS)'; } @endphp</td>
                </tr>
                <tr>
                    <th>Ve matin</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time < 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 6B (NS)</a>"; } else { echo 'Classe 6B (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time < 12) { echo "<a id='cours' href='/lieu/2/presences'>Classe 6A (NS)</a>"; } else { echo 'Classe 6A (NS)'; } @endphp</td>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time < 12) { echo "<a id='cours' href='/lieu/4/presences'>Classe 5A (NV)</a>"; } else { echo 'Classe 5A (NV)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time < 12) { echo "<a id='cours' href='/lieu/5/presences'>MED1 (NS)</a>"; } else { echo 'MED1 (NS)'; } @endphp</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time < 12) { echo "<a id='cours' href='/lieu/6/presences'>EC3 (NS)</a>"; } else { echo 'EC3 (NS)'; } @endphp</td>
                </tr>
                <tr>
                    <th>Ve apm</th>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time > 12) { echo "<a id='cours' href='/lieu/1/presences'>Classe 6A (NS)</a>"; } else { echo 'Classe 6A (NS)'; } @endphp</td>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time > 12) { echo "<a id='cours' href='/lieu/3/presences'>MED1 (NS)</a>"; } else { echo 'MED1 (NS)'; } @endphp</td>
                    <td>Pas de cours</td>
                    <td>Pas de cours</td>
                    <td>@php $today = date('N'); $time = date('H'); if ($today == 5 && $time > 12) { echo "<a id='cours' href='/lieu/6/presences'>INF3 (NS)</a>"; } else { echo 'INF3 (NS)'; } @endphp</td>
                </tr>
            </table>
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
    </body>
@endsection
