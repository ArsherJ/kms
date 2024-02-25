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
                                <label class="required-input" style="font-weight:bold">Parent's/Guardian's Last Name:</label>
                                <input type="text" class="form-control" id="mother_last_name_edit" name="mother_last_name_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Parent's/Guardian's First Name:</label>
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
                                <label class="required-input" style="font-weight:bold">Date of Birth (mm-dd-yyyy):</label>
                                <input type="date" class="form-control" id="birthdate_edit" name="birthdate_edit" tabindex="1" required>
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
                                <label class="required-input" style="font-weight:bold">Belongs to IP Group:</label>
                                <select class="form-control" id="ip_group_edit" name="ip_group_edit" tabindex="1">
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Taking Micronutrient Supp.:</label>
                                <select class="form-control" id="micronutrient_edit" name="micronutrient_edit" tabindex="1">
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" class="form-control" id="height_edit" name="height_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Weight (kg):</label>
                                <input type="number" class="form-control" id="weight_edit" name="weight_edit" tabindex="1" required>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" onclick="$(this).closest('.modal').modal('hide')" style="border:solid 1px gray">Close</button>
                    <button type="button" class="btn btn-success btnUpdate">Save</button>
                </div>

            </div>
        </div>
    </div>
    {{-- END OF EDIT MODAL --}}

    {{-- REWEIGH MODAL --}}
    <div id="reweighModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">

                    <h3 class="card-title fw-semibold mb-4 text-black">► Reweigh Individual</h3>

                    <form id="reweighForm">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's Last Name:</label>
                                <input type="text" class="form-control" id="child_last_name_reweigh" name="child_last_name_reweigh" disabled tabindex="1" style="opacity: 1; background-color: #fff;">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's First Name:</label>
                                <input type="text" class="form-control" id="child_first_name_reweigh" name="child_first_name_reweigh" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Date Measured (mm-dd-yyyy):</label>
                                <!-- <input type="date" class="form-control" id="date_measured_hidden" name="date_measured_hidden" disabled tabindex="1" style="opacity: 1; background-color: #fff;"> -->
                                <input type="date" class="form-control" id="date_measured_hidden" name="date_measured_hidden" tabindex="1">
                                <input type="hidden" id="date_measured_edit" name="date_measured_edit">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" class="form-control" id="height_edit" name="height_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Weight (kg):</label>
                                <input type="number" class="form-control" id="weight_edit" name="weight_edit" tabindex="1" required>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" onclick="$(this).closest('.modal').modal('hide')" style="border:solid 1px gray">Close</button>
                    <button type="button" class="btn btn-success btnUpdateReweigh">Save</button>
                </div>

            </div>
        </div>
    </div>
    {{-- END OF REWEIGH MODAL --}}


    {{-- UPLOAD FORM --}}
    <div id="uploadModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" id="uploadCollapseModal">

                <div class="modal-body">

                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-4 text-black">► Upload Multiple Record</h5>
                        <a href="{{ asset('download/MultiIndividualFormat.xlsx') }}"><button
                                class="btn btn-sm btn-dark float-end">Download Excel Format</button></a>
                    </div>

                    <div class="row">
                        <form id="uploadForm" action="" method="post" name="uploadForm" data-parsley-validate>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        
                                        <div class="d-flex justify-content-between">
                                            <label class="required-input" style="font-weight:bold; margin-bottom:10px">Import File:</label>
                                            <span class="text-info" style="font-weight:bold"> Note: Please upload at least 3 individual records.</span>
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
                                <button type="button" class="btn btn-default" onclick="$(this).closest('.modal').modal('hide')" style="border:solid 1px gray">Close</button>
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
                                <label class="required-input" style="font-weight:bold">Date of Birth:</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" tabindex="1" required>
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
                                <label class="required-input" style="font-weight:bold">Belongs to IP Group:</label>
                                <select class="form-control" id="ip_group" name="ip_group" tabindex="1" required>
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="margin-top:-15px">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Taking Micronutrient Supplementation:</label>
                                <select class="form-control" id="micronutrient" name="micronutrient" tabindex="1" required>
                                    <option value="" disabled selected>Select Class</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" step="0.01" class="form-control" id="height" name="height" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Weight (kg):</label>
                                <input type="number" step="0.01" class="form-control" id="weight" name="weight" tabindex="1" required>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-light" data-toggle="collapse"  data-target="#create_card" style="border:solid 1px gray; margin-left:-30px"> Cancel </button>
                            <button type="submit" class="btn btn-success ml-1" id="create_btn" style="margin-right:-30px"> Create New Record </button>
                        </div>

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
                    <button type="button" class="btn btn-info mx-2 btnUpload">Upload Multiple Record 
                        <span><i class="ti ti-plus"></i></span></button>
                    <button type="button" class="btn btn-success mx-2" data-toggle="collapse"
                        data-target="#create_card" aria-expanded="false" aria-controls="create_card">Add
                        {{ Str::singular($page_title) }} <span><i class="ti ti-plus"></i></span></button>
                </div>
            </div>
            <div>
                <label for="fromDate" class="mr-2">From/To Date:</label>
                <div style="display: inline-flex;">
                    <input type="date" id="fromDate" class="form-control mr-2">
                    <input type="date" id="toDate" class="form-control">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm table-borderless" id="dataTable"
                    style="width: 265%; table-layout:fixed; text-align:center; border:1px solid black; border-radius:5px">
                
                    <thead>

                        <tr class="text-dark" id="search_bar">
                            <!-- <th style="width:10%; padding:15px 0 15px 0;">ID</th> -->
                            <th style="width:10%; padding:15px 0 15px 0;">ID Number</th>
                            <th style="width:20%; padding:15px 0 15px 0">Address or Location of Child's Residence</th>
                            <th style="width:15%; padding:15px 0 15px 0">Last Name of Parent/Guardian</th>
                            <th style="width:15%; padding:15px 0 15px 0">First Name of Parent/Guardian</th>
                            <th style="width:10%; padding:15px 0 15px 0">Last Name of Child</th>
                            <th style="width:10%; padding:15px 0 15px 0">First Name of Child</th>
                            <th style="width:5%; padding:15px 0 15px 0">Sex</th>
                            <th style="width:10%; padding:15px 0 15px 0">Age in Months</th>
                            <th style="width:10%; padding:15px 0 15px 0">Belongs to IP Group?</th>
                            <th style="width:20%; padding:15px 0 15px 0">Taking Micronutrient Supplementation?</th>
                            <th style="width:10%; padding:15px 0 15px 0">Date Measured</th>
                            <th style="width:10%; padding:15px 0 15px 0">Weight (kg)</th>
                            <th style="width:10%; padding:15px 0 15px 0">Height (cm)</th>
                            <th style="width:15%; padding:15px 0 15px 0">Weight for Age Status</th>
                            <th style="width:15%; padding:15px 0 15px 0">Height/Length for Age Status</th>
                            <th style="width:15%; padding:15px 0 15px 0">Weight for Length Status</th>
                            <th style="width:15%; padding:15px 0 15px 0">Code Moosaic</th>
                        </tr>

                        <tr class="text-dark">
                                <!-- <th class="not-export-column">ID</th> -->
                                <!-- <th class="not-export-column">Created At</th> -->
                            <!-- <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Data ID</th> -->
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">ID Number</th>
                            <th class="bg-dark" style="width:20%; text-align:center; color: white; border-right:2px solid white;">Address or Location of Child's Residence</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Last Name of Parent/Guardian</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">First Name of Parent/Guardian</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Last Name of Child</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">First Name of Child</th>
                            <th class="bg-dark" style="width:5%; text-align:center; color: white; border-right:2px solid white;">Sex</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Age in Months</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Belongs to IP Group?</th>
                            <th class="bg-dark" style="width:20%; text-align:center; color: white; border-right:2px solid white;">Taking Micronutrient Supplementation?</th>
                                <!-- <th style="text-align:center">Date of Birth</th> -->
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Date Measured</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Weight (kg)</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Height (cm)</th>
                                <!-- <th style="text-align:center">Length</th> -->
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Weight for Age Status</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Height/Length for Age Status</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Weight for Length Status</th>
                            <th class="bg-dark not-export-column" style="width:15%; text-align:center; color: white">Action Buttons</th>
                        </tr>

                    </thead>

                    <tbody></tbody>
                    
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

            function convert_age_in_months(birthdate){
                birthdate = moment(birthdate, 'YYYY-MM-DD');
                var currentDate = moment();
                var ageInMonths = currentDate.diff(birthdate, 'months');

                return ageInMonths
            }
            console.log("BIRHLAJSD: " + convert_age_in_months("2023-02-07"));
            
            

            function storeHistoryOfIndividualRecord(data)
            {

                let form_url = API_URL + '/history_of_individual_records'

                $.ajax
                ({
                    url: form_url,
                    method: "POST",
                    data: JSON.stringify
                    ({
                        individual_record_id: data.id,
                        child_number: data.child_number,
                        address: data.address,
                        mother_last_name: data.mother_last_name,
                        mother_first_name: data.mother_first_name,
                        child_last_name: data.child_last_name,
                        child_first_name: data.child_first_name,
                        ip_group: data.ip_group,
                        micronutrient: data.micronutrient,
                        sex: data.sex,
                        birthdate: data.birthdate,
                        height: data.height,
                        weight: data.weight,
                        length: data.length,
                        age_in_months: convert_age_in_months(data.birthdate),
                        weight_for_age_status: calculateWeightForAgeStatus(convert_age_in_months(data.birthdate), data.sex, data.weight, true),
                        height_length_for_age_status: calculateHeightLengthForAgeStatus(convert_age_in_months(data.birthdate), data.sex, data.height, true),
                        weight_for_length_status: calculateWeightForLengthStatus(data.height,convert_age_in_months(data.birthdate), data.weight, data.sex, true),
                    }),
                    dataType: "JSON",
                    headers:
                    {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(historyData)
                    {
                        notification('success', "{{ Str::singular($page_title) }}");
                        $("#createForm").trigger("reset");
                        $("#create_card").collapse("hide");
                        refresh();
                    },
                    error: function(error)
                    {
                        console.log(error);
                    }
                });
            }

            // Script for Upload Excel File:
            $('#uploadForm').on('submit', function (e)
            {
                e.preventDefault();

                let excelFile = $('#excelFile')[0].files[0];
                let formData = new FormData();
                formData.append('file', excelFile);

                $.ajax
                ({
                    url: BASE_API + '/import',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers:
                    {
                        'Authorization': API_TOKEN,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data)
                    {
                        console.log(data.message);
                        toastr.success('Multiple individuals added successfully.');
                        $('#uploadModal').modal('hide');
                        $('#uploadForm').trigger('reset');
                        refresh();
                    },
                    error: function (error)
                    {
                        console.log(error);
                        if (error.responseJSON.message)
                        {
                            swalAlert('warning', error.responseJSON.message);
                        }
                        else
                        {
                            swalAlert('error', 'An error occurred while processing the file.');
                        }
                    }
                });
            });

            $('.btnUpload').on('click', function()
            {
                $('#uploadModal').modal('show');
            });
            // End of Script for Upload Excel File

            // Script for Weight for Age Status:
            function calculateWeightForAgeStatus(ageInMonths, sex, weight, database)
            {
                let result = "Out of range";
                let statusClass = "bg-muted";

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
                    case 13:
                        if (sex === "Male") { setWeightForAgeStatus(7.1, 7.2, 12.3); }
                        else if (sex === "Female") { setWeightForAgeStatus(6.4, 6.5, 11.8); }
                        break;
                    case 14:
                        if (sex === "Male") { setWeightForAgeStatus(7.2, 7.3, 12.6); }
                        else if (sex === "Female") { setWeightForAgeStatus(6.6, 6.7, 12.1); }
                        break;
                    case 15:
                        if (sex === "Male") { setWeightForAgeStatus(7.4, 7.5, 12.8); }
                        else if (sex === "Female") { setWeightForAgeStatus(6.7, 6.8, 12.4); }
                        break;
                    case 16:
                        if (sex === "Male") { setWeightForAgeStatus(7.5, 7.6, 13.1); }
                        else if (sex === "Female") { setWeightForAgeStatus(6.9, 7.0, 12.6); }
                        break;
                    case 17:
                        if (sex === "Male") { setWeightForAgeStatus(7.7, 7.8, 13.4); }
                        else if (sex === "Female") { setWeightForAgeStatus(6.9, 7.0, 12.9); }
                        break;
                    case 18:
                        if (sex === "Male") { setWeightForAgeStatus(7.8, 7.9, 13.7); }
                        else if (sex === "Female") { setWeightForAgeStatus(7.2, 7.3, 13.2); }
                        break;
                    case 19:
                        if (sex === "Male") { setWeightForAgeStatus(8.0, 8.1, 13.9); }
                        else if (sex === "Female") { setWeightForAgeStatus(7.3, 7.4, 13.5); }
                        break;
                    case 20:
                        if (sex === "Male") { setWeightForAgeStatus(8.1, 8.2, 14.2); }
                        else if (sex === "Female") { setWeightForAgeStatus(7.5, 6.4, 13.7); }
                        break;
                    case 21:
                        if (sex === "Male") { setWeightForAgeStatus(8.2, 8.3, 14.5); }
                        else if (sex === "Female") { setWeightForAgeStatus(7.6, 7.7, 14.0); }
                        break;
                    case 22:
                        if (sex === "Male") { setWeightForAgeStatus(8.4, 8.5, 14.7); }
                        else if (sex === "Female") { setWeightForAgeStatus(7.8, 7.9, 14.3); }
                        break;
                    case 23:
                        if (sex === "Male") { setWeightForAgeStatus(8.5, 8.6, 15.0); }
                        else if (sex === "Female") { setWeightForAgeStatus(7.9, 8.0, 14.6); }
                        break;
                    case 24:
                        if (sex === "Male") { setWeightForAgeStatus(8.6, 8.7, 15.3); }
                        else if (sex === "Female") { setWeightForAgeStatus(8.1, 8.2, 14.8); }
                        break;
                    case 25:
                        if (sex === "Male") { setWeightForAgeStatus(8.8, 8.9, 15.5); }
                        else if (sex === "Female") { setWeightForAgeStatus(8.2, 8.3, 15.1); }
                        break;
                    case 26:
                        if (sex === "Male") { setWeightForAgeStatus(8.9, 9.0, 15.8); }
                        else if (sex === "Female") { setWeightForAgeStatus(8.4, 8.5, 15.4); }
                        break;
                    case 27:
                        if (sex === "Male") { setWeightForAgeStatus(9.0, 9.1, 16.1); }
                        else if (sex === "Female") { setWeightForAgeStatus(8.5, 8.6, 15.7); }
                        break;
                    case 28:
                        if (sex === "Male") { setWeightForAgeStatus(9.1, 9.2, 16.3); }
                        else if (sex === "Female") { setWeightForAgeStatus(8.6, 8.7, 16.0); }
                        break;
                    case 29:
                        if (sex === "Male") { setWeightForAgeStatus(9.2, 9.3, 16.6); }
                        else if (sex === "Female") { setWeightForAgeStatus(8.8, 8.9, 16.2); }
                        break;
                    case 30:
                        if (sex === "Male") { setWeightForAgeStatus(9.4, 9.5, 16.9); }
                        else if (sex === "Female") { setWeightForAgeStatus(8.9, 9.0, 16.5); }
                        break;
                    case 31:
                        if (sex === "Male") { setWeightForAgeStatus(9.5, 9.6, 17.1); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.0, 9.1, 16.8); }
                        break;
                    case 32:
                        if (sex === "Male") { setWeightForAgeStatus(9.6, 9.7, 17.4); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.1, 9.2, 17.1); }
                        break;
                    case 33:
                        if (sex === "Male") { setWeightForAgeStatus(9.7, 9.8, 17.6); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.3, 9.4, 17.3); }
                        break;
                    case 34:
                        if (sex === "Male") { setWeightForAgeStatus(9.8, 9.9, 17.8); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.4, 9.5, 17.6); }
                        break;
                    case 35:
                        if (sex === "Male") { setWeightForAgeStatus(9.9, 10.0, 18.1); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.5, 9.6, 17.9); }
                        break;
                    case 36:
                        if (sex === "Male") { setWeightForAgeStatus(10.0, 10.1, 18.3); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.6, 9.7, 18.1); }
                        break;
                    case 37:
                        if (sex === "Male") { setWeightForAgeStatus(10.1, 10.2, 18.6); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.7, 9.8, 18.4); }
                        break;
                    case 38:
                        if (sex === "Male") { setWeightForAgeStatus(10.2, 10.3, 18.8); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.8, 9.9, 18.7); }
                        break;
                    case 39:
                        if (sex === "Male") { setWeightForAgeStatus(10.3, 10.4, 19.0); }
                        else if (sex === "Female") { setWeightForAgeStatus(9.9, 10.0, 19.0); }
                        break;
                    case 40:
                        if (sex === "Male") { setWeightForAgeStatus(10.4, 10.5, 19.3); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.1, 10.2, 19.2); }
                        break;
                    case 41:
                        if (sex === "Male") { setWeightForAgeStatus(10.5, 10.6, 19.5); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.2, 10.3, 19.5); }
                        break;
                    case 42:
                        if (sex === "Male") { setWeightForAgeStatus(10.6, 10.7, 19.7); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.3, 10.4, 19.8); }
                        break;
                    case 43:
                        if (sex === "Male") { setWeightForAgeStatus(10.7, 10.8, 20.0); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.4, 10.5, 20.1); }
                        break;
                    case 44:
                        if (sex === "Male") { setWeightForAgeStatus(10.8, 10.9, 20.2); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.5, 10.6, 20.4); }
                        break;
                    case 45:
                        if (sex === "Male") { setWeightForAgeStatus(10.9, 11.0, 20.5); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.6, 10.7, 20.7); }
                        break;
                    case 46:
                        if (sex === "Male") { setWeightForAgeStatus(11.0, 11.1, 20.7); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.7, 10.8, 20.9); }
                        break;
                    case 47:
                        if (sex === "Male") { setWeightForAgeStatus(11.1, 11.2, 20.9); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.8, 10.9, 21.2); }
                        break;
                    case 48:
                        if (sex === "Male") { setWeightForAgeStatus(11.2, 11.3, 21.2); }
                        else if (sex === "Female") { setWeightForAgeStatus(10.9, 11.0, 21.5); }
                        break;
                    case 49:
                        if (sex === "Male") { setWeightForAgeStatus(11.3, 11.4, 21.4); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.0, 11.1, 21.8); }
                        break;
                    case 50:
                        if (sex === "Male") { setWeightForAgeStatus(11.4, 11.5, 21.7); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.1, 11.2, 22.1); }
                        break;
                    case 51:
                        if (sex === "Male") { setWeightForAgeStatus(11.5, 11.6, 21.9); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.2, 11.3, 22.4); }
                        break;
                    case 52:
                        if (sex === "Male") { setWeightForAgeStatus(11.6, 11.7, 22.2); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.3, 11.4, 22.6); }
                        break;
                    case 53:
                        if (sex === "Male") { setWeightForAgeStatus(11.7, 11.8, 22.4); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.4, 11.5, 22.9); }
                        break;
                    case 54:
                        if (sex === "Male") { setWeightForAgeStatus(11.8, 11.9, 22.7); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.5, 11.6, 23.2); }
                        break;
                    case 55:
                        if (sex === "Male") { setWeightForAgeStatus(11.9, 12.0, 22.9); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.6, 11.7, 23.5); }
                        break;
                    case 56:
                        if (sex === "Male") { setWeightForAgeStatus(12.0, 12.1, 23.2); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.7, 11.8, 23.8); }
                        break;
                    case 57:
                        if (sex === "Male") { setWeightForAgeStatus(12.1, 12.2, 23.4); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.8, 11.9, 24.1); }
                        break;
                    case 58:
                        if (sex === "Male") { setWeightForAgeStatus(12.2, 12.3, 23.7); }
                        else if (sex === "Female") { setWeightForAgeStatus(11.9, 12.0, 24.4); }
                        break;
                    case 59:
                        if (sex === "Male") { setWeightForAgeStatus(12.3, 12.4, 23.9); }
                        else if (sex === "Female") { setWeightForAgeStatus(12.0, 12.1, 24.6); }
                        break;
                    case 60:
                        if (sex === "Male") { setWeightForAgeStatus(12.4, 12.5, 24.2); }
                        else if (sex === "Female") { setWeightForAgeStatus(12.1, 12.2, 24.7); }
                        break;
                }
                if (database) { return result }
                else { return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`; }
            }

            // Script for Height/Length for Age Status:
            function calculateHeightLengthForAgeStatus(ageInMonths, sex, height, database)
            {
                let result = "Out of range";
                let statusClass = "bg-muted";

                function setHeightLengthForAgeStatus(severelyStuntedLimit, stuntedLimit, normalLimit, tallLimit)
                {
                    if (height <= severelyStuntedLimit) { result = "Severely Stunted"; statusClass = "bg-danger"; }
                    else if (height >= stuntedLimit && height <= normalLimit) { result = "Stunted"; statusClass = "bg-warning"; }
                    else if (height >= normalLimit && height <= tallLimit) { result = "Normal"; statusClass = "bg-success"; }
                    else if (height > tallLimit) { result = "Tall"; statusClass = "bg-primary"; }
                }

                switch (ageInMonths) // (input data ranges here)
                {
                    case 0:
                        if (sex === "Male") { setHeightLengthForAgeStatus(44.1, 44.2, 46.1, 53.8); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(43.5, 43.6, 45.4, 53.0); }
                        break;
                    case 1:
                        if (sex === "Male") { setHeightLengthForAgeStatus(48.8, 48.9, 50.8, 58.7); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(47.7, 47.8, 49.8, 57.7); }
                        break;
                    case 2:
                        if (sex === "Male") { setHeightLengthForAgeStatus(52.3, 52.4, 54.4, 62.5); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(50.9, 51.0, 53.0, 61.2); }
                        break;
                    case 3:
                        if (sex === "Male") { setHeightLengthForAgeStatus(55.2, 55.3, 57.3, 65.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(53.4, 53.5, 55.6, 64.1); }
                        break;
                    case 4:
                        if (sex === "Male") { setHeightLengthForAgeStatus(57.5, 57.6, 59.7, 68.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(55.5, 55.6, 57.8, 66.5); }
                        break;
                    case 5:
                        if (sex === "Male") { setHeightLengthForAgeStatus(59.5, 59.6, 61.7, 70.2); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(57.3, 57.4, 59.6, 68.6); }
                        break;
                    case 6:
                        if (sex === "Male") { setHeightLengthForAgeStatus(61.1, 61.2, 63.3, 72.0); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(58.8, 58.9, 61.2, 70.4); }
                        break;
                    case 7:
                        if (sex === "Male") { setHeightLengthForAgeStatus(62.6, 62.7, 64.8, 73.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(60.2, 60.3, 62.7, 72.0); }
                        break;
                    case 8:
                        if (sex === "Male") { setHeightLengthForAgeStatus(63.9, 64.0, 66.2, 75.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(61.6, 61.7, 64.0, 73.6); }
                        break;
                    case 9:
                        if (sex === "Male") { setHeightLengthForAgeStatus(65.1, 65.2, 67.5, 76.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(62.8, 62.9, 65.3, 75.1); }
                        break;
                    case 10:
                        if (sex === "Male") { setHeightLengthForAgeStatus(66.3, 66.4, 68.7, 78.0); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(64.0, 64.1, 66.5, 76.5); }
                        break;
                    case 11:
                        if (sex === "Male") { setHeightLengthForAgeStatus(67.5, 67.6, 69.9, 79.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(65.1, 65.2, 67.7, 77.9); }
                        break;
                    case 12:
                        if (sex === "Male") { setHeightLengthForAgeStatus(68.5, 68.6, 71.0, 80.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(66.2, 66.3, 68.9, 79.3); }
                        break;
                    case 13:
                        if (sex === "Male") { setHeightLengthForAgeStatus(69.5, 69.6, 72.1, 81.9); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(67.2, 67.3, 70.0, 80.6); }
                        break;
                    case 14:
                        if (sex === "Male") { setHeightLengthForAgeStatus(70.5, 70.6, 73.1, 83.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(68.2, 68.3, 71.0, 81.8); }
                        break;
                    case 15:
                        if (sex === "Male") { setHeightLengthForAgeStatus(71.5, 71.6, 74.1, 84.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(69.2, 69.3, 72.0, 83.1); }
                        break;
                    case 16:
                        if (sex === "Male") { setHeightLengthForAgeStatus(72.4, 72.5, 75.0, 85.5); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(70.1, 70.2, 73.0, 84.3); }
                        break;
                    case 17:
                        if (sex === "Male") { setHeightLengthForAgeStatus(73.2, 73.3, 76.0, 86.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(71.0, 71.1, 74.0, 85.5); }
                        break;
                    case 18:
                        if (sex === "Male") { setHeightLengthForAgeStatus(74.1, 74.2, 76.9, 87.8); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(71.9, 72.0, 74.9, 86.6); }
                        break;
                    case 19:
                        if (sex === "Male") { setHeightLengthForAgeStatus(74.9, 75.0, 77.7, 88.9); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(72.7, 72.8, 75.8, 87.7); }
                        break;
                    case 20:
                        if (sex === "Male") { setHeightLengthForAgeStatus(75.7, 75.8, 78.6, 89.9); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(73.6, 73.7, 76.7, 88.8); }
                        break;
                    case 21:
                        if (sex === "Male") { setHeightLengthForAgeStatus(76.4, 76.5, 79.4, 91.0); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(74.4, 74.5, 77.5, 89.9); }
                        break;
                    case 22:
                        if (sex === "Male") { setHeightLengthForAgeStatus(77.1, 77.2, 80.2, 92.0); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(75.1, 75.2, 78.4, 90.9); }
                        break;
                    case 23:
                        if (sex === "Male") { setHeightLengthForAgeStatus(77.9, 78.0, 81.0, 93.0); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(75.9, 76.0, 79.2, 92.0); }
                        break;
                    case 24:
                        if (sex === "Male") { setHeightLengthForAgeStatus(77.9, 78.0, 81.0, 93.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(75.9, 76.0, 79.3, 92.3); }
                        break;
                    case 25:
                        if (sex === "Male") { setHeightLengthForAgeStatus(78.5, 78.6, 81.7, 94.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(76.7, 76.8, 80.0, 93.2); }
                        break;
                    case 26:
                        if (sex === "Male") { setHeightLengthForAgeStatus(79.2, 79.3, 82.5, 95.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(77.4, 77.5, 80.8, 94.2); }
                        break;
                    case 27:
                        if (sex === "Male") { setHeightLengthForAgeStatus(79.8, 79.9, 83.1, 96.2); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(78.0, 78.1, 81.5, 95.1); }
                        break;
                    case 28:
                        if (sex === "Male") { setHeightLengthForAgeStatus(80.4, 80.5, 83.8, 97.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(78.7, 78.8, 82.2, 96.1); }
                        break;
                    case 29:
                        if (sex === "Male") { setHeightLengthForAgeStatus(81.0, 81.1, 84.5, 98.0); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(79.4, 79.5, 82.9, 97.0); }
                        break;
                    case 30:
                        if (sex === "Male") { setHeightLengthForAgeStatus(81.6, 81.7, 85.1, 98.8); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(80.0, 80.1, 83.6, 97.8); }
                        break;
                    case 31:
                        if (sex === "Male") { setHeightLengthForAgeStatus(82.2, 82.3, 85.7, 99.7); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(80.6, 80.7, 84.3, 98.7); }
                        break;
                    case 32:
                        if (sex === "Male") { setHeightLengthForAgeStatus(82.7, 82.8, 86.4, 100.5); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(81.2, 81.3, 84.9, 99.5); }
                        break;
                    case 33:
                        if (sex === "Male") { setHeightLengthForAgeStatus(83.3, 83.4, 86.9, 101.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(81.8, 81.9, 85.6, 100.4); }
                        break;
                    case 34:
                        if (sex === "Male") { setHeightLengthForAgeStatus(83.8, 83.9, 87.5, 102.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(82.4, 82.5, 86.2, 101.2); }
                        break;
                    case 35:
                        if (sex === "Male") { setHeightLengthForAgeStatus(84.3, 84.4, 88.1, 102.8); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(83.0, 83.1, 86.8, 102.0); }
                        break;
                    case 36:
                        if (sex === "Male") { setHeightLengthForAgeStatus(84.9, 85.0, 88.7, 103.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(83.5, 83.6, 87.4, 102.8); }
                        break;
                    case 37:
                        if (sex === "Male") { setHeightLengthForAgeStatus(85.4, 85.5, 89.2, 104.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(84.1, 84.2, 88.0, 103.5); }
                        break;
                    case 38:
                        if (sex === "Male") { setHeightLengthForAgeStatus(85.9, 86.0, 89.8, 105.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(84.6, 84.7, 88.6, 104.3); }
                        break;
                    case 39:
                        if (sex === "Male") { setHeightLengthForAgeStatus(86.4, 86.5, 90.3, 105.8); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(85.2, 85.3, 89.2, 105.1); }
                        break;
                    case 40:
                        if (sex === "Male") { setHeightLengthForAgeStatus(86.9, 87.0, 90.9, 106.5); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(85.7, 85.8, 89.8, 105.8); }
                        break;
                    case 41:
                        if (sex === "Male") { setHeightLengthForAgeStatus(87.4, 87.5, 91.4, 107.2); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(86.2, 86.3, 90.4, 106.5); }
                        break;
                    case 42:
                        if (sex === "Male") { setHeightLengthForAgeStatus(87.9, 88.0, 91.9, 107.9); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(86.7, 86.8, 90.9, 107.3); }
                        break;
                    case 43:
                        if (sex === "Male") { setHeightLengthForAgeStatus(88.3, 88.4, 92.4, 108.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(87.3, 87.4, 91.5, 108.0); }
                        break;
                    case 44:
                        if (sex === "Male") { setHeightLengthForAgeStatus(88.8, 88.9, 93.0, 109.2); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(87.8, 87.9, 92.0, 108.7); }
                        break;
                    case 45:
                        if (sex === "Male") { setHeightLengthForAgeStatus(89.3, 89.4, 93.4, 109.9); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(88.3, 88.4, 92.5, 109.4); }
                        break;
                    case 46:
                        if (sex === "Male") { setHeightLengthForAgeStatus(89.7, 89.8, 93.9, 110.5); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(88.8, 88.9, 93.1, 110.1); }
                        break;
                    case 47:
                        if (sex === "Male") { setHeightLengthForAgeStatus(90.2, 90.3, 94.3, 111.2); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(89.2, 89.3, 93.6, 110.8); }
                        break;
                    case 48:
                        if (sex === "Male") { setHeightLengthForAgeStatus(90.6, 90.7, 94.9, 111.8); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(89.7, 89.8, 94.1, 111.4); }
                        break;
                    case 49:
                        if (sex === "Male") { setHeightLengthForAgeStatus(91.1, 91.2, 95.4, 112.5); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(90.2, 90.3, 94.6, 112.1); }
                        break;
                    case 50:
                        if (sex === "Male") { setHeightLengthForAgeStatus(91.5, 91.6, 95.9, 113.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(90.6, 90.7, 95.1, 112.8); }
                        break;
                    case 51:
                        if (sex === "Male") { setHeightLengthForAgeStatus(92.0, 92.1, 96.4, 113.7); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(91.1, 91.2, 95.6, 113.4); }
                        break;
                    case 52:
                        if (sex === "Male") { setHeightLengthForAgeStatus(92.4, 92.5, 96.9, 114.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(91.6, 91.7, 96.1, 114.1); }
                        break;
                    case 53:
                        if (sex === "Male") { setHeightLengthForAgeStatus(92.9, 93.0, 97.4, 115.0); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(92.0, 92.1, 96.6, 114.7); }
                        break;
                    case 54:
                        if (sex === "Male") { setHeightLengthForAgeStatus(93.3, 93.4, 97.8, 115.6); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(92.5, 92.6, 97.1, 115.3); }
                        break;
                    case 55:
                        if (sex === "Male") { setHeightLengthForAgeStatus(93.8, 93.9, 98.3, 116.2); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(92.9, 93.0, 97.6, 116.0); }
                        break;
                    case 56:
                        if (sex === "Male") { setHeightLengthForAgeStatus(94.2, 94.3, 98.8, 116.8); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(93.3, 93.4, 98.1, 116.6); }
                        break;
                    case 57:
                        if (sex === "Male") { setHeightLengthForAgeStatus(94.6, 94.7, 99.3, 117.5); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(93.8, 93.9, 98.5, 117.2); }
                        break;
                    case 58:
                        if (sex === "Male") { setHeightLengthForAgeStatus(95.1, 95.2, 99.7, 118.1); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(94.2, 94.3, 99.0, 117.8); }
                        break;
                    case 59:
                        if (sex === "Male") { setHeightLengthForAgeStatus(95.5, 95.6, 100.2, 118.7); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(94.6, 94.7, 99.5, 118.4); }
                        break;
                    case 60:
                        if (sex === "Male") { setHeightLengthForAgeStatus(96.0, 96.1, 100.7, 119.3); }
                        else if (sex === "Female") { setHeightLengthForAgeStatus(95.1, 95.2, 99.9, 119.0); }
                        break;
                }

                if (result === "Unknown") {
                    $statusClass = "bg-dark"; // Set default color to black
                }

                if (database) { return result }
                else { return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`; }
            }
            
            function calculateWeightForLengthStatus(height, ageInMonths, weight, sex, database)
            {
                let result = "Out of range";
                let statusClass = "text-secondary";
                let childHeight = roundOfHeight(height, ageInMonths)
                let matrix = getLimits(ageInMonths, sex)
                matrix = matrix[childHeight[1]]
                height = childHeight[0]

                function setWgtHtStatus(SevereAcuteMalnutrition, ModerateAcuteMalnutrition, Normal, Overweight, Obese)
                {
                    if (weight <= SevereAcuteMalnutrition) { result = "Severe Acute Malnutrition"; statusClass = "bg-danger"; }
                    else if (weight > SevereAcuteMalnutrition && weight <= ModerateAcuteMalnutrition) { result = "Moderate Acute Malnutrition"; statusClass = "bg-warning"; }
                    else if (weight > ModerateAcuteMalnutrition && weight <= Normal) { result = "Normal"; statusClass = "bg-success"; }
                    else if (weight > Normal && weight <= Overweight) { result = "Overweight"; statusClass = "bg-primary"; }
                    else if (weight > Overweight && weight <= Obese || weight > Obese) { result = "Obese"; statusClass = "bg-dark" }
                }
                setWgtHtStatus(matrix[0], matrix[1], matrix[2], matrix[3], matrix[4])

                if (database) { return result }
                else { return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`; }   
            }

        function roundOfHeight(height, ageInMonths)
        {

            const matrheightCategories23 =
            [
                45.0, 45.5, 46.0, 46.5, 47.0, 47.5, 48.0, 48.5, 49.0, 49.5, 50.0, 50.5,
                51.0, 51.5, 52.0, 52.5, 53.0, 53.5, 54.0, 54.5, 55.0, 55.5, 56.0, 56.5,
                57.0, 57.5, 58.0, 58.5, 59.0, 59.5, 60.0, 60.5, 61.0, 61.5, 62.0, 62.5,
                63.0, 63.5, 64.0, 64.5, 65.0, 65.5, 66.0, 66.5, 67.0, 67.5, 68.0, 68.5,
                69.0, 69.5, 70.0, 70.5, 71.0, 71.5, 72.0, 72.5, 73.0, 73.5, 74.0, 74.5,
                75.0, 75.5, 76.0, 76.5, 77.0, 77.5, 78.0, 78.5, 79.0, 79.5, 80.0, 80.5,
                81.0, 81.5, 82.0, 82.5, 83.0, 83.5, 84.0, 84.5, 85.0, 85.5, 86.0, 86.5,
                87.0, 87.5, 88.0, 88.5, 89.0, 89.5, 90.0, 90.5, 91.0, 91.5, 92.0, 92.5,
                93.0, 93.5, 94.0, 94.5, 95.0, 95.5, 96.0, 96.5, 97.0, 97.5, 98.0, 98.5,
                99.0, 99.5, 100.0, 100.5, 101.0, 101.5, 102.0, 102.5, 103.0, 103.5, 104.0,
                104.5, 105.0, 105.5, 106.0, 106.5, 107.0, 107.5, 108.0, 108.5, 109.0, 109.5,
                110.0
            ];
            const matrheightCategories60 =
            [
                65.0, 65.5, 66.0, 66.5, 67.0, 67.5, 68.0, 68.5,
                69.0, 69.5, 70.0, 70.5, 71.0, 71.5, 72.0, 72.5, 73.0, 73.5, 74.0, 74.5,
                75.0, 75.5, 76.0, 76.5, 77.0, 77.5, 78.0, 78.5, 79.0, 79.5, 80.0, 80.5,
                81.0, 81.5, 82.0, 82.5, 83.0, 83.5, 84.0, 84.5, 85.0, 85.5, 86.0, 86.5,
                87.0, 87.5, 88.0, 88.5, 89.0, 89.5, 90.0, 90.5, 91.0, 91.5, 92.0, 92.5,
                93.0, 93.5, 94.0, 94.5, 95.0, 95.5, 96.0, 96.5, 97.0, 97.5, 98.0, 98.5,
                99.0, 99.5, 100.0, 100.5, 101.0, 101.5, 102.0, 102.5, 103.0, 103.5, 104.0,
                104.5, 105.0, 105.5, 106.0, 106.5, 107.0, 107.5, 108.0, 108.5, 109.0, 109.5,
                110.0, 110.5, 111.0, 111.5, 112.0, 112.5, 113.0, 113.5, 114.0, 114.5, 115.0,
                115.5, 116.0, 116.5, 117.0, 117.5, 118.0, 118.5, 119.0, 119.5, 120.0
            ];

            if (ageInMonths >= 0 && ageInMonths <= 22)
            {
                matrix = matrheightCategories23
            }
            else
            {
                matrix = matrheightCategories60
            }

            const category = matrix.find(cat => height < cat);
            let finalHeight = 0.0;

            if (category !== undefined)
            {
                const index = matrix.indexOf(category);

                if (height - matrix[index - 1] <= matrix[index] - height)
                {
                    finalHeight = matrix[index - 1];
                }
                else
                {
                    finalHeight = matrix[index];
                }
            }
            else
            {
                finalHeight = matrix[matrix.length - 1];
            }
            return [finalHeight, matrix.indexOf(finalHeight)];
        }

        function getLimits(ageInMonths, sex)
        {
            let matrix = []

            const limits23 =
            {
                Male:
                [
                    [1.8, 1.9, 3, 3.3, 3.4], [1.8, 2, 3.1, 3.4, 3.5], [1.9, 2.1, 3.1, 3.5, 3.6], [2, 2.2, 3.2, 3.6, 3.7],
                    [2, 2.2, 3.3, 3.7, 3.8], [2.1, 2.3, 3.4, 3.8, 3.9], [2.2, 2.4, 3.6, 3.9, 4], [2.2, 2.5, 3.7, 4, 4.1],
                    [2.3, 2.5, 3.8, 4.2, 4.3], [2.4, 2.6, 3.9, 4.3, 4.4], [2.5, 2.7, 4, 4.4, 4.5], [2.6, 2.8, 4.1, 4.5, 4.6],
                    [2.6, 2.9, 4.2, 4.7, 4.8], [2.7, 3, 4.4, 4.8, 4.9], [2.8, 3.1, 4.5, 5, 5.1], [2.9, 3.2, 4.6, 5.1, 5.2],
                    [3, 3.3, 4.8, 5.3, 5.4], [3.1, 3.4, 4.9, 5.4, 5.5], [3.2, 3.5, 5.1, 5.6, 5.7], [3.3, 3.6, 5.3, 5.8, 5.9],
                    [3.5, 3.7, 5.4, 6, 6.1], [3.6, 3.9, 5.6, 6.1, 6.2], [3.7, 4, 5.8, 6.3, 6.4], [3.8, 4.1, 5.9, 6.5, 6.6],
                    [3.9, 4.2, 6.1, 6.7, 6.8], [4, 4.4, 6.3, 6.9, 7], [4.2, 4.5, 6.4, 7.1, 7.2], [4.3, 4.6, 6.6, 7.2, 7.3],
                    [4.4, 4.7, 6.8, 7.4, 7.5], [4.5, 4.9, 7, 7.6, 7.7], [4.6, 5, 7.1, 7.8, 7.9], [4.7, 5.1, 7.3, 8, 8.1],
                    [4.8, 5.2, 7.4, 8.1, 8.2], [4.9, 5.3, 7.6, 8.3, 8.4], [5, 5.5, 7.7, 8.5, 836], [5.1, 5.6, 7.9, 8.6, 8.7],
                    [5.2, 5.7, 8, 8.8, 8.9], [5.3, 5.8, 8.2, 8.9, 9], [5.4, 5.9, 8.3, 9.1, 9.2], [5.5, 6, 8.5, 9.3, 9.4],
                    [5.6, 6.1, 8.6, 9.4, 9.5], [5.7, 6.2, 8.7, 9.6, 9.7], [5.8, 6.3, 8.9, 9.7, 9.8], [5.9, 6.4, 9, 9.9, 10],
                    [6, 6.5, 9.2, 10, 10.1], [6.1, 6.6, 9.3, 10.2, 10.3], [6.2, 6.7, 9.4, 10.3, 10.4], [6.3, 6.8, 9.6, 10.5, 10.6],
                    [6.4, 6.9, 9.7, 10.6, 10.7], [6.5, 7, 9.8, 10.8, 10.9], [6.5, 7.1, 10, 10.9, 11], [6.6, 7.2, 10.1, 11.1, 11.2],
                    [6.7, 7.3, 10.2, 11.2, 11.3], [6.8, 7.4, 10.4, 11.3, 11.4], [6.9, 7.5, 10.5, 11.5, 11.6], [7, 7.5, 10.6, 11.6, 11.7],
                    [7.1, 7.6, 10.8, 11.8, 11.9], [7.1, 7.7, 10.9, 11.9, 12], [7.2, 7.8, 11, 12.1, 12.2], [7.3, 7.9, 11.2, 12.2, 12.3],
                    [7.4, 8, 11.3, 12.3, 12.4], [7.5, 8.1, 11.4, 12.5, 12.6], [7.5, 8.2, 11.5, 12.6, 12.7], [7.6, 8.2, 11.6, 12.7, 12.8],
                    [7.7, 8.3, 11.7, 12.8, 12.9], [7.8, 8.4, 11.9, 13, 13.1], [7.8, 8.5, 12, 13.1, 13.2], [7.9, 8.6, 12.1, 13.2, 13.3],
                    [8, 8.6, 12.2, 13.3, 13.4], [8.1, 8.7, 12.3, 13.4, 13.5], [8.1, 8.8, 12.4, 13.6, 13.7], [8.2, 8.9, 12.5, 13.7, 13.8],
                    [8.3, 9, 12.6, 13.8, 13.9], [8.4, 9, 12.7, 13.9, 14], [8.4, 9.1, 12.8, 14, 14.1], [8.5, 9.2, 13, 14.2, 14.3],
                    [8.6, 9.3, 13.1, 14.3, 14.4], [8.7, 9.4, 13.2, 14.4, 14.5], [8.8, 9.5, 13.3, 14.6, 14.7], [8.9, 9.6, 13.5, 14.7, 14.8],
                    [9, 9.7, 13.6, 14.9, 15], [9.1, 9.8, 13.7, 15, 15.1], [9.2, 9.9, 13.9, 15.2, 15.3], [9.3, 10, 14, 15.3, 15.4],
                    [9.4, 10.1, 14.2, 15.5, 15.6], [9.5, 10.3, 14.3, 15.6, 15.7], [9.6, 10.4, 14.5, 15.8, 15.9], [9.7, 10.5, 14.6, 15.9, 16],
                    [9.8, 10.6, 14.7, 16.1, 16.2], [9.9, 10.7, 14.9, 16.2, 16.3], [10, 10.8, 15, 16.4, 16.5], [10.1, 10.9, 15.1, 16.5, 16.6],
                    [10.2, 11, 15.3, 16.7, 16.8], [10.3, 11.1, 15.4, 16.8, 16.9], [10.4, 11.2, 15.6, 17, 17.1], [10.5, 11.3, 15.7, 17.1, 17.2],
                    [10.6, 11.4, 15.8, 17.3, 17.4], [10.6, 11.5, 16, 17.4, 17.5], [10.7, 11.6, 16.1, 17.6, 17.7], [10.8, 11.7, 16.3, 17.7, 17.8],
                    [10.9, 11, 16.4, 17.9, 18], [11, 11.9, 16.5, 18, 18.1], [11.1, 12, 16.7, 18.2, 18.3], [11.2, 12.1, 16.8, 18.4, 18.5],
                    [11.3, 12.2, 17, 18.5, 18.6], [11.4, 12.3, 17.1, 18.7, 18.8], [11.5, 12.4, 17.3, 18.9, 19], [11.6, 12.5, 17.5, 19.1, 19.2],
                    [11.7, 12.6, 17.6, 19.2, 19.3], [11.8, 12.7, 17.8, 19.4, 19.5], [11.9, 12.8, 18, 19.6, 19.7], [12, 12.9, 18.1, 19.8, 19.9],
                    [12.1, 13.1, 18.3, 20, 20.1], [12.2, 13.2, 18.5, 20.2, 20.3], [12.3, 13.3, 18.7, 20.4, 20.5], [12.4, 13.4, 18.8, 20.6, 20.7],
                    [12.5, 13.5, 19, 20.8, 20.9], [12.6, 13.6, 19.2, 21, 21.1], [12.7, 13.8, 19.4, 21.2, 21.3], [12.8, 13.9, 19.6, 21.5, 21.6],
                    [12.9, 14, 19.8, 21.7, 21.8], [13.1, 14.1, 20, 21.9, 22], [13.2, 14.3, 20.2, 22.1, 22.2], [13.3, 14.4, 20.4, 22.4, 22.5],
                    [13.4, 14.5, 20.6, 22.6, 22.7], [13.5, 14.6, 20.8, 22.8, 22.9], [13.6, 14.8, 21, 23.1, 23.2], [13.7, 14.9, 21.2, 23.3, 23.4],
                    [13.9, 15, 21.4, 23.6, 23.7], [14, 15.2, 21.7, 23.8, 23.9], [14.1, 15.3, 21.9, 24.1, 24.2]
                ],
                Female:
                [
                    [1.8, 2, 3, 3.3, 3.4], [1.9, 2, 3.1, 3.4, 3.5], [1.9, 2.1, 3.2, 3.5, 3.6], [2, 2.2, 3.3, 3.6, 3.7],
                    [2.1, 2.3, 3.4, 3.7, 3.8], [2.1, 2.3, 3.5, 3.8, 3.9], [2.2, 2.4, 3.6, 4, 4.1], [2.3, 2.5, 3.7, 4.1, 4.2],
                    [2.3, 2.5, 3.8, 4.2, 4.3], [2.4, 2.6, 3.9, 4.3, 4.4], [2.5, 2.7, 4, 4.5, 4.6], [2.6, 2.8, 4.2, 4.6, 4.7],
                    [2.7, 2.9, 4.3, 4.8, 4.9], [2.7, 3, 4.4, 4.9, 5], [2.8, 3.1, 4.6, 5.1, 5.2], [2.9, 3.2, 4.7, 5.2, 5.3],
                    [3, 3.3, 4.9, 5.4, 5.5], [3.1, 3.4, 50, 55, 5.6], [3.2, 3.6, 5.2, 5.7, 5.8], [3.3, 3.6, 5.3, 5.9, 6],
                    [3.4, 3.7, 5.5, 6.1, 6.2], [3.5, 3.8, 5.7, 6.3, 6.4], [3.6, 3.9, 5.8, 6.4, 6.5], [3.7, 4, 6, 6.6, 6.7],
                    [3.8, 4.2, 6.1, 6.8, 6.9], [3.9, 4.3, 6.3, 7, 7.1], [4, 4.4, 6.5, 7.1, 7.2], [4.1, 4.5, 6.6, 7.3, 7.4],
                    [4.2, 4.6, 6.8, 7.5, 7.6], [4.3, 4.7, 6.9, 7.7, 7.8], [4.4, 4.8, 7.1, 7.8, 7.9], [4.5, 4.9, 7.3, 8, 8.1],
                    [4.6, 5, 7.4, 8.2, 8.3], [4.7, 5.1, 7.6, 8.4, 8.5], [4.8, 5.2, 7.7, 8.5, 8.6], [4.9, 5.3, 7.8, 8.7, 8.8],
                    [5, 5.4, 8, 8.8, 8.9], [5.1, 5.5, 8.1, 9.0, 9.1], [5.2, 5.6, 8.3, 9.1, 9.2], [5.3, 5.7, 8.4, 9.3, 9.4],
                    [5.4, 5.8, 8.6, 9.5, 9.6], [5.4, 5.9, 8.7, 9.6, 9.7], [5.5, 6, 8.8, 9.8, 9.9], [5.6, 6.1, 9, 9.9, 10],
                    [5.7, 6.2, 9.1, 10, 10.1], [5.8, 6.3, 9.2, 10.2, 10.3], [5.9, 6.4, 9.4, 10.3, 10.4], [6, 6.5, 9.5, 10.5, 10.6],
                    [6, 6.6, 9.6, 10.6, 10.7], [6.1, 6.7, 9.7, 10.7, 10.8], [6.2, 6.8, 9.9, 10.9, 11], [6.3, 6.8, 10, 11, 11.1],
                    [6.4, 6.9, 10.1, 11.1, 11.2], [6.4, 7, 10.2, 11.3, 11.4], [6.5, 7.1, 10.3, 11.4, 11.5], [6.6, 7.2, 10.5, 11.5, 11.6],
                    [6.7, 7.3, 10.6, 11.7, 11.8], [6.8, 7.3, 10.7, 11.8, 11.9], [6.8, 7.4, 10.8, 11.9, 12], [6.9, 7.5, 10.9, 12, 12.1],
                    [7, 7.6, 11, 12.2, 12.3], [7, 7.7, 11.1, 12.3, 12.4], [7.1, 7.7, 11.2, 12.4, 12.5], [7.2, 7.8, 11.4, 12.5, 12.6],
                    [7.3, 7.9, 11.5, 12.6, 12.7], [7.3, 8, 11.6, 12.8, 12.9], [7.4, 8.1, 11.7, 12.9, 13], [7.5, 8.1, 11.8, 13, 13.1],
                    [7.6, 8.2, 11.9, 13.1, 13.2], [7.6, 8.3, 12, 13.3, 13.4], [7.7, 8.4, 12.1, 13.4, 13.5], [7.8, 8.5, 12.3, 13.5, 13.6],
                    [7.9, 8.6, 12.4, 13.7, 13.8], [8, 8.7, 12.5, 13.8, 13.9], [8, 8.7, 12.6, 13.9, 14], [8.1, 8.8, 12.8, 14.1, 14.2],
                    [8.2, 8.9, 12.9, 14.2, 14.3], [8.3, 9, 13.1, 14.4, 14.5], [8.4, 9.1, 13.2, 14.5, 14.6], [8.5, 9.2, 13.3, 14.7, 14.8],
                    [8.6, 9.3, 13.5, 14.9, 15], [8.7, 9.4, 13.6, 15.0, 15.1], [8.8, 9.6, 13.8, 15.2, 15.3], [8.9, 9.7, 13.9, 15.4, 15.5],
                    [9, 9.8, 14.1, 15.5, 15.6], [9.1, 9.9, 14.2, 15.7, 15.8], [9.2, 10, 14.4, 15.9, 16], [9.3, 10.1, 14.5, 16, 16.1],
                    [9.4, 10.2, 14.7, 16.2, 16.3], [9.5, 10.3, 14.8, 16.4, 16.5], [9.6, 10.4, 15, 16.5, 16.6], [9.7, 10.5, 15.1, 16.7, 16.8],
                    [9.8, 10.6, 15.3, 16.9, 17], [9.9, 10.7, 15.5, 17, 17.1], [10, 10.8, 15.6, 17.2, 17.3], [10, 10.9, 15.8, 17.4, 17.5],
                    [10.1, 11, 15.9, 17.5, 17.6], [10.2, 11.1, 16.1, 17.7, 17.8], [10.3, 11.2, 16.2, 17.9, 18], [10.4, 11.3, 16.4, 18, 18.1],
                    [10.5, 11.4, 16.5, 18.2, 18.3], [10.6, 11.5, 16.7, 18.4, 18.5], [10.7, 11.6, 16.8, 18.6, 18.7], [10.8, 11.7, 17, 18.7, 18.8],
                    [10.9, 11.9, 17.1, 18.9, 19], [11, 12, 17.3, 19.1, 19.2], [11.1, 12.1, 17.5, 19.3, 19.4], [11.2, 12.2, 17.6, 19.5, 19.6],
                    [11.3, 12.3, 17.8, 19.6, 19.7], [11.4, 12.4, 18, 19.8, 19.9], [11.5, 12.5, 18.1, 20, 20.1], [11.6, 12.6, 18.3, 20.2, 20.3],
                    [11.7, 12.7, 18.5, 20.4, 20.5], [11.8, 12.9, 18.7, 20.6, 20.7], [11.9, 13, 18.9, 20.8, 20.9], [12, 13.1, 19, 21, 21.1],
                    [12.2, 13.2, 19.2, 21.3, 21.4], [12.3, 13.4, 19.4, 21.5, 21.6], [12.4, 13.5, 19.6, 21.7, 21.8], [12.5, 13.6, 19.8, 21.9, 22],
                    [12.6, 13.7, 20, 22.2, 22.3], [12.7, 13.9, 20.2, 22.4, 22.5], [12.9, 14, 20.5, 22.6, 22.7], [13, 14.2, 20.7, 22.9, 23],
                    [13.1, 14.3, 20.9, 23.1, 23.2], [13.2, 14.4, 21.1, 23.4, 23.5], [13.4, 14.6, 21.3, 23.6, 23.7], [13.5, 14.7, 21.6, 23.9, 24],
                    [13.6, 14.9, 21.8, 24.2, 24.3], [13.8, 15, 22, 24.4, 24.5], [13.9, 15.2, 22.3, 24.7, 24.8]
                ]
            }
            const limits60 =
            {
                Male:
                [
                    [5.8, 6.2, 8.8, 9.6, 9.7], [5.9, 6.3, 8.9, 9.8, 9.9], [6.0, 6.4, 9.1, 9.9, 10.0], [6.0, 6.5, 9.2, 10.1, 10.2],
                    [6.1, 6.6, 9.4, 10.2, 10.3], [6.2, 6.7, 9.5, 10.4, 10.5], [6.3, 6.8, 9.6, 10.5, 10.6], [6.4, 6.9, 9.8, 10.7, 10.8],
                    [6.5, 7.0, 9.9, 10.8, 10.9], [6.6, 7.1, 10.0, 11.0, 11.1], [6.7, 7.2, 10.2, 11.1, 11.2], [6.8, 7.3, 10.3, 11.3, 11.4],
                    [6.8, 7.4, 10.4, 11.4, 11.5], [6.9, 7.5, 10.6, 11.6, 11.7], [7.0, 7.6, 10.7, 11.7, 11.8], [7.1, 7.7, 10.8, 11.8, 11.9],
                    [7.2, 7.8, 11.0, 12.0, 12.1], [7.3, 7.8, 11.1, 12.1, 12.2], [7.3, 7.9, 11.2, 12.2, 12.3], [7.4, 8.0, 11.3, 12.4, 12.5],
                    [7.5, 8.1, 11.4, 12.5, 12.6], [7.6, 8.2, 11.6, 12.6, 12.7], [7.6, 8.3, 11.7, 12.8, 12.9], [7.7, 8.4, 11.8, 12.9, 13.0],
                    [7.8, 8.4, 11.9, 13.0, 13.1], [7.9, 8.5, 12.0, 13.1, 13.2], [8.0, 8.6, 12.1, 13.3, 114], [8.0, 8.7, 12.2, 13.4, 13.5],
                    [8.1, 8.7, 12.3, 13.5, 13.6], [8.2, 8.8, 12.4, 13.6, 13.7], [8.2, 8.9, 12.6, 13.7, 13.8], [8.3, 9.0, 12.7, 13.8, 13.9],
                    [8.4, 9.1, 12.8, 14.0, 14.1], [8.5, 9.2, 12.9, 14.1, 14.2], [8.6, 9.2, 13.0, 14.2, 14.3], [8.6, 9.3, 13.1, 14.4, 14.5],
                    [8.7, 9.4, 13.3, 14.5, 14.6], [8.8, 9.5, 13.4, 14.6, 14.7], [8.9, 9.6, 13.5, 14.8, 14.9], [9.0, 9.8, 13.7, 14.9, 15.0],
                    [9.1, 9.9, 13.8, 15.1, 15.2], [9.2, 10.0, 13.9, 15.2, 15.3], [9.3, 10.1, 14.1, 15.4, 15.5], [9.4, 10.2, 14.2, 15.5, 15.6],
                    [9.5, 10.3, 14.4, 15.7, 15.8], [9.6, 10.4, 14.5, 15.8, 15.9], [9.7, 10.5, 14.7, 16.0, 16.1], [9.8, 10.6, 14.8, 16.1, 16.2],
                    [9.9, 10.7, 14.9, 16.3, 16.4], [10.0, 10.8, 15.1, 16.4, 16.5], [10.1, 10.9, 15.2, 16.6, 16.7], [10.2, 11.0, 15.3, 16.7, 16.8],
                    [10.3, 11.1, 15.5, 16.9, 17.0], [10.4, 11.2, 15.6, 17.0, 17.1], [10.5, 11.3, 15.8, 17.2, 17.3], [10.6, 11.4, 15.9, 17.3, 17.4],
                    [10.7, 11.5, 16.0, 17.5, 17.6], [10.8, 11.6, 16.2, 17.6, 17.7], [10.9, 11.7, 16.3, 17.8, 17.9], [11.0, 11.8, 16.5, 17.9, 18.0],
                    [11.0, 11.9, 16.6, 18.1, 18.2], [11.1, 12.0, 16.7, 18.3, 18.4], [11.2, 12.1, 16.9, 18.4, 18.5], [11.3, 12.2, 17.0, 18.6, 18.7],
                    [11.4, 12.3, 17.2, 18.8, 18.9], [11.5, 12.4, 17.4, 18.9, 19.0], [11.6, 12.5, 17.5, 19.1, 19.2], [11.7, 12.7, 17.7, 19.3, 19.4],
                    [11.8, 12.8, 17.9, 19.5, 19.6], [11.9, 12.9, 18.0, 19.7, 19.8], [12.0, 13.0, 18.2, 19.9, 20.0], [12.1, 13.1, 18.4, 20.1, 20.2],
                    [12.2, 13.2, 18.5, 20.3, 20.4], [12.3, 13.3, 18.7, 20.5, 20.6], [12.4, 13.5, 18.9, 20.7, 20.8], [12.5, 13.6, 19.1, 20.9, 21.0],
                    [12.7, 13.7, 19.3, 21.1, 21.2], [12.8, 13.8, 19.5, 21.3, 21.4], [12.9, 13.9, 19.7, 21.6, 21.7], [13.0, 14.1, 19.9, 21.8, 21.9],
                    [13.1, 14.2, 20.1, 22.0, 22.1], [13.2, 14.3, 20.3, 22.2, 22.3], [13.3, 14.4, 20.5, 22.5, 22.6], [13.4, 14.6, 20.7, 22.7, 22.8],
                    [13.6, 14.7, 20.9, 22.9, 23.0], [13.7, 14.8, 21.1, 23.2, 23.3], [13.8, 15.0, 21.3, 23.4, 23.5], [13.9, 15.1, 21.5, 23.7, 23.8],
                    [14.0, 15.2, 21.8, 23.9, 24.0], [14.2, 15.4, 22.0, 24.2, 24.3], [14.3, 15.5, 22.2, 24.4, 24.5], [14.4, 15.7, 22.4, 24.7, 24.8],
                    [14.5, 15.8, 22.7, 25.0, 25.1], [14.7, 15.9, 22.9, 25.2, 25.3], [14.8, 16.1, 23.1, 25.5, 25.6], [14.9, 16.2, 23.4, 25.8, 25.9],
                    [15.1, 16.4, 23.6, 26.0, 26.1], [15.2, 16.5, 23.9, 26.3, 26.4], [15.3, 16.7, 24.1, 26.6, 26.7], [15.5, 16.8, 24.4, 26.9, 27.0],
                    [15.6, 17.0, 24.6, 27.2, 27.3], [15.7, 17.1, 24.9, 27.5, 27.6], [15.9, 17.3, 25.1, 27.8, 27.9], [16.0, 17.4, 25.4, 28.0, 28.1],
                    [16.1, 17.6, 25.6, 28.3, 28.4], [16.3, 17.8, 25.9, 28.6, 28.7], [16.4, 17.9, 26.1, 28.9, 29.0], [16.6, 18.1, 26.4, 29.2, 29.3],
                    [16.7, 18.2, 26.6, 29.5, 29.6], [16.8, 18.4, 26.9, 29.8, 29.9], [17.0, 18.5, 27.2, 30.1, 30.2]
                ],
                Female:
                [
                    [5.5, 6, 8.7, 9.7, 9.8], [5.6, 6.1, 8.9, 9.8, 9.9], [5.7, 6.2, 9, 10, 10.1], [5.7, 6.3, 9.1, 10.1, 10.2],
                    [5.8, 6.3, 9.3, 10.2, 10.3], [5.9, 6.4, 9.4, 10.4, 10.5], [6, 6.5, 9.5, 10.5, 10.6], [6.1, 6.6, 9.7, 10.7, 10.8],
                    [6.2, 6.7, 9.8, 10.8, 10.9], [6.2, 6.8, 9.9, 10.9, 11], [6.3, 6.9, 10, 11.1, 11.2], [6.4, 7, 10.1, 11.2, 11.3],
                    [6.5, 7, 10.3, 11.3, 11.4], [6.6, 7.1, 10.4, 11.5, 11.6], [6.6, 7.2, 10.5, 11.6, 11.7], [6.7, 7.3, 10.6, 11.7, 11.8],
                    [6.8, 7.4, 10.7, 11.8, 11.9], [6.9, 7.5, 10.8, 12, 12.1], [6.9, 7.5, 11, 12.1, 12.2], [7, 7.6, 11.1, 12.2, 12.3],
                    [7.1, 7.7, 11.2, 12.3, 12.4], [7.1, 7.8, 11.3, 12.5, 12.6], [7.2, 7.9, 11.4, 12.6, 12.7], [7.3, 7.9, 11.5, 12.7, 12.8],
                    [7.4, 8, 11.6, 12.8, 12.9], [7.4, 8.1, 11.7, 12.9, 13], [7.5, 8.2, 11.8, 13.1, 13.2], [7.6, 8.3, 12, 13.2, 13.3],
                    [7.7, 8.3, 12.1, 13.3, 13.4], [7.7, 8.4, 12.2, 13.4, 13.5], [7.8, 8.5, 12.3, 13.6, 13.7], [7.9, 8.6, 12.4, 13.7, 138],
                    [8, 8.7, 12.6, 13.9, 14], [8.1, 8.8, 12.7, 14, 14.1], [8.2, 8.9, 12.8, 14.1, 14.2], [8.3, 9, 13, 14.3, 14.4],
                    [8.4, 9.1, 13.1, 14.5, 14.6], [8.4, 9.2, 13.3, 14.6, 14.7], [8.5, 9.3, 13.4, 14.8, 14.9], [8.6, 9.4, 13.5, 14.9, 15],
                    [8.7, 9.5, 13.7, 15.1, 15.2], [8.8, 9.6, 13.8, 15.3, 15.4], [8.9, 9.7, 14, 15.4, 15.5], [9, 9.8, 14.2, 15.6, 15.7],
                    [9.1, 9.9, 14.3, 15.8, 15.9], [9.2, 10, 14.5, 15.9, 16], [9.3, 10.1, 14.6, 16.1, 16.2], [9.4, 10.2, 14.8, 16.3, 16.4],
                    [9.5, 10.3, 14.9, 16.4, 16.5], [9.6, 10.4, 15.1, 16.6, 16.7], [9.7, 10.5, 15.2, 16.8, 16.9], [9.8, 10.6, 15.4, 16.9, 17],
                    [9.9, 10.8, 15.5, 17.1, 17.2], [10, 10.9, 15.7, 17.3, 17.4], [10.1, 11, 15.8, 17.4, 17.5], [10.2, 11.1, 16, 17.6, 17.7],
                    [10.3, 11.2, 16.1, 17.8, 17.9], [10.4, 11.3, 16.3, 17.9, 18], [10.5, 11.4, 16.4, 18.1, 18.2], [10.6, 11.5, 16.6, 18.3, 18.4],
                    [10.7, 11.6, 16.7, 18.5, 18.6], [10.7, 11.7, 16.9, 18.6, 18.7], [10.8, 11.8, 17, 18.8, 18.9], [10.9, 11.9, 17.2, 19, 19.1],
                    [11, 12, 17.4, 19.2, 19.3], [11.1, 12.1, 17.5, 19.3, 19.4], [11.2, 12.2, 17.7, 19.5, 19.6], [11.3, 12.3, 17.9, 19.7, 19.8],
                    [11.4, 12.4, 18, 19.9, 20], [11.5, 12.6, 18.2, 20.1, 20.2], [11.6, 12.7, 18.4, 20.3, 20.4], [11.8, 12.8, 18.6, 20.5, 20.6],
                    [11.9, 12.9, 18.7, 20.7, 20.8], [12, 13, 18.9, 20.9, 21], [12.1, 13.2, 19.1, 21.1, 21.2], [12.2, 13.3, 19.3, 21.4, 21.5],
                    [12.3, 13.4, 19.5, 21.6, 21.7], [12.4, 13.5, 19.7, 21.8, 21.9], [12.5, 13.7, 19.9, 22, 22.1], [12.7, 13.8, 20.1, 22.3, 22.4],
                    [12.8, 13.9, 20.3, 22.5, 22.6], [12.9, 14.1, 20.5, 22.7, 22.8], [13, 14.2, 20.8, 23, 23.1], [13.2, 14.4, 21, 23.2, 23.3],
                    [13.3, 14.5, 21.2, 23.5, 23.6], [13.4, 14.6, 21.4, 23.7, 23.8], [13.6, 14.8, 21.7, 24, 24.1], [137, 14.9, 21.9, 24.3, 24.4],
                    [13.8, 15.1, 22.1, 24.5, 24.6], [14, 1000, 22.4, 24.8, 24.9], [14.1, 15.4, 22.6, 25.1, 25.2], [14.3, 15.6, 22.9, 25.4, 25.5],
                    [14.4, 15.7, 23.1, 25.7, 25.8], [14.6, 15.9, 23.4, 26, 26.1], [14.7, 16.1, 23.6, 26.2, 26.3], [14.9, 16.2, 23.9, 26.5, 26.6],
                    [15, 16.4, 24.2, 26.8, 26.9], [15.2, 16.6, 24.4, 27.1, 27.2], [15.3, 16.7, 24.7, 27.4, 27.5], [15.5, 16.9, 25, 27.8, 27.9],
                    [15.6, 17.1, 25.2, 28.1, 28.2], [15.8, 17.2, 25.5, 28.4, 28.5], [15.9, 17.4, 25.8, 28.7, 28.8], [16.1, 17.6, 26.1, 29, 29.1],
                    [16.2, 17.7, 26.3, 29.3, 29.4], [16.4, 17.9, 26.6, 29.6, 29.7], [16.5, 18.1, 26.9, 29.9, 30], [16.7, 18.3, 27.2, 30.3, 30.4],
                    [16.8, 18.4, 27.4, 30.6, 30.7], [17, 18.6, 27.7, 30.9, 31], [17.2, 18.8, 28, 31.2, 31.3]
                ]
            }

            if (ageInMonths >= 0 && ageInMonths <= 22) { matrix = limits23[sex] }
            else { matrix = limits60[sex] }
            return matrix;
        }

            // Script for Data Table Function:
            function dataTable()
            {
                // For Table Header (which generates Search Input):
                const placeholderMap =
                {
                    'ID Number': 'ID Number',
                    'Address or Location of Child\'s Residence': 'Address or Location of Residence',
                    'Last Name of Parent/Guardian': 'Last Name of Parent/Guardian',
                    'First Name of Parent/Guardian': 'First Name of Parent/Guardian',
                    'Last Name of Child': 'Last Name of Child',
                    'First Name of Child': 'First Name of Child',
                    'Sex': 'Sex',
                    'Age in Months': 'Age in Months',
                    'Belongs to IP Group?': 'IP Group?',
                    'Taking Micronutrient Supplementation?': 'On Supplementation?',
                    'Date Measured': 'Date Measured',
                    'Weight (kg)': 'Weight (kg)',
                    'Height (cm)': 'Height (cm)',
                    'Weight for Age Status': 'Weight for Age Status',
                    'Height/Length For Age Status': 'Height/Length for Age Status',
                    'Weight For Length Status': 'Weight for Length Status',
                    'Code Moosaic': 'Powered by Code Moosaic'
                };

                $('#search_bar th').each(function (i)
                {
                    let title = $(this).text();

                    if (title == 'Code Moosaic')
                    {
                        $(this).html
                        (`
                            <input size="15" class="form-control" type="text" disabled placeholder='&#128046; ${placeholderMap[title] || title} &#128046' data-index="${i}" 
                                style="text-align:center; background-color:tranparent; color:black; border:solid 1px 0 1px 0; border-radius:0; opacity: 1; background-color: #fff;" />
                        `);
                    }
                    else
                    {
                        $(this).html
                        (`
                            <input size="15" class="form-control" type="text" placeholder='&#128269; ${placeholderMap[title] || title}' data-index="${i}" 
                                style="text-align:center; color:black; border:solid 1px 0 1px 0; border-radius:0" />
                        `);
                    }
                });

                dataTable = $('#dataTable').DataTable

                ({
                    "ajax":
                    {
                        url: BASE_API + '/datatable',
                        data: function (d) {
                            var fromDate = $('#fromDate').val();
                            var toDate = $('#toDate').val();
                            d.fromDate = fromDate;
                            d.toDate = toDate;
                        }
                    },
                    "initComplete": function()
                    {
                        var dataTableApi = this.api();
                        $('#fromDate, #toDate').on('change', function() {
                            // Trigger DataTable reload upon change of fromDate or toDate
                            dataTable.ajax.reload();
                        });
                        $('#search_bar input').on('keyup change', function()
                        {
                            var columnIndex = $(this).data('index');
                            if (columnIndex === 6)
                            {
                                dataTableApi.column(columnIndex).search('^' + this.value, true, false, true).draw();
                            }
                            else if (columnIndex === 7)
                            {
                                var searchValue = this.value.trim() === '' ? '' : '^' + this.value + '$';
                                dataTableApi.column(columnIndex).search(searchValue, true, false, true).draw();
                            }
                            else if (columnIndex === 14 || columnIndex === 15 || columnIndex === 16)
                            {
                                var searchValue = this.value.trim() === '' ? '' : '^' + this.value + '$';
                                dataTableApi.column(columnIndex).search(searchValue, true, false, true).draw();
                            }
                            else
                            {
                                dataTableApi.column(columnIndex).search(this.value).draw();
                            }
                        });

                        $('.dataTables_info').css({ 'margin-bottom': '15px' });
                    },

                    "info": true, // (number of entries)
                    "ordering": true, // (asc/desc button)
                    "paging": false, // (prev/next page button)
                    

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
                        // {
                        //     data: "id", visible: true,
                        // },
                        // {
                        //     data: "created_at"
                        // },
                        {
                            data: "child_number", visible: true,
                        },
                        {
                            data: "address", visible: true,
                        },
                        {
                            data: "mother_last_name", visible: true,
                            render: function(data, type, row)
                            {
                                var motherLastName = row.mother_last_name;
                                return motherLastName;
                            }
                        },
                        {
                            data: "mother_first_name", visible: true, 
                            render: function(data, type, row)
                            {
                                var motherFirstName = row.mother_first_name;
                                return motherFirstName;
                            }
                        },
                        {
                            data: "child_last_name", visible: true,
                            render: function(data, type, row)
                            {
                                var childLastName = row.child_last_name;
                                return childLastName;
                            }
                        },
                        {
                            data: "child_first_name", visible: true,
                            render: function(data, type, row)
                            {
                                var childFirstName = row.child_first_name;
                                return childFirstName;
                            }
                        },
                        {
                            data: "sex", visible: true,
                            search:
                            {
                                function (data, _, columnData, columnIndex, rowIndex, columnIndexVisible)
                                {
                                    return data.toLowerCase() === this.value.toLowerCase();
                                }
                            }
                        },
                        {
                            data: "age_in_months", visible: true,
                        },
                        {
                            data: "ip_group", visible: true
                        },
                        // {
                        //     data: "birthdate", visible: true,
                        //     render: function(data, type, row)
                        //     {
                        //         return moment(data).format('MMMM D, YYYY')
                        //     }
                        // },
                        {
                            data: "micronutrient", visible: true
                        },
                        {
                            data: "date_measured", visible: true,
                            render: function(data, type, row)
                            {
                                if (data === null)
                                {
                                    return " ";
                                }

                                var dateMeasured = moment(data, 'YYYY-MM-DD');
                                return dateMeasured.format('MMMM D, YYYY');
                            }
                        },
                        {
                            data: "weight", visible: true,
                            render: function(data, type, row)
                            {
                                return data + "kg"
                            }
                        },
                        {
                            data: "height", visible: true,
                            render: function(data, type, row)
                            {
                                return data + "cm"
                            }
                        },
                        // {
                        //     data: "length",
                        //     render: function(data, type, row)
                        //     {
                        //         return data + "cm"
                        //     }
                        // },
                        {
                            data: "weight_for_age_status", visible: true,
                            render: function(data, type, row)
                            {
                                var birthdate = moment(row.birthdate, 'YYYY-MM-DD');
                                var currentDate = moment();
                                var ageInMonths = currentDate.diff(birthdate, 'months');
                                const sex = row.sex;
                                const weight = row.weight;

                                return calculateWeightForAgeStatus(ageInMonths, sex, weight, false);
                            }
                        },
                        {
                            data: "height_length_for_age_status", visible: true,
                            render: function(data, type, row)
                            {
                                const ageInMonths = row.age_in_months;
                                const sex = row.sex;
                                const height = row.height;
                                
                                return calculateHeightLengthForAgeStatus(ageInMonths, sex, height, false);
                            }
                        },
                        {
                            data: "weight_for_length_status", visible: true,
                            render: function(data, type, row)
                            {
                                const ageInMonths = row.age_in_months;
                                const sex = row.sex;
                                const height = row.height;
                                const weight = row.weight
                                
                                return calculateWeightForLengthStatus(height, ageInMonths, weight, sex, false);
                            }
                        },
                        {
                            data: "deleted_at", visible: true,
                            render: function(data, type, row)
                            {
                                if (data == null)
                                {
                                    return `<div class="" style="vertical-align:top; text-align:center">
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-secondary btnReweigh">Reweigh</button>
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

                    // Script for Export to PDF:
                    'dom': 'Blrtip',
                    'buttons':
                    {
                        dom:
                        {
                            button:
                            {
                                tag: 'button',
                                className: '',
                            }
                        },
                        buttons:
                        [{
                            extend: 'pdfHtml5',
                            text: 'Export as PDF',
                            orientation: 'landscape',
                            pageSize: 'A2',
                            exportOptions:
                            {
                                // columns: ':visible',
                                columns: ":not(.not-export-column)",
                                modifier:
                                {
                                    order: 'current'
                                }
                            },
                            className: 'btn btn-dark mb-5',
                            titleAttr: 'PDF Export',
                            extension: '.pdf',
                            download: 'open', // This will open the .pdf file to another tab.

                            title: function()
                            {
                                return "List of {{ $page_title }}"
                            },
                            filename: function()
                            {
                                return "List of {{ $page_title }}"
                            },
                            customize: function(doc)
                            {
                                doc.styles.tableHeader.alignment = 'center';
                            }
                        }]
                    }
                })
            }
            // End of Script for Data Table Function

            // Script for View Function:
            $(document).on('click', '.btnView', function()
            {
                let id = this.id;
                let redirect_to = APP_URL + '/admin/individual_records/individual_record/' + id;

                window.location = redirect_to;
            })
            // End of Script for View Function

            // Script for Refresh Data Table Function:
            function refresh()
            {
                $('#dataTable').DataTable().ajax.reload()
            }
            // End of Script for Refresh Data Table Function

            // Script for Create Function:
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

                form_data.status = 'Active';

                form_data.child_number = (Math.floor(Date.now() * Math.random())).toString().slice(0, 3);

                $.getScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js', function()
                {
                    $.getScript('https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data-10-year-range.min.js', function()
                    {
                        // Additional data fields
                        let today = moment().tz('Asia/Shanghai').format('YYYY-MM-DD');
                        form_data.date_measured = today
                        form_data.weight_for_age_status = calculateWeightForAgeStatus(convert_age_in_months(form_data.birthdate), form_data.sex, form_data.weight, true);
                        form_data.height_length_for_age_status = calculateHeightLengthForAgeStatus(convert_age_in_months(form_data.birthdate), form_data.sex, form_data.height, true);
                        form_data.weight_for_length_status = calculateWeightForLengthStatus(form_data.height,convert_age_in_months(form_data.birthdate), form_data.weight, form_data.sex, true);

                        console.log("form data: " + JSON.stringify(form_data))

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
                                notification('success', "{{ Str::singular($page_title) }}");
                                $("#createForm").trigger("reset");
                                $("#create_card").collapse("hide");
                                refresh();
                                console.log("BIRHLAJSD: " + convert_age_in_months(data.birthdate));
                                // Second AJAX request
                                $.ajax
                                ({
                                    url: API_URL + '/history_of_individual_records',
                                    method: "POST",
                                    data: JSON.stringify
                                    ({
                                        individual_record_id: data.id,
                                        child_number: data.child_number,
                                        address: data.address,
                                        mother_last_name: data.mother_last_name,
                                        mother_first_name: data.mother_first_name,
                                        child_last_name: data.child_last_name,
                                        child_first_name: data.child_first_name,
                                        ip_group: data.ip_group,
                                        micronutrient: data.micronutrient,
                                        sex: data.sex,
                                        birthdate: data.birthdate,
                                        height: data.height,
                                        weight: data.weight,
                                        length: data.length,
                                        age_in_months: convert_age_in_months(data.birthdate),
                                        date_measured: data.date_measured,
                                        weight_for_age_status: calculateWeightForAgeStatus(convert_age_in_months(data.birthdate), data.sex, data.weight, true),
                                        height_length_for_age_status: calculateHeightLengthForAgeStatus(convert_age_in_months(data.birthdate), data.sex, data.height, true),
                                        weight_for_length_status: calculateWeightForLengthStatus(data.height,convert_age_in_months(data.birthdate), data.weight, data.sex, true),
                                    }),
                                    dataType: "JSON",
                                    headers:
                                    {
                                        "Accept": "application/json",
                                        "Content-Type": "application/json",
                                        "Authorization": API_TOKEN,
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(historyData)
                                    {
                                        notification('success', "{{ Str::singular($page_title) }}");
                                        $("#createForm").trigger("reset");
                                        $("#create_card").collapse("hide");
                                        refresh();
                                    },
                                    error: function(error)
                                    {
                                        console.log(error);
                                    }
                                });
                            },
                            error: function(error)
                            {
                                console.log(error);
                                if (error.responseJSON.errors == null)
                                {
                                    swalAlert('warning', error.responseJSON.message);
                                } else
                                {
                                    $.each(error.responseJSON.errors, function(key, value)
                                    {
                                        swalAlert('warning', value);
                                    });
                                }
                            }
                        });
                    });
                });
            });
            // End of Script for Create Function

            // Script for Edit Function:
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
                        console.log("jatsen masarap at hot" + JSON.stringify(data));

                        $('.btnUpdate').attr('id', data.id)
                        $('#address_edit').val(data.address)
                        $('#mother_last_name_edit').val(data.mother_last_name)
                        $('#mother_first_name_edit').val(data.mother_first_name)
                        $('#child_last_name_edit').val(data.child_last_name)
                        $('#child_first_name_edit').val(data.child_first_name)
                        $('#ip_group_edit').val(data.ip_group)
                        $('#micronutrient_edit').val(data.micronutrient)
                        $('#sex_edit').val(data.sex)
                        $('#birthdate_edit').val(data.birthdate)
                        $('#height_edit').val(data.height)
                        $('#weight_edit').val(data.weight)

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

            // Script for Update Function edit:
            $(document).on('click', '.btnUpdate', function()
            {
                let id = this.id;
                console.log(id)
                let form_url = BASE_API + '/' + id;

                // Form Data:
                let form = $("#editForm").serializeArray();
                let form_data = {}

                $.each(form, function()
                {
                    form_data[[this.name.slice(0, -5)]] = this.value;
                })

                // Additional data fields
                form_data.weight_for_age_status = calculateWeightForAgeStatus(convert_age_in_months(form_data.birthdate), form_data.sex, form_data.weight, true);
                form_data.height_length_for_age_status = calculateHeightLengthForAgeStatus(convert_age_in_months(form_data.birthdate), form_data.sex, form_data.height, true);
                form_data.weight_for_length_status = calculateWeightForLengthStatus(form_data.height,convert_age_in_months(form_data.birthdate), form_data.weight, form_data.sex, true);

                console.log("ugh jatsen why so sarap" + JSON.stringify(form_data));

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
                            console.log("pogi si jatsen, sobrang sarap niya" + JSON.stringify(data)); 

                            storeHistoryOfIndividualRecord(data);
                            notification('info', "{{ Str::singular($page_title) }}");
                            refresh();
                            $('#editModal').modal('hide');
                            console.log(data);
                        },
                        error: function(error)
                        {
                            console.log(error);
                            if (error.responseJSON.errors == null)
                            {
                                swalAlert('warning', error.responseJSON.message);
                            } else
                            {
                                $.each(error.responseJSON.errors, function(key, value)
                                {
                                    swalAlert('warning', value);
                                });
                            }
                        }
                    });

            })
            // End of Script for Update Function for edit

            // Script for Reweigh Function:
            $(document).on('click', '.btnReweigh', function()
            {
                let id = this.id;
                let form_url = BASE_API + '/' + id;
                console.log("id: " + id);
                
                $.getScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js', function()
                {
                    $.getScript('https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone-with-data-10-year-range.min.js', function()
                    {
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
                                console.log("jatsen lang masarap" + JSON.stringify(data));

                                $('.btnUpdateReweigh').attr('id', data.id);
                                $('#child_last_name_reweigh').val(data.child_last_name);
                                $('#child_first_name_reweigh').val(data.child_first_name);

                                let today = moment().tz('Asia/Shanghai').format('YYYY-MM-DD');
                                $('#date_measured_edit').val(today);
                                $('#date_measured_hidden').val(today);
                                
                                $('#height_edit').val(data.height);
                                $('#weight_edit').val(data.weight);

                                tempWeight = data.weight;
                                tempHeight = data.height;
                                tempIndividualId = data.id;
                                tempDateRecorded = data?.updated_at ?? data.created_at;
                                $('#reweighModal').modal('show');
                            },
                            error: function(error)
                            {
                                console.log(error);
                                if (error.responseJSON.errors == null)
                                {
                                    swalAlert('warning', error.responseJSON.message);
                                }
                                else
                                {
                                    $.each(error.responseJSON.errors, function(key, value)
                                    {
                                        swalAlert('warning', value);
                                    });
                                }
                            }
                        });
                    });
                });
            });
            // End of Script for Reweigh Function

            // Script for Update Function for Reweigh:
            $(document).on('click', '.btnUpdateReweigh', function()
            {
                let id = this.id;
                console.log(id)
                let form_url = BASE_API + '/' + id;

                // Form Data:   
                let form = $("#reweighForm").serializeArray();
                let form_data = {}

                $.each(form, function() {
                    let field_name = this.name.slice(0, -5); // Remove the "_edit" suffix
                    let field_value = this.value;

                    // Populate form_data with each form field
                    form_data[field_name] = field_value;

                    // Calculate age_in_months, weight_for_age_status, and height_length_for_age_status for each form field
                    if (field_name === 'birthdate') {
                        form_data.age_in_months = convert_age_in_months(field_value);
                        form_data.weight_for_age_status = calculateWeightForAgeStatus(form_data.age_in_months, form_data.sex, form_data.weight, true);
                        form_data.height_length_for_age_status = calculateHeightLengthForAgeStatus(form_data.age_in_months, form_data.sex, form_data.height, true);
                        form_data.weight_for_length_status = calculateWeightForLengthStatus(form_data.height,convert_age_in_months(form_data.birthdate), form_data.weight, form_data.sex, true);
                    }
                });

                // Use the value of #date_measured_edit as the value for date_measured
                let measured_date = $('#date_measured_hidden').val();
                form_data.date_measured = measured_date;

            console.log("form data: " + JSON.stringify(form_data));

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
                            console.log("jatsen masarap na, hot pa, kaya kagat na!" + JSON.stringify(data));

                            $.ajax
                            ({
                                url: API_URL + '/history_of_individual_records',
                                method: "POST",
                                data: JSON.stringify
                                ({
                                    individual_record_id: data.id,
                                    child_number: data.child_number,
                                    address: data.address,
                                    mother_last_name: data.mother_last_name,
                                    mother_first_name: data.mother_first_name,
                                    child_last_name: data.child_last_name,
                                    child_first_name: data.child_first_name,
                                    ip_group: data.ip_group,
                                    micronutrient: data.micronutrient,
                                    sex: data.sex,
                                    birthdate: data.birthdate,
                                    date_measured: data.date_measured,
                                    height: data.height,
                                    weight: data.weight,
                                    length: data.length,
                                    age_in_months: data.age_in_months,
                                    weight_for_age_status: calculateWeightForAgeStatus(convert_age_in_months(data.birthdate), data.sex, data.weight, true),
                                    height_length_for_age_status: calculateHeightLengthForAgeStatus(convert_age_in_months(data.birthdate), data.sex, data.height, true),
                                    weight_for_length_status: calculateWeightForLengthStatus(data.height,convert_age_in_months(data.birthdate), data.weight, data.sex, true),
                                }),
                                dataType: "JSON",
                                headers:
                                {
                                    "Accept": "application/json",
                                    "Content-Type": "application/json",
                                    "Authorization": API_TOKEN,
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(historyData)
                                {
                                    notification('success', "{{ Str::singular($page_title) }}");
                                    $("#createForm").trigger("reset");
                                    $("#create_card").collapse("hide");
                                    refresh();
                                },
                                error: function(error)
                                {
                                    console.log(error);
                                }
                            });
                            notification('info', "{{ Str::singular($page_title) }}");
                            refresh();
                            $('#reweighModal').modal('hide');
                            console.log(data);
                        },
                        error: function(error)
                        {
                            console.log(error);
                            if (error.responseJSON.errors == null)
                            {
                                swalAlert('warning', error.responseJSON.message);
                            }
                            else
                            {
                                $.each(error.responseJSON.errors, function(key, value)
                                {
                                    swalAlert('warning', value);
                                });
                            }
                        }
                    });

            })
            // End of Script for Update Function

            // Script for Soft-Delete Function:
            $(document).on("click", ".btnDelete", function()
            {
                let id = this.id;
                let form_url = BASE_API + '/' + id

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
                        console.log(data)
                        Swal.fire
                        ({
                            title: "Are you sure?",
                            text: "You won't able to revert this.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "red",
                            confirmButtonText: "Yes, remove it!",
                        }).then((result) =>
                        {
                            if (result.isConfirmed)
                            {
                                $.ajax
                                ({
                                    url: BASE_API + '/destroy/' + data.id,
                                    method: "DELETE",
                                    headers:
                                    {
                                        "Accept": "application/json",
                                        "Authorization": API_TOKEN,
                                        "Content-Type": "application/json",
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },

                                    success: function(data)
                                    {
                                        notification('error', "{{ Str::singular($page_title) }}")
                                        refresh();
                                    },
                                    error: function(error)
                                    {
                                        $.each(error.responseJSON.errors,
                                            function(key, value)
                                            {
                                                swalAlert('warning', value)
                                            });
                                        console.log(error)
                                        console.log(`message: ${error.responseJSON.message}`)
                                        console.log(`status: ${error.status}`)
                                    }
                                })
                            }
                        });
                    },

                    error: function(error)
                    {
                        $.each(error.responseJSON.errors, function(key, value)
                        {
                            swalAlert('warning', value)
                        });
                        console.log(error)
                        console.log(`message: ${error.responseJSON.message}`)
                        console.log(`status: ${error.status}`)
                    }
                })
            });
            // End of Script for Soft-Delete Function

            var jq = jQuery.noConflict();

            jq(document).ready(function()
            {
                jq('#dataTable').DataTable({ });

                jq('#reloadButton').on('click', function()
                {
                    jq('#dataTable').DataTable().ajax.reload();
                });
            });

            // Function Calling:
            dataTable();
        })
    </script>
@endsection