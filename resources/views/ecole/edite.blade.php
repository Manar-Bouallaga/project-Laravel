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
    <form style="width: 80%;border-radius: 9px;border: solid 1px #dfdfdf;margin: auto;padding: 39px;" method='post' action="{{route('ecoles.update' , $ecoles->id)}}" class="my-5 bg-light-subtle">
        @csrf
        @method("put")
        <h1>ajouter une école</h1>
        <label > Nom d'école</label>
        <input class="form-control" type="text" name="nom_ecole" value="{{$ecoles->nom_ecole}}" >
        <br>
        <label >type d'école  </label>
        <select class="form-control"  name="categorie" id="" value="{{$ecoles->categorie}}" >
            <option value="privée">privée</option>
            <option value="publique">publique</option>
        </select>

        <br>
        <input  class="btn btn-primary btn-block mb-4" type="submit" value="ajouter">
</form>


</body>
</html>

