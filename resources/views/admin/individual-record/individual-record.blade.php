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
                                <input type="date" class="form-control" id="date_measured_hidden" name="date_measured_hidden" disabled tabindex="1" style="opacity: 1; background-color: #fff;">
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
            
            <div class="table-responsive">
                <table class="table table-hover table-sm table-borderless" id="dataTable"
                    style="width: 265%; table-layout:fixed; text-align:center; border:1px solid black; border-radius:5px">
                
                    <thead>

                        <tr class="text-dark" id="search_bar">
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
                if (database){
                    return result
                } else {
                    return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
                }
            }

            // Script for Height/Length for Age Status:
            function calculateHeightLengthForAgeStatus(ageInMonths, sex, height, database)
            {
                let result = "Unknown";
                let statusClass = "";

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
                }
                if (database){
                    return result
                } else {
                    return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
                }
            }

            // Script for Weight for Length Status:
            function calculateWeightForLengthStatus(ageInMonths, sex, height)
            {
                let result = "Unknown";
                let statusClass = "";

                function setWeightForLengthStatus(severelyStuntedLimit, stuntedLimit, normalLimit, tallLimit)
                {
                    if (height <= severelyStuntedLimit) { result = "Severely Stunted"; statusClass = "bg-danger"; }
                    else if (height >= stuntedLimit && height <= normalLimit) { result = "Stunted"; statusClass = "bg-warning"; }
                    else if (height >= normalLimit && height <= tallLimit) { result = "Normal"; statusClass = "bg-success"; }
                    else if (height > tallLimit) { result = "Tall"; statusClass = "bg-primary"; }
                }

                switch (ageInMonths) // (input data ranges here)
                {
                    case 0:
                        if (sex === "Male") { setWeightForLengthStatus(44.1, 44.2, 46.1, 53.8); }
                        else if (sex === "Female") { setWeightForLengthStatus(43.5, 43.6, 45.4, 53.0); }
                        break;
                    case 1:
                        if (sex === "Male") { setWeightForLengthStatus(48.8, 48.9, 50.8, 58.7); }
                        else if (sex === "Female") { setWeightForLengthStatus(47.7, 47.8, 49.8, 57.7); }
                        break;
                    case 2:
                        if (sex === "Male") { setWeightForLengthStatus(52.3, 52.4, 54.4, 62.5); }
                        else if (sex === "Female") { setWeightForLengthStatus(50.9, 51.0, 53.0, 61.2); }
                        break;
                    case 3:
                        if (sex === "Male") { setWeightForLengthStatus(55.2, 55.3, 57.3, 65.6); }
                        else if (sex === "Female") { setWeightForLengthStatus(53.4, 53.5, 55.6, 64.1); }
                        break;
                    case 4:
                        if (sex === "Male") { setWeightForLengthStatus(57.5, 57.6, 59.7, 68.1); }
                        else if (sex === "Female") { setWeightForLengthStatus(55.5, 55.6, 57.8, 66.5); }
                        break;
                    case 5:
                        if (sex === "Male") { setWeightForLengthStatus(59.5, 59.6, 61.7, 70.2); }
                        else if (sex === "Female") { setWeightForLengthStatus(57.3, 57.4, 59.6, 68.6); }
                        break;
                    case 6:
                        if (sex === "Male") { setWeightForLengthStatus(61.1, 61.2, 63.3, 72.0); }
                        else if (sex === "Female") { setWeightForLengthStatus(58.8, 58.9, 61.2, 70.4); }
                        break;
                    case 7:
                        if (sex === "Male") { setWeightForLengthStatus(62.6, 62.7, 64.8, 73.6); }
                        else if (sex === "Female") { setWeightForLengthStatus(60.2, 60.3, 62.7, 72.0); }
                        break;
                    case 8:
                        if (sex === "Male") { setWeightForLengthStatus(63.9, 64.0, 66.2, 75.1); }
                        else if (sex === "Female") { setWeightForLengthStatus(61.6, 61.7, 64.0, 73.6); }
                        break;
                    case 9:
                        if (sex === "Male") { setWeightForLengthStatus(65.1, 65.2, 67.5, 76.6); }
                        else if (sex === "Female") { setWeightForLengthStatus(62.8, 62.9, 65.3, 75.1); }
                        break;
                    case 10:
                        if (sex === "Male") { setWeightForLengthStatus(66.3, 66.4, 68.7, 78.0); }
                        else if (sex === "Female") { setWeightForLengthStatus(64.0, 64.1, 66.5, 76.5); }
                        break;
                    case 11:
                        if (sex === "Male") { setWeightForLengthStatus(67.5, 67.6, 69.9, 79.3); }
                        else if (sex === "Female") { setWeightForLengthStatus(65.1, 65.2, 67.7, 77.9); }
                        break;
                    case 12:
                        if (sex === "Male") { setWeightForLengthStatus(68.5, 68.6, 71.0, 80.6); }
                        else if (sex === "Female") { setWeightForLengthStatus(66.2, 66.3, 68.9, 79.3); }
                        break;
                }
                return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
                // if (database){
                //     return result
                // } else {
                //     return `<span class="badge rounded-1 fw-semibold ${statusClass}">${result}</span>`;
                // }       
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
                        url: BASE_API + '/datatable'
                    },

                    "initComplete": function()
                    {
                        var dataTableApi = this.api();

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
                        //     data: "id"
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
                                
                                return calculateWeightForLengthStatus(ageInMonths, sex, height);
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
                            className: 'btn btn-dark mb-4',
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
                                doc.styles.tableHeader.alignment = 'left';
                            }
                        }]
                    },


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
                        notification('success', "{{ Str::singular($page_title) }}");
                        $("#createForm").trigger("reset");
                        $("#create_card").collapse("hide");
                        refresh();
                        console.log("BIRHLAJSD: " + convert_age_in_months(data.birthdate));
                        // Second AJAX request
                        $.ajax({
                            url: API_URL + '/history_of_individual_records',
                            method: "POST",
                            data: JSON.stringify({
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
                                height_for_age_status: calculateHeightLengthForAgeStatus(convert_age_in_months(data.birthdate), data.sex, data.height, true),
            
                            }),
                            dataType: "JSON",
                            headers: {
                                "Accept": "application/json",
                                "Content-Type": "application/json",
                                "Authorization": API_TOKEN,
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(historyData) {
                                notification('success', "{{ Str::singular($page_title) }}");
                                $("#createForm").trigger("reset");
                                $("#create_card").collapse("hide");
                                refresh();
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        if (error.responseJSON.errors == null) {
                            swalAlert('warning', error.responseJSON.message);
                        } else {
                            $.each(error.responseJSON.errors, function(key, value) {
                                swalAlert('warning', value);
                            });
                        }
                    }
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

                $.each(form, function()
                {
                    form_data[[this.name.slice(0, -5)]] = this.value;
                });

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
                                    date_measured: data.date_measured,
                                    ip_group: data.ip_group,
                                    micronutrient: data.micronutrient,
                                    sex: data.sex,
                                    birthdate: data.birthdate,
                                    height: data.height,
                                    weight: data.weight,
                                    length: data.length,
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