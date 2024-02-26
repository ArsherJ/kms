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
                <!-- <button id="exportPdfButton" class="btn btn-dark mb-4">Export PDF</button> -->
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
<script src="{{ asset('js/calculationScript.js') }}"></script>
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

                    var created_at = moment(child.date_measured, 'YYYY-MM-DD');
                    var monthNumber = created_at.format("MM")
                    var heightStatus = calculateHeightLengthForAgeStatus(ageInMonths, child.sex, child.height,true);
                        if (heightStatus === "Severely Stunted") {
                            ss[monthNumber-1]++;
                        } else if (heightStatus === "Stunted") {
                            s[monthNumber-1]++;
                        } else if (heightStatus === "Normal") {
                            n[monthNumber-1]++;
                        } 

                        var wghtStatus = calculateWgtHtstatus(child.height, ageInMonths, child.weight, child.sex, true);
                        if (wghtStatus === "Overweight") {
                            o[monthNumber-1]++;
                        } else if (wghtStatus === "Obese") {
                            ob[monthNumber-1]++;
                        }

                })
                updateCharts(ss,s,n,o,ob);
            }
            });
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
