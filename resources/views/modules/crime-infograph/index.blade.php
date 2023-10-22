@extends('layouts.user_type.auth')

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header pb-0 d-flex justify-between align-items-center">

                    <div class="me-5 d-flex align-items-center">
                        <h6 class="mb-0 me-2">FROM</h6>
                        <input type="date" id="from" name="from" class="form-control">
                    </div>
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 me-2">TO</h6>
                        <input type="date" name="to" id="to" class="form-control">
                    </div>

                </div>
                <div class="card-body p-3 pt-0">
                    <div class="chart">
                        <canvas id="line-chart" class="chart-canvas" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="crime_index" class="chart-canvas" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="crime_nonindex" class="chart-canvas" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="crime_pubSafety" class="chart-canvas" height="100"></canvas>
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
                        <canvas id="pie-chart1" class="chart-canvas" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="pie-chart2" class="chart-canvas" height="100"></canvas>
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
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="suspect-status" class="chart-canvas" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="stage-felony" class="chart-canvas" height="80"></canvas>
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
        let victimStatChartInstance = null;
        let suspectStatChartInstance = null;
        let stageFelonyChartInstance = null;
        let indexCrimeInstance = null;
        let nonIndexCrimeInstance = null;
        let pubSafetyInstance = null;

        $(document).ready(function() {
            $('#from, #to').change(function() {
                var from = $('#from').val();
                var to = $('#to').val();

                if (from && to) {
                    // AJAX request to get the data for the line chart
                    $.ajax({
                        url: '{{ route('get.year.count') }}',
                        type: 'GET',
                        data: {
                            'from': from,
                            'to': to
                        },
                        success: function(data) {
                            updateCharts(data, from, to);
                            console.log(data);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });

            // Automatically trigger the change event when the page loads
            $('#from, #to').trigger('change');
        });


        function updateCharts(data) {
            updateLineChart(data);
            updateBarChart(data);
            updateBarHorChart(data);
            updateSuspectChart(data);
            updateVicitmChart(data);
            updateVictimStatChart(data);
            updateSuspectStatChart(data);
            updateStageFelonyChart(data);
            updateIndexChart(data);
            updateNonIndexChart(data);
            updatePubSafetyChart(data);

        }

        function updatePubSafetyChart(data) {
            const crime_pubSafety = document.getElementById('crime_pubSafety');

            // Destroy the existing chart if it exists
            if (pubSafetyInstance) {
                pubSafetyInstance.destroy();
            }

            pubSafetyInstance = new Chart(crime_pubSafety, {
                type: 'bar',
                data: {
                    labels: ['RIR to Homicide', 'RIR to Physical Injury', 'RIR to Damage to Property',
                        'Other Quasi Offenses', 'Imprudence & Negligence'
                    ],
                    datasets: [{
                        label: 'Total Cases',
                        data: [
                            data.rirHomi,
                            data.rirPhysicalInj,
                            data.rirDamage,
                            data.quasiOffense,
                            data.imprudence,
                        ],
                        backgroundColor: [
                            'rgba(129, 224, 99, 1)',
                            'rgba(99, 224, 223, 1)',
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 205, 86)',
                            'rgba(224, 99, 99, 1)',
                            'rgba(129, 224, 99, 1)',
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
                            text: 'Total Non-Index Crime  ', // Title text
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

        function updateNonIndexChart(data) {
            const crime_nonindex = document.getElementById('crime_nonindex');

            // Destroy the existing chart if it exists
            if (nonIndexCrimeInstance) {
                nonIndexCrimeInstance.destroy();
            }

            nonIndexCrimeInstance = new Chart(crime_nonindex, {
                type: 'bar',
                data: {
                    labels: ['Republic Act', 'President Decrees', 'Batas Pambansa', 'Offense of Revise Penal Code'],
                    datasets: [{
                        label: 'Total Cases',
                        data: [
                            data.repAct,
                            data.presDecree,
                            data.batas,
                            data.offensePenal
                        ],
                        backgroundColor: [
                            'rgba(129, 224, 99, 1)',
                            'rgba(99, 224, 223, 1)',
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 205, 86)',
                            'rgba(224, 99, 99, 1)',
                            'rgba(129, 224, 99, 1)',
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
                            text: 'Total Non-Index Crime' , // Title text
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

        function updateIndexChart(data) {
            const crime_index = document.getElementById('crime_index');

            // Destroy the existing chart if it exists
            if (indexCrimeInstance) {
                indexCrimeInstance.destroy();
            }

            indexCrimeInstance = new Chart(crime_index, {
                type: 'bar',
                data: {
                    labels: ['Murder', 'Homicide', 'Physical Injury', 'Rape', 'Robbery', 'Carnapping', 'Theft'],
                    datasets: [{
                        label: 'Total Cases',
                        data: [
                            data.murder,
                            data.homicide,
                            data.physicalInjury,
                            data.rape,
                            data.robbery,
                            data.carnapping,
                            data.theft
                        ],
                        backgroundColor: [
                            'rgba(129, 224, 99, 1)',
                            'rgba(99, 224, 223, 1)',
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 205, 86)',
                            'rgba(224, 99, 99, 1)',
                            'rgba(129, 224, 99, 1)',
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
                            text: 'Total Index Crime  ', // Title text
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

        function updateBarHorChart(data) {
            const barHorChart = document.getElementById('bar-hor-chart1')

            if (horChartInstance) {
                horChartInstance.destroy();
            }

            horChartInstance = new Chart(barHorChart, {
                type: 'bar',
                data: {
                    labels: ['Prosecutiuon', 'Court', 'Law Agency', 'Dismissed'],
                    datasets: [{
                        label: 'Total Cases',
                        data: [
                            data.prosec,
                            data.filed,
                            data.law,
                            data.dismissed
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235)',
                            'rgba(0, 204, 102)',
                            'rgba(153, 51, 255)',
                            'rgba(255, 205, 86)'

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
                            text: 'Case Progress  ', // Title text
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


        function updateLineChart(data) {

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
                        label: 'Crime Cases for',
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
                            },
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Crime Cases for '  + data.fromYear,
                            position: 'top'
                        },
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }

        function updateBarHorChart(data) {
            const barHorChart = document.getElementById('bar-hor-chart1')

            if (horChartInstance) {
                horChartInstance.destroy();
            }

            horChartInstance = new Chart(barHorChart, {
                type: 'bar',
                data: {
                    labels: ['Prosecutiuon', 'Court', 'Law Agency', 'Dismissed'],
                    datasets: [{
                        label: 'Total Cases',
                        data: [
                            data.prosec,
                            data.filed,
                            data.law,
                            data.dismissed
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235)',
                            'rgba(0, 204, 102)',
                            'rgba(153, 51, 255)',
                            'rgba(255, 205, 86)'

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
                            text: 'Case Progress  ', // Title text
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

        function updateBarChart(data) {
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
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 205, 86)'
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
                            text: 'Total Case Status  ', // Title text
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

        function updateSuspectChart(data) {
            const suspect = document.getElementById('pie-chart1');

            if (suspectChartInstance) {
                suspectChartInstance.destroy();
            }


            suspectChartInstance = new Chart(suspect, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        label: 'Suspect Gender',
                        data: [data.countMaleSus, data
                            .countFemaleSus
                        ], // Example data, you can replace with actual values
                        backgroundColor: [
                            'rgba(54, 162, 235)', // Color  'Male' slice
                            'rgba(255, 99, 132)' // Color  'Female' slice
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Suspect Gender  ', // Title text
                            position: 'top'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function updateVicitmChart(data) {
            const vicitm = document.getElementById('pie-chart2');

            if (victimChartInstance) {
                victimChartInstance.destroy();
            }

            victimChartInstance = new Chart(vicitm, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        label: 'Victim Gender',
                        data: [data.countMaleVic, data

                        .countFemaleVic], // Example data, you can replace with actual values

                        backgroundColor: [
                            'rgba(54, 162, 235)', // Color  'Male' slice
                            'rgba(255, 99, 132)' // Color  'Female' slice
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Victim Gender fro ', // Title text
                            position: 'top'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function updateVictimStatChart(data) {
            const ctx1 = document.getElementById('bar-hor-chart');

            if (victimStatChartInstance) {
                victimStatChartInstance.destroy();
            }

            victimStatChartInstance = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Unharmed', 'Harmed', 'Wounded', 'Killed', 'Deceased'],
                    datasets: [{
                        label: 'Total Cases',
                        data: [
                            data.unharmed,
                            data.harmed,
                            data.wounded,
                            data.killed,
                            data.deceased
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(0, 204, 102)',
                            'rgba(153, 51, 255)',
                            'rgba(255, 205, 86)'
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
                            text: 'Victim Status  ', // Title text
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

        function updateSuspectStatChart(data) {
            const ctx1 = document.getElementById('suspect-status');

            if (suspectStatChartInstance) {
                suspectStatChartInstance.destroy();
            }

            suspectStatChartInstance = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Arrested', 'On-bail', 'At-Large', 'Released', 'Deceased', 'On Probation', 'Convicted',
                        'Serving Sentence', 'Turn-over to MSWD', 'Turned-over to BRGY', 'Turn-over to Guardian'
                    ],
                    datasets: [{
                        label: 'Total Cases',
                        data: [
                            data.arrested,
                            data.onbail,
                            data.atLarge,
                            data.released,
                            data.deceased_suspect,
                            data.onprobation,
                            data.convicted,
                            data.serving_sentence,
                            data.turnoverMswd,
                            data.turnoverBrgy,
                            data.turnoverParent
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(0, 204, 102)',
                            'rgba(153, 51, 255)',
                            'rgba(255, 205, 86)'
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
                            text: 'Suspect Status  ', // Title text
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

        function updateStageFelonyChart(data) {
            const stageFelony = document.getElementById('stage-felony');

            // Destroy the existing chart if it exists
            if (stageFelonyChartInstance) {
                stageFelonyChartInstance.destroy();
            }

            stageFelonyChartInstance = new Chart(stageFelony, {
                type: 'bar',
                data: {
                    labels: ['Attempted', 'Frustrated', 'Consummated'],
                    datasets: [{
                        label: 'Total Cases',
                        data: [data.attempted, data.frustrated, data.consummated],
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 205, 86)'
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
                            text: 'Stage of Felony Status  ', // Title text
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
    </script>
@endpush
