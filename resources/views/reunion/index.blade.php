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
    position: relative !important;
    display: inline-block !important;

  }
  .dropbtn{
    border: none !important;
    background: white !important;
  }

  .dropdown-content {
    display: none !important;
    position: absolute !important;
    background-color: #f9f9f9 !important;
    min-width: 160px !important;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2) !important;
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black !important;
    padding: 12px 16px !important;
    text-decoration: none !important;
    display: block !important;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #f1f1f1 !important;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block !important;
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

        <img src="data:image/svg+xml;base64,{{ base64_encode($reunion->code_qr_reunion) }}" alt="Code QR de la réunion">
        <span class="text">
            <h3>{{$reunion->date_reunion}}</h3>
            <p>{{$reunion->heure_rendez_vous}}</p>
            <p>{{$reunion->lieu_rencontre}}</p>
        </span>
        <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form method="post" action="{{route('reunions.destroy', $reunion->id)}}">
                        @csrf
                        @method('delete')
                            <input class="btn btn-sm btn-outline-secondary" type="submit" value="supprimer">
                        </form>
                  <a class="btn btn-sm btn-outline-secondary" href="{{route('reunions.edit', $reunion->id)}}">update</a>
                </div>
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
