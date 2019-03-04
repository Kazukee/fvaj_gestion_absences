<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion des absences de la FVAJ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 36px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .eleves {
                border-collapse: collapse;
                width: 100%;
            }

            .eleves td, .eleves th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            .eleves tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            .eleves tr:hover {
                background-color: #ddd;
            }

            .eleves th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #b91d19;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-left">
                <img src="{{ URL::to('/')}}/img/Logo_FVAJ_couleur.png" alt="Logo">
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bienvenue sur la gestion des absences de la FVAJ
                </div>
                <div>
                    L'outil de gestion des absences du Programme Action Apprentissage
                </div>
                <div>
                    <table class="eleves">
                        <tr>
                            <th><b>Classe</b></th>
                            <th><b>Nom</b></th>
                            <th><b>Prénom</b></th>
                            <th><b></b></th>
                        </tr>

                        @foreach($eleves as $eleve)
                            <td>{{ $eleve->code }}</td>
                            <td>{{ $eleve->nom }}</td>
                            <td>{{ $eleve->prenom }}</td>
                            <td><a href="{{ route('absence.index') }}">Lien vers les absences</a></td>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
