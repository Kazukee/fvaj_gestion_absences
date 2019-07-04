@extends('layouts.app')
@section('content')

    <html>
    <head>
        <link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
    </head>
    <body>
    <?php
    use App\Calendrier;

    $calendrier = new Calendrier();

    echo $calendrier->show();
    ?>
    </body>
    </html>
@endsection

