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

    {{-- EDIT MODAL --}}
    <div id="editModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">

                    <h3 class="card-title fw-semibold mb-4 text-black">► Edit {{ Str::singular($page_title) }}</h3>

                    <form id="editForm">

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="required-input" style="font-weight:bold">Address or Location of Child's Residence:</label>
                                <input type="text" class="form-control" id="address_edit" name="address_edit" tabindex="1" required>
                            </div>
                        </div>
                        
                        <br/>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Mother's Last Name:</label>
                                <input type="text" class="form-control" id="mother_last_name_edit" name="mother_last_name_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Mother's First Name:</label>
                                <input type="text" class="form-control" id="mother_first_name_edit" name="mother_first_name_edit" tabindex="1" required>
                            </div>
                        </div>
                        
                        <br/>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's Last Name:</label>
                                <input type="text" class="form-control" id="child_last_name_edit" name="child_last_name_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's First Name:</label>
                                <input type="text" class="form-control" id="child_first_name_edit" name="child_first_name_edit" tabindex="1" required>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Belongs to IP Group:</label>
                                <select class="form-control" id="ip_group_edit" name="ip_group_edit" tabindex="1">
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Sex:</label>
                                <select class="form-control" id="sex_edit" name="sex_edit" tabindex="1">
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Date of Birth:</label>
                                <input type="date" class="form-control" id="birthdate_edit" name="birthdate_edit" tabindex="1" required>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" class="form-control" id="height_edit" name="height_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Weight (kg):</label>
                                <input type="number" class="form-control" id="weight_edit" name="weight_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Length (cm):</label>
                                <input type="number" class="form-control" id="length_edit" name="length_edit" tabindex="1" required>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="border:solid 1px gray">Close</button>
                    <button type="button" class="btn btn-success btnUpdate">Save</button>
                </div>

            </div>
        </div>
    </div>
    {{-- END OF EDIT MODAL --}}

    {{-- UPLOAD FORM --}}
    <div id="uploadModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-4 text-black">Upload Multiple Record</h5>
                        <a href="{{ asset('download/MultiIndividualFormat.xlsx') }}"><button
                                class="btn btn-sm btn-dark float-end">Download Excel Format</button></a>
                    </div>
                    <div class="row">
                        <form id="uploadForm" action="" method="post" name="uploadForm" data-parsley-validate>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <label class="required-input">Import File</label>
                                            <span class="text-danger"> Note: Minimum
                                                of 3 individuals on multiple upload</span>
                                        </div>
                                        <input type="file" class="form-control" id="excelFile" name="file"
                                            tabindex="1"
                                            accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    {{-- END OF UPLOAD FORM --}}

    {{-- CREATE FORM --}}
    <div class="row">
        <div class="col-md-12 collapse" id="create_card">
            <div class="card ">

                <div class="card-header bg-info">
                    <h4 class="text-light" style="margin-bottom:-2px"> <span id="create_card_title">New</span> {{ Str::singular($page_title) }}</h4>
                </div>

                <form id="createForm" data-parsley-validate>

                    <div class="card-body">

                        <div class="row" style="margin-top:-15px">
                            <div class="form-group col-md-12">
                                <label class="required-input" style="font-weight:bold">Address or Location of Child's Residence:</label>
                                <input type="text" class="form-control" id="address" name="address" tabindex="1" required>
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="margin-top:-15px">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Mother's Last Name:</label>
                                <input type="text" class="form-control" id="mother_last_name" name="mother_last_name" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Mother's First Name:</label>
                                <input type="text" class="form-control" id="mother_first_name" name="mother_first_name" tabindex="1" required>
                            </div>
                        </div>
                        
                        <br/>

                        <div class="row" style="margin-top:-15px">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's Last Name:</label>
                                <input type="text" class="form-control" id="child_last_name" name="child_last_name" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's First Name:</label>
                                <input type="text" class="form-control" id="child_first_name" name="child_first_name" tabindex="1" required>
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="margin-top:-15px">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Belongs to IP Group:</label>
                                <select class="form-control" id="ip_group" name="ip_group" tabindex="1" required>
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Sex:</label>
                                <select class="form-control" id="sex" name="sex" tabindex="1" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Date of Birth:</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" tabindex="1" required>
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="margin-top:-15px">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" class="form-control" id="height" name="height" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Weight (kg):</label>
                                <input type="number" class="form-control" id="weight" name="weight" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Length (cm):</label>
                                <input type="number" class="form-control" id="length" name="length" tabindex="1" required>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between" style="margin-top:-15px">
                        <button type="button" class="btn btn-light" data-toggle="collapse" data-target="#create_card"
                            id="create_cancel_btn" style="border:solid 1px gray"> Cancel </button>
                        <button type="submit" class="btn btn-success ml-1" id="create_btn"> Create New Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END OF CREATE FORM --}}

    {{-- DATA TABLE --}}
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">

                <h5 class="card-title fw-semibold">► List of Individual Record/s</h5>

                <div>
                    <button type="button" class="btn btn-warning mx-2 btnReweigh">Reweighing 
                        <span><i class="ti ti-plus"></i></span></button>
                    <button type="button" class="btn btn-success mx-2 btnUpload">Add Multiple Record 
                        <span><i class="ti ti-plus"></i></span></button>
                    <button type="button" class="btn btn-primary mx-2" data-toggle="collapse"
                        data-target="#create_card" aria-expanded="false" aria-controls="create_card">Add
                        {{ Str::singular($page_title) }} <span><i class="ti ti-plus"></i></span></button>
                </div>

            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-sm table-borderless" id="dataTable"
                    style="width:200%; table-layout:fixed; text-align:center">
                
                    <thead>
                        <tr class="text-dark">
                            <th class="not-export-column">ID</th>
                            <th class="not-export-column">Created At</th>
                            <th style="text-align:center">Sequence Number</th>
                            <th style="text-align:center">Child's Residence</th>
                            <th style="text-align:center">Mother's Full Name</th>
                            <th style="text-align:center">Child's Full Name</th>
                            <th style="text-align:center">Belongs to IP Group?</th>
                            <th style="text-align:center">Sex</th>
                            <th style="text-align:center">Date of Birth</th>
                            <th style="text-align:center">Date Measured</th>
                            <th style="text-align:center">Weight (kg)</th>
                            <th style="text-align:center">Height (cm)</th>
                            <th style="text-align:center">Length (cm)</th>
                            <th style="text-align:center">Age in Months</th>
                            <th style="text-align:center">Weight for Age Status</th>
                            <th style="text-align:center">Height for Age Status</th>
                            <th style="text-align:center">LT/HT Status</th>
                            <th class="not-export-column" style="text-align:center">Action Buttons</th>
                        </tr>
                    </thead>

                    <tbody></tbody>

                    <!-- <tfoot>
                        <tr class="text-dark">
                            <th class="not-export-column">ID</th>
                            <th class="not-export-column">Created At</th>
                            <th>Child Seq.</th>
                            <th>Address of Child's Residence</th>
                            <th>Name of Mother/Caregiver</th>
                            <th>Child's Full Name</th>
                            <th>Belongs to IP Group?</th>
                            <th>Sex</th>
                            <th>Date of Birth</th>
                            <th>Date Measured</th>
                            <th>Weight (kg)</th>
                            <th>Height (cm)</th>
                            <th>Age in Months</th>
                            <th>Weight for Age Status</th>
                            <th>Height for Age Status</th>
                            <th>Weight for Lt/Ht Status</th>
                        </tr>
                    </tfoot> -->
                    
                </table>
            </div>

        </div>
    </div>
    {{-- END OF DATA TABLE --}}
@endsection


{{-- SCRIPTS --}}
@section('scripts')

    <script>
        $(document).ready(function()
        {
            // Global Variables:
            const APP_URL = "{{ env('APP_URL') }}"
            const API_URL = "{{ env('API_URL') }}"
            const API_TOKEN = localStorage.getItem("API_TOKEN")
            const BASE_API = API_URL + '/individual_records'
            const authenticatedUserId = window.authenticatedUserId

            let tempIndividualId;
            let tempWeight;
            let tempHeight;
            // let tempBmi;
            // let tempBmiCategory;
            // let tempDateRecorded;

            function storeHistoryOfIndividualRecord()
            {

                let form_url = API_URL + '/history_of_individual_records'
                let form_data =
                {
                    'individual_record_id': tempIndividualId,
                    'height': tempHeight,
                    'weight': tempWeight,
                    // 'bmi': tempBmi,
                    // 'bmi_category': tempBmiCategory,
                    // 'date_recorded': tempDateRecorded,
                    'created_by': authenticatedUserId,
                }
                console.log(form_data)

                $.ajax
                ({
                    url: form_url,
                    method: "POST",
                    // data: JSON.stringify(form_data),
                    data: form_data,
                    dataType: "JSON",
                    headers:
                    {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data)
                    {
                        notification('success', "Added update logs for individual record.")
                        console.log(data)
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

            $('#uploadForm').on('submit', async function(e)
            {
                e.preventDefault();

                let excelFile = $('#excelFile').val()
                let Extension = excelFile.substring(excelFile.lastIndexOf('.') + 1).toLowerCase();

                if (Extension == "xlsx")
                {
                    Swal.fire
                    ({
                        title: "Are you sure?",
                        text: "All record in the excel will be added to the record after this.",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "blue",
                        confirmButtonText: "Yes, upload it!",
                    })
                    .then((result) =>
                    {
                        $.ajax
                        ({
                            url: BASE_API + '/import',
                            type: "POST",
                            data: new FormData(this),
                            processData: false,
                            contentType: false,
                            async: false,
                            cache: false,
                            headers:
                            {
                                "Authorization": API_TOKEN,
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data)
                            {
                                toastr['success'](`Multiple individuals added successfully.`)
                                $('#uploadModal').modal('hide');
                                $('#uploadForm').trigger('reset')
                                refresh();
                            },
                            error: function(error)
                            {
                                console.log(error)
                                if (error.responseJSON.message == "Division by zero")
                                {
                                    swalAlert('warning', "There is something wrong with the record, ensure file has atleast 3 individuals for and filled with correct formats and required inputs to use this multiple upload.")
                                }
                                else if (error.responseJSON.errors == null)
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
                    });
                }
                else
                {
                    Swal.fire
                    ({
                        title: 'Warning!',
                        text: 'Should be .xlsx file!',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    })

                    $("#btnAddExcel").attr("disabled", false);
                }
            });

            $('.btnUpload').on('click', function()
            {
                $('#uploadModal').modal('show');
            });

            // BMI Categorization Function:
                // function check_bmi_category(bmi)
                // {
                //     let bmi_category = '';

                //     switch (true)
                //     {
                //         case (bmi < 18.5):
                //             bmi_category = "Underweight";
                //             break;
                //         case (bmi < 25):
                //             bmi_category = "Normal Weight";
                //             break;
                //         case (bmi < 30):
                //             bmi_category = "Overweight";
                //             break;
                //         case (bmi < 35):
                //             bmi_category = "Obese Class I";
                //             break;
                //         case (bmi < 40):
                //             bmi_category = "Obese Class II";
                //             break;
                //         default:
                //             bmi_category = "Obese Class III";
                //     }

                //     return bmi_category;
                // }

            // Script for Weight for Age Status
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

                switch (ageInMonths) // - Dev RJ (input data ranges here)
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
                }
                return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
            }

            // Script for Height for Age Status
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

                switch (ageInMonths) // - Dev RJ (input data ranges here)
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
                }
                return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
            }

            // Script for LT/HT Status
            function calculateLtHtStatus(ageInMonths, sex, length)
            {
                let result = "Unknown";
                let statusClass = "";

                function setLtHtStatus(severelyStuntedLimit, stuntedLimit, normalLimit, tallLimit)
                {
                    if (length <= severelyStuntedLimit) { result = "Severely Stunted"; statusClass = "bg-danger"; }
                    else if (length >= stuntedLimit && height <= normalLimit) { result = "Stunted"; statusClass = "bg-warning"; }
                    else if (length >= normalLimit && height <= tallLimit) { result = "Normal"; statusClass = "bg-success"; }
                    else if (length > tallLimit) { result = "Tall"; statusClass = "bg-primary"; }
                }

                switch (ageInMonths) // - Dev RJ (input data ranges here)
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
                }
                return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
            }

            // Script for Data Table Function
            function dataTable()
            {
                // For Table Footer (which generates Search Input):
                $('#dataTable tfoot th').each(function(i)
                {
                    let title = $('#dataTable thead th').eq($(this).index()).text();
                    $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title + '" data-index="' + i + '" />');
                });

                dataTable = $('#dataTable').DataTable
                ({
                    "ajax":
                    {
                        url: BASE_API + '/datatable'
                    },

                    // "searching": false,
                    "ordering": false, // - Dev RJ (removes asc/desc button)
                    "paging": false, // - Dev RJ (removes pagination info: number of entries; prev/next page button)
                    "info": false, // - Dev RJ (removes entries info)

                    "processing": true,
                    "serverSide": true,
                    "lengthMenu":
                    [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "headers":
                    {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "columns":
                    [   
                        {
                            data: "id"
                        },
                        {
                            data: "created_at"
                        },
                        {
                            data: "id",
                        },
                        {
                            data: "address",
                        },
                        {
                            data: "null", visible: true,
                            render: function(data, type, row)
                            {
                                var motherFullName = row.mother_last_name.toUpperCase() + ', ' + row.mother_first_name;
                                return motherFullName;
                            }
                        },
                        {
                            data: "null", visible: true,
                            render: function(data, type, row)
                            {
                                var childFullName = row.child_last_name.toUpperCase() + ', ' + row.child_first_name;
                                return childFullName;
                            }
                        },
                        {
                            data: "ip_group", visible: true
                        },
                        {
                            data: "sex",
                        },
                        {
                            data: "birthdate", visible: true,
                            render: function(data, type, row)
                            {
                                return moment(data).format('MMMM D, YYYY')
                            }
                        },
                        {
                            data: "date_measured", visible: true
                        },
                        {
                            data: "weight",
                            render: function(data, type, row)
                            {
                                return data + "kg"
                            }
                        },
                        {
                            data: "height",
                            render: function(data, type, row)
                            {
                                return data + "cm"
                            }
                        },
                        {
                            data: "length",
                            render: function(data, type, row)
                            {
                                return data + "cm"
                            }
                        },
                        {
                            data: "birthdate",
                            render: function(data, type, row)
                            {
                                var birthdate = moment(data, 'YYYY-MM-DD');
                                var currentDate = moment();
                                var ageInMonths = currentDate.diff(birthdate, 'months');

                                return ageInMonths;
                            }
                        },
                        {
                            data: "weight_for_age_status",
                            render: function(data, type, row)
                            {
                                const ageInMonths = row.age_in_months;
                                const sex = row.sex;
                                const weight = row.weight;

                                return calculateWeightForAgeStatus(ageInMonths, sex, weight);
                            }
                        },
                        {
                            data: "height_for_age_status",
                            render: function(data, type, row)
                            {
                                const ageInMonths = row.age_in_months;
                                const sex = row.sex;
                                const height = row.height;
                                
                                return calculateHeightForAgeStatus(ageInMonths, sex, height);
                            }
                        },
                        {
                            data: "lt_ht_status",
                            render: function(data, type, row)
                            {
                                const ageInMonths = row.age_in_months;
                                const sex = row.sex;
                                const length = row.length;
                                
                                return calculateLtHtStatus(ageInMonths, sex, length);
                            }
                        },
                        {
                            data: "deleted_at",
                            render: function(data, type, row)
                            {
                                if (data == null)
                                {
                                    return `<div class="" style="vertical-align:top; text-align:center">
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-info btnView">View</button>
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-warning btnEdit">Edit</button>
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-danger btnDelete">Delete</button>
                                        </div>`;
                                    
                                }
                                else
                                {
                                    return '<button class="btn btn-danger btn-sm">Activate</button>';
                                }
                            }
                        }
                    ],
                    "aoColumnDefs": 
                    [
                        {
                            "bVisible": false,
                            "aTargets": [0, 1, 6, 4, 8, 9],
                        },
                        {
                            "className": "dt-right",
                            "targets": [-1]
                        }
                    ],
                    "order":
                    [
                        [1, "asc"]
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
                    dataTable
                        .column($(this).data('index'))
                        .search(this.value)
                        .draw();
                });

                // TO ADD BUTTON TO DIV TABLE ACTION
                dataTable.buttons().container().appendTo('#tableActions');
            }
            // End of Script for Data Table Function

            // Script for View Function
            $(document).on('click', '.btnView', function()
            {
                let id = this.id;
                let redirect_to = APP_URL + '/admin/individual_records/individual_record/' + id;

                window.location = redirect_to;
            })
            // End of Script for View Function

            // Script for Refresh Data Table Function
            function refresh() 
            {
                $('#dataTable').DataTable().ajax.reload()
            }
            // End of Script for Refresh Data Table Function

            // Script for Create Function
            $('#createForm').on('submit', function(e)
            {
                e.preventDefault()

                // Variables:
                let form_url = BASE_API

                // Form Data:
                let form = $("#createForm").serializeArray();
                let form_data = {}

                $.each(form, function()
                {
                    form_data[[this.name]] = this.value;
                });

                form_data['created_by'] = authenticatedUserId;

                // BMI Computation:
                    // let bmi = (form_data.weight / (form_data.height * form_data.height)) * 10000;
                    // form_data.bmi = bmi;
                    // form_data.bmi_category = check_bmi_category(bmi);

                form_data.status = 'Active';

                form_data.child_number = (Math.floor(Date.now() * Math.random())).toString().slice(0, 9);

                $.ajax
                ({
                    url: form_url,
                    method: "POST",
                    data: JSON.stringify(form_data),
                    dataType: "JSON",
                    headers:
                    {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data)
                    {
                        notification('success', "{{ Str::singular($page_title) }}")
                        $("#createForm").trigger("reset")
                        $("#create_card").collapse("hide")
                        refresh();
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
            });
            // End of Script for Create Function

            // Script for Edit Function
            $(document).on('click', '.btnEdit', function()
            {
                let id = this.id;
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
                        $('.btnUpdate').attr('id', data.id)
                        $('#address_edit').val(data.address)
                        $('#mother_last_name_edit').val(data.mother_last_name)
                        $('#mother_first_name_edit').val(data.mother_first_name)
                        $('#child_last_name_edit').val(data.child_last_name)
                        $('#child_first_name_edit').val(data.child_first_name)
                        $('#ip_group_edit').val(data.ip_group)
                        $('#sex_edit').val(data.sex)
                        $('#birthdate_edit').val(data.birthdate)
                        $('#height_edit').val(data.height)
                        $('#weight_edit').val(data.weight)
                        $('#length_edit').val(data.length)

                        tempWeight = data.weight;
                        tempHeight = data.height;
                        tempIndividualId = data.id;
                        tempDateRecorded = data?.updated_at ?? data.created_at;
                        $('#editModal').modal('show');
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

            })
            // End of Script for Edit Function

            // Script for Update Function
            $(document).on('click', '.btnUpdate', function()
            {
                let id = this.id;
                console.log(id)
                let form_url = BASE_API + '/' + id;

                // Form Data
                let form = $("#editForm").serializeArray();
                let form_data = {}

                $.each(form, function()
                {
                    form_data[[this.name.slice(0, -5)]] = this.value;
                })

                // BMI Computation:
                    // let bmi = (form_data.weight / form_data.height / form_data.height) * 10000
                    // form_data.bmi = bmi;
                    // form_data.bmi_category = check_bmi_category(bmi)

                $.ajax
                ({
                    url: form_url,
                    method: "PUT",
                    data: JSON.stringify(form_data),
                    dataType: "JSON",
                    headers:
                    {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data)
                    {
                        storeHistoryOfIndividualRecord();
                        notification('info', "{{ Str::singular($page_title) }}")
                        refresh();
                        $('#editModal').modal('hide');
                        console.log(data)
                    },
                    error: function(error)
                    {
                        console.log(error)
                        if (error.responseJSON.errors == null) {
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
            })
            // End of Script for Update Function

            // Script for Soft-Delete Function
            $(document).on("click", ".btnDelete", function() {
                let id = this.id;
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

            // Function Calling:
            dataTable();
        })
    </script>
@endsection