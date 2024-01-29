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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <h3><strong><span id="full_name" class="card-text"></span></strong>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <div>
                                <h5><strong>ID Number: </strong><span id="id_number" class="card-text"></span></h5>
                                <h5><strong>Gender: </strong><span id="gender" class="card-text"></span>
                                </h5>
                                <h5><strong>Birthdate: </strong><span id="birthdate" class="card-text"></span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div>
                                <h6><strong>Height: </strong><span id="height" class="card-text"></span>
                                    <h6><strong>Weight: </strong><span id="weight" class="card-text"></span>
                                    </h6>
                                    <h6><strong>BMI: </strong><span id="bmi" class="card-text"></span>
                                    </h6>
                                    <h6><strong>BMI Category: </strong><span id="bmi_category" class="card-text"></span>
                                    </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title fw-semibold">History of BMI</h5>

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
                                <tbody>

                                </tbody>
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
            </div>
        </div>
    </div>
@endsection

{{-- SCRIPTS --}}
@section('scripts')
    <script>
        $(document).ready(function() {

            // GLOBAL letIABLE
            const APP_URL = "{{ env('APP_URL') }}"
            const API_URL = "{{ env('API_URL') }}"
            const API_TOKEN = localStorage.getItem("API_TOKEN")
            const BASE_API = API_URL + '/individual_records'
            const INDIVIDUAL_BASE_API = API_URL + '/individual_records'
            const FEEDING_PROGRAMS_IR_LOGS_API = API_URL + '/feeding_program_ir_logs'

            const INDIVIDUAL_RECORD_ID = "{{ $individual_record_id }}"

            function bmiDataTable() {
                // FOR FOOTER GENERATE OF INPUT
                $('#bmiDataTable tfoot th').each(function(i) {
                    let title = $('#dataTable thead th').eq($(this).index()).text();
                    $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title +
                        '" data-index="' + i + '" />');
                });


                dataTable = $('#bmiDataTable').DataTable({
                    "ajax": {
                        url: API_URL + '/history_of_individual_records/search_individual_records/' +
                            INDIVIDUAL_RECORD_ID,
                        // dataSrc: ''
                    },
                    "processing": true,
                    "serverSide": true,
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "headers": {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "columns": [{
                            data: "id"
                        },
                        {
                            data: "created_at"
                        },
                        {
                            data: "date_recorded",
                            render: function(data, type ,row) {
                                return moment(data).format('lll')
                            }
                        },
                        {
                            data: "height",
                            render: function(data, type, row) {
                                return data + "cm"
                            }
                        },
                        {
                            data: "weight",
                            render: function(data, type, row) {
                                return data + "kg"
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
                            "aTargets": [0, 1],
                        },
                        {
                            "className": "dt-right",
                            "targets": [-1]
                        }
                    ],
                    "order": [
                        [1, "desc"]
                    ],
                    // EXPORTING AS PDF
                    'dom': 'Blrtip',
                    'buttons': {
                        dom: {
                            button: {
                                tag: 'button',
                                className: ''
                            }
                        },
                        buttons: [{
                            extend: 'pdfHtml5',
                            text: 'Export as PDF',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            exportOptions: {
                                // columns: ':visible',
                                columns: ":not(.not-export-column)",
                                modifier: {
                                    order: 'current'
                                }
                            },
                            className: 'btn btn-dark mb-4',
                            titleAttr: 'PDF export.',
                            extension: '.pdf',
                            download: 'open', // FOR NOT DOWNLOADING THE FILE AND OPEN IN NEW TAB
                            title: function() {
                                return "History of BMI for " + $(
                                    '#full_name').html()
                            },
                            filename: function() {
                                return "History of BMI"
                            },
                            customize: function(doc) {
                                doc.styles.tableHeader.alignment = 'left';
                            }
                        }, ]
                    },


                })

                // FOOTER FILTER
                $(dataTable.table().container()).on('keyup', 'tfoot input', function() {
                    console.log(this.value)
                    console.log(dataTable)
                    dataTable
                        .column($(this).data('index'))
                        .search(this.value)
                        .draw();
                });

                // TO ADD BUTTON TO DIV TABLE ACTION
                dataTable.buttons().container().appendTo('#tableActions');
            }

            function dataTable() {
                // FOR FOOTER GENERATE OF INPUT
                $('#dataTable tfoot th').each(function(i) {
                    let title = $('#dataTable thead th').eq($(this).index()).text();
                    $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title +
                        '" data-index="' + i + '" />');
                });


                dataTable = $('#dataTable').DataTable({
                    "ajax": {
                        url: API_URL + '/feeding_program_ir_logs/search_individual_records/' +
                            INDIVIDUAL_RECORD_ID,
                        // dataSrc: ''
                    },
                    "processing": true,
                    "serverSide": true,
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "headers": {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "columns": [{
                            data: "feeding_programs.id"
                        },
                        {
                            data: "feeding_programs.created_at"
                        },
                        {
                            data: "feeding_programs.title",
                        },
                        {
                            data: "feeding_programs.location",
                        },
                        {
                            data: "feeding_programs.date_of_program",
                            render: function(data, type, row) {
                                return moment(data).format('ll')
                            },
                        },
                        {
                            data: "feeding_programs.time_of_program",
                            render: function(data, type, row) {
                                return moment(`${row.feeding_programs.date_of_program} ${data}`)
                                    .format('LT')
                            }
                        },
                        {
                            data: "feeding_programs.status",
                        },
                        {
                            data: "feeding_programs.deleted_at",
                            render: function(data, type, row) {
                                console.log(data)
                                if (data == null) {
                                    return `<div>
                                        <button id="${row.id}" type="button" class="btn btn-sm btn-info btnView">View</button>
                                        <button id="${row.id}" type="button" class="btn btn-sm btn-warning btnEdit">Edit</button>
                                        <button id="${row.id}" type="button" class="btn btn-sm btn-danger btnDelete">Delete</button>
                                        </div>`;
                                } else {
                                    return '<button class="btn btn-danger btn-sm">Activate</button>';
                                }
                            }
                        }
                    ],
                    "aoColumnDefs": [{
                            "bVisible": false,
                            "aTargets": [0, 1, -1],
                        },
                        {
                            "className": "dt-right",
                            "targets": [-1]
                        }
                    ],
                    "order": [
                        [1, "desc"]
                    ],
                    // EXPORTING AS PDF
                    'dom': 'Blrtip',
                    'buttons': {
                        dom: {
                            button: {
                                tag: 'button',
                                className: ''
                            }
                        },
                        buttons: [{
                            extend: 'pdfHtml5',
                            text: 'Export as PDF',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            exportOptions: {
                                // columns: ':visible',
                                columns: ":not(.not-export-column)",
                                modifier: {
                                    order: 'current'
                                }
                            },
                            className: 'btn btn-dark mb-4',
                            titleAttr: 'PDF export.',
                            extension: '.pdf',
                            download: 'open', // FOR NOT DOWNLOADING THE FILE AND OPEN IN NEW TAB
                            title: function() {
                                return "History of Registered Feeding Programs for " + $(
                                    '#full_name').html()
                            },
                            filename: function() {
                                return "History of Registered Feeding Programs"
                            },
                            customize: function(doc) {
                                doc.styles.tableHeader.alignment = 'left';
                            }
                        }, ]
                    },


                })

                // FOOTER FILTER
                $(dataTable.table().container()).on('keyup', 'tfoot input', function() {
                    console.log(this.value)
                    console.log(dataTable)
                    dataTable
                        .column($(this).data('index'))
                        .search(this.value)
                        .draw();
                });

                // TO ADD BUTTON TO DIV TABLE ACTION
                dataTable.buttons().container().appendTo('#tableActions');
            }

            // REFRESH DATATABLE FUNCTION
            function refresh() {
                $('#dataTable').DataTable().ajax.reload()
            }
            // REFRESH DATATABLE FUNCTION

            // FETCH DETAILS FUNCTION
            function getIndividualRecordIdRecord(id) {
                let form_url = BASE_API + '/' + id;

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
                        console.log(data)
                        $('#id_number').html(data.id_number)
                        $('#full_name').html(`${data.first_name} ${data.middle_name} ${data.last_name}`)
                        $('#gender').html(data.gender)
                        $('#birthdate').html(data.birthdate)
                        $('#height').html(data.height + "cm")
                        $('#weight').html(data.weight + "kg")
                        $('#bmi').html(data.bmi)

                        const bmiCategoryClasses = {
                            "Underweight": "bg-success",
                            "Normal Weight": "bg-primary",
                            "Overweight": "bg-warning",
                            "Obese Class I": "bg-danger",
                            "Obese Class II": "bg-danger",
                            "Obese Class III": "bg-danger"
                        };
                        const bmiClass = bmiCategoryClasses[data.bmi_category] || "bg-success";
                        $('#bmi_category').html(
                            `<span class="badge rounded-1 fw-semibold ${bmiClass}">${data.bmi_category}</span>`
                        )
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
            // END OF EDIT FUNCTION


            // FUNCTION CALLING
            getIndividualRecordIdRecord(INDIVIDUAL_RECORD_ID)
            dataTable()
            bmiDataTable()

        })
    </script>
@endsection
