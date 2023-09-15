@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="pie-chart1" class="chart-canvas" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="pie-chart2" class="chart-canvas" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="bar-hor-chart" class="chart-canvas" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const pie1 = document.getElementById('pie-chart1');

    new Chart(pie1, {
        type: 'pie'
        , data: {
            labels: ['Male', 'Female']
            , datasets: [{
                label: 'Suspect Gender'
                , data: [60, 40], // Example data, you can replace with actual values
                backgroundColor: [
                    'rgba(54, 162, 235)', // Color for 'Male' slice
                    'rgba(255, 99, 132)' // Color for 'Female' slice
                ]
                , borderWidth: 1
            }]
        }
        , options: {
            responsive: true
            , plugins: {
                title: {
                    display: true
                    , text: 'Suspect Gender', // Title text
                    position: 'top'
                }
                , legend: {
                    position: 'bottom'
                }
            }
        }
    });

    const pie2 = document.getElementById('pie-chart2');

    new Chart(pie2, {
        type: 'pie'
        , data: {
            labels: ['Male', 'Female']
            , datasets: [{
                label: 'Victim Gender'
                , data: [100, 40], // Example data, you can replace with actual values
                backgroundColor: [
                    'rgba(54, 162, 235)', // Color for 'Male' slice
                    'rgba(255, 99, 132)' // Color for 'Female' slice
                ]
                , borderWidth: 1
            }]
        }
        , options: {
            responsive: true
            , plugins: {
                title: {
                    display: true
                    , text: 'Victim Gender', // Title text
                    position: 'top'
                }
                , legend: {
                    position: 'bottom'
                }
            }
        }
    });

    const ctx1 = document.getElementById('bar-hor-chart');

    new Chart(ctx1, {
        type: 'bar'
        , data: {
            labels: ['Unharmed', 'Harmed', 'Wounded', 'Killed', 'Deceased']
            , datasets: [{
                label: 'Total Cases'
                , data: [12, 19, 3, 15, 20]
                , backgroundColor: [
                    'rgba(255, 99, 132)', // Color for 'Solved' bar
                    'rgba(54, 162, 235)', // Color for 'Cleared' bar
                    'rgba(0, 204, 102)', // Color for 'Under Investigation' bar
                    'rgba(153, 51, 255)', // Color for 'Solved' bar
                    'rgba(255, 205, 86)' // Color for 'Under Investigation' bar

                ]
                , borderWidth: 1
            }]
        }
        , options: {
              scales: {
                x: {
                    beginAtZero: true
                }
            }
            , plugins: {
                title: {
                    display: true
                    , text: 'Victim Status', // Title text
                    position: 'top'
                }
                , legend: {
                    display: false
                    , position: 'bottom'
                }
            }
        }
    });


</script>

@endpush
