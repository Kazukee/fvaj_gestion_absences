@php $today = date('N'); $time = date('H'); @endphp
<html>
<head>
    <style>
        .noBorder {
            border: none;
        }

        #dataPresence {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        thead {
            background-color: #b91d19;
            font-weight: bold;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        th, td {
            text-align: center;
            vertical-align: center;
            padding: 10px;
            border: 1px solid black;
        }

        /*section {
            box-sizing: border-box;
            white-space: nowrap;
        }

        section > div {
            box-sizing: border-box;
            display: inline-block;
            text-align: center;
            width: calc(100% / 3);
            white-space: normal;
        }*/
    </style>
</head>
<body>
    <table>
        <tr>
            <th width="33.33%" class="noBorder">{{ date('d.m.Y') }}</th>
            <th width="33.33%" class="noBorder">Classe : {{ $classes_eleve[0][0]->code }}</th>
            <th width="33.33%" class="noBorder">Responsable de la fiche: {{ Auth::user()->name }}</th>
        </tr>
    </table>
    <div class="table-responsive-md">
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
                        @elseif ($time < 18)
                            après-midi
                        @else
                            soir
                        @endif
                    </b>
                </th>
                @if($time >= 18)
                    <th scope="col">Matière</th>
                @endif
                <th scope="col"><b>Présent</b></th>
                <th scope="col"><b>Retard</b></th>
                <th scope="col"><b>Absence justifiée</b></th>
                <th scope="col"><b>Absence injustifiée</b></th>
                @if($time >= 18)
                    <th scope="col">Remarque</th>
                @endif
            </tr>
            </thead>
            @for($i = 0; $i < count($classes_eleve); $i++)
                <tr>
                    <td>{{ $noms_eleve[$i][0]->nom }}</td>
                    <td>{{ $prenoms_eleve[$i][0]->prenom }}</td>
                    <td>{{ $referents_eleve[$i][0]->name }}</td>
                    <td>{{ $classes_eleve[$i][0]->code }}</td>
                    @if($time >= 18)
                        <td>{{ $matieres[$i][0]->label }}</td>
                    @endif
                    <td>@if($raisons[$i] == 'Présent') X @else @endif</td>
                    <td>@if($raisons[$i] == 'Retard') X @else @endif</td>
                    <td>@if($raisons[$i] == 'Absence justifiée') X @else @endif</td>
                    <td>@if($raisons[$i] == 'Absence injustifiée') X @else @endif</td>
                    @if($time >= 18)
                        <td>{{ $remarque[$i] }}</td>
                    @endif
                </tr>
            @endfor
        </table>
    </div>
</body>
</html>
