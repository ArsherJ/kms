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
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold">List of Role/s</h5>
                <button type="button" class="btn btn-primary">Add
                    {{ Str::singular($page_title) }} <span><i class="ti ti-plus"></i></span></button>
            </div>
            <table class="table table-hover table-borderless" id="dataTable" style="width:100%">
                <thead>
                    <tr class="text-dark">
                        <th class="not-export-column">ID</th>
                        <th class="not-export-column">Created at</th>
                        <th>Title</th>
                        <th class="not-export-column">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
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
            var BASE_API = API_URL + '/role'

            // DATATABLE FUNCTION
            function dataTable() {
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
                            data: "deleted_at",
                            render: function(data, type, row) {
                                console.log(data)
                                if (data == null) {
                                    return `<div>
                                        <button type="button" class="btn btn-sm btn-warning">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
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
                    ],

                    // EXPORTING AS PDF

                })


                // TO ADD BUTTON TO DIV TABLE ACTION
                dataTable.buttons().container().appendTo('#tableActions');
            }
            // END OF DATATABLE FUNCTION


            // FUNCTION CALLING
            dataTable();
        })
        // END OF SCRIPT TAG
    </script>
@endsection
