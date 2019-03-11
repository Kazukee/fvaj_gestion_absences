<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion des absences</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }

            li {
                float: left;
            }

            li a, .dropbtn {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                text-transform: uppercase;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
            }

            li a:hover, dropdown:hover .dropbtn {
                background-color: #b91d19;
            }

            li.dropdown {
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
                text-transform: none;
            }

            .dropdown-content a:hover {
                background-color: #f1f1f1;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

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

        <ul>
            <li><a href="{{ route('accueil') }}">Accueil</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Vues</a>
                <div class="dropdown-content">
                    <a href="{{ route('absence.index') }}">Absences</a>
                    <a href="{{ route('classe.index') }}">Classes</a>
                    <a href="{{ route('eleve.index') }}">Elèves</a>
                    <a href="{{ route('institution.index') }}">Institutions</a>
                    <a href="{{ route('utilisateur.index') }}">Utilisateurs</a>
                </div>
            </li>
        </ul>
        <div class="flex-center position-ref full-height">
            <div class="top-left">
                <img src="{{ URL::to('/')}}/img/Logo_FVAJ_couleur.png" alt="Logo">
            </div>
            <div class="top-right links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
            <div class="content">
                <div class="title m-b-md">
                    Bienvenue sur le système de gestion des absences de la FVAJ
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
                            <tr>
                                <td>{{ $eleve->code }}</td>
                                <td>{{ $eleve->nom }}</td>
                                <td>{{ $eleve->prenom }}</td>
                                <td><a href="{{ route('absences_eleve', $eleve->id) }}">Lien vers les absences</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
