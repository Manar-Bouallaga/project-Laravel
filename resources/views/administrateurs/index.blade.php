<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

	<title>AdminHub</title>
    <style>
      .brand img{
        margin-left: 12px;
         padding: 6px;
      }
      .card-body {
    color: black;
}
    </style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a  class="brand">
			{{-- <i class='bx bxs-smile'></i> --}}
            <img width="48px"  src="presentation (1).png" alt="">
			<span class="text">CPSI</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" style="text-decoration: none">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#" style="text-decoration: none">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Accueil</span>
				</a>
			</li>
			<li>
				<a href='{{route("ecoles.index")}}' style="text-decoration: none">

					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">liste d'écoles</span>
				</a>
			</li>
			<li>
				<a href='{{route("reunions.index")}}' style="text-decoration: none">
					<i class='bx bxs-group' ></i>
					<span class="text">Réunion</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="{{ route('profile.edit') }}" style="text-decoration: none">
					<i class='bx bxs-cog' ></i>
					<span class="text">paramètre</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>


		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
					<h1>Dashboard</h1>
			</div>
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>N° de réunion</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>N° d'école</p>
					</span>
				</li>
				<li>
					{{-- <i class='bx bx-list-check'></i> --}}
                    <i class='bx bxs-bar-chart-alt-2'></i>
					<span class="text">
						<h3>60.44%</h3>
						<p>T° participation</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				 <div class="order">
                    <div style="display: flex">
					<h3>Réunion</h3>
                    <a href="{{route("reunions.index")}}" style=" text-decoration: none"><i style="font-size: 13px">voir plus </i><img width="20px" src="right-arrow.png" alt=""></a>
                    </div>
                    <div class="head">
  {{-- ---------------------------------------------------- -------------------------------------- --}}

                        <ul class="box-infos">
                            @foreach($reunions as $reunion)
                            <li>
                                <img src="data:image/svg+xml;base64,{{ base64_encode($reunion->code_qr_reunion) }}" alt="Code QR de la réunion">
                                <span class="text">
                                    <h3>{{$reunion->date_reunion}}</h3>
                                    <p>{{$reunion->heure_rendez_vous}}</p>
                                    <p>{{$reunion->lieu_rencontre}}</p>
                                </span>
                            </li>
                            @endforeach
                        </ul>

                     </div>
			   </div>
   {{-- ---------------------------------------------------- -------------------------------------- --}}


            <div class="todo">
                <div style="display: flex">
					<h3>liste d'écoles</h3>
                    <a href="{{route("ecoles.index")}}" style=" text-decoration: none"><i style="font-size: 13px">voir plus </i><img width="20px" src="right-arrow.png" alt=""></a>
                </div>
                    <div class="head">
                            <ul class="todo-list">
                                @foreach ($ecoles as $ecole)

                            <li class="{{ $ecole->categorie }}">
                                 <p>{{ $ecole->nom_ecole }}</p>
                                 <p>{{ $ecole->categorie }}</p>
                            </li>
                             @endforeach

                        </ul>
				    </div>
                </div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})
    </script>
</body>
</html>
