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

    
    <!--  Row 1 -->
    <div class="row pt-5">
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">Total Individual Records</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6><span id="individualRecordCount" class="badge bg-primary rounded-3 fw-semibold"></span></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">Total Activities</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6><span id="feedingProgramCount" class="badge bg-warning rounded-3 fw-semibold"></span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ROW 2 --}}
            <div class="row">
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Recent Individual Records Record</h5>
                        <div class="table-responsive">
                            <canvas id="myChart" width="400" height="150px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
    <div class="card w-100">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title mb-9 fw-semibold" style="font-size: 15px">Current Child Growth Standard Categories</h5>
            <div class="row align-items-center flex-grow-1">
                <canvas id="pieChart3" class="chart-canvas"></canvas>
            </div>
            <div class="d-flex justify-content-end">
                <div class="btn-group mb-9">
                    <select id="monthDropdown" class="form-control btn"> 
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
    </div>
</div>

        </div>

@endsection

{{-- SCRIPTS --}}
@section('scripts')
    <script src="{{ asset('import/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('import/assets/js/dashboard.js') }}"></script>
    <script>
        $(document).ready(function() {

            // GLOBAL VARIABLE
            const APP_URL = "{{ env('APP_URL') }}"
            const API_URL = "{{ env('API_URL') }}"
            const API_TOKEN = localStorage.getItem("API_TOKEN")
            const BASE_API = API_URL + '/individual_records'

            let categoryCounts;
            let seriesCount;

            // DATATABLE FUNCTION
            function dataTable() {

                dataTable = $('#dataTable').DataTable({
                    "ajax": {
                        url: BASE_API + '/datatable'
                    },
                    // "searching": false,
                    "processing": true,
                    "serverSide": true,
                    scrollY: false,
                    scrollX: false,
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ],
                    "headers": {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "columns": [{
                            data: "created_at"
                        },
                        {
                            data: "created_by_user",
                            render: function(data, type, row) {
                                let result = data?.username ?? '';
                                return result;
                            }
                        },
                        {
                            data: "first_name",
                            render: function(data, type, row) {
                                return `${row.first_name} ${row.middle_name} ${row.last_name}`
                            }
                        },
                        {
                            data: "bmi",
                        },
                        {
                            data: "bmi_category",
                            render: function(data, type, row) {
                                const bmiCategoryClasses = {
                                    "Underweight": "bg-success",
                                    "Normal Weight": "bg-primary",
                                    "Overweight": "bg-warning",
                                    "Obese Class I": "bg-danger",
                                    "Obese Class II": "bg-danger",
                                    "Obese Class III": "bg-danger"
                                    
                                };

                                const bmiClass = bmiCategoryClasses[data] || "bg-success";

                                return `<span class="badge rounded-1 fw-semibold ${bmiClass}">${data}</span>`;
                            }
                        },
                    ],
                    "aoColumnDefs": [{
                            "bVisible": false,
                            "aTargets": [0],
                        },
                        {
                            "className": "dt-right"
                        }
                    ],
                    "order": [
                        [0, "desc"]
                    ],
                })
            }
            // END OF DATATABLE FUNCTION
            var jq = jQuery.noConflict();

            jq(document).ready(function() {
                // Use jq instead of $
                // ...

                // Your existing DataTable initialization or other code
                jq('#dataTable').DataTable({
                    // DataTable configuration options
                });

                // Example of DataTable reload
                jq('#reloadButton').on('click', function() {
                    jq('#dataTable').DataTable().ajax.reload();
                });
            });

            dataTable();

            function renderThePieChart(seriesCount) {
                console.log(seriesCount)

                const totalSum = seriesCount.reduce((accumulator, currentValue) => accumulator + currentValue, 0);

                const percentages = seriesCount.map(value => Math.round((value / totalSum) * 100));

                $('#underWeightPie').html(percentages[0] + '%')
                $('#normalWeightPie').html(percentages[1] + '%')
                $('#overWeightPie').html(percentages[2] + '%')
                $('#obesePie').html(percentages[3] + '%')

                console.log('Percentages:', percentages);
                // =====================================
                // Breakup
                // =====================================
                let breakup = {
                    color: "#adb5bd",
                    series: seriesCount,
                    labels: ["Underweight", "Normal Weight", "Overweight", "Obese"],
                    chart: {
                        width: 180,
                        type: "donut",
                        fontFamily: "Plus Jakarta Sans', sans-serif",
                        foreColor: "#adb0bb",
                    },
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            donut: {
                                size: "75%",
                            },
                        },
                    },
                    stroke: {
                        show: false,
                    },

                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },
                    colors: ["#13deb9", "#5d87ff", "#ffae1f", "#fa896b"],

                    responsive: [{
                        breakpoint: 991,
                        options: {
                            chart: {
                                width: 150,
                            },
                        },
                    }, ],
                    tooltip: {
                        theme: "dark",
                        fillSeriesColor: false,
                    },
                };
                let chart = new ApexCharts(document.querySelector("#breakup"), breakup);

                chart.render();

            }

            function getCounts() {
                let form_url = BASE_API;

                $.ajax({
                    url: form_url,
                    method: "GET",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        categoryCounts = data.reduce(function(counts, person) {
                            if (counts.hasOwnProperty(person.bmi_category)) {
                                counts[person.bmi_category]++;
                            }
                            return counts;
                        }, {
                            'Underweight': 0,
                            'Normal Weight': 0,
                            'Overweight': 0,
                            'Obese Class I': 0,
                            'Obese Class II': 0,
                            'Obese Class III': 0,
                        });


                        seriesCount = [categoryCounts['Underweight'], categoryCounts['Normal Weight'],
                            categoryCounts['Overweight'], categoryCounts['Obese Class I'] +
                            categoryCounts['Obese Class II'] + categoryCounts['Obese Class III'],
                        ]

                        renderThePieChart(seriesCount)
                    },
                    error: function(error) {
                        console.log(error)
                        if (error.responseJSON.errors == null) {
                            swalAlert('warning', error.responseJSON.message)
                        } else {
                            $.each(error.responseJSON.errors, function(key, value) {
                                swalAlert('warning', value)
                            });
                        }
                    }
                    // ajax closing tag
                })
            }



            function getMultipleCounts() {
                let form_url = API_URL + '/dashboard/getCounts';

                $.ajax({
                    url: form_url,
                    method: "GET",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {

                        $('#userAccountCount').html(data.userCount)
                        $('#individualRecordCount').html(data.individualRecordCount)
                        $('#feedingProgramCount').html(data.feedingProgramCount)
                        $('#announcementCount').html(data.announcementCount)
                    },
                    error: function(error) {
                        console.log(error)
                        if (error.responseJSON.errors == null) {
                            swalAlert('warning', error.responseJSON.message)
                        } else {
                            $.each(error.responseJSON.errors, function(key, value) {
                                swalAlert('warning', value)
                            });
                        }
                    }
                    // ajax closing tag
                })
            }
            var jq = jQuery.noConflict();

jq(document).ready(function() {
    // Use jq instead of $
    // ...

    // Your existing DataTable initialization or other code
    jq('#dataTable').DataTable({
        // DataTable configuration options
    });

    // Example of DataTable reload
    jq('#reloadButton').on('click', function() {
        jq('#dataTable').DataTable().ajax.reload();
    });
});
            getCounts()
            getMultipleCounts()


            function updateChartData(selectedYear) {
            let form_url = API_URL+ "/history_of_individual_records" + "/data_chart_year/"+ selectedYear 
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

            updateChartData(2024);


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

     
        let setWeightForAgeStatusTable = [0, 0, 0];
        let calculateHeightForAgeStatusTable = [0, 0, 0, 0];

        let monthDropdown = document.getElementById('monthDropdown');
        let currentMonth = new Date().getMonth() + 1; 

        let defaultOption = monthDropdown.querySelector(`option[value="${currentMonth}"]`);
        if (defaultOption) {
            defaultOption.selected = true;
        }

        function updateChartDatas(selectedMonth) {
            let form_urls = API_URL+ "/history_of_individual_records" + "/data_chart/"+ selectedMonth 
            console.log("Selected Month: ", selectedMonth)

            $.ajax({
                url: form_urls,
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

                        updateChartsPie(setWeightForAgeStatusTable, calculateHeightForAgeStatusTable);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        updateChartDatas(currentMonth);
        monthDropdown.addEventListener('change', function() {
        let selectedMonth = monthDropdown.value;
        updateChartDatas(selectedMonth);
        });

        function updateChartsPie(weightData, heightData) {
        let pieChart3Instance = Chart.getChart("pieChart3");

        if (pieChart3Instance) {
            pieChart3Instance.destroy();
        }

               
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
                    aspectRatio: 1.2,
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



    //END
    })

    </script>
@endsection
