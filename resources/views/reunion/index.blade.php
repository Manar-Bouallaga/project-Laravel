<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->


	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{url('bootstrap.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <style>



.dropdown {
    position: relative;
    display: inline-block;

  }
  .dropbtn{
    border: none;
    background: white;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

    </style>
</head>
<body>


    <div>
    <div class="table-data card my-5"style='width:80% ; margin:auto;'>
    <div class="row my-3" style="    padding: 30px;width: 99%;">


            <div class="col-md-6" >
                <a href="{{ route('reunions.create') }}" class="btn btn-primary">Ajouter une reunion</a>
            </div>
            <div class="col-md-6">
                <form action="{{ route('reunions.index') }}" method="GET" class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Rechercher par la date ">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>

            </div>

<div class="head">
    {{-- ---------------------------------------------------- -------------------------------------- --}}
    <ul class="box-infos" style="padding:0" >
    @foreach($reunions as $reunion)
        <li>
         <div class="d-flex justify-content-between">
        <img src="data:image/svg+xml;base64,{{ base64_encode($reunion->code_qr_reunion) }}" alt="Code QR de la réunion">
        <div class="dropdown">
                    <form method="post" action="{{route('reunions.destroy', $reunion->id)}}">
                @csrf
                @method('delete')
                <div class="dropdown-content">
                    <button type="submit">Supprimer</button>
                    <a href="{{route('reunions.edit', $reunion->id)}}">Modifier</a>
                </div>
            </form>
            <span class="dropbtn"><img src="trois-points (1).png"  alt="img"></span>

          </div></div>
        <span class="text">
            <h3>{{$reunion->date_reunion}}</h3>
            <p>{{$reunion->heure_rendez_vous}}</p>
            <p>{{$reunion->lieu_rencontre}}</p>
        </span>
        <div class="d-flex justify-content-between align-items-center">


                <small class="text-muted"><a href="{{route("reunions.show", $reunion->id)}}">show</a></small>
              </div>
    </li>
    @endforeach
           </ul>
                     </div>
			   </div>
   {{-- ---------------------------------------------------- -------------------------------------- --}}


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
