@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/style.css')}}">

<div class="mx-auto container p-3">
    <div class="card p-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tableau de Bord des recettes ventes|| {{now()->year}}</h1>


            <form action="{{route('ventes.home')}}" method="get" class="d-flex gap-2 ">
                @csrf

                <select id="yearSelect" onchange="afficherAnnee()" name="date" class="form-control">
                    <script>
                        var currentYear = new Date().getFullYear();
                        var selectOptions = '';
                        for (var year = currentYear; year >= 2021; year--) {
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

        <div class="container">
            <div class="row mb-3">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Recettes tickets</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_recette_tickets)}} FCFA</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>
                                        <span>Recette Ticket</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-stethoscope text-primary fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100 px-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Recette Médicament</div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{number_format($total_recette_medicament)}} FCFA</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                        <span>Recette Médicament</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-tablets text-primary fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

           


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100 px-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total recettes Pains</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_recette_Pain)}} FCFA</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> </span>
                                        <span>Total recettes Pain</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-utensils text-primary fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100 px-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total des Recettes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($recette_total)}} FCFA</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> </span>
                                        <span>Total des Recettes</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                <i class="fa-solid fa-money-check-dollar text-primary fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100 px-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-danger mr-2"><i class="fas fa-arroww-down"></i> </span>
                                        <span> </span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-commments fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="piechart" style="width: 800px; height: 300px;"></div>
            </div>
        </div>
    </div>
</div>


@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var jsonData = <?php echo json_encode($res); ?>;
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['Recettes des ventes de tickets', jsonData[0]],
            ['Vente de Médicament', jsonData[1]],
            ['Vente Ticket de Pains', jsonData[2]],

        ]);

        var options = {
            title: 'Tableau de bord relatif à la ventes',
            'width': 900,
            'height': 300,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>