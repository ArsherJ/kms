@extends('layouts.app')

{{-- SIDEBAR --}}
@section('sidebar')
    @include('layouts.common.admin-view-ir-sidebar')
@endsection

{{-- NAVBAR --}}
@section('header')
    @include('layouts.common.admin-header')
@endsection

{{-- CONTENT --}}
@section('content')
    {{-- MAIN CONTENT --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <div class="card">
        <div class="card-body">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <h2><strong><span id="child_name" class="card-text"></span></strong></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-body">
                            <div>
                                <h6 style="padding:5px; text-align:right">
                                    <strong>Child's Residence:</strong>
                                    <!-- <span id="address" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px; text-align:right">
                                    <strong>Name of Parent/Guardian:</strong>
                                    <!-- <span id="parent_name" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px; text-align:right">
                                    <strong>Sex:</strong>
                                    <!-- <span id="sex" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px; text-align:right">
                                    <strong>Date of Birth:</strong>
                                    <!-- <span id="birthdate" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px; text-align:right">
                                    <strong>Recent Date Measured:</strong>
                                    <!-- <span id="date_measured" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px; text-align:right">
                                    <strong>Belongs to IP Group:</strong>
                                    <!-- <span id="ip_group" class="card-text"></span> -->
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body">
                            <div>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Child's Residence:</strong> -->
                                    <span id="address" class="card-text"></span>
                                </h6>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Name of Parent/Guardian:</strong> -->
                                    <span id="parent_name" class="card-text"></span>
                                </h6>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Sex:</strong> -->
                                    <span id="sex" class="card-text"></span>
                                </h6>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Date of Birth:</strong> -->
                                    <span id="birthdate" class="card-text"></span>
                                </h6>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Recent Date Measured:</strong> -->
                                    <span id="date_measured" class="card-text"></span>
                                </h6>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Belongs to IP Group:</strong> -->
                                    <span id="ip_group" class="card-text"></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body">
                            <div>
                                <h6 style="padding:5px;  text-align:right">
                                    <strong>On Supplementation:</strong>
                                    <!-- <span id="micronutrient" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px;  text-align:right">
                                    <strong>Child's Weight (kg):</strong>
                                    <!-- <span id="weight" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px;  text-align:right">
                                    <strong>Child's Weight (cm):</strong>
                                    <!-- <span id="height" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px;  text-align:right">
                                    <strong>Weight for Age Status:</strong>
                                    <!-- <span id="weight_for_age_status" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px;  text-align:right">
                                    <strong>Height/Length for Age Status:</strong>
                                    <!-- <span id="height_for_age_status" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px;  text-align:right">
                                    <strong>Weight for Length Status:</strong>
                                    <!-- <span id="ltht_status" class="card-text"></span> -->
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body">
                            <div>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Taking Micronutrient Supplementation:</strong> -->
                                    <span id="micronutrient" class="card-text"></span>
                                </h6>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Child's Weight (kg):</strong> -->
                                    <span id="weight" class="card-text"></span>
                                </h6>
                                <h6 style="padding:5px;  text-align:left">
                                    <!-- <strong>Child's Weight (cm):</strong> -->
                                    <span id="height" class="card-text"></span>
                                </h6>
                                <h6 style="padding:2px;  text-align:left">
                                    <!-- <strong>Weight for Age Status:</strong> -->
                                    <span id="weight_for_age_status" class="card-text"></span>
                                </h6>
                                <h6 style="padding:2px;  text-align:left">
                                    <!-- <strong>Height for Age Status:</strong> -->
                                    <span id="height_for_age_status" class="card-text"></span>
                                </h6>
                                <h6 style="padding:2px;  text-align:left">
                                    <!-- <strong>Length/Height Status:</strong> -->
                                    <span id="ltht_status" class="card-text"></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6 class="card-title fw-semibold">History of BMI</h6>
                            </div>
                            
                            <table class="table table-hover table-sm table-borderless" id="bmiDataTable" style="width:100%">

                                <thead>
                                    <tr class="text-dark">
                                        <th class="not-export-column">ID</th>
                                        <th class="not-export-column">Created at</th>
                                        <th>Date Recorded</th>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>BMI</th>
                                        <th>BMI Category</th>
                                    </tr>
                                </thead>

                                <tbody></tbody>

                                <tfoot>
                                    <tr class="text-dark">
                                        <th class="not-export-column">ID</th>
                                        <th class="not-export-column">Created at</th>
                                        <th>Date Recorded</th>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>BMI</th>
                                        <th>BMI Category</th>
                                    </tr>
                                </tfoot>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title fw-semibold">History of Registered Feeding Program/s</h5>

                            </div>
                            <table class="table table-hover table-sm table-borderless" id="dataTable" style="width:100%">
                                <thead>
                                    <tr class="text-dark">
                                        <th class="not-export-column">ID</th>
                                        <th class="not-export-column">Created at</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th class="not-export-column">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr class="text-dark">
                                        <th class="not-export-column">ID</th>
                                        <th class="not-export-column">Created at</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th class="not-export-column">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title fw-semibold">LINE GRAPH</h5>
                            </div>
                            <canvas id="myLineChart" width="600" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- SCRIPTS --}}
@section('scripts')
<script src="{{ asset('js/calculationScript.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            // GLOBAL letIABLE
            const APP_URL = "{{ env('APP_URL') }}"
            const API_URL = "{{ env('API_URL') }}"
            const API_TOKEN = localStorage.getItem("API_TOKEN")
            const BASE_API = API_URL + '/individual_records'
            const INDIVIDUAL_BASE_API = API_URL + '/individual_records'
            // const FEEDING_PROGRAMS_IR_LOGS_API = API_URL + '/feeding_program_ir_logs'

            const INDIVIDUAL_RECORD_ID = "{{ $individual_record_id }}"

            // function bmiDataTable()
            // {
            //     // FOR FOOTER GENERATE OF INPUT
            //     $('#bmiDataTable tfoot th').each(function(i) {
            //         let title = $('#dataTable thead th').eq($(this).index()).text();
            //         $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title +
            //             '" data-index="' + i + '" />');
            //     });


            //     dataTable = $('#bmiDataTable').DataTable({
            //         "ajax": {
            //             url: API_URL + '/history_of_individual_records/search_individual_records/' +
            //                 INDIVIDUAL_RECORD_ID,
            //             // dataSrc: ''
            //         },
            //         "processing": true,
            //         "serverSide": true,
            //         "lengthMenu": [
            //             [10, 25, 50, -1],
            //             [10, 25, 50, "All"]
            //         ],
            //         "headers": {
            //             "Accept": "application/json",
            //             "Content-Type": "application/json",
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         "columns": [{
            //                 data: "id"
            //             },
            //             {
            //                 data: "created_at"
            //             },
            //             {
            //                 data: "date_recorded",
            //                 render: function(data, type ,row) {
            //                     return moment(data).format('lll')
            //                 }
            //             },
            //             {
            //                 data: "height",
            //                 render: function(data, type, row) {
            //                     return data + " " + "cm"
            //                 }
            //             },
            //             {
            //                 data: "weight",
            //                 render: function(data, type, row) {
            //                     return data + " " + "kg"
            //                 }
            //             },
            //             {
            //                 data: "bmi",
            //             },
            //             {
            //                 data: "bmi_category",
            //                 render: function(data, type, row) {
            //                     const bmiCategoryClasses = {
            //                         "Underweight": "bg-success",
            //                         "Normal Weight": "bg-primary",
            //                         "Overweight": "bg-warning",
            //                         "Obese Class I": "bg-danger",
            //                         "Obese Class II": "bg-danger",
            //                         "Obese Class III": "bg-danger"
            //                     };

            //                     const bmiClass = bmiCategoryClasses[data] || "bg-success";

            //                     return `<span class="badge rounded-1 fw-semibold ${bmiClass}">${data}</span>`;
            //                 }
            //             },
            //         ],
            //         "aoColumnDefs": [{
            //                 "bVisible": false,
            //                 "aTargets": [0, 1],
            //             },
            //             {
            //                 "className": "dt-right",
            //                 "targets": [-1]
            //             }
            //         ],
            //         "order": [
            //             [1, "desc"]
            //         ],
            //         // EXPORTING AS PDF
            //         'dom': 'Blrtip',
            //         'buttons': {
            //             dom: {
            //                 button: {
            //                     tag: 'button',
            //                     className: ''
            //                 }
            //             },
            //             buttons: [{
            //                 extend: 'pdfHtml5',
            //                 text: 'Export as PDF',
            //                 orientation: 'landscape',
            //                 pageSize: 'LEGAL',
            //                 exportOptions: {
            //                     // columns: ':visible',
            //                     columns: ":not(.not-export-column)",
            //                     modifier: {
            //                         order: 'current'
            //                     }
            //                 },
            //                 className: 'btn btn-dark mb-4',
            //                 titleAttr: 'PDF export.',
            //                 extension: '.pdf',
            //                 download: 'open', // FOR NOT DOWNLOADING THE FILE AND OPEN IN NEW TAB
            //                 title: function() {
            //                     return "History of BMI for " + $(
            //                         '#full_name').html()
            //                 },
            //                 filename: function() {
            //                     return "History of BMI"
            //                 },
            //                 customize: function(doc) {
            //                     doc.styles.tableHeader.alignment = 'left';
            //                 }
            //             }, ]
            //         },


            //     })

            //     // FOOTER FILTER
            //     $(dataTable.table().container()).on('keyup', 'tfoot input', function() {
            //         console.log(this.value)
            //         console.log(dataTable)
            //         dataTable
            //             .column($(this).data('index'))
            //             .search(this.value)
            //             .draw();
            //     });

            //     // TO ADD BUTTON TO DIV TABLE ACTION
            //     dataTable.buttons().container().appendTo('#tableActions');
            // }

            // function dataTable()
            // {
            //     // FOR FOOTER GENERATE OF INPUT
            //     $('#dataTable tfoot th').each(function(i) {
            //         let title = $('#dataTable thead th').eq($(this).index()).text();
            //         $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title +
            //             '" data-index="' + i + '" />');
            //     });


            //     dataTable = $('#dataTable').DataTable({
            //         "ajax": {
            //             url: API_URL + '/feeding_program_ir_logs/search_individual_records/' +
            //                 INDIVIDUAL_RECORD_ID,
            //             // dataSrc: ''
            //         },
            //         "processing": true,
            //         "serverSide": true,
            //         "lengthMenu": [
            //             [10, 25, 50, -1],
            //             [10, 25, 50, "All"]
            //         ],
            //         "headers": {
            //             "Accept": "application/json",
            //             "Content-Type": "application/json",
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         "columns": [{
            //                 data: "feeding_programs.id"
            //             },
            //             {
            //                 data: "feeding_programs.created_at"
            //             },
            //             {
            //                 data: "feeding_programs.title",
            //             },
            //             {
            //                 data: "feeding_programs.location",
            //             },
            //             {
            //                 data: "feeding_programs.date_of_program",
            //                 render: function(data, type, row) {
            //                     return moment(data).format('ll')
            //                 },
            //             },
            //             {
            //                 data: "feeding_programs.time_of_program",
            //                 render: function(data, type, row) {
            //                     return moment(`${row.feeding_programs.date_of_program} ${data}`)
            //                         .format('LT')
            //                 }
            //             },
            //             {
            //                 data: "feeding_programs.status",
            //             },
            //             {
            //                 data: "feeding_programs.deleted_at",
            //                 render: function(data, type, row) {
            //                     console.log(data)
            //                     if (data == null) {
            //                         return `<div>
            //                             <button id="${row.id}" type="button" class="btn btn-sm btn-info btnView">View</button>
            //                             <button id="${row.id}" type="button" class="btn btn-sm btn-warning btnEdit">Edit</button>
            //                             <button id="${row.id}" type="button" class="btn btn-sm btn-danger btnDelete">Delete</button>
            //                             </div>`;
            //                     } else {
            //                         return '<button class="btn btn-danger btn-sm">Activate</button>';
            //                     }
            //                 }
            //             }
            //         ],
            //         "aoColumnDefs": [{
            //                 "bVisible": false,
            //                 "aTargets": [0, 1, -1],
            //             },
            //             {
            //                 "className": "dt-right",
            //                 "targets": [-1]
            //             }
            //         ],
            //         "order": [
            //             [1, "desc"]
            //         ],
            //         // EXPORTING AS PDF
            //         'dom': 'Blrtip',
            //         'buttons': {
            //             dom: {
            //                 button: {
            //                     tag: 'button',
            //                     className: ''
            //                 }
            //             },
            //             buttons: [{
            //                 extend: 'pdfHtml5',
            //                 text: 'Export as PDF',
            //                 orientation: 'landscape',
            //                 pageSize: 'LEGAL',
            //                 exportOptions: {
            //                     // columns: ':visible',
            //                     columns: ":not(.not-export-column)",
            //                     modifier: {
            //                         order: 'current'
            //                     }
            //                 },
            //                 className: 'btn btn-dark mb-4',
            //                 titleAttr: 'PDF export.',
            //                 extension: '.pdf',
            //                 download: 'open', // FOR NOT DOWNLOADING THE FILE AND OPEN IN NEW TAB
            //                 title: function() {
            //                     return "History of Registered Feeding Programs for " + $(
            //                         '#full_name').html()
            //                 },
            //                 filename: function() {
            //                     return "History of Registered Feeding Programs"
            //                 },
            //                 customize: function(doc) {
            //                     doc.styles.tableHeader.alignment = 'left';
            //                 }
            //             }, ]
            //         },


            //     })

            //     // FOOTER FILTER
            //     $(dataTable.table().container()).on('keyup', 'tfoot input', function() {
            //         console.log(this.value)
            //         console.log(dataTable)
            //         dataTable
            //             .column($(this).data('index'))
            //             .search(this.value)
            //             .draw();
            //     });

            //     // TO ADD BUTTON TO DIV TABLE ACTION
            //     dataTable.buttons().container().appendTo('#tableActions');
            // }

            // Script for Refresh Data Table Function:
            function refresh()
            {
                $('#dataTable').DataTable().ajax.reload()
            }
            // End of Script for Refresh Data Table Function

            // Script for Weight for Age Status:
 
            // Script for Height for Age Status:


            // Script for Fetching Individual Record Function:
            function getIndividualRecordIdRecord(id)
            {
                let form_url = BASE_API + '/' + id;
                $.ajax
                ({
                    url: form_url,
                    method: "GET",
                    headers:
                    {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data)
                    {
                        let weightStatus = calculateWeightForAgeStatus(data.age_in_months, data.sex, data.weight,false);
                        let heightStatus = calculateHeightLengthForAgeStatus(data.age_in_months, data.sex, data.height,false);
                        // function calculateWgtHtstatus(height, ageInMonths, weight, sex, database) {
                        let lthtStatus = calculateWgtHtstatus(data.height,data.age_in_months, data.weight ,data.sex,false);

                        console.log(data)
                        $('#child_name').html(`${data.child_first_name} ${data.child_last_name}`)
                        $('#address').html(data.address)
                        $('#parent_name').html(`${data.mother_first_name} ${data.mother_last_name}`)
                        $('#sex').html(data.sex)
                        // $('#birthdate').html(data.birthdate)
                        // $('#date_measured').html(data.date_measured || "N/A")
                        $('#birthdate').html(data.birthdate ? new Date(data.birthdate).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' }) : 'N/A');
                        $('#date_measured').html(data.date_measured ? new Date(data.date_measured).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' }) : 'N/A');
                        $('#ip_group').html(data.ip_group)
                        $('#micronutrient').html(data.micronutrient)
                        $('#height').html(data.height + " " + "centimeters")
                        $('#weight').html(data.weight + " " + "kilograms")
                        $('#weight_for_age_status').html(weightStatus)
                        $('#height_for_age_status').html(heightStatus)
                        $('#ltht_status').html(lthtStatus)
                    },
                    error: function(error)
                    {
                        console.log(error)
                        if (error.responseJSON.errors == null)
                        {
                            swalAlert('warning', error.responseJSON.message)
                        }
                        else
                        {
                            $.each(error.responseJSON.errors, function(key, value)
                            {
                                swalAlert('warning', value)
                            });
                        }
                    }
                })

            }
            // End of Script for Fetching Individual Record Function


            // Function Calling:
            getIndividualRecordIdRecord(INDIVIDUAL_RECORD_ID)
            // dataTable()
            // bmiDataTable()


        let currentYear = new Date().getFullYear();
        $('#monthDropdown').val(currentYear);


        function updateLineChart(selectedYear,child_number){
            urlzx = API_URL+ "/history_of_individual_records" + "/individual_view_graph/" + selectedYear + "/" + child_number,
            $.ajax({
                url: urlzx,
                method: "POST",
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                    "Authorization": API_TOKEN,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    var WFA = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    var HFA = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    var WFH = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

                    data.forEach(function(child){
                        var created_at = moment(child.created_at, 'YYYY-MM-DD');
                        var monthNumber = created_at.format("MM")
                        WFA[monthNumber-1] = child.weight
                        HFA[monthNumber-1] = child.height
                    })
                    updateDataGraph(WFA,HFA,WFH)
                }
            })
        }
        console.log("Individual Record: ",INDIVIDUAL_RECORD_ID)
        updateLineChart(currentYear,INDIVIDUAL_RECORD_ID)
        
        function updateDataGraph(WFA,HFA,WFH){
            var months = ['1st Month', '2nd Month', '3rd Month', '4th Month', '5th Month', '6th Month', '7th Month', '8th Month', '9th Month', '10th Month', '11th Month', '12th Month'];
            var data = {
                labels: months,
                datasets: [{
                    label: 'Weight For Age',
                    backgroundColor: '#6CE5E8',
                    borderColor: '#6CE5E8',
                    borderWidth: 1,
                    data: WFA
                }, {
                    label: 'Height For Age',
                    backgroundColor: '#41B8D5',
                    borderColor: '#41B8D5',
                    borderWidth: 1,
                    data: HFA
                },
                //  {
                //     label: 'Weight for Lt/Ht',
                //     backgroundColor: '#2D8BBA',
                //     borderColor: '#2D8BBA',
                //     borderWidth: 1,
                //     data: WFH
                // }]
                ]
            };

            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            var ctx = document.getElementById('myLineChart').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        }
        
    })
    </script>
@endsection
