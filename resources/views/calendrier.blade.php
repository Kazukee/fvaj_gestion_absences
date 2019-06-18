@extends('layouts.app')
@section('content')

    <html>
    <head>
        <link href="{{ asset('css/calendrier.css') }}" rel="stylesheet">
    </head>
    <body>
    <?php
    $calendrier = new \App\Calendrier();

    echo $calendrier->show();
    ?>
    </body>
    </html>
@endsection

