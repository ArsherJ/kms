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
            <canvas id="myChart" width="400" height="150px"></canvas>
        </div>
    </div>
@endsection

{{-- SCRIPTS --}}
@section('scripts')
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var chartData = {
                labels: ['January', 'February', 'March', 'April', 'May','June','July','August','September','October','November','Dececmber'],
                datasets: [
                    {
                        label: 'Severely Stunted',
                        backgroundColor: '#6CE5E8',
                        borderColor: '#6CE5E8',
                        borderWidth: 1,
                        data: [3, 8, 16, 8, 8, 8, 8],
                    },
                    {
                        label: 'Stunted',
                        backgroundColor: '#41B8D5',
                        borderColor: '#41B8D5',
                        borderWidth: 1,
                        data: [6, 14, 18, 8, 8, 8, 8],
                    },
                    {
                        label: 'Normal',
                        backgroundColor: '#2D8BBA',
                        borderColor: '#2D8BBA',
                        borderWidth: 1,
                        data: [2, 5, 20, 15, 8, 8 ,8],
                    },
                    {
                        label: 'Overweight',
                        backgroundColor: '#2F5F98',
                        borderColor: '#2F5F98',
                        borderWidth: 1,
                        data: [1, 20, 5, 8, 8, 8, 8],
                    },
                    {
                        label: 'Obese',
                        backgroundColor: '#31356E',
                        borderColor: '#31356E',
                        borderWidth: 1,
                        data: [1, 1, 1, 8, 8, 8, 8],
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
        });
    </script>
@endsection
