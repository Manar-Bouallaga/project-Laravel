<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('bootstrap.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <form style="width: 80%;border-radius: 9px;border: solid 1px #dfdfdf;margin: auto;padding: 39px;" method='post' action="{{route('reunions.update',$reunions->id)}}" class="my-5 bg-light-subtle">
        @csrf
        @method("put")

        <h1>ajouter une Reunion :</h1>
        <label > Date de Reunion </label>
        <input class="form-control" type="date" name="date_reunion" value="{{$reunions->date_reunion}}" >
        <br>
        <label >Heure de debut </label>
        <input class="form-control"  type="time" name="heure_rendez_vous" id="heure" value="{{$reunions->heure_rendez_vous}}">

        <br>
        <label >Le lieu  </label>
        <input class="form-control"  type="text" name="lieu_rencontre" id="heure" value="{{$reunions->lieu_rencontre}}">

        <br>
        
        <input  class="btn btn-primary btn-block mb-4" type="submit" value="ajouter">
</form>


</body>
</html>


