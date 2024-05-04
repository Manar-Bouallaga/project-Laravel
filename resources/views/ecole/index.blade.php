<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des écoles</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">


    <style>
:root {
	--poppins: 'Poppins', sans-serif;
	--lato: 'Lato', sans-serif;

	--light: #F9F9F9;
	--blue: #3C91E6;
	--light-blue: #CFE8FF;
	--grey: #eee;
	--dark-grey: #AAAAAA;
	--dark: #342E37;
	--red: #DB504A;
	--yellow: #FFCE26;
	--light-yellow: #FFF2C6;
	--orange: #FD7238;
	--light-orange: #FFE0D3;
}

.table-data .todo {
	flex-grow: 1;
	flex-basis: 300px;

}
.table-data .todo .todo-list {
	width: 100%;

}
.table-data .todo .todo-list tr {
	width: 100%;
	margin-bottom: 16px;
	background: var(--grey);
	border-radius: 10px;
	padding: 14px 20px 10px 20px;
	display: flex;
	 justify-content: space-around;;
	align-items: center;
}
.table-data .todo .todo-list tr .bx {
	cursor: pointer;
}
.table-data .todo .todo-list tr.publique {
	border-left: 10px solid var(--blue);
}
.table-data .todo .todo-list tr.privée {
	border-left: 10px solid var(--orange);
}
.table-data .todo .todo-list tr:last-child {
	margin-bottom: 0;
}
/* Ajoutez ces règles CSS pour définir une largeur fixe aux colonnes du tableau */
th, td {
    width: 33.33%; /* Répartit équitablement la largeur sur trois colonnes */
}



    </style>
</head>
<body>

        <div class="container">
        <h1 class="text-center" style="color: #3c91e6">Liste des écoles</h1>
        <div class="row my-3">
            <div class="col-md-6">
                <a href="{{ route('ecoles.create') }}" class="btn btn-primary">Ajouter une école</a>
            </div>
            <div class="col-md-6">
                <form action="{{ route('ecoles.index') }}" method="GET" class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Rechercher par nom d'école">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="table-data">
        <div class="todo">
            <div class="head">
                    <table class="todo-list">
                            <tr>
                                <th>Nom école</th>
                                <th>Catégorie</th>
                                <th>Actions</th>
                            </tr>

                        @foreach ($ecoles as $ecole)

                    <tr class="{{ $ecole->categorie }}">
                         <td>{{ $ecole->nom_ecole }}</td>
                         <td>{{ $ecole->categorie }}</td>

                    <td style="display: flex">
                        <form  action="{{ route('ecoles.destroy', $ecole->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; padding: 0;">
                                <img width="20px" src="effacer.png" alt="">
                            </button>
                        </form>
                        <a style="padding-left: 6px" href="{{ route('ecoles.edit', $ecole->id) }}" ><img width="20px" src="stylo.png" alt=""></a>
                    </td>
                </tr>
                     @endforeach

                    </table>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
