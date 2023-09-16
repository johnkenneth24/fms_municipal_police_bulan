@extends('layouts.user_type.auth')

@section('content')
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header pb-0 d-flex justify-between align-items-center">
                <h6 class="mb-0 me-2">SELECT A YEAR</h6>
                <form class="col-md-3">
                    <select id="year" class="form-control">
                        <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                        @for ($i = $latestYear - 1; $i >= $oldestYear; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </form>
            </div>
            <div class="card-body p-3 pt-0">
                <div class="chart">
                    <canvas id="line-chart" class="chart-canvas" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body p-3">
                <div class="chart">
                    <canvas id="bar-chart" class="chart-canvas" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body p-3">
                <div class="chart">
                    <canvas id="bar-hor-chart1" class="chart-canvas" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
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

@endsection

@push('scripts')
<script>
            let chartInstance = null;
            let horChartInstance = null;
            let lineChartInstance = null;
            let suspectChartInstance = null;
            let victimChartInstance = null;

            $(document).ready(function() {
                $('#year').change(function() {
                    var selectedYear = $(this).val();

                    if (selectedYear) {
                        // AJAX request to get the data for the line chart
                        $.ajax({
                            url: '{{ route('get.year.count') }}',
                            type: 'GET',
                            data: {
                                'year': selectedYear
                            },
                            success: function(data) {
                                updateCharts(data, selectedYear);
                                console.log(data);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                });

                // Automatically trigger the change event when the page loads
                $('#year').trigger('change');
            });

            function updateCharts(data, selectedYear) {
                updateLineChart(data, selectedYear);
                updateBarChart(data, selectedYear);
                updateBarHorChart(data, selectedYear);
                updateSuspectChart(data, selectedYear);
                updateVicitmChart(data, selectedYear)
            }

            function updateLineChart(data, selectedYear) {
                const lineChart = document.getElementById('line-chart');
                // Destroy the existing chart if it exists
                if (lineChartInstance) {
                    lineChartInstance.destroy();
                }

                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
                const counts = [
                    data.janCount, data.febCount, data.marCount, data.aprCount, data.mayCount, data.junCount,
                    data.julCount, data.augCount, data.septCount, data.octCount, data.novCount, data.decCount
                ];

                lineChartInstance = new Chart(lineChart, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Crime Cases',
                            data: counts,
                            fill: false,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Number of Cases'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Month'
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Crime Cases for ' + selectedYear,
                                position: 'top'
                            },
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }

            function updateBarHorChart(data, selectedYear) {
                const barHorChart = document.getElementById('bar-hor-chart1')

                if (horChartInstance)
                {
                    horChartInstance.destroy();
                }

                horChartInstance = new Chart(barHorChart, {
                    type: 'bar'
                    , data: {
                        labels: ['Prosecutiuon', 'Court', 'Law Agency', 'Dismissed']
                        , datasets: [{
                            label: 'Total Cases'
                            , data: [
                                data.prosec,
                                data.filed,
                                data.law,
                                data.dismissed
                            ]
                            , backgroundColor: [
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
                                , text: 'Case Progress', // Title text
                                position: 'top'
                            }
                            , legend: {
                                display: false
                                , position: 'bottom'
                            }
                        }
                    }
                });
            }

            function updateBarChart(data, selectedYear) {
                const barChart = document.getElementById('bar-chart');

                // Destroy the existing chart if it exists
                if (chartInstance) {
                    chartInstance.destroy();
                }

                chartInstance = new Chart(barChart, {
                    type: 'bar',
                    data: {
                        labels: ['Solved', 'Cleared', 'Under Invest.'],
                        datasets: [{
                            label: 'Total Cases',
                            data: [data.solvedCase, data.clearedCase, data.underInvCase],
                            backgroundColor: [
                                'rgba(255, 99, 132)', // Color for 'Solved' bar
                                'rgba(54, 162, 235)', // Color for 'Cleared' bar
                                'rgba(255, 205, 86)' // Color for 'Under Investigation' bar
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Total Case Status for ' + selectedYear, // Title text
                                position: 'top'
                            },
                            legend: {
                                display: false,
                                position: 'bottom'
                            }
                        }
                    }
                });
            }

            function updateSuspectChart(data, selectedYear){
                const suspect = document.getElementById('pie-chart1');

                if (suspectChartInstance) {
                    suspectChartInstance.destroy();
                }


                suspectChartInstance = new Chart(suspect, {
                    type: 'pie'
                    , data: {
                        labels: ['Male', 'Female']
                        , datasets: [{
                            label: 'Suspect Gender'
                            , data: [data.countMaleSus, data.countFemaleSus], // Example data, you can replace with actual values
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
                                , text: 'Suspect Gender for ' + selectedYear, // Title text
                                position: 'top'
                            }
                            , legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            }

            function updateVicitmChart(data){
                const vicitm = document.getElementById('pie-chart2');

                if (victimChartInstance){
                    victimChartInstance.destroy();
                }

                victimChartInstance = new Chart(vicitm, {
                    type: 'pie'
                    , data: {
                        labels: ['Male', 'Female']
                        , datasets: [{
                            label: 'Victim Gender'
                            , data: [data.countMaleVic, data.countFemaleVic], // Example data, you can replace with actual values
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
            }



</script>
<script>



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
