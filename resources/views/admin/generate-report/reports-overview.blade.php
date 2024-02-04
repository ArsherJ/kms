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


    <div class="card">
        <div class="card-body">
            <h1>Graph Reports</h1>
            <div class="table-responsive">
                <button id="exportPdfButton" class="btn btn-dark mb-4">Export PDF</button>
            </div>
            <div class="btn-group mb-3">
                    <select id="monthDropdown" class="form-control btn btn-secondary">
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            <canvas id="myChart" width="400" height="150px"></canvas>
        </div>
    </div>
@endsection

{{-- SCRIPTS --}}
@section('scripts')
<script>
    
    $(document).ready(function() {

        const API_URL = "{{ env('API_URL') }}";
        const API_TOKEN = localStorage.getItem("API_TOKEN");
        const BASE_API = API_URL + '/history_of_individual_records';


        let currentYear = new Date().getFullYear();
        $('#monthDropdown').val(currentYear);

        function updateChartData(selectedYear) {
            let form_url = BASE_API + "/data_chart_year/"+ selectedYear 
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
                ss = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                s = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                n = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                o = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                ob = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

                data.forEach(function(child) {
                    var birthdate = moment(child.birthdate, 'YYYY-MM-DD');
                    var currentDate = moment();
                    var ageInMonths = currentDate.diff(birthdate, 'months');

                    var created_at = moment(child.created_at, 'YYYY-MM-DD');
                    var monthNumber = created_at.format("MM")
                    var heightStatus = calculateHeightForAgeStatus(ageInMonths, child.sex, child.height);
                        if (heightStatus === "Severely Stunted") {
                            ss[monthNumber-1]++;
                        } else if (heightStatus === "Stunted") {
                            s[monthNumber-1]++;
                        } else if (heightStatus === "Normal") {
                            n[monthNumber-1]++;
                        } 
                        // else if (heightStatus === "Tall") {
                        //     calculateHeightForAgeStatusTable[3]++;
                        // }
                })
                console.log(ss)
                console.log(o)
                console.log(n)
                updateCharts(ss,s,n,o,ob);
            }
            });
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

    function updateCharts(ss,s,n,o,ob){
        let chart = Chart.getChart("myChart");
        if (chart) {
            chart.destroy();
        }
                var chartData = {
                    labels: ['January', 'February', 'March', 'April', 'May','June','July','August','September','October','November','December'],
                    datasets: [
                        {
                            label: 'Severely Stunted',
                            backgroundColor: '#6CE5E8',
                            borderColor: '#6CE5E8',
                            borderWidth: 1,
                            data: ss,
                        },
                        {
                            label: 'Stunted',
                            backgroundColor: '#41B8D5',
                            borderColor: '#41B8D5',
                            borderWidth: 1,
                            data: s,
                        },
                        {
                            label: 'Normal',
                            backgroundColor: '#2D8BBA',
                            borderColor: '#2D8BBA',
                            borderWidth: 1,
                            data: n,
                        },
                        {
                            label: 'Overweight',
                            backgroundColor: '#2F5F98',
                            borderColor: '#2F5F98',
                            borderWidth: 1,
                            data: o,
                        },
                        {
                            label: 'Obese',
                            backgroundColor: '#31356E',
                            borderColor: '#31356E',
                            borderWidth: 1,
                            data: ob,
                        },
                    ],
                };

                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            updateChartData(currentYear);

            monthDropdown.addEventListener('change', function() {
                let selectedYear = monthDropdown.value;
                updateChartData(selectedYear);
            });
        });

    </script>
@endsection
