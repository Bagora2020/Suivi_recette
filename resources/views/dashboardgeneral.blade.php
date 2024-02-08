@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{asset('css/style.css')}}">

<div class="mx-auto container p-3">
  <div class="card p-3">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Tableau de Bord recettes totales|| {{now()->year}}</h1>

      <form action="{{route('dashboardgeneral')}}" method="get" class="d-flex gap-2 ">
        @csrf

        <select id="yearSelect" onchange="afficherAnnee()" name="date" class="form-control">
        // je recuperer la liste dans la session de l appli avec la cle l ors de l enregistrement
              <script>
                // const o = sessionStorage.getItem('shjsgusjgs');
                // const ob = JSON.parse(o)
                // ob.forEach(ep => {
                //   '<option value="' + ep.id + '">' + ep.nom + '</option>'
                // })
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
          <div class="card h-100 p-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Recette Location</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $recette_location }} FCFA</div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>
                    <span>Recette Location</span>
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
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Recette Ventes</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$recette_vente}} FCFA</div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span>recette Ventes</span>
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
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Recette Totale</div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$recette_total}} FCFA </div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                    <span>Recette totale</span>
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
                  <div class="text-xs font-weight-bold text-uppercase mb-1"></div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"> </div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-danger mr-2"><i class="fas fa-arrrow-down"></i></span>
                    <span></span>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-commments fa-2x text-warning"></i>
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
                    <span class="text-danger mr-2"><i class="fsas  fa-arro-down"></i></span>
                    <span></span>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-commments fa-2x text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="chart-div" style="width: 700px; height: 250px;"></div>
      </div>
    </div>
  </div>
</div>


@endsection

<script src='https://www.gstatic.com/charts/loader.js'></script>
<script>
  var jsonData = <?php echo json_encode($total_recette); ?>;

  google.charts.load('upcoming', {
    'packages': ['vegachart']
  }).then(drawChart);

  function drawChart() {
    const dataTable = new google.visualization.DataTable();
    dataTable.addColumn({
      type: 'string',
      'id': 'category'
    });
    dataTable.addColumn({
      type: 'number',
      'id': 'amount'
    });
    dataTable.addRows([
      ['recette Vente', jsonData[0]],
      ['recette Location', jsonData[1]],
      //   ['C', 43],
      //   ['D', 91],
      //   ['E', 81],
      //   ['F', 53],
      //   ['G', 19],
      //   ['H', 87],
    ]);

    const options = {
      "vega": {
        "$schema": "https://vega.github.io/schema/vega/v4.json",
        "width": 500,
        "height": 200,
        "padding": 5,

        'data': [{
          'name': 'table',
          'source': 'datatable'
        }],

        "signals": [{
          "name": "tooltip",
          "value": {},
          "on": [{
              "events": "rect:mouseover",
              "update": "datum"
            },
            {
              "events": "rect:mouseout",
              "update": "{}"
            }
          ]
        }],

        "scales": [{
            "name": "xscale",
            "type": "band",
            "domain": {
              "data": "table",
              "field": "category"
            },
            "range": "width",
            "padding": 0.05,
            "round": true
          },
          {
            "name": "yscale",
            "domain": {
              "data": "table",
              "field": "amount"
            },
            "nice": true,
            "range": "height"
          }
        ],

        "axes": [{
            "orient": "bottom",
            "scale": "xscale"
          },
          {
            "orient": "left",
            "scale": "yscale"
          }
        ],

        "marks": [{
            "type": "rect",
            "from": {
              "data": "table"
            },
            "encode": {
              "enter": {
                "x": {
                  "scale": "xscale",
                  "field": "category"
                },
                "width": {
                  "scale": "xscale",
                  "band": 1
                },
                "y": {
                  "scale": "yscale",
                  "field": "amount"
                },
                "y2": {
                  "scale": "yscale",
                  "value": 0
                }
              },
              "update": {
                "fill": {
                  "value": "steelblue"
                }
              },
              "hover": {
                "fill": {
                  "value": "green"
                }
              }
            }
          },
          {
            "type": "text",
            "encode": {
              "enter": {
                "align": {
                  "value": "center"
                },
                "baseline": {
                  "value": "bottom"
                },
                "fill": {
                  "value": "#333"
                }
              },
              "update": {
                "x": {
                  "scale": "xscale",
                  "signal": "tooltip.category",
                  "band": 0.5
                },
                "y": {
                  "scale": "yscale",
                  "signal": "tooltip.amount",
                  "offset": -2
                },
                "text": {
                  "signal": "tooltip.amount"
                },
                "fillOpacity": [{
                    "test": "datum === tooltip",
                    "value": 0
                  },
                  {
                    "value": 1
                  }
                ]
              }
            }
          }
        ]
      }
    };

    const chart = new google.visualization.VegaChart(document.getElementById('chart-div'));
    chart.draw(dataTable, options);
  }
</script>