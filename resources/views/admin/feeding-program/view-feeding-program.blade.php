@extends('layouts.app')

{{-- SIDEBAR --}}
@section('sidebar')
    @include('layouts.common.admin-view-fp-sidebar')
@endsection

{{-- NAVBAR --}}
@section('header')
    @include('layouts.common.admin-header')
@endsection

{{-- CONTENT --}}
@section('content')
    {{-- EDIT MODAL --}}
    <div id="editModal" class="modal" tabindex="-1" feeding_program="dialog">
        <div class="modal-dialog modal-xlg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-body" id="requiredFacultyModalBody">
                        <div class="pb-4 col-12 d-flex justify-content-between dataTables_wrapper">
                            <h5>Register an Individual</h5>
                            <div>
                                <button type="button" id="btn_select_all" class="btn btn-dark"><span
                                        id="select_all_label">Select All Visibles</span>
                                </button>
                            </div>
                        </div>
                        <form id="updateRegisteredIndividualForm">
                            <table class="table table-hover table-bordered table-sm" id="registeredIndividualDatatableModal"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="not-export-column">ID</th>
                                        <th class="not-export-column">Created at</th>
                                        <th>ID Number</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Birthdate</th>
                                        <th>Gender</th>
                                        <th>Height(cm)</th>
                                        <th>Weight(kg)</th>
                                        <th>BMI</th>
                                        <th>BMI Category</th>
                                        <th class="not-export-column">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btnUpdate">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END OF EDIT MODAL --}}

    {{-- MAIN CONTENT --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-8">
                        <div class="card-body">
                            <h1 class="mb-4 text-center fw-semibold"><span id="title"></span></h1>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <h5 class="text-center"><span id="description"></span></h5>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2 py-4 text-center">
                                    <span>
                                        <h1 class="text-primary"><span>
                                                <i class="fa-regular fa-calendar"></i>
                                            </span></h1>
                                    </span>
                                    <h5 id="date_of_program"></h5>
                                </div>
                                <div class="col-2 py-4 text-center">
                                    <span>
                                        <h1 class="text-warning"><span>
                                                <i class="fa-regular fa-clock"></i>
                                            </span></h1>
                                    </span>
                                    <h5 id="time_of_program"></h5>
                                </div>
                                <div class="col-2 py-4 text-center">
                                    <span>
                                        <h1 class="text-success"><span>
                                                <i class="fa-solid fa-location-arrow"></i>
                                            </span></h1>
                                    </span>
                                    <h5 id="location"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card p-8">
                        <div class="card-body">
                            <h5 class="card-title mb-4 "><strong>Program Name: </strong><span id="title"></span></h5>
                            <h6><strong>Date: </strong><span id="date_of_program" class="card-text"></span></h6>
                            <h6><strong>Time: </strong><span id="time_of_program" class="card-text"></span></h6>
                            <h6><strong>Location: </strong><span id="location" class="card-text"></span></h6>
                            <h6><strong>Details: </strong><span id="description" class="card-text"></span></h6>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title fw-semibold mb-4">List of Registered Individual/s</h5>
                                <button type="button" class="btn btn-primary btnFetchIndividuals" data-toggle="collapse"
                                    data-target="#create_card" aria-expanded="false" aria-controls="create_card">
                                    Register an Individual <span><i class="ti ti-plus"></i></span>
                                </button>
                            </div>
                            <div class="table-responsive"> <!-- Added a responsive container for the table -->
                                <table class="table table-hover table-sm table-borderless" id="dataTable"
                                    style="width:100%">
                                    <thead>
                                        <tr class="text-dark">
                                            <th class="not-export-column">ID</th>
                                            <th class="not-export-column">Created at</th>
                                            <th>ID Number</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Birthdate</th>
                                            <th>Gender</th>
                                            <th>Height(cm)</th>
                                            <th>Weight(kg)</th>
                                            <th>BMI</th>
                                            <th>BMI Category</th>
                                            <th class="not-export-column">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="text-dark">
                                            <th class="not-export-column">ID</th>
                                            <th class="not-export-column">Created at</th>
                                            <th>ID Number</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Birthdate</th>
                                            <th>Gender</th>
                                            <th>Height(cm)</th>
                                            <th>Weight(kg)</th>
                                            <th>BMI</th>
                                            <th>BMI Category</th>
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
    </div>
@endsection

{{-- SCRIPTS --}}
@section('scripts')
    <script>
        $(document).ready(function() {

            // GLOBAL VARIABLE
            const APP_URL = "{{ env('APP_URL') }}"
            const API_URL = "{{ env('API_URL') }}"
            const API_TOKEN = localStorage.getItem("API_TOKEN")
            const BASE_API = API_URL + '/feeding_programs'
            const INDIVIDUAL_BASE_API = API_URL + '/individual_records'
            const FEEDING_PROGRAMS_IR_LOGS_API = API_URL + '/feeding_program_ir_logs'

            const FEEDING_PROGRAM_ID = "{{ $feeding_program_id }}"

            // DATATABLE FUNCTION
            function dataTable() {
                // FOR FOOTER GENERATE OF INPUT
                $('#dataTable tfoot th').each(function(i) {
                    var title = $('#dataTable thead th').eq($(this).index()).text();
                    $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title +
                        '" data-index="' + i + '" />');
                });


                dataTable = $('#dataTable').DataTable({
                    "ajax": {
                        url: API_URL + '/feeding_program_ir_logs/search_feeding_programs/' +
                            FEEDING_PROGRAM_ID,
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
                            data: "individual_records.id"
                        },
                        {
                            data: "individual_records.created_at"
                        },
                        {
                            data: "individual_records.id_number",
                        },
                        {
                            data: "individual_records.first_name",
                        },
                        {
                            data: "individual_records.middle_name",
                        },
                        {
                            data: "individual_records.last_name",
                        },
                        {
                            data: "individual_records.birthdate",
                            render: function(data, type, row) {
                                return moment(data).format('ll')
                            }
                        },
                        {
                            data: "individual_records.gender",
                        },
                        {
                            data: "individual_records.height",
                            render: function(data, type, row) {
                                return data + "cm"
                            }
                        },
                        {
                            data: "individual_records.weight",
                            render: function(data, type, row) {
                                return data + "kg"
                            }
                        },
                        {
                            data: "individual_records.bmi",
                        },
                        {
                            data: "individual_records.bmi_category",
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
                        {
                            data: "individual_records.deleted_at",
                            render: function(data, type, row) {
                                console.log(data)
                                if (data == null) {
                                    return `<div>
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
                            "aTargets": [0, 1, 12],
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
                                return "List of {{ $page_title }}"
                            },
                            filename: function() {
                                return "List of {{ $page_title }}"
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
            // END OF DATATABLE FUNCTION

            // REFRESH DATATABLE FUNCTION
            function refresh() {
                $('#dataTable').DataTable().ajax.reload()
            }
            // REFRESH DATATABLE FUNCTION

            // FETCH DETAILS FUNCTION
            function getFeedingProgramIdRecord(id) {
                var form_url = BASE_API + '/' + id;

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
                        $('#title').html(data.title)
                        $('#description').html(data.description)
                        $('#location').html(data.location)
                        let date_formatted = moment(`${data.date_of_program}`)
                            .format('ll')
                        let time_formatted = moment(`${data.date_of_program} ${data.time_of_program}`)
                            .format('LT')
                        $('#date_of_program').html(date_formatted)
                        $('#time_of_program').html(time_formatted)
                        $('#status').html(data.status)
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

            $('.btnFetchIndividuals').on('click', function() {
                $('#registeredIndividualDatatableModal').DataTable().destroy()

                registeredIndividualDatatableModal = $('#registeredIndividualDatatableModal').DataTable({
                    "ajax": {
                        url: API_URL + "/feeding_program_ir_logs/get_unregistered_individual/" +
                            FEEDING_PROGRAM_ID,
                        dataSrc: ''
                    },
                    "async": true,
                    "columns": [{
                            data: "id"
                        },
                        {
                            data: "created_at"
                        },
                        {
                            data: "id_number",
                        },
                        {
                            data: "first_name",
                        },
                        {
                            data: "middle_name",
                        },
                        {
                            data: "last_name",
                        },
                        {
                            data: "birthdate",
                            render: function(data, type, row) {
                                return moment(data).format('ll')
                            }
                        },
                        {
                            data: "gender",
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
                        },
                        {
                            data: "id",
                            render: function(data, type, row) {
                                return `<div class="check-box">
                                    <input type="checkbox" name="individual_record_registered[]" class="form-check-input individual_record_status" id="${row.id}" value="${row.id}">
                                </div>`
                            }
                        }
                    ],
                    "aoColumnDefs": [{
                        "bVisible": false,
                        "aTargets": [0, 1]
                    }],
                    "order": [
                        [1, "desc"]
                    ],
                });

                $('#editModal').modal("show")
            })

            $('#btn_select_all').on('click', function() {
                let select_value = $('#select_all_label').html();
                let status = select_value === 'Select All Visibles';
                $('#select_all_label').html(status ? 'Unselect All Visibles' : 'Select All Visibles');
                $("input[name='individual_record_registered[]']").prop('checked', status);
            });

            $('#updateRegisteredIndividualForm').on('submit', function(e) {
                e.preventDefault()

                let required_individual_record = $("input[name='individual_record_registered[]']:checked")
                    .map(function() {
                        return {
                            "feeding_program_id": FEEDING_PROGRAM_ID,
                            "individual_record_id": $(this).val()
                        }
                    }).get();

                let form_url = FEEDING_PROGRAMS_IR_LOGS_API + "/multi_insert"

                console.log(required_individual_record)

                //  ajax opening tag
                $.ajax({
                    url: form_url,
                    method: "POST",
                    data: JSON.stringify(required_individual_record),
                    dataType: "JSON",
                    headers: {
                        "Accept": "application/json",
                        "Authorization": API_TOKEN,
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        // console.log(data)
                        notification('success', 'Required Faculty')
                        $('#editModal').modal('hide');
                        refresh()
                    },
                    error: function(error) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            swalAlert('warning', value)
                        });
                        console.log(error)
                        console.log(`message: ${error.responseJSON.message}`)
                        console.log(`status: ${error.status}`)
                    }
                    // ajax closing tag
                })
            })


            // FUNCTION CALLING
            getFeedingProgramIdRecord(FEEDING_PROGRAM_ID)
            dataTable()

        })
    </script>
@endsection
