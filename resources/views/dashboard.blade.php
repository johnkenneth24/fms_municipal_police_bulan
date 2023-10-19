@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Case Solved </p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $solvedCase }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Case Cleared</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $clearedCase }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-tag text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Under Investigated</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $underInvCase }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card mb-3">
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
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">Hello Admin!</p>
                                    <h5 class="font-weight-bolder">Bulan MPS - FMS</h5>
                                    <p class="mb-5 text-left">The Bulan Municipality Police Station File Management
                                        System is a digital solution that efficiently organizes and centralizes police
                                        records, enabling faster access and collaboration among law enforcement personnel.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-info border-radius-lg h-100">
                                    <img src="../assets/img/shapes/waves-white.svg"
                                        class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-70 position-relative z-index-2 pt-4"
                                            src="../assets/img/illustrations/police.png" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                        style="background-image: url('../assets/img/ivancik.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                            <h5 class="text-white font-weight-bolder mb-4 pt-2">Retrieve Easily!</h5>
                            <p class="text-white">It enhances efficiency and accuracy in managing and retrieving
                                information, ultimately improving the overall effectiveness of the police station.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            const lineChart = document.getElementById('line-chart');

            new Chart(lineChart, {
                type: 'line',
                data: {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEPT', 'OCT', 'NOV', 'DEC'],
                    datasets: [{
                        label: 'Crime Cases',
                        data: [
                            {{ $janCount }},
                            {{ $febCount }},
                            {{ $marCount }},
                            {{ $aprCount }},
                            {{ $mayCount }},
                            {{ $junCount }},
                            {{ $julCount }},
                            {{ $augCount }},
                            {{ $septCount }},
                            {{ $octCount }},
                            {{ $novCount }},
                            {{ $decCount }}
                        ],
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
                                text: 'Year ' + '{{ date('Y') }}',
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Crime Cases This Year ' + '{{ date('Y') }}',
                            position: 'top'
                        },
                        legend: {
                            display: false
                        }
                    }
                }
            });

            const ctx = document.getElementById('bar-chart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Solved', 'Cleared', 'Under Invest.'],
                    datasets: [{
                        label: 'Case Status This Year ' + '{{ date('Y') }}',
                        data: [
                            {{ $solvedCase }},
                            {{ $clearedCase }},
                            {{ $underInvCase }}
                        ],
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
                            text: 'Case Status This Year ' + '{{ date('Y') }}', // Title text
                            position: 'top'
                        },
                        legend: {
                            display: false,
                            position: 'bottom'
                        }
                    }
                }
            });

            const ctx2 = document.getElementById('bar-hor-chart1');

            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Prosecutiuon', 'Court', 'Law Agency', 'Dismissed'],
                    datasets: [{
                        label: 'Case Progress this Year ' + '{{ date('Y') }}',
                        data: [
                            {{ $prosecutor }},
                            {{ $filedCourt }},
                            {{ $lawAgency }},
                            {{ $dismissed }}
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235)', // Color for 'Cleared' bar
                            'rgba(0, 204, 102)', // Color for 'Under Investigation' bar
                            'rgba(153, 51, 255)', // Color for 'Solved' bar
                            'rgba(255, 205, 86)' // Color for 'Under Investigation' bar

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Case Progress this Year ' + '{{ date('Y') }}',
                            position: 'top'
                        },
                        legend: {
                            display: false,
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>
    @endpush
