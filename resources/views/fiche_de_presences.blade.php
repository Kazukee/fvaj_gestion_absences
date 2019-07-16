<html>
<head>
    <style>

    </style>
</head>
<body>
    @foreach($presences as $presence)
        <h1>{{ $presence->prenom }}</h1>
    @endforeach
</body>
</html>
