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

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pie Chart 1</h5>
                            <canvas id="pieChart1" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pie Chart 2</h5>
                            <canvas id="pieChart2" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pie Chart 3</h5>
                            <canvas id="pieChart3" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- SCRIPTS --}}
@section('scripts')
<script>
$(document).ready(function() {
    Chart.register(ChartDataLabels);
    Chart.defaults.font.size = 12;
    
    // Chart 1
    var ctx1 = document.getElementById("pieChart1").getContext('2d');
    var data1 = {
        labels: ["Severely Underweight", "Underweight", "Normal"],
        datasets: [{
            data: [33, 33, 350],
            backgroundColor: ['#6CE5E8', '#41B8D5', '#2D8BBA']
        }]
    };
    var pieChart1 = new Chart(ctx1, {
        type: 'pie',
        data: data1,
        options: {
            aspectRatio: 0.8,
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    color: '#000', // Label color
                    formatter: (value, ctx) => {
                        let label = ctx.chart.data.labels[ctx.dataIndex];
                        let total = ctx.chart.data.datasets[0].data.reduce((acc, cur) => acc + cur, 0);
                        let percentage = Math.round((value / total) * 100) + '%';
                        return percentage;
                    }
                }
            }
        }
    });

    // Chart 2
    var ctx2 = document.getElementById("pieChart2").getContext('2d');
    var data2 = {
        labels: ["Severely Underweight", "Underweight", "Normal"],
        datasets: [{
            data: [50, 25, 325],
            backgroundColor: ['#6CE5E8', '#41B8D5', '#2D8BBA']
        }]
    };
    var pieChart2 = new Chart(ctx2, {
        type: 'pie',
        data: data2,
        options: {
            aspectRatio: 0.8,
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    color: '#000', // Label color
                    formatter: (value, ctx) => {
                        let label = ctx.chart.data.labels[ctx.dataIndex];
                        let total = ctx.chart.data.datasets[0].data.reduce((acc, cur) => acc + cur, 0);
                        let percentage = Math.round((value / total) * 100) + '%';
                        return percentage;
                    }
                }
            }
        }
    });

    // Chart 3
    var ctx3 = document.getElementById("pieChart3").getContext('2d');
    var data3 = {
        labels: ["Severely Underweight", "Underweight", "Normal"],
        datasets: [{
            data: [25, 50, 325],
            backgroundColor: ['#6CE5E8', '#41B8D5', '#2D8BBA']
        }]
    };
    var pieChart3 = new Chart(ctx3, {
        type: 'pie',
        data: data3,
        options: {
            aspectRatio: 0.8,
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    color: '#000', // Label color
                    formatter: (value, ctx) => {
                        let label = ctx.chart.data.labels[ctx.dataIndex];
                        let total = ctx.chart.data.datasets[0].data.reduce((acc, cur) => acc + cur, 0);
                        let percentage = Math.round((value / total) * 100) + '%';
                        return percentage;
                    }
                }
            }
        }
    });
});
</script>
@endsection
