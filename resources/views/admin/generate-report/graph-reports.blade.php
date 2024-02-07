@extends('layouts.app')

{{-- SIDEBAR --}}
@section('sidebar')
    @include('layouts.common.admin-sidebar')
@endsection

{{-- NAVBAR --}}
@section('header')
    @include('layouts.common.admin-header')
@endsection

{{-- CONTENT --}}
@section('content')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    {{-- DATATABLE --}}
    <div class="card">
        <div class="card-body">
            <h1>Graph Reports</h1>
            <div class="table-responsive">
                <!-- <button id="exportPdfButton" class="btn btn-dark mb-4">Export PDF</button> -->
            </div>
            <div class="btn-group mb-3">
                    <select id="monthDropdown" class="form-control btn btn-secondary">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
        </div>
    </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title" style="font-size: 15px; 
                        font-weight: 1000; 
                        background: linear-gradient(to right, #cdffd8, #94b9ff); 
                        text-align: center; 
                        padding: 3%">WEIGHT FOR AGE</h5>
                            <canvas id="pieChart1" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"  style="font-size: 15px; 
                        font-weight: 1000; 
                        background: linear-gradient(to right, #cdffd8, #94b9ff); 
                        text-align: center; 
                        padding: 3%">HEIGHT FOR AGE </h5>
                            <canvas id="pieChart3" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"  style="font-size: 15px; 
                        font-weight: 1000; 
                        background: linear-gradient(to right, #cdffd8, #94b9ff); 
                        text-align: center; 
                        padding: 3%">LENGTH/HEIGHT FOR AGE</h5>
                            <canvas id="pieChart2" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="noDataText" style="display: block; font-weight: bold;">NO DATA</div>
@endsection

{{-- SCRIPTS --}}
@section('scripts')
<script src="{{ asset('js/calculationScript.js') }}"></script>
<script>
$(document).ready(function() {
    Chart.register(ChartDataLabels);
    Chart.defaults.font.size = 12;

    const API_URL = "{{ env('API_URL') }}";
    const API_TOKEN = localStorage.getItem("API_TOKEN");
    const BASE_API = API_URL + '/history_of_individual_records';

    let setWeightForAgeStatusTable = [0, 0, 0];
    let calculateHeightForAgeStatusTable = [0, 0, 0, 0];

    let monthDropdown = document.getElementById('monthDropdown');
    let currentMonth = new Date().getMonth() + 1; 

    let defaultOption = monthDropdown.querySelector(`option[value="${currentMonth}"]`);
    if (defaultOption) {
        defaultOption.selected = true;
    }

    function updateChartData(selectedMonth) {
        
        let form_url = BASE_API + "/data_chart/" + selectedMonth;
        console.log("Selected Month: ", selectedMonth)

        $.ajax({
            url: form_url,
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": API_TOKEN,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data && data.length > 0) {
                    setWeightForAgeStatusTable = [0, 0, 0];
                    calculateHeightForAgeStatusTable = [0, 0, 0, 0];
                    calculateHeightForWeightStatusTable = [0, 0, 0, 0, 0];

                    data.forEach(function(child) {
                        var birthdate = moment(child.birthdate, 'YYYY-MM-DD');
                        var currentDate = moment();
                        var ageInMonths = currentDate.diff(birthdate, 'months');

                        var weightStatus = calculateWeightForAgeStatus(ageInMonths, child.sex, child.weight, true);
                        if (weightStatus === "Severely Underweight") {
                            setWeightForAgeStatusTable[0]++;
                        } else if (weightStatus === "Underweight") {
                            setWeightForAgeStatusTable[1]++;
                        } else if (weightStatus === "Normal") {
                            setWeightForAgeStatusTable[2]++;
                        }

                        var heightStatus = calculateHeightLengthForAgeStatus(ageInMonths, child.sex, child.height, true);
                        if (heightStatus === "Severely Stunted") {
                            calculateHeightForAgeStatusTable[0]++;
                        } else if (heightStatus === "Stunted") {
                            calculateHeightForAgeStatusTable[1]++;
                        } else if (heightStatus === "Normal") {
                            calculateHeightForAgeStatusTable[2]++;
                        } else if (heightStatus === "Tall") {
                            calculateHeightForAgeStatusTable[3]++;
                        }
                        // function calculateWgtHtstatus(height, ageInMonths, weight, sex, database)
                        var wghtStatus = calculateWgtHtstatus(child.height, ageInMonths, child.weight, child.sex, true);
                        if (wghtStatus === "Severe Acute Malnutrition") {
                            calculateHeightForWeightStatusTable[0]++;
                        } else if (wghtStatus === "Moderate Acute Malnutrition") {
                            calculateHeightForWeightStatusTable[1]++;
                        } else if (wghtStatus === "Normal") {
                            calculateHeightForWeightStatusTable[2]++;
                        } else if (wghtStatus === "Overweight") {
                            calculateHeightForWeightStatusTable[3]++;
                        } else if (wghtStatus === "Obese") {
                            calculateHeightForWeightStatusTable[4]++;
                        }

                    });
                    console.log(calculateHeightForWeightStatusTable)
                    updateCharts(setWeightForAgeStatusTable, calculateHeightForAgeStatusTable, calculateHeightForWeightStatusTable);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    updateChartData(currentMonth);

    monthDropdown.addEventListener('change', function() {
        let selectedMonth = monthDropdown.value;
        updateChartData(selectedMonth);
    });
    
    function updateCharts(weightData, heightData, heightForWeightData) {
        let pieChart1Instance = Chart.getChart("pieChart1");
        let pieChart2Instance = Chart.getChart("pieChart2");
        let pieChart3Instance = Chart.getChart("pieChart3");

        if (pieChart1Instance) {
            pieChart1Instance.destroy();
        }
        if (pieChart2Instance) {
            pieChart2Instance.destroy();
        }
        if (pieChart3Instance) {
            pieChart3Instance.destroy();
        }

        
        // Chart 1
        var ctx1 = document.getElementById("pieChart1").getContext('2d');
        var data1 = {
            labels: ["Severely Underweight", "Underweight", "Normal"],
            datasets: [{
                data: weightData,
                backgroundColor: ['#6CE5E8', '#41B8D5', '#2D8BBA']
            }]
        };
        var pieChart1 = new Chart(ctx1, {
            type: 'pie',
            data: data1,
            options: {
                    aspectRatio: 0.7,
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            color: '#000',
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                let total = ctx.chart.data.datasets[0].data.reduce((acc, cur) => acc + cur, 0);
                                let percentage = Math.round((value / total) * 100) + '%';
                                return percentage;
                            }
                        }
                    },
                    legend: {
                        display: true,
                        labels: {
                            boxWidth: 5,
                            maxWidth: 100 
                        }
                    }
                }
        });

        
        // Chart 2
        var ctx2 = document.getElementById("pieChart3").getContext('2d');
            var data2 = {
                labels: ["Severely Stunted", "Stunted", "Normal", "Tall"],
                datasets: [{
                    data: calculateHeightForAgeStatusTable,
                    backgroundColor: ['#6CE5E8', '#41B8D5', '#2D8BBA','#2F5F98']
                }]
            };
            var pieChart3 = new Chart(ctx2, {
                type: 'pie',
                data: data2,
                options: {
                    aspectRatio: 0.7,
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            color: '#000',
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                let total = ctx.chart.data.datasets[0].data.reduce((acc, cur) => acc + cur, 0);
                                let percentage = Math.round((value / total) * 100) + '%';
                                return percentage;
                            }
                        }
                    },
                    legend: {
                        display: true,
                        labels: {
                            boxWidth: 5,
                            maxWidth: 100 
                        }
                    }
                }
            });

            //third
            var ctx3 = document.getElementById("pieChart2").getContext('2d');
            var data3 = {
                labels: ["SAM","MAM","Normal","Overweight","Obese"],
                datasets: [{
                    data: heightForWeightData,
                    backgroundColor: ['#6CE5E8', '#41B8D5', '#2D8BBA','#2F5F98','#31356E']
                }]
            };
            var pieChart2 = new Chart(ctx3, {
                type: 'pie',
                data: data3,
                options: {
                    aspectRatio: 0.7,
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            color: '#000',
                            formatter: (value, ctx) => {
                                let label = ctx.chart.data.labels[ctx.dataIndex];
                                let total = ctx.chart.data.datasets[0].data.reduce((acc, cur) => acc + cur, 0);
                                let percentage = Math.round((value / total) * 100) + '%';
                                return percentage;
                            }
                        }
                    },
                    legend: {
                        display: true,
                        labels: {
                            boxWidth: 5,
                            maxWidth: 100 
                        }
                    }
                }
            });
    }
});
</script>
@endsection
