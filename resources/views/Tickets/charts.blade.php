@extends('layouts.app')
@section('content')
<div class="row justify-content-center">

    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tickets por Mes</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myChart"></canvas>
                </div>
                <hr>

            </div>
        </div>


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: {!! json_encode($months) !!},
        datasets: [{
          label: 'Total de Tickets por Mes',
          data: {!! json_encode($monthCount) !!},
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
<script>


</script>

@endsection
