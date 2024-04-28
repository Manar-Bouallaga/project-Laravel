<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello Reunion</h1>
    <table border="1">

            @foreach($reunions as $reunion)
            <tr>
            <td>
                {{$reunion->lieu_rencontre}}
                <a href="{{route("reunions.edit" , $reunion->id)}}">Modifier</a>
                <br>
                <img src="data:image/svg+xml;base64,{{ base64_encode($reunion->code_qr_reunion) }}" alt="Code QR de la réunion">
            </td>

</tr>
            @endforeach

    </table>
    <a href="{{route("reunions.create")}}">ajouter un nouvau reunion </a>

</body>
</html>
