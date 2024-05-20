<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réunion</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }

        .meeting-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        .qr-code img {
            max-width: 100%;
            height: auto;
        }

        .directors-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .directors-table th,
        .directors-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .directors-table th {
            background-color: #f8f9fa;
        }

        .directors-table tbody tr:hover {
            background-color: #f0f0f0;
        }

        .stats-chart {
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="meeting-container text-center">
                    <h2 class="mb-4">Réunion</h2>
                    <p>Date:{{$reunions->date_reunion}}</p>
                    <p>Lieu:{{$reunions->lieu_rencontre}}</p>
                    <!-- QR code image -->
                    <div class="qr-code">
                        <img src="data:image/svg+xml;base64,{{ base64_encode($reunions->code_qr_reunion) }}"
                            alt="Code QR de la réunion">
                    </div>
                    <h3 class="mt-5 mb-4">Directeurs Présents</h3>
                    <!-- Directors table -->
                    <table class="directors-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Temps de Validation</th>
                                <th>École</th>
                                <th>Téléphone</th>
                            </tr>

                            @foreach ($directeurs as $directeur)
                                <tr>
                                    <th>
                                        {{$directeur->nom}}
                                    </th>
                                    <th>{{$directeur->prenom}}</th>
                                    <!--  $directeur->ecole->nom -->
                                    <th>{{$directeur->pivot->date_heure_presence}}</th>

                                    <th>{{$directeur->telephone}}</th>
                                </tr>
                            @endforeach

                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <ul>

                    </ul>

                    <div class="stats-chart mt-5">
                        <h3>Statistiques de Présence et d'Absence</h3>
                        <!-- Chart.js chart -->
                        <canvas id="myChart"></canvas>
                    </div>
                    <!-- Button for return -->
                    <a href="{{route('reunions.index')}}" class="btn btn-primary mt-4"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample data for chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Présence', 'Absence'],
                datasets: [{
                    label: 'Statistiques de Présence et d\'Absence',
                    data: [15, 11], // Sample data, replace with actual data
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>
