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
<style>

#imageUpload {
    
}
        .chip {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .chip-success {
            background-color: green;
            color: white;
        }

        .chip-start {
            background-color: black;
            color: white;
        }

        .chip-danger {
            background-color: red;
            color: white;
        }

        .chip-info {
            background-color: blue;
            color: white;
        }

        .chip-warning {
            background-color: orange;
            color: white;
        }
    </style>
    {{-- EDIT MODAL --}}
    <div id="editModal" class="modal" tabindex="-1" feeding_program="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="card-title fw-semibold mb-4 text-black">Edit Activity</h5>
                    <form id="editForm">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input">Activity Name</label>
                                <input type="text" class="form-control" id="title_edit" name="title_edit" tabindex="1"
                                    required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input">Activity Type</label>
                                <input type="text" class="form-control" id="type_edit" name="type_edit" tabindex="1"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input">Where</label>
                                <input type="text" class="form-control" id="location_edit" name="location_edit"
                                    tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input">Date</label>
                                <input type="date" class="form-control" id="date_of_program_edit"
                                    name="date_of_program_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input">Time</label>
                                <input type="time" class="form-control" id="time_of_program_edit"
                                    name="time_of_program_edit" tabindex="1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="required-input">Details</label>
                                <textarea class="form-control" id="description_edit" name="description_edit" tabindex="2" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="required-input">Progress</label>
                                <select class="form-control" id="progress_edit" name="progress_edit">
                                <option value="Coming Soon">Coming Soon</option>
                                    <option value="Success">Success</option>
                                    <option value="Postponed">Postponed</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="required-input">Status</label>
                                <select class="form-control" id="status_edit" name="status_edit">
                                    <option value="Draft">Draft</option>
                                    <option value="Published">Published</option>
                                </select>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" id="btnEditCloseModal">Close</button>
                    <button type="button" class="btn btn-success btnUpdate">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- CREATE FORM --}}
    <div class="row">
        <div class="col-md-12 collapse" id="create_card">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-light"> <span id="create_card_title">New</span> Activity</h4>
                </div>

                <form id="createForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input">Activity Name</label>
                                <input type="text" class="form-control required-field" id="title" name="title" tabindex="1"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input">Activity Type</label>
                                <input type="text" class="form-control" id="type" name="type" tabindex="1"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input">Where</label>
                                <input type="text" class="form-control" id="location" name="location" tabindex="1"
                                    required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input">Date</label>
                                <input type="date" class="form-control" id="date_of_program" name="date_of_program"
                                    tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input">Time</label>
                                <input type="time" class="form-control" id="time_of_program" name="time_of_program"
                                    tabindex="1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="required-input">Details</label>
                                <textarea class="form-control" id="description" name="description" tabindex="2" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-light" data-toggle="collapse" data-parent="#create_card"
                            id="create_cancel_btn" onclick="resetForm()">Cancel <i class="fas fa-times"></i></button>
                        <button type="submit" class="btn btn-success ml-1" id="create_btn">Create <i
                                class="fas fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END OF CREATE FORM --}}

    {{-- DATATABLE --}}
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold">List of Activities</h5>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#create_card"
                    aria-expanded="false" aria-controls="create_card">Add
                    Activity <span><i class="ti ti-plus"></i></span></button>
            </div>
            <table class="table table-hover table-borderless" id="dataTable" style="width:100%">
                <thead>

                <tr class="text-dark" id="search_bar" >
                    <th class="not-export-column">ID</th>
                    <th class="not-export-column">Created at</th>
                    <th>Title</th>
                    <th>Label</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th >Progress</th>
                </tr>
       
                    
                    <tr class="text-dark" >
                        <th class="not-export-column">ID</th>
                        <th class="not-export-column">Created at</th>
                        <th>Title</th>
                        <th>Label</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th >Progress</th>

                        <th class="not-export-column">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>

    <!-- UPLOAD MODAL -->
    <div id="uploadModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white" style="border-radius: 0.5rem 0.5rem 0 0;">
                    <h5 class="modal-title" style="color: white;">Upload Images</h5>
                </div >
                <div class="modal-body">
                    <caption>Select Image</caption>
                    <input type="file" class="form-control" id="imageUpload" name="images[]" tabindex="1" aaccept="image/*" multiple>

                    <div id="selectedImagesContainer" class="d-flex flex-wrap mb-3"></div>
                    <div id="imagePreviewContainer" class="d-flex flex-wrap"></div>

                    <!-- </div> -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnCloseModal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnUploadFile">Upload</button>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection


{{-- SCRIPTS --}}
@section('scripts')
    <script>

function resetForm() {
    // Reset form fields
    document.getElementById("createFormNewActivity").reset();
    
    // Clear error messages
    var elements = document.querySelectorAll('.is-invalid');
    elements.forEach(function(element) {
        element.classList.remove('is-invalid');
    });
    
    // Hide error messages
    var errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(function(errorMessage) {
        errorMessage.style.display = 'none';
    });}
        // START SCRIPT TAG
        $(document).ready(function() {

            // GLOBAL VARIABLE
            var APP_URL = "{{ env('APP_URL') }}"
            var API_URL = "{{ env('API_URL') }}"
            var API_TOKEN = localStorage.getItem("API_TOKEN")
            var BASE_API = API_URL + '/feeding_programs'

            // DATATABLE FUNCTION
            function dataTable() {

                // FOR FOOTER GENERATE OF INPUT
                $('#search_bar th').each(function(i) {
                    let title = $('#dataTable thead th').eq($(this).index()).text();
                    $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title +
                        '" data-index="' + i + '" />');
                columnDefs: [
                    { targets: [7], className: 'text-center' } // Targets the "Progress" column (adjust index as needed)
                ]
                });

                dataTable = $('#dataTable').DataTable({
                    "ajax": {
                        url: BASE_API + '/datatable'
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
                            data: "title",
                        },
                        {
                            data: 'type'
                        },
                        {
                            data: "date_of_program",
                            render: function(data, type, row) {
                                return moment(data).format('ll')
                            },
                        },
                        {
                            data: "time_of_program",
                            render: function(data, type, row) {
                                return moment(`${row.date_of_program} ${data}`).format('LT')
                            }
                        },
                        {
                            data: "status",
                        },
                        {
                    data: 'progress', render: function(data) {
                    let chipClass = '';
                    switch (data) {
                        case 'Coming Soon':
                            chipClass = 'chip-start';
                            break;
                        case 'Success':
                            chipClass = 'chip-success';
                            break;
                        case 'Postponed':
                            chipClass = 'chip-warning';
                            break;
                        case 'On Going':
                            chipClass = 'chip-info';
                            break;
                        case 'Cancelled':
                            chipClass = 'chip-danger';
                            break;
                        default:
                            chipClass = 'chip-info';
                            break;
                    }

                    return `<div class="chip ${chipClass}">${data}</div>`;
                }
                        },
                        {
                            data: "deleted_at",
                            render: function(data, type, row) {

                                // <button id="${row.id}" type="button" class="btn btn-sm btn-info btnView">View</button>
                                console.log(data)
                                if (data == null) {
                                    return `<div>
                                    <button id="${row.id}" type="button" class="btn btn-sm btn-info btnUpload" data-id="${row.id}">Add pictures</button>                                        
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
                            "aTargets": [0, 1],
                        },
                        {
                            "className": "dt-right",
                            "targets": [-1]
                        }
                    ],
                    "order": [
                        [1, "desc"]
                    ], // EXPORTING AS PDF
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
                                return " List of {{ $page_title }}"
                            },
                            filename: function() {
                                return "List of {{ $page_title }}"
                            },
                            customize: function(doc) {
                  
                doc.content.splice( 0, 0, {

                    margin: [ 0, 0, 0, 0 ],
                    alignment: 'center',
                    image: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAABdCAMAAABO6uh0AAADAFBMVEVHcEwTExMyMjJFRklxcX1EREcoKClubnDh4uQ6OjtSU2ISEhIvLy+jqqZBQUMsLCoODg40NDQUFBQaGhodHR0VFRUREREREREdHR0QEBAYGBgMDAwUFBQPDw8TExMWFhYPDw8QEBAfcUMaGhoMDAwAAAAFBQWopRAyMi4FBQUSEhIICAgLCwsEBAQZGRkPDw8MDAwWFhYWFhacmxGVkBXw9/QICAhybx1jYSNWVCh6vZm0qxAcHBxvrIxfuoiCfhmf0rcFBQUgICBJSDBDs3XG49QkjFNHpXIJCQUuhlZQsXyLyqnR6Nw3jV7e8efX7OHv9vITrFgpsWdKu30mJibo9O0meUvs9vHG5tVyxJbs9vHt9vGb07V9yaCf1bio2b4XFxcA8m7///8Aolf+8gHhsm7jt3f65N3639b+/v71r5/9+/r0n4z+TgH1pZL66uT67gT8+PXImWj53M7xiXH4zcL41Mvyd1vzjnfxcVQEn1QPmlL4xrrSygz1taXGvw7yfmP0qpnz6Qb88+9tf1vxlYAafUPt5QkJj0u5tA/EkmHb0wri2Qj67+v1uqvp5N31moX9XwHzg2rfrWSXbU99vJvLo2+Si08Th0Yepl0weje41McIrFLn8Or62cKwi1ykm1+qfEOCgWbhun14rrX3v7JPk1LX597yYjxtrI76cBdniSDev6v7u5Lr2s7V5/jq3geEmSDfoBBLgC2Yg3Mzr2q+iDvdhAu9vqqPiQ/8yqpObC6gdFf8j0fa2xb60bXmzLtRTwv6m13yUAP8gTDFr4qOsY3cvwcwk1KRs7m0oGL7sYB8fkzZ1MV9eA2+yCRvXSaoujH7xKDD1uD8qG9pZQvpaUyusZU6mZJ2nabh4BO5ZRXZmlFikDfZaxFwlVScsjbR1RqfcCKKpUDoWxHZu5Tgs1v4+/vzwQnVTg8tKwh8om6zwirI0CDfdFXA3feHinvXlXWHYh7brZvYo4jeejkjnEdilm7WHhvfi2zLyXTtpG3s8rff3pbPqEBHcEy0j1qyAAABAHRSTlMAVTAUBA4WDAMoB7s+CSBK1zivYHSpv0FqxE7ctdOOmM2e/n3JatP+VrQe4s6Gi8ckgzj65/zvuaWGK/qlFf7T/L+Ka/X9x139okP9XH0VNWvmlLaDhuSrw97p1MCNdpfN//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8ADo+I/wAAIABJREFUeNrsmn1MGmkex3mTd1F8f1eiKb3qljNo1aVXN6vNNtvGei9Nr+12mwAtDBCB8I4MgyBSAljLpmf1lBh3fYldG4znXWliujS6cftCco20aXK9u1yz/9h/9p9rk+42uWcGodn9ey1c9vkYZx5mnsxMZj58f888gUSCQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgPwvM/L6+vnwmvBGQn438vhP9p079EefChU9PnOyDtyR3YQNo/xdJdbL/9LmFhaNHj/4Z5wPAJxegWzkIjcft6ers7Ojo6Ozq2U/Jy+2wOnH67DSh1dFdqz44jvPJp+/DqphTVrF6OrvFfjToA0QDmKSto6uAmrOXexJoBbxaWHj48OFXgC+/vHXr1vHj1wBnzr8PH2euwOB2dvuDbp1ch0l8cgBoulFhRxcrJy+3rx9oBby6eTNy586d27cfAZaXl7/99sm1a0euHTlzHhbE3BhWcTvFAXcA9Ut0ukTcDbwKJjG5Lhj1Yd25qNbJ0+3AqyuGSCTl1e2UV8v379+/tPn1EcCZj2E9zD6srragTh6Ix/xgFYu7ddGoOJ6Uo3EMi+qw7p5cG2ydONeOa5XyKhIxKAGGyJ1HuFjb29//iVDr/G/gg83y4Gp/N+pDY4lAMi6MyuXCOCbxCzHhDhpIJv1BUBQlnTkVWsz+s+3TV5SEVwZFSI8g0hT6kPL28jbg+3tHenuP/B6OtLJKXpfYFxRGsZ2YcCcgdwcxoVDo9wcCYkyIJhNgpCUMoN0FueRVO+EV0ErhUUsRj9LhHBoYUM2ZtfinyPL23bt3P3vR29sLzcom1E4/KH9JuQ6kk9+/sjo5cv06+J9cvSHEUIlfLsd2xGi0rSdXhizMU8ArIq4UHiminbNaLOExzcDAmNVlCQ8p1VJ95D4w6x8zvWvQrCxC78R8QCwgD4aurF6/bJfJ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",
                    
                } );
                                  
                doc.content.splice( 3, 15, {

                margin: [ 0, 340, 0, 0 ],
                alignment: 'left',
                text: "PREPARED BY:___________________________________",
                fontSize: 15, // Change the font size to your desired value
                bold: true // Make the text bold
                } );

    doc.styles.tableHeader.alignment = 'left';
},
                            
                        }, ]
                    },

                })

                // FOOTER FILTER
                $(dataTable.table().container()).on('keyup', 'th input', function() {
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



            // CREATE FUNCTION
            $('#createForm').on('submit', function(e) {
                e.preventDefault()

                // VARIABLES
                var form_url = BASE_API

                // FORM DATA
                var form = $("#createForm").serializeArray();

                var form_data = {}
                $.each(form, function() {
                    form_data[[this.name]] = this.value;
                })
                currDatetime = moment().format("YYYY-MM-DD HH:mm:ss");
                form_data.date_posted = currDatetime
                form_data.status = 'Draft';
                form_data.progress = 'Coming Soon';
                console.log("CREATE ACTIVITY FORM DATA")
                console.log(form_data)
                // ajax opening tag
                $.ajax({
                    url: form_url,
                    method: "POST",
                    data: JSON.stringify(form_data),
                    dataType: "JSON",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        notification('success', "{{ Str::singular($page_title) }}")
                        $("#createForm").trigger("reset")
                        $("#create_card").collapse("hide")
                        refresh();
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
            });
            // END OF CREATE FUNCTION

            // VIEW FUNCTION
            $(document).on('click', '.btnView', function() {
                var id = this.id;
                var redirect_to = APP_URL + '/admin/activities/activity/' + id;
                var redirect_to = APP_URL + '/admin/activities/activity/' + id;

                window.location = redirect_to;
            })
            // END OF VIEW FUNCTION

            // EDIT FUNCTION
            $(document).on('click', '.btnEdit', function() {
                var id = this.id;
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
                        $('.btnUpdate').attr('id', data.id)

                        $('#title_edit').val(data.title)
                        $('#date_of_program_edit').val(data.date_of_program)
                        $('#time_of_program_edit').val(data.time_of_program)
                        $('#description_edit').val(data.description)
                        $('#location_edit').val(data.location)
                        $('#type_edit').val(data.type)
                        $('#editModal').modal('show');
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

            })
            // END OF EDIT FUNCTION

            $(document).on("click", "#btnEditCloseModal", async function() {
                        $('#editModal').modal('hide');
                });

            // UPDATE FUNCTION
            $(document).on('click', '.btnUpdate', function() {
                var id = this.id;
                console.log(id)
                var form_url = BASE_API + '/' + id;

                // FORM DATA
                var form = $("#editForm").serializeArray();
                let form_data = {}

                $.each(form, function() {
                    form_data[[this.name.slice(0, -5)]] = this.value;
                })

                // ajax opening tag
                $.ajax({
                    url: form_url,
                    method: "PUT",
                    data: JSON.stringify(form_data),
                    dataType: "JSON",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        notification('info', "{{ Str::singular($page_title) }}")
                        refresh();
                        $('#editModal').modal('hide');
                        console.log(data)
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
            })
            // END OF UPDATE FUNCTION

            // DEACTIVATE FUNCTION
            $(document).on("click", ".btnDelete", function() {
                var id = this.id;
                let form_url = BASE_API + '/' + id

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
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't able to revert this.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "red",
                            confirmButtonText: "Yes, remove it!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: BASE_API + '/destroy/' + data.id,
                                    method: "DELETE",
                                    headers: {
                                        "Accept": "application/json",
                                        "Authorization": API_TOKEN,
                                        "Content-Type": "application/json",
                                        'X-CSRF-TOKEN': $(
                                            'meta[name="csrf-token"]').attr(
                                            'content')
                                    },

                                    success: function(data) {
                                        notification('error',
                                            "{{ Str::singular($page_title) }}"
                                        )
                                        refresh();
                                    },
                                    error: function(error) {
                                        $.each(error.responseJSON.errors,
                                            function(key, value) {
                                                swalAlert('warning',
                                                    value)
                                            });
                                        console.log(error)
                                        console.log(
                                            `message: ${error.responseJSON.message}`
                                        )
                                        console.log(
                                            `status: ${error.status}`)
                                    }
                                    // ajax closing tag
                                })
                            }
                        });
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
            });
            // END OF DEACTIVATE FUNCTION




async function convertImageToFormDataAndInsert(file, uploadButtonId, referenceNumber) {
    return new Promise((resolve, reject) => {
        // Convert the image to base64
        const reader = new FileReader();
        reader.onloadend = () => {
            const base64Image = reader.result.split(',')[1]; // Extract the base64 part
            var formData = new FormData();
            formData.append('image', base64Image);
            formData.append('activity_id', uploadButtonId);
            formData.append('image_reference', referenceNumber)

            insertImage(formData)
                .then(() => resolve())
                .catch(error => reject(error));
        };

        reader.readAsDataURL(file);
    });
}

  // Update the click event for the "Upload" button
  $(document).on("click", ".btnUpload", function(){
      var uploadButtonId = $(this).data('id');
      $('#uploadModal').data('uploadButtonId', uploadButtonId).modal('show');
  });

  $(document).on("change", "#imageUpload", function() {
      // Get the selected image files
      var files = $('#imageUpload')[0].files;

      // Display the selected images in the modal
      var selectedImagesContainer = $('#selectedImagesContainer');
      selectedImagesContainer.empty(); // Clear previous content

      for (var i = 0; i < files.length; i++) {
          // Create an img element and set its attributes
          var imgElement = $('<img>').attr({
              'src': URL.createObjectURL(files[i]),
              'alt': files[i].name,
              'class': 'img-fluid m-1', // Added margin for spacing
              'width': '100',
              'aspect-ratio': '3/2'
             
          });

          // Append the img element to the container
          selectedImagesContainer.append(imgElement);
      }
  });

// Function to generate a random string with a specified length
function generateRandomString(length) {
    const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        result += charset.charAt(randomIndex);
    }
    return result;
}

// Function to generate a random number within a specified range
function generateRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Function to generate a reference number of exactly 25 characters
function generateReferenceNumber() {
    const randomString = generateRandomString(13); 
    const randomNumber = generateRandomNumber(100000, 999999);
    return `REF-${randomString}-${randomNumber}`;
}

$(document).on("click", "#btnCloseModal", async function() {
    

      // Clear the selected image files
      $('#imageUpload').val('');
      // Clear the displayed images
      $('#selectedImagesContainer').empty();
      // Hide modal after processing the images
      $('#uploadModal').modal('hide');
  });

  $(document).on("click", "#btnUploadFile", async function() {
      // Get the selected image files
      var files = $('#imageUpload')[0].files;
      var uploadButtonId = $('#uploadModal').data('uploadButtonId');

      const referenceNumber = generateReferenceNumber();
      console.log("REFERENCE NUMBER")
      console.log(referenceNumber);

      console.log('Clicked Upload button ID:', uploadButtonId);

      // Convert and upload each image sequentially
      for (var i = 0; i < files.length; i++) {
          try {
              await convertImageToFormDataAndInsert(files[i], uploadButtonId, referenceNumber);
              console.log(files[i].name);
          } catch (error) {
              console.error('Error processing file:', error);
          }
      }
      // Clear the selected image files
      $('#imageUpload').val('');
      // Clear the displayed images
      $('#selectedImagesContainer').empty();
      // Hide modal after processing the images
      $('#uploadModal').modal('hide');
  });

  function insertImage(formData) {
    return new Promise((resolve, reject) => {
        fetch('/upload/upload.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("SUCCESS AS HECK");
            console.log(data); // Output from the server
            resolve(); // Resolve the Promise upon success
        })
        .catch(error => {
            console.log("ERROR AS HECK");
            console.error('Error:', error);
            reject(error); // Reject the Promise upon error
        });
    });
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

// FUNCTION CALLING
dataTable();
        })
        // END OF SCRIPT TAG    
    </script>
@endsection