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
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
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

        window.jsPDF = window.jspdf.jsPDF;
        $("#exportPdfButton").click(function() {
            var doc = new jsPDF('l');
            var canvas = document.getElementById('myChart');
            var imgData = canvas.toDataURL('image/png');

            var base64Image = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAABdCAMAAABO6uh0AAADAFBMVEVHcEwTExMyMjJFRklxcX1EREcoKClubnDh4uQ6OjtSU2ISEhIvLy+jqqZBQUMsLCoODg40NDQUFBQaGhodHR0VFRUREREREREdHR0QEBAYGBgMDAwUFBQPDw8TExMWFhYPDw8QEBAfcUMaGhoMDAwAAAAFBQWopRAyMi4FBQUSEhIICAgLCwsEBAQZGRkPDw8MDAwWFhYWFhacmxGVkBXw9/QICAhybx1jYSNWVCh6vZm0qxAcHBxvrIxfuoiCfhmf0rcFBQUgICBJSDBDs3XG49QkjFNHpXIJCQUuhlZQsXyLyqnR6Nw3jV7e8efX7OHv9vITrFgpsWdKu30mJibo9O0meUvs9vHG5tVyxJbs9vHt9vGb07V9yaCf1bio2b4XFxcA8m7///8Aolf+8gHhsm7jt3f65N3639b+/v71r5/9+/r0n4z+TgH1pZL66uT67gT8+PXImWj53M7xiXH4zcL41Mvyd1vzjnfxcVQEn1QPmlL4xrrSygz1taXGvw7yfmP0qpnz6Qb88+9tf1vxlYAafUPt5QkJj0u5tA/EkmHb0wri2Qj67+v1uqvp5N31moX9XwHzg2rfrWSXbU99vJvLo2+Si08Th0Yepl0weje41McIrFLn8Or62cKwi1ykm1+qfEOCgWbhun14rrX3v7JPk1LX597yYjxtrI76cBdniSDev6v7u5Lr2s7V5/jq3geEmSDfoBBLgC2Yg3Mzr2q+iDvdhAu9vqqPiQ/8yqpObC6gdFf8j0fa2xb60bXmzLtRTwv6m13yUAP8gTDFr4qOsY3cvwcwk1KRs7m0oGL7sYB8fkzZ1MV9eA2+yCRvXSaoujH7xKDD1uD8qG9pZQvpaUyusZU6mZJ2nabh4BO5ZRXZmlFikDfZaxFwlVScsjbR1RqfcCKKpUDoWxHZu5Tgs1v4+/vzwQnVTg8tKwh8om6zwirI0CDfdFXA3feHinvXlXWHYh7brZvYo4jeejkjnEdilm7WHhvfi2zLyXTtpG3s8rff3pbPqEBHcEy0j1qyAAABAHRSTlMAVTAUBA4WDAMoB7s+CSBK1zivYHSpv0FqxE7ctdOOmM2e/n3JatP+VrQe4s6Gi8ckgzj65/zvuaWGK/qlFf7T/L+Ka/X9x139okP9XH0VNWvmlLaDhuSrw97p1MCNdpfN//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8ADo+I/wAAIABJREFUeNrsmn1MGmkex3mTd1F8f1eiKb3qljNo1aVXN6vNNtvGei9Nr+12mwAtDBCB8I4MgyBSAljLpmf1lBh3fYldG4znXWliujS6cftCco20aXK9u1yz/9h/9p9rk+42uWcGodn9ey1c9vkYZx5mnsxMZj58f888gUSCQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgPwvM/L6+vnwmvBGQn438vhP9p079EefChU9PnOyDtyR3YQNo/xdJdbL/9LmFhaNHj/4Z5wPAJxegWzkIjcft6ers7Ojo6Ozq2U/Jy+2wOnH67DSh1dFdqz44jvPJp+/DqphTVrF6OrvFfjToA0QDmKSto6uAmrOXexJoBbxaWHj48OFXgC+/vHXr1vHj1wBnzr8PH2euwOB2dvuDbp1ch0l8cgBoulFhRxcrJy+3rx9oBby6eTNy586d27cfAZaXl7/99sm1a0euHTlzHhbE3BhWcTvFAXcA9Ut0ukTcDbwKJjG5Lhj1Yd25qNbJ0+3AqyuGSCTl1e2UV8v379+/tPn1EcCZj2E9zD6srragTh6Ix/xgFYu7ddGoOJ6Uo3EMi+qw7p5cG2ydONeOa5XyKhIxKAGGyJ1HuFjb29//iVDr/G/gg83y4Gp/N+pDY4lAMi6MyuXCOCbxCzHhDhpIJv1BUBQlnTkVWsz+s+3TV5SEVwZFSI8g0hT6kPL28jbg+3tHenuP/B6OtLJKXpfYFxRGsZ2YcCcgdwcxoVDo9wcCYkyIJhNgpCUMoN0FueRVO+EV0ErhUUsRj9LhHBoYUM2ZtfinyPL23bt3P3vR29sLzcom1E4/KH9JuQ6kk9+/sjo5cv06+J9cvSHEUIlfLsd2xGi0rSdXhizMU8ArIq4UHiminbNaLOExzcDAmNVlCQ8p1VJ95D4w6x8zvWvQrCxC78R8QCwgD4aurF6/bJfJ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"

            doc.setFontSize(20);
            doc.addImage(base64Image, 'JPEG', 50, 2, 200, 30);
            doc.text('Reports Overview', 120, 40); 
            doc.addImage(imgData, 'PNG', 10, 50, 280, 120);
            doc.setFontSize(10);
            doc.text('Preferred By: __________', 10, 200);
            var pdfDataUri = doc.output('datauristring');
            var byteCharacters = atob(pdfDataUri.split(',')[1]);
            var byteNumbers = new Array(byteCharacters.length);
            for (var i = 0; i < byteCharacters.length; i++) {
                byteNumbers[i] = byteCharacters.charCodeAt(i);
            }
            var byteArray = new Uint8Array(byteNumbers);
            var blob = new Blob([byteArray], { type: 'application/pdf' });

            var url = URL.createObjectURL(blob);
            window.open(url, '_blank');
        });

    </script>
@endsection
