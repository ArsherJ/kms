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
                                    <strong>Height for Age Status:</strong>
                                    <!-- <span id="height_for_age_status" class="card-text"></span> -->
                                </h6>
                                <h6 style="padding:5px;  text-align:right">
                                    <strong>Length/Height Status:</strong>
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
                function calculateWeightForAgeStatus(ageInMonths, sex, weight)
            {
                let result = "Unknown";
                let statusClass = "";

                function setWeightForAgeStatus(severelyUnderweightLimit, underweightLimit, normalLimit)
                {
                    if (weight <= severelyUnderweightLimit) { result = "Severely Underweight"; statusClass = "bg-danger"; }
                    else if (weight >= underweightLimit && weight <= normalLimit) { result = "Underweight"; statusClass = "bg-warning"; }
                    else if (weight > normalLimit) { result = "Normal"; statusClass = "bg-success"; }
                }

                switch (ageInMonths) // (input data ranges here)
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
                return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
            }

            // Script for Height for Age Status:
                function calculateHeightForAgeStatus(ageInMonths, sex, height)
            {
                let result = "Unknown";
                let statusClass = "";

                function setHeightForAgeStatus(severelyStuntedLimit, stuntedLimit, normalLimit, tallLimit)
                {
                    if (height <= severelyStuntedLimit) { result = "Severely Stunted"; statusClass = "bg-danger"; }
                    else if (height >= stuntedLimit && height <= normalLimit) { result = "Stunted"; statusClass = "bg-warning"; }
                    else if (height >= normalLimit && height <= tallLimit) { result = "Normal"; statusClass = "bg-success"; }
                    else if (height > tallLimit) { result = "Tall"; statusClass = "bg-primary"; }
                }

                switch (ageInMonths) // (input data ranges here)
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
                return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
            }

            // Script for LT/HT Status:
                function calculateLtHtStatus(ageInMonths, sex, height)
            {
                let result = "Unknown";
                let statusClass = "";

                function setLtHtStatus(severelyStuntedLimit, stuntedLimit, normalLimit, tallLimit)
                {
                    if (height <= severelyStuntedLimit) { result = "Severely Stunted"; statusClass = "bg-danger"; }
                    else if (height >= stuntedLimit && height <= normalLimit) { result = "Stunted"; statusClass = "bg-warning"; }
                    else if (height >= normalLimit && height <= tallLimit) { result = "Normal"; statusClass = "bg-success"; }
                    else if (height > tallLimit) { result = "Tall"; statusClass = "bg-primary"; }
                }

                switch (ageInMonths) // (input data ranges here)
                {
                    case 0:
                        if (sex === "Male") { setLtHtStatus(44.1, 44.2, 46.1, 53.8); }
                        else if (sex === "Female") { setLtHtStatus(43.5, 43.6, 45.4, 53.0); }
                        break;
                    case 1:
                        if (sex === "Male") { setLtHtStatus(48.8, 48.9, 50.8, 58.7); }
                        else if (sex === "Female") { setLtHtStatus(47.7, 47.8, 49.8, 57.7); }
                        break;
                    case 2:
                        if (sex === "Male") { setLtHtStatus(52.3, 52.4, 54.4, 62.5); }
                        else if (sex === "Female") { setLtHtStatus(50.9, 51.0, 53.0, 61.2); }
                        break;
                    case 3:
                        if (sex === "Male") { setLtHtStatus(55.2, 55.3, 57.3, 65.6); }
                        else if (sex === "Female") { setLtHtStatus(53.4, 53.5, 55.6, 64.1); }
                        break;
                    case 4:
                        if (sex === "Male") { setLtHtStatus(57.5, 57.6, 59.7, 68.1); }
                        else if (sex === "Female") { setLtHtStatus(55.5, 55.6, 57.8, 66.5); }
                        break;
                    case 5:
                        if (sex === "Male") { setLtHtStatus(59.5, 59.6, 61.7, 70.2); }
                        else if (sex === "Female") { setLtHtStatus(57.3, 57.4, 59.6, 68.6); }
                        break;
                    case 6:
                        if (sex === "Male") { setLtHtStatus(61.1, 61.2, 63.3, 72.0); }
                        else if (sex === "Female") { setLtHtStatus(58.8, 58.9, 61.2, 70.4); }
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
                return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
            }


            


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
                        let weightStatus = calculateWeightForAgeStatus(data.age_in_months, data.sex, data.weight);
                        let heightStatus = calculateHeightForAgeStatus(data.age_in_months, data.sex, data.height);
                        let lthtStatus = calculateLtHtStatus(data.age_in_months, data.sex, data.height);

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
        
        updateLineChart(2024,212)
        
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
                }, {
                    label: 'Weight for Lt/Ht',
                    backgroundColor: '#2D8BBA',
                    borderColor: '#2D8BBA',
                    borderWidth: 1,
                    data: WFH
                }]
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
