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

                <form id="createForm" data-parsley-validate>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input">Activity Name</label>
                                <input type="text" class="form-control" id="title" name="title" tabindex="1"
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
                            id="create_cancel_btn">Cancel <i class="fas fa-times"></i></button>
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
                    // width: '50',
                    image: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAABdCAMAAABO6uh0AAADAFBMVEVHcEwTExMyMjJFRklxcX1EREcoKClubnDh4uQ6OjtSU2ISEhIvLy+jqqZBQUMsLCoODg40NDQUFBQaGhodHR0VFRUREREREREdHR0QEBAYGBgMDAwUFBQPDw8TExMWFhYPDw8QEBAfcUMaGhoMDAwAAAAFBQWopRAyMi4FBQUSEhIICAgLCwsEBAQZGRkPDw8MDAwWFhYWFhacmxGVkBXw9/QICAhybx1jYSNWVCh6vZm0qxAcHBxvrIxfuoiCfhmf0rcFBQUgICBJSDBDs3XG49QkjFNHpXIJCQUuhlZQsXyLyqnR6Nw3jV7e8efX7OHv9vITrFgpsWdKu30mJibo9O0meUvs9vHG5tVyxJbs9vHt9vGb07V9yaCf1bio2b4XFxcA8m7///8Aolf+8gHhsm7jt3f65N3639b+/v71r5/9+/r0n4z+TgH1pZL66uT67gT8+PXImWj53M7xiXH4zcL41Mvyd1vzjnfxcVQEn1QPmlL4xrrSygz1taXGvw7yfmP0qpnz6Qb88+9tf1vxlYAafUPt5QkJj0u5tA/EkmHb0wri2Qj67+v1uqvp5N31moX9XwHzg2rfrWSXbU99vJvLo2+Si08Th0Yepl0weje41McIrFLn8Or62cKwi1ykm1+qfEOCgWbhun14rrX3v7JPk1LX597yYjxtrI76cBdniSDev6v7u5Lr2s7V5/jq3geEmSDfoBBLgC2Yg3Mzr2q+iDvdhAu9vqqPiQ/8yqpObC6gdFf8j0fa2xb60bXmzLtRTwv6m13yUAP8gTDFr4qOsY3cvwcwk1KRs7m0oGL7sYB8fkzZ1MV9eA2+yCRvXSaoujH7xKDD1uD8qG9pZQvpaUyusZU6mZJ2nabh4BO5ZRXZmlFikDfZaxFwlVScsjbR1RqfcCKKpUDoWxHZu5Tgs1v4+/vzwQnVTg8tKwh8om6zwirI0CDfdFXA3feHinvXlXWHYh7brZvYo4jeejkjnEdilm7WHhvfi2zLyXTtpG3s8rff3pbPqEBHcEy0j1qyAAABAHRSTlMAVTAUBA4WDAMoB7s+CSBK1zivYHSpv0FqxE7ctdOOmM2e/n3JatP+VrQe4s6Gi8ckgzj65/zvuaWGK/qlFf7T/L+Ka/X9x139okP9XH0VNWvmlLaDhuSrw97p1MCNdpfN//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8ADo+I/wAAIABJREFUeNrsmn1MGmkex3mTd1F8f1eiKb3qljNo1aVXN6vNNtvGei9Nr+12mwAtDBCB8I4MgyBSAljLpmf1lBh3fYldG4znXWliujS6cftCco20aXK9u1yz/9h/9p9rk+42uWcGodn9ey1c9vkYZx5mnsxMZj58f888gUSCQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgPwvM/L6+vnwmvBGQn438vhP9p079EefChU9PnOyDtyR3YQNo/xdJdbL/9LmFhaNHj/4Z5wPAJxegWzkIjcft6ers7Ojo6Ozq2U/Jy+2wOnH67DSh1dFdqz44jvPJp+/DqphTVrF6OrvFfjToA0QDmKSto6uAmrOXexJoBbxaWHj48OFXgC+/vHXr1vHj1wBnzr8PH2euwOB2dvuDbp1ch0l8cgBoulFhRxcrJy+3rx9oBby6eTNy586d27cfAZaXl7/99sm1a0euHTlzHhbE3BhWcTvFAXcA9Ut0ukTcDbwKJjG5Lhj1Yd25qNbJ0+3AqyuGSCTl1e2UV8v379+/tPn1EcCZj2E9zD6srragTh6Ix/xgFYu7ddGoOJ6Uo3EMi+qw7p5cG2ydONeOa5XyKhIxKAGGyJ1HuFjb29//iVDr/G/gg83y4Gp/N+pDY4lAMi6MyuXCOCbxCzHhDhpIJv1BUBQlnTkVWsz+s+3TV5SEVwZFSI8g0hT6kPL28jbg+3tHenuP/B6OtLJKXpfYFxRGsZ2YcCcgdwcxoVDo9wcCYkyIJhNgpCUMoN0FueRVO+EV0ErhUUsRj9LhHBoYUM2ZtfinyPL23bt3P3vR29sLzcom1E4/KH9JuQ6kk9+/sjo5cv06+J9cvSHEUIlfLsd2xGi0rSdXhizMU8ArIq4UHiminbNaLOExzcDAmNVlCQ8p1VJ95D4w6x8zvWvQrCxC78R8QCwgD4aurF6/bJfJ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",
                    // image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAIAAAD/gAIDAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA9lpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wUmlnaHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcFJpZ2h0czpNYXJrZWQ9IkZhbHNlIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDoxN2FlYzk4Yy0zMjgzLTExZGEtYTIzOC1lM2UyZmFmNmU5NjkiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QUYzODU5RTYxNDNCMTFFNTlBNjVCOTY4NjAwQzY5QkQiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QUYzODU5RTUxNDNCMTFFNTlBNjVCOTY4NjAwQzY5QkQiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowODgwMTE3NDA3MjA2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'
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