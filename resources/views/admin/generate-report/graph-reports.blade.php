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
                <button id="exportPdfButton" class="btn btn-dark mb-4">Export PDF</button>
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

                    data.forEach(function(child) {
                        var birthdate = moment(child.birthdate, 'YYYY-MM-DD');
                        var currentDate = moment();
                        var ageInMonths = currentDate.diff(birthdate, 'months');

                        var weightStatus = calculateWeightForAgeStatus(ageInMonths, child.sex, child.weight);
                        if (weightStatus === "Severely Underweight") {
                            setWeightForAgeStatusTable[0]++;
                        } else if (weightStatus === "Underweight") {
                            setWeightForAgeStatusTable[1]++;
                        } else if (weightStatus === "Normal") {
                            setWeightForAgeStatusTable[2]++;
                        }

                        var heightStatus = calculateHeightForAgeStatus(ageInMonths, child.sex, child.height);
                        if (heightStatus === "Severely Stunted") {
                            calculateHeightForAgeStatusTable[0]++;
                        } else if (heightStatus === "Stunted") {
                            calculateHeightForAgeStatusTable[1]++;
                        } else if (heightStatus === "Normal") {
                            calculateHeightForAgeStatusTable[2]++;
                        } else if (heightStatus === "Tall") {
                            calculateHeightForAgeStatusTable[3]++;
                        }
                    });

                    updateCharts(setWeightForAgeStatusTable, calculateHeightForAgeStatusTable);
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

    function calculateWeightForAgeStatus(ageInMonths, sex, weight) {
        let result = "";

        function setWeightForAgeStatus(severelyUnderweightLimit, underweightLimit, normalLimit)
        {
            if (weight <= severelyUnderweightLimit) { result = "Severely Underweight"}
            else if (weight >= underweightLimit && weight <= normalLimit) { result = "Underweight" }
            else if (weight > normalLimit) { result = "Normal"}
        }

        switch (ageInMonths) 
        {
            case 0:
                if (sex === "Male") { setWeightForAgeStatus(2.1, 2.2, 4.4); }
                else if (sex === "Female") { setWeightForAgeStatus(2.0, 2.1, 4.2); }
                break;
            case 1:
                if (sex === "Male") { setWeightForAgeStatus(2.9, 3.0, 5.8); }
                else if (sex === "Female") { setWeightForAgeStatus(2.7, 2.8, 5.5); }
                break;
            case 2:
                if (sex === "Male") { setWeightForAgeStatus(3.8, 3.9, 7.1); }
                else if (sex === "Female") { setWeightForAgeStatus(3.4, 3.5, 6.6); }
                break;
            case 3:
                if (sex === "Male") { setWeightForAgeStatus(4.4, 4.5, 8.0); }
                else if (sex === "Female") { setWeightForAgeStatus(4.0, 4.1, 7.5); }
                break;
            case 4:
                if (sex === "Male") { setWeightForAgeStatus(4.9, 5.0, 8.7); }
                else if (sex === "Female") { setWeightForAgeStatus(4.4, 4.5, 8.2); }
                break;
            case 5:
                if (sex === "Male") { setWeightForAgeStatus(5.3, 5.4, 9.3); }
                else if (sex === "Female") { setWeightForAgeStatus(4.8, 4.9, 8.8); }
                break;
            case 6:
                if (sex === "Male") { setWeightForAgeStatus(5.7, 5.8, 9.8); }
                else if (sex === "Female") { setWeightForAgeStatus(5.1, 5.2, 9.3); }
                break;
            case 7:
                if (sex === "Male") { setWeightForAgeStatus(5.9, 6.0, 10.3); }
                else if (sex === "Female") { setWeightForAgeStatus(5.3, 5.4, 9.8); }
                break;
            case 8:
                if (sex === "Male") { setWeightForAgeStatus(6.2, 6.3, 10.7); }
                else if (sex === "Female") { setWeightForAgeStatus(5.6, 5.7, 10.2); }
                break;
            case 9:
                if (sex === "Male") { setWeightForAgeStatus(6.4, 6.5, 11.0); }
                else if (sex === "Female") { setWeightForAgeStatus(5.8, 5.9, 10.5); }
                break;
            case 10:
                if (sex === "Male") { setWeightForAgeStatus(6.6, 6.7, 11.4); }
                else if (sex === "Female") { setWeightForAgeStatus(5.9, 6.0, 10.9); }
                break;
            case 11:
                if (sex === "Male") { setWeightForAgeStatus(6.8, 6.9, 11.7); }
                else if (sex === "Female") { setWeightForAgeStatus(6.1, 6.2, 11.2); }
                break;
            case 12:
                if (sex === "Male") { setWeightForAgeStatus(6.9, 7.0, 12.0); }
                else if (sex === "Female") { setWeightForAgeStatus(6.3, 6.4, 11.5); }
                break;
        }
        return result;
    }

    function calculateHeightForAgeStatus(ageInMonths, sex, height) {
        let result = "";

        function setHeightForAgeStatus(severelyStuntedLimit, stuntedLimit, normalLimit, tallLimit)
        {
            if (height <= severelyStuntedLimit) { result = "Severely Stunted"}
            else if (height >= stuntedLimit && height <= normalLimit) { result = "Stunted"}
            else if (height >= normalLimit && height <= tallLimit) { result = "Normal"}
            else if (height > tallLimit) { result = "Tall";}
        }

        switch (ageInMonths)
        {
            case 0:
                if (sex === "Male") { setHeightForAgeStatus(44.1, 44.2, 46.1, 53.8); }
                else if (sex === "Female") { setHeightForAgeStatus(43.5, 43.6, 45.4, 53.0); }
                break;
            case 1:
                if (sex === "Male") { setHeightForAgeStatus(48.8, 48.9, 50.8, 58.7); }
                else if (sex === "Female") { setHeightForAgeStatus(47.7, 47.8, 49.8, 57.7); }
                break;
            case 2:
                if (sex === "Male") { setHeightForAgeStatus(52.3, 52.4, 54.4, 62.5); }
                else if (sex === "Female") { setHeightForAgeStatus(50.9, 51.0, 53.0, 61.2); }
                break;
            case 3:
                if (sex === "Male") { setHeightForAgeStatus(55.2, 55.3, 57.3, 65.6); }
                else if (sex === "Female") { setHeightForAgeStatus(53.4, 53.5, 55.6, 64.1); }
                break;
            case 4:
                if (sex === "Male") { setHeightForAgeStatus(57.5, 57.6, 59.7, 68.1); }
                else if (sex === "Female") { setHeightForAgeStatus(55.5, 55.6, 57.8, 66.5); }
                break;
            case 5:
                if (sex === "Male") { setHeightForAgeStatus(59.5, 59.6, 61.7, 70.2); }
                else if (sex === "Female") { setHeightForAgeStatus(57.3, 57.4, 59.6, 68.6); }
                break;
            case 6:
                if (sex === "Male") { setHeightForAgeStatus(61.1, 61.2, 63.3, 72.0); }
                else if (sex === "Female") { setHeightForAgeStatus(58.8, 58.9, 61.2, 70.4); }
                break;
            case 7:
                if (sex === "Male") { setHeightForAgeStatus(62.6, 62.7, 64.8, 73.6); }
                else if (sex === "Female") { setHeightForAgeStatus(60.2, 60.3, 62.7, 72.0); }
                break;
            case 8:
                if (sex === "Male") { setHeightForAgeStatus(63.9, 64.0, 66.2, 75.1); }
                else if (sex === "Female") { setHeightForAgeStatus(61.6, 61.7, 64.0, 73.6); }
                break;
            case 9:
                if (sex === "Male") { setHeightForAgeStatus(65.1, 65.2, 67.5, 76.6); }
                else if (sex === "Female") { setHeightForAgeStatus(62.8, 62.9, 65.3, 75.1); }
                break;
            case 10:
                if (sex === "Male") { setHeightForAgeStatus(66.3, 66.4, 68.7, 78.0); }
                else if (sex === "Female") { setHeightForAgeStatus(64.0, 64.1, 66.5, 76.5); }
                break;
            case 11:
                if (sex === "Male") { setHeightForAgeStatus(67.5, 67.6, 69.9, 79.3); }
                else if (sex === "Female") { setHeightForAgeStatus(65.1, 65.2, 67.7, 77.9); }
                break;
            case 12:
                if (sex === "Male") { setHeightForAgeStatus(68.5, 68.6, 71.0, 80.6); }
                else if (sex === "Female") { setHeightForAgeStatus(66.2, 66.3, 68.9, 79.3); }
                break;
        }
        return result;
    }

    function updateCharts(weightData, heightData) {
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


            var ctx3 = document.getElementById("pieChart2").getContext('2d');
            var data3 = {
                labels: ["Severely Stunted", "Stunted", "Normal", "Tall"],
                datasets: [{
                    data: calculateHeightForAgeStatusTable,
                    backgroundColor: ['#6CE5E8', '#41B8D5', '#2D8BBA','#2F5F98']
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
