<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('bootstrap.min.css')}}">
</head>
<body>
<h1 class= "text-center text-primary">Liste des écoles</h1>


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
            <td>
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


</body>
</html>
