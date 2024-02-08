@extends('layouts.app')
@section('content')

<div class="mx-auto container p-3">
    <div class="card p-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tableau de Bord des recettes de la location pour l'exercice {{now()->year}}</h1>
          
          
            <form action="{{route('location.home')}}" method="get" class="d-flex gap-2 ">
                @csrf

                <select id="yearSelect" onchange="afficherAnnee()" name="date" class="form-control">
                    <script>
                        var currentYear = new Date().getFullYear();
                        var selectOptions = '';
                        for (var year = currentYear; year >= 1900; year--) {
                            selectOptions += '<option value="' + year + '">' + year + '</option>';
                        }
                        document.write(selectOptions);
                    </script>
                </select>

                <button type="submit" value="" class="btn btn-primary">
                    <i class="bi bi-filter"></i>
                </button>

            </form>
          
          
          
          
          
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="container"></div>
        <div class="row mb-3">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Recette  Cafétaria</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_recette_greenvibes }} FCFA</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                    <span>Recette GreenVibes</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Recette Salle Foyer Alpha SANE</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_recette_sallecafetaria }} FCFA</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                    <span>ecette Salle Cafetaria</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Recette Terrain Multisport</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total_recette_terrainmultisport }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                    <span>Recette Terrain Multisport</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Recette Total Location</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $recettes_total_location }} FCFA</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> </span>
                                    <span>Recette Total Location</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-danger mr-2"><i class="fas fa-arrrow-down"></i> </span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-coùmments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <html>

            <head>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    var jsonData = <?php echo json_encode($location); ?>;

                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = new google.visualization.DataTable();

                        data.addColumn('string', 'Topping');
                        data.addColumn('number', 'Slices');
                        data.addRows([
                            ['Greenvibes', jsonData[0]],
                            ['Salle Cafetaria', jsonData[1]],
                            ['Terrain MultiSport', jsonData[2]],

                        ]);

                        var options = {
                            title: 'Tableau de bord relatif à la ventes'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
            </head>

            <body>
                <div id="piechart" style="width: 800px; height: 300px;"></div>
            </body>

            </html>








        </div>
    </div>
</div>


@endsection