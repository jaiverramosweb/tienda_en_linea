@extends('layouts.admin')
@section('title', 'Panel de control')

@section('content')

    <div class="content-wrapper">
      <div class="page-header">
            <h3 class="page-title">
              Panel administrador
            </h3>
           <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Panel administrador</li>
            </ol>
          </nav> -->
      </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
                      <div class="row">
                          @foreach ($totales as $total)
                            <div class="col-md-6">
                                <div class="card text-white bg-success">
                                  <div class="card-body pb-0">
                                    <div class="float-right">
                                      <i class="fa fa-cart-arrow-down fa-3x"></i>
                                    </div>
                                    <div class="text-value h3">
                                      <strong>$ {{ $total->totalcompra }} (Mes Actual)</strong>
                                    </div>
                                    <div class="h3">Compra</div>
                                  </div>
                                  <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                    <a href="{{route('purchases.index')}}" class="small-box-footer h4">Compras <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                              <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <div class="float-right">
                                      <i class="fas fa-shopping-cart fa-3x"></i>
                                    </div>
                                    <div class="text-value h3">
                                      <strong>$ {{ $total->totalventa }} (Mes Actual)</strong>
                                    </div>
                                    <div class="h3">Ventas</div>
                                  </div>
                                  <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                    <a href="{{route('sales.index')}}" class="small-box-footer h4">Ventas <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                              </div>
                            </div>
                        @endforeach
                      </div>

                      <div class="row mt-5">
                        <div class="col-md-6">
                          <div class="card card-chart">
                            <div class="card-header">
                              <h4 class="text-center">Compras Mes</h4>
                            </div>
                            <div class="card-content">
                              <div class="ct chart">
                                <canvas id="compras"></canvas>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card card-chart">
                            <div class="card-header">
                              <h4 class="text-center">Ventas Mes</h4>
                            </div>
                            <div class="card-content">
                              <div class="ct chart">
                                <canvas id="ventas"></canvas>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="table-responsive">

                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
                      <div class="row">

                        <div class="col-md-12">
                          <div class="card card-chart">
                            <div class="card-header">
                              <h4 class="text-center page-title">Ventas diarias</h4>
                            </div>
                            <div class="card-content">
                              <div class="ct chart">
                                <canvas id="VentasDiarias" height="100"></canvas>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>


                    </div>
                  </div>
                </div>

                <div class="col-md-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">

                      <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-heading">
                          <h4 class="card-title">Productos mas vendidos</h4>
                        </div>
                      </div>

                      <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                        <div class="table-warpper table-responsive">
                        <table class="table table-borderless table-striped">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th>NOMBRE</th>
                              <th>CÓDIGO</th>
                              <th>STOCK</th>
                              <th>CANTIDAD VENDIDA</th>
                              <th>VER DETALLES</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($productosvendidos as $productovendido)
                              <tr>
                                <td>
                                  {{ $productovendido->id }}
                                </td>
                                <td>
                                  {{ $productovendido->name }}
                                </td>
                                <td>
                                  {{ $productovendido->code }}
                                </td>
                                <td>
                                  <strong>{{ $productovendido->stock }}</strong>
                                  Unidades
                                </td>
                                <td>
                                  <strong>{{ $productovendido->quantity }}</strong>
                                  Unidades
                                </td>

                                <td>
                                    <a href="{{ route('products.show', $productovendido->id) }}" class="btn btn-primary">
                                      <i class="far fa-eye"></i>
                                      Ver detalles
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>

                        </table>
                      </div>
                      </div>

                    </div>
                  </div>
                </div>

          </div>
@endsection
@section('scripts')
  {!! Html::script('melody/js/data-table.js') !!}
  {!! Html::script('melody/js/chart.js') !!}

  <script>
    $(function () {
        
      var varCompra = document.getElementById('compras').getContext('2d');
        var charCompra = new Chart(varCompra, {
          type: 'line',
          data: {
            labels: [
                <?php
                  foreach($compasmes as $reg){
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                    $mes_traducido = strftime('%B', strtotime($reg->mes));
                    echo '"'. $mes_traducido . '",';
                  }
                ?>
            ],
            datasets: [{
              label: 'Compras',
              data: [<?php foreach ($compasmes as $reg)
                    { echo '' . $reg->totalmes . ','; } ?>],
              borderColor: 'rgba(225, 99, 132, 1)',
              borderWidth: 3
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });

        console.log(charCompra)

        var varVenta = document.getElementById('ventas').getContext('2d');
        var charVenta = new Chart(varVenta, {
          type: 'line',
          data: {
            labels: [<?php foreach ($ventasmes as $reg)
              {
              setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
              $mes_traducido = strftime('%B', strtotime($reg->mes));
              echo '"'. $mes_traducido . '",';
              } ?>],
            datasets: [{
              label: 'Ventas',
              data: [<?php foreach ($ventasmes as $reg)
                    { echo '' . $reg->totalmes . ','; } ?>],
              backgroundColor: 'rgba(50, 204, 20, 1)',
              borderColor: 'rgba(54, 162, 235, 0.2)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
        var varVenta = document.getElementById('VentasDiarias').getContext('2d');
        var charVenta = new Chart(varVenta, {
          type: 'bar',
          data: {
            labels: [<?php foreach ($ventasdia as $reg)
              {
              $dia = $reg->dia;
              echo '"'. $dia . '",';
              } ?>],
            datasets: [{
              label: 'Ventas',
              data: [<?php foreach ($ventasdia as $reg)
                    { echo '' . $reg->totaldia . ','; } ?>],
              backgroundColor: 'rgba(20, 204, 20, 1)',
              borderColor: 'rgba(54, 162, 235, 0.2)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
    });

  </script>
@endsection