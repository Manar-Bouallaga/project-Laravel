<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <img src="data:image/svg+xml;base64,{{ base64_encode($reunions->code_qr_reunion) }}" alt="Code QR de la réunion">
        {{$reunions['date_reunion']}}



</body>
</html>
