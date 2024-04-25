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
    <form style="width: 80%;border-radius: 9px;border: solid 1px #dfdfdf;margin: auto;padding: 39px;" method='post' action="{{route('ecoles.store')}}" class="my-5 bg-light-subtle">
        @csrf
        <h1>ajouter un ecole</h1>
        <label > Nom d'ecole</label>
        <input class="form-control" type="text" name="nom_ecole" >
        <br>
        <label >type d'ecole  </label>
        <select class="form-control"  name="categorie" id="">
            <option value="prive">prive</option>
            <option value="public">public</option>
        </select>

        <br>
        <input  class="btn btn-primary btn-block mb-4" type="submit" value="ajouter">
</form>


</body>
</html>

