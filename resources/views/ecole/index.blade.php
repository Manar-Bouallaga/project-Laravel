<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('bootstrap.min.css')}}">
    <style>
       /* #ajouter, #search{
            text-decoration: none;
             text-color:#ffffff;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;   */
        
    </style>

</head>
<body>


<h1 class= "text-center text-primary">Liste des écoles</h1>
<tr>
            <th><button><a href="{{route("ecoles.create")}}">Ajouter une école</a></button></th>
            <th><input placeholder="Rechercher"></th>

        </tr>

<table class="table table-striped my-5">
<tr>
            <th>Nom école</th>
            <th>Catégorie</th>
            <th>Supprimer</th>
            <th>Modifier</th>

        </tr>
        @foreach ($ecoles as $ecole)
        <tr>
            <td>
                {{
                        $ecole->nom_ecole
                    }}
            </td>
{{
                        $ecole->categorie
                    }}
            </td>
            <td><form method="post" action="{{route('ecoles.destroy', $ecole->id)}}">
        @csrf
        @method("delete")
        <input type="submit" value="Supprimmer" class="btn btn-danger">
        </form></td>
            <td> <a class="btn btn-primary" href="{{route("ecoles.edit" , $ecole->id)}}" >Modifier</a></td>

        </tr>
        @endforeach
    </table>

<h1>index</h1>
<a href="{{route('ecoles.create')}}"> ajoute un ecole </a>


</body>
</html>
