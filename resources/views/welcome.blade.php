@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion des absences</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container-fluid">
                <div>
                    <p style="font-size: 26px;">Bienvenue sur le système de gestion des absences de la FVAJ</p>
                </div>
                <div>
                    <p style="font-size: 20px;">L'outil de gestion des absences du Programme Action Apprentissage</p>
                </div>
                <div>
                    @if($eleves->count() != 0)
                    <table class="eleves">
                        <tr>
                            <th><b>Classe</b></th>
                            <th><b>Nom</b></th>
                            <th><b>Prénom</b></th>
                            <th><b></b></th>
                        </tr>
                        @foreach($eleves as $eleve)
                            <tr>
                                <td>{{ $eleve->code }}</td>
                                <td>{{ $eleve->nom }}</td>
                                <td>{{ $eleve->prenom }}</td>
                                <td><a href="{{ route('absences_eleve', $eleve->id) }}">Lien vers les absences</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
