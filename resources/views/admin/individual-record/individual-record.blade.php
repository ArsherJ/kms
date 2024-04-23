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
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Address or Location of Child's Residence:</label>
                                <input type="text" class="form-control" id="address_edit" name="address_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Contact Number:</label>
                                <input type="tel" class="form-control" id="phone_number_edit" name="phone_number_edit" pattern="09[0-9]{9}"
                                placeholder="Format: 09XXXXXXXXX" minlength="11" maxlength="11" tabindex="1" required>
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
                                    <option value="" disabled selected>-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Belongs to IP Group:</label>
                                <select class="form-control" id="ip_group_edit" name="ip_group_edit" tabindex="1">
                                    <option value="" disabled selected>-- Select Class --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" class="form-control" id="height_edit" name="height_edit" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Weight (kg):</label>
                                <input type="number" class="form-control" id="weight_edit" name="weight_edit" tabindex="1" required>
                            </div>

                            <input type="hidden" id="date_measured_edit" name="date_measured_edit">
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
                                <input type="date" class="form-control" id="date_measured_reweigh" name="date_measured_reweigh" tabindex="1">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" class="form-control" id="height_reweigh" name="height_reweigh" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Weight (kg):</label>
                                <input type="number" class="form-control" id="weight_reweigh" name="height_reweigh" tabindex="1" required>
                            </div>

                            <input type="hidden" id="birthdate_reweigh" name="birthdate_reweigh">
                        </div>
                    </form>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" onclick="$(this).closest('.modal').modal('hide')" style="border:solid 1px gray">Close</button>
                    <button type="submit" class="btn btn-success btnUpdateReweigh">Save</button>
                </div>

            </div>
        </div>
    </div>
    {{-- END OF REWEIGH MODAL --}}

    {{-- COMPLEMENTARY FEEDING MODAL --}}
    <div id="feedingModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">

                    <h3 class="card-title fw-semibold mb-4 text-black">► Add to Complementary Feeding List</h3>

                    <form id="feedingForm">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's Last Name:</label>
                                <input type="text" class="form-control" id="child_last_name_feeding" name="child_last_name_feeding" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's First Name:</label>
                                <input type="text" class="form-control" id="child_first_name_feeding" name="child_first_name_feeding" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Sex:</label>
                                <input type="text" class="form-control" id="sex_feeding" name="sex_feeding" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Date of Birth (mm-dd-yyyy):</label>
                                <input type="date" class="form-control" id="birthdate_feeding" name="birthdate_feeding" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Age in Months:</label>
                                <input type="text" class="form-control" id="age_in_months_feeding" name="age_in_months_feeding" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" onclick="$(this).closest('.modal').modal('hide')" style="border:solid 1px gray">Close</button>
                    <button type="button" class="btn btn-success btnUpdateFeeding">Add this Child to Complementary Feeding List</button>
                </div>

            </div>
        </div>
    </div>
    {{-- END OF COMPLEMENTARY FEEDING MODAL --}}
    
    {{-- MICRONUTRIENT MODAL --}}
    <div id="nutrientModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">

                    <h3 class="card-title fw-semibold mb-4 text-black">► Administer Micronutrient Supplementation</h3>

                    <form id="nutrientForm">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's Last Name:</label>
                                <input type="text" class="form-control" id="child_last_name_nutrient" name="child_last_name_nutrient" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Child's First Name:</label>
                                <input type="text" class="form-control" id="child_first_name_nutrient" name="child_first_name_nutrient" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Sex:</label>
                                <input type="text" class="form-control" id="sex_nutrient" name="sex_nutrient" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Date of Birth (mm-dd-yyyy):</label>
                                <input type="date" class="form-control" id="birthdate_nutrient" name="birthdate_nutrient" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Age in Months:</label>
                                <input type="text" class="form-control" id="age_in_months_nutrient" name="age_in_months_nutrient" tabindex="1"
                                disabled style="opacity: 1; background-color: #fff;">
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Taking Micronutrient Supp.:</label>
                                <select class="form-control" id="micronutrient_nutrient" name="micronutrient_nutrient" tabindex="1">
                                    <option value="" disabled selected>-- Select Supplementation --</option>
                                    <option value="Vitamin A">Vitamin A</option>
                                    <option value="Iron">Iron</option>
                                    <option value="Iodine">Iodine</option>
                                    <option value="" disabled>-- If none, please select No --</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Date Given (mm-dd-yyyy):</label>
                                <input type="date" class="form-control" id="nutrient_given_date_nutrient" name="nutrient_given_date_nutrient" tabindex="1" required>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" onclick="$(this).closest('.modal').modal('hide')" style="border:solid 1px gray">Close</button>
                    <button type="button" class="btn btn-success btnUpdateNutrient">Save</button>
                </div>

            </div>
        </div>
    </div>
    {{-- END OF MICRONUTRIENT MODAL --}}

    {{-- UPLOAD FORM --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

    <script>
        function closeModalAndClearFile()
        {
            // Clear the file input value
            $('#excelFile').val('');

           // Hide the modal
            $('#uploadModal').modal('hide');
        }
    </script>
    
    <div id="uploadModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" id="uploadCollapseModal">
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-semibold mb-4 text-black">► Upload Multiple Record</h5>
                        <a href="{{ asset('download/MultiIndividualFormat.xlsx') }}">
                            <button class="btn btn-sm btn-dark float-end">Download Excel Format</button>
                        </a>
                    </div>
                    <div class="row">
                        <form id="uploadForm" action="" method="post" name="uploadForm" data-parsley-validate>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <label class="required-input" style="font-weight:bold; margin-bottom:10px">Import File:</label>
                                        </div>
                                        <input type="file" class="form-control" id="excelFile" name="file" tabindex="1" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" onclick="closeModalAndClearFile()" style="border:solid 1px gray">Close</button>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Address or Location of Child's Residence:</label>
                                <input type="text" class="form-control" id="address" name="address" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Contact Number:</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" pattern="09[0-9]{9}"
                                placeholder="Format: 09XXXXXXXXX" minlength="11" maxlength="11" tabindex="1" required>
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
                                    <option value="" disabled selected>-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required-input" style="font-weight:bold">Belongs to IP Group:</label>
                                <select class="form-control" id="ip_group" name="ip_group" tabindex="1" required>
                                    <option value="" disabled selected>-- Select Class --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <br/>

                        <div class="row" style="margin-top:-15px">
                            <div class="form-group col-md-6">
                                <label class="required-input" style="font-weight:bold">Height (cm):</label>
                                <input type="number" step="0.01" class="form-control" id="height" name="height" tabindex="1" required>
                            </div>
                            <div class="form-group col-md-6">
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
                    &nbsp;
                <div style="display: inline-flex;">
                    <input type="date" id="fromDate" class="form-control mr-2">
                        &nbsp;
                    <input type="date" id="toDate" class="form-control">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm table-borderless" id="dataTable"
                    style="width: 385%; table-layout:fixed; text-align:center; border:1px solid black; border-radius:5px">
                
                    <thead>

                        <tr class="text-dark" id="search_bar">
                            <th style="width:10%; padding:15px 0 15px 0;">ID Number</th>
                            <th style="width:25%; padding:15px 0 15px 0">Address or Location of Child's Residence</th>
                            <th style="width:15%; padding:15px 0 15px 0">Contact Number</th>
                            <th style="width:15%; padding:15px 0 15px 0">Last Name of Parent/Guardian</th>
                            <th style="width:15%; padding:15px 0 15px 0">First Name of Parent/Guardian</th>
                            <th style="width:15%; padding:15px 0 15px 0">Last Name of Child</th>
                            <th style="width:15%; padding:15px 0 15px 0">First Name of Child</th>
                            <th style="width:5%; padding:15px 0 15px 0">Sex</th>
                            <th style="width:10%; padding:15px 0 15px 0">Age in Months</th>
                            <th style="width:10%; padding:15px 0 15px 0">Belongs to IP Group?</th>
                            <th style="width:25%; padding:15px 0 15px 0">Taking Micronutrient Supplementation?</th>
                            <th style="width:15%; padding:15px 0 15px 0">Supplement Date Given</th>
                            <th style="width:20%; padding:15px 0 15px 0">Complementary Feeding Candidate?</th>
                            <th style="width:10%; padding:15px 0 15px 0">Weight (kg)</th>
                            <th style="width:10%; padding:15px 0 15px 0">Height (cm)</th>
                            <th style="width:15%; padding:15px 0 15px 0">Date Measured</th>
                            <th style="width:15%; padding:15px 0 15px 0">Weight for Age Status</th>
                            <th style="width:15%; padding:15px 0 15px 0">Height/Length for Age Status</th>
                            <th style="width:15%; padding:15px 0 15px 0">Weight for Length Status</th>
                            <th style="width:20%; padding:15px 0 15px 0"></th>
                            <th style="width:20%; padding:15px 0 15px 0"></th>
                        </tr>

                        <tr class="text-dark">
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">ID Number</th>
                            <th class="bg-dark" style="width:25%; text-align:center; color: white; border-right:2px solid white;">Address or Location of Child's Residence</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Contact Number</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Last Name of Parent/Guardian</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">First Name of Parent/Guardian</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Last Name of Child</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">First Name of Child</th>
                            <th class="bg-dark" style="width:5%; text-align:center; color: white; border-right:2px solid white;">Sex</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Age in Months</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Belongs to IP Group?</th>
                            <th class="bg-dark" style="width:25%; text-align:center; color: white; border-right:2px solid white;">Taking Micronutrient Supplementation?</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Supplement Date Given</th>
                            <th class="bg-dark" style="width:20%; text-align:center; color: white; border-right:2px solid white;">Complementary Feeding Candidate?</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Weight (kg)</th>
                            <th class="bg-dark" style="width:10%; text-align:center; color: white; border-right:2px solid white;">Height (cm)</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Date Measured</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Weight for Age Status</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Height/Length for Age Status</th>
                            <th class="bg-dark" style="width:15%; text-align:center; color: white; border-right:2px solid white;">Weight for Length Status</th>
                            <th class="bg-dark not-export-column" style="width:20%; text-align:center; color: white"></th>
                            <th class="bg-dark not-export-column" style="width:20%; text-align:center; color: white"></th>
                        </tr>

                    </thead>

                    <tbody></tbody>
                    
                </table>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function()
        {
            $(document).on("click", "#dataTable tbody tr", function() {
                console.log("Row clicked!");
                $(this).toggleClass("highlighted-row");
            });
        });
    </script>

    <style>
        .highlighted-row
        {
            background-color: #023e8a !important;
            color: white !important;
        }
    </style>
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

            function convert_age_in_months(birthdate, date_measured)
            {
                birthdate = moment(birthdate, 'YYYY-MM-DD');
                date_measured = moment(date_measured, 'YYYY-MM-DD');
                var ageInMonths = date_measured.diff(birthdate, 'months');

                return ageInMonths;
            }
            
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
                        phone_number: data.phone_number,
                        mother_last_name: data.mother_last_name,
                        mother_first_name: data.mother_first_name,
                        child_last_name: data.child_last_name,
                        child_first_name: data.child_first_name,
                        ip_group: data.ip_group,
                        micronutrient: data.micronutrient,
                        nutrient_given_date: data.nutrient_given_date,
                        feeding_candidate: data.feeding_candidate,
                        sex: data.sex,
                        birthdate: data.birthdate,
                        height: data.height,
                        weight: data.weight,
                        length: data.length,
                        age_in_months: convert_age_in_months(data.birthdate, data.date_measured),
                        date_measured: data.date_measured,
                        weight_for_age_status: calculateWeightForAgeStatus(convert_age_in_months(data.birthdate, data.date_measured), data.sex, data.weight, true),
                        height_length_for_age_status: calculateHeightLengthForAgeStatus(convert_age_in_months(data.birthdate, data.date_measured), data.sex, data.height, true),
                        weight_for_length_status: calculateWeightForLengthStatus(data.height,convert_age_in_months(data.birthdate, data.date_measured), data.weight, data.sex, true),
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
                        // notification('success', "{{ Str::singular($page_title) }}");
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

                // Check if the file is empty
                if (!excelFile)
                {
                    swalAlert('warning', 'Please select a file to upload.');
                    return; // Exit function early if file is empty
                }

                let reader = new FileReader();

                reader.onload = function(e)
                {
                    // Parse the data from the file
                    let workbook = XLSX.read(e.target.result, {type: 'binary'});

                    // Get the first sheet
                    let firstSheetName = workbook.SheetNames[0];
                    let firstSheet = workbook.Sheets[firstSheetName];

                    // Check if any cells in the sheet have non-empty values
                    let isEmpty = true;
                    for (let cellAddress in firstSheet) {
                        if (firstSheet.hasOwnProperty(cellAddress)) {
                            let cellValue = firstSheet[cellAddress].v;
                            if (cellValue !== undefined && cellValue !== null && cellValue !== '')
                            {
                                isEmpty = false;
                                break;
                            }
                        }
                    }

                    // Check if the sheet is empty
                    if (isEmpty)
                    {
                        swalAlert('warning', 'The selected file is empty.');
                        return; // Exit function if sheet is empty
                    }

                    // Proceed with file upload since it's not empty
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
                            $('#uploadForm')[0].reset(); // Use form's reset() method instead
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
                };

                // Read the file as binary data
                reader.readAsBinaryString(excelFile);
            });

            $('.btnUpload').on('click', function ()
            {
                $('#uploadModal').modal('show');
            });
            // End of Script for Upload Excel File

            // Script for Weight for Age Status:
            function calculateWeightForAgeStatus(ageInMonths, sex, weight, database)
            {
                let result = "Out of Range";
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
                let result = "Out of Range";
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
            
            // Script for Weight For Length Status:
            function calculateWeightForLengthStatus(height, ageInMonths, weight, sex, database)
            {
                let result = "Out of Range";
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
                    'Contact Number': 'Contact Number',
                    'Last Name of Parent/Guardian': 'Last Name of Parent/Guardian',
                    'First Name of Parent/Guardian': 'First Name of Parent/Guardian',
                    'Last Name of Child': 'Last Name of Child',
                    'First Name of Child': 'First Name of Child',
                    'Sex': 'Sex',
                    'Age in Months': 'Age in Months',
                    'Belongs to IP Group?': 'IP Group?',
                    'Taking Micronutrient Supplementation?': 'On Supplementation?',
                    'Supplement Date Given': 'Supp. Date Given (mm-dd-yyyy)',
                    'Complementary Feeding Candidate?': 'Feeding Candidate?',
                    'Weight (kg)': 'Weight (kg)',
                    'Height (cm)': 'Height (cm)',
                    'Date Measured': 'Date Measured (mm-dd-yyyy)',
                    'Weight for Age Status': 'Weight for Age Status',
                    'Height/Length For Age Status': 'Height/Length for Age Status',
                    'Weight For Length Status': 'Weight for Length Status',
                    'Action Buttons': '',
                    'Code Moosaic': '',
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
                    else if (title == 'Action Buttons')
                    {
                        $(this).html
                        (`
                            <input size="15" class="form-control" type="text" disabled placeholder='&#128218; ${placeholderMap[title] || title} &#128218' data-index="${i}" 
                                style="text-align:center; background-color:tranparent; color:black; border:solid 1px 0 1px 0; border-radius:0; opacity: 1; background-color: #fff;" />
                        `);
                    }
                    else if (title == '')
                    {
                        $(this).html
                        (`
                            <type="text" disabled data-index="${i}" style="text-align:center; background-color:tranparent; color:black;
                            border:solid 1px 0 1px 0; border-radius:0; opacity: 1; background-color: #fff;" />
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
                            
                            if (columnIndex === 7) // Column for Sex
                            {
                                dataTableApi.column(columnIndex).search('^' + this.value, true, false, true).draw();
                            }
                            else if (columnIndex === 8) // Column for Age in Months
                            {
                                var searchValue = this.value.trim() === '' ? '' : '^' + this.value + '$';
                                dataTableApi.column(columnIndex).search(searchValue, true, false, true).draw();
                            }
                            else if (columnIndex === 16)
                            {
                                dataTableApi.column(columnIndex).search('^' + this.value, true, false, true).draw();
                            }
                            else if (columnIndex === 17)
                            {
                                dataTableApi.column(columnIndex).search('^' + this.value, true, false, true).draw();
                            }
                            else if (columnIndex === 18)
                            {
                                dataTableApi.column(columnIndex).search('^' + this.value, true, false, true).draw();
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
                        {
                            // Column 0
                            data: "id", visible: true,
                        },
                        {
                            // Column 1
                            data: "address", visible: true,
                        },
                        {
                            // Column 2
                            data: "phone_number", visible: true,
                            render: function(data, type, row)
                            {
                                var phoneNumber = row.phone_number;
                                return phoneNumber;
                            }
                        },
                        {
                            // Column 3
                            data: "mother_last_name", visible: true,
                            render: function(data, type, row)
                            {
                                var motherLastName = row.mother_last_name;
                                return motherLastName;
                            }
                        },
                        {
                            // Column 4
                            data: "mother_first_name", visible: true, 
                            render: function(data, type, row)
                            {
                                var motherFirstName = row.mother_first_name;
                                return motherFirstName;
                            }
                        },
                        {
                            // Column 5
                            data: "child_last_name", visible: true,
                            render: function(data, type, row)
                            {
                                var childLastName = row.child_last_name;
                                return childLastName;
                            }
                        },
                        {
                            // Column 6
                            data: "child_first_name", visible: true,
                            render: function(data, type, row)
                            {
                                var childFirstName = row.child_first_name;
                                return childFirstName;
                            }
                        },
                        {
                            // Column 7
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
                            // Column 8
                            data: "age_in_months", visible: true,
                        },
                        {
                            // Column 9
                            data: "ip_group", visible: true
                        },
                        {
                            // Column 10
                            data: "micronutrient", visible: true
                        },
                        {
                            // Column 11
                            data: "nutrient_given_date", visible: true,
                            render: function(data, type, row)
                            {
                                if (data === null)
                                {
                                    return "N/A";
                                }

                                var nutrientGivenDate = moment(data, 'YYYY-MM-DD');
                                return nutrientGivenDate.format('MMMM D, YYYY');
                            }
                        },
                        {
                            // Column 12
                            data: "feeding_candidate", visible: true
                        },
                        {
                            // Column 13
                            data: "weight", visible: true,
                            render: function(data, type, row)
                            {
                                return data + "kg"
                            }
                        },
                        {
                            // Column 14
                            data: "height", visible: true,
                            render: function(data, type, row)
                            {
                                return data + "cm"
                            }
                        },
                        {
                            // Column 15
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
                            // Column 16
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
                            // Column 17
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
                            // Column 18
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
                            // Column 19
                            data: "deleted_at", visible: true,
                            render: function(data, type, row)
                            {
                                if (data == null)
                                {
                                    return `<div class="" style="vertical-align:top; text-align:center">
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-outline-secondary btnReweigh">Reweigh</button>
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-outline-success btnFeeding">Feeding</button>
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-outline-warning btnNutrient">Micronutrient</button>
                                        </div>`;
                                }
                                else
                                {
                                    return '<button class="btn btn-danger btn-sm">Activate</button>';
                                }
                            }
                        },
                        {
                            // Column 20
                            data: "deleted_at", visible: true,
                            render: function(data, type, row)
                            {
                                if (data == null)
                                {
                                    return `<div class="" style="vertical-align:top; text-align:center">
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-info btnView">View</button>
                                            <button id="${row.id}" type="button" class="btn btn-sm btn-warning btnEdit">Update</button>
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
                        [0, "asc"]
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
                            pageSize: 'A1',
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
                                doc.content.splice( 0, 0,
                                {
                                    margin: [ 0, 0, 0, 0 ],
                                    alignment: 'center',
                                    image: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAABdCAMAAABO6uh0AAADAFBMVEVHcEwTExMyMjJFRklxcX1EREcoKClubnDh4uQ6OjtSU2ISEhIvLy+jqqZBQUMsLCoODg40NDQUFBQaGhodHR0VFRUREREREREdHR0QEBAYGBgMDAwUFBQPDw8TExMWFhYPDw8QEBAfcUMaGhoMDAwAAAAFBQWopRAyMi4FBQUSEhIICAgLCwsEBAQZGRkPDw8MDAwWFhYWFhacmxGVkBXw9/QICAhybx1jYSNWVCh6vZm0qxAcHBxvrIxfuoiCfhmf0rcFBQUgICBJSDBDs3XG49QkjFNHpXIJCQUuhlZQsXyLyqnR6Nw3jV7e8efX7OHv9vITrFgpsWdKu30mJibo9O0meUvs9vHG5tVyxJbs9vHt9vGb07V9yaCf1bio2b4XFxcA8m7///8Aolf+8gHhsm7jt3f65N3639b+/v71r5/9+/r0n4z+TgH1pZL66uT67gT8+PXImWj53M7xiXH4zcL41Mvyd1vzjnfxcVQEn1QPmlL4xrrSygz1taXGvw7yfmP0qpnz6Qb88+9tf1vxlYAafUPt5QkJj0u5tA/EkmHb0wri2Qj67+v1uqvp5N31moX9XwHzg2rfrWSXbU99vJvLo2+Si08Th0Yepl0weje41McIrFLn8Or62cKwi1ykm1+qfEOCgWbhun14rrX3v7JPk1LX597yYjxtrI76cBdniSDev6v7u5Lr2s7V5/jq3geEmSDfoBBLgC2Yg3Mzr2q+iDvdhAu9vqqPiQ/8yqpObC6gdFf8j0fa2xb60bXmzLtRTwv6m13yUAP8gTDFr4qOsY3cvwcwk1KRs7m0oGL7sYB8fkzZ1MV9eA2+yCRvXSaoujH7xKDD1uD8qG9pZQvpaUyusZU6mZJ2nabh4BO5ZRXZmlFikDfZaxFwlVScsjbR1RqfcCKKpUDoWxHZu5Tgs1v4+/vzwQnVTg8tKwh8om6zwirI0CDfdFXA3feHinvXlXWHYh7brZvYo4jeejkjnEdilm7WHhvfi2zLyXTtpG3s8rff3pbPqEBHcEy0j1qyAAABAHRSTlMAVTAUBA4WDAMoB7s+CSBK1zivYHSpv0FqxE7ctdOOmM2e/n3JatP+VrQe4s6Gi8ckgzj65/zvuaWGK/qlFf7T/L+Ka/X9x139okP9XH0VNWvmlLaDhuSrw97p1MCNdpfN//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8ADo+I/wAAIABJREFUeNrsmn1MGmkex3mTd1F8f1eiKb3qljNo1aVXN6vNNtvGei9Nr+12mwAtDBCB8I4MgyBSAljLpmf1lBh3fYldG4znXWliujS6cftCco20aXK9u1yz/9h/9p9rk+42uWcGodn9ey1c9vkYZx5mnsxMZj58f888gUSCQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgPwvM/L6+vnwmvBGQn438vhP9p079EefChU9PnOyDtyR3YQNo/xdJdbL/9LmFhaNHj/4Z5wPAJxegWzkIjcft6ers7Ojo6Ozq2U/Jy+2wOnH67DSh1dFdqz44jvPJp+/DqphTVrF6OrvFfjToA0QDmKSto6uAmrOXexJoBbxaWHj48OFXgC+/vHXr1vHj1wBnzr8PH2euwOB2dvuDbp1ch0l8cgBoulFhRxcrJy+3rx9oBby6eTNy586d27cfAZaXl7/99sm1a0euHTlzHhbE3BhWcTvFAXcA9Ut0ukTcDbwKJjG5Lhj1Yd25qNbJ0+3AqyuGSCTl1e2UV8v379+/tPn1EcCZj2E9zD6srragTh6Ix/xgFYu7ddGoOJ6Uo3EMi+qw7p5cG2ydONeOa5XyKhIxKAGGyJ1HuFjb29//iVDr/G/gg83y4Gp/N+pDY4lAMi6MyuXCOCbxCzHhDhpIJv1BUBQlnTkVWsz+s+3TV5SEVwZFSI8g0hT6kPL28jbg+3tHenuP/B6OtLJKXpfYFxRGsZ2YcCcgdwcxoVDo9wcCYkyIJhNgpCUMoN0FueRVO+EV0ErhUUsRj9LhHBoYUM2ZtfinyPL23bt3P3vR29sLzcom1E4/KH9JuQ6kk9+/sjo5cv06+J9cvSHEUIlfLsd2xGi0rSdXhizMU8ArIq4UHiminbNaLOExzcDAmNVlCQ8p1VJ95D4w6x8zvWvQrCxC78R8QCwgD4aurF6/bJfJ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",
                                });
                                doc.content.splice(3, 15,
                                {
                                    margin: [0, 340, 0, 0],
                                    alignment: 'left',
                                    text: "PREPARED BY: _________________",
                                    fontSize: 12, // Change the font size to your desired value.
                                    bold: true // Make the text bold.
                                });
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

                let weight = $('#weight').val();
                let height = $('#height').val();

                if (weight <= 0 || height <= 0)
                {
                    swalAlert('warning', 'Weight and height must be greater than zero.');
                    return false;
                }

                let phone_number = $('#phone_number').val();
                let phone_number_regex = /^(09)\d{9}$/;

                if (!phone_number_regex.test(phone_number))
                {
                    swalAlert('warning', 'Contact number must start with "09" followed by 9 digits.');
                    return false;
                }

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
                        form_data.weight_for_age_status = calculateWeightForAgeStatus(convert_age_in_months(form_data.birthdate, form_data.date_measured), form_data.sex, form_data.weight, true);
                        form_data.height_length_for_age_status = calculateHeightLengthForAgeStatus(convert_age_in_months(form_data.birthdate, form_data.date_measured), form_data.sex, form_data.height, true);
                        form_data.weight_for_length_status = calculateWeightForLengthStatus(form_data.height,convert_age_in_months(form_data.birthdate, form_data.date_measured), form_data.weight, form_data.sex, true);

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
                                console.log("convered age in months: " + convert_age_in_months(data.birthdate, data.date_measured));
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
                                        phone_number: data.phone_number,
                                        mother_last_name: data.mother_last_name,
                                        mother_first_name: data.mother_first_name,
                                        child_last_name: data.child_last_name,
                                        child_first_name: data.child_first_name,
                                        ip_group: data.ip_group,
                                        micronutrient: data.micronutrient,
                                        nutrient_given_date: data.nutrient_given_date,
                                        feeding_candidate: data.feeding_candidate,
                                        sex: data.sex,
                                        birthdate: data.birthdate,
                                        height: data.height,
                                        weight: data.weight,
                                        length: data.length,
                                        age_in_months: convert_age_in_months(data.birthdate, data.date_measured),
                                        date_measured: data.date_measured,
                                        weight_for_age_status: calculateWeightForAgeStatus(convert_age_in_months(data.birthdate, data.date_measured), data.sex, data.weight, true),
                                        height_length_for_age_status: calculateHeightLengthForAgeStatus(convert_age_in_months(data.birthdate, data.date_measured), data.sex, data.height, true),
                                        weight_for_length_status: calculateWeightForLengthStatus(data.height,convert_age_in_months(data.birthdate, data.date_measured), data.weight, data.sex, true),
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
                                        // notification('success', "{{ Str::singular($page_title) }}");
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

                        $('.btnUpdate').attr('id', data.id)
                        $('#address_edit').val(data.address)
                        $('#phone_number_edit').val(data.phone_number)
                        $('#mother_last_name_edit').val(data.mother_last_name)
                        $('#mother_first_name_edit').val(data.mother_first_name)
                        $('#child_last_name_edit').val(data.child_last_name)
                        $('#child_first_name_edit').val(data.child_first_name)
                        $('#ip_group_edit').val(data.ip_group)
                        $('#micronutrient_edit').val(data.micronutrient)
                        $('#sex_edit').val(data.sex)
                        $('#birthdate_edit').val(data.birthdate)
                        $('#date_measured_edit').val(data.date_measured)
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

            // Script for Update Function for Edit Modal:
            $(document).on('click', '.btnUpdate', function()
            {
                let id = this.id;
                console.log(id)
                let form_url = BASE_API + '/' + id;

                // Form Data:
                let form = $("#editForm").serializeArray();
                let form_data = {}

                let address_edit = $('#address_edit').val();
                let mother_last_name_edit = $('#mother_last_name_edit').val();
                let mother_first_name_edit = $('#mother_first_name_edit').val();
                let child_last_name_edit = $('#child_last_name_edit').val();
                let child_first_name_edit = $('#child_first_name_edit').val();
                let birthdate_edit = $('#birthdate_edit').val();

                let weight_edit = $('#weight_edit').val();
                let height_edit = $('#height_edit').val();

                if (weight_edit <= 0 || height_edit <= 0)
                {
                    swalAlert('warning', 'Weight and height must be greater than zero.');
                    return false;
                }

                let phone_number_edit = $('#phone_number_edit').val();
                let phone_number_regex = /^(09)\d{9}$/;

                if (!phone_number_regex.test(phone_number_edit))
                {
                    swalAlert('warning', 'Contact number must start with "09" followed by 9 digits.');
                    return false;
                }

                const fieldsToValidate =
                [
                    { value: address_edit, message: 'Address is required.' },
                    { value: mother_last_name_edit, message: 'Last Name of Parent/Guardian is required.' },
                    { value: mother_first_name_edit, message: 'First Name of Parent/Guardian is required.' },
                    { value: child_last_name_edit, message: 'Last Name of the Child is required.' },
                    { value: child_first_name_edit, message: 'First Name of the Child is required.' },
                    { value: birthdate_edit, message: 'Birth Date of the Child is required.' },
                    { value: phone_number_edit, message: 'Contact Number is required.' }
                ];

                for (let field of fieldsToValidate)
                {
                    if (field.value.trim() === '')
                    {
                        swalAlert('warning', field.message);
                        return false;
                    }
                }

                $.each(form, function()
                {
                    form_data[[this.name.slice(0, -5)]] = this.value;
                })

                // Additional data fields
                form_data.age_in_months = convert_age_in_months(form_data.birthdate, form_data.date_measured);
                form_data.weight_for_age_status = calculateWeightForAgeStatus(convert_age_in_months(form_data.birthdate, form_data.date_measured), form_data.sex, form_data.weight, true);
                form_data.height_length_for_age_status = calculateHeightLengthForAgeStatus(convert_age_in_months(form_data.birthdate, form_data.date_measured), form_data.sex, form_data.height, true);
                form_data.weight_for_length_status = calculateWeightForLengthStatus(form_data.height,convert_age_in_months(form_data.birthdate, form_data.date_measured), form_data.weight, form_data.sex, true);


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
            // End of Script for Update Function for Edit Modal

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

                                $('.btnUpdateReweigh').attr('id', data.id);
                                $('#child_last_name_reweigh').val(data.child_last_name);
                                $('#child_first_name_reweigh').val(data.child_first_name);

                                let today = moment().tz('Asia/Shanghai').format('YYYY-MM-DD');
                                $('#date_measured_reweigh').val(today);
                                
                                $('#height_reweigh').val(data.height);
                                $('#weight_reweigh').val(data.weight);
                                $('#birthdate_reweigh').val(data.birthdate);

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

                let weight_reweigh = $('#weight_reweigh').val();
                let height_reweigh = $('#height_reweigh').val();

                if (weight_reweigh <= 0 || height_reweigh <= 0)
                {
                    swalAlert('warning', 'Weight and Height must be greater than zero.');
                    return false;
                }

                $.each(form, function()
                {
                    let field_name = this.name.slice(0, -5); // Remove the "_edit" suffix
                    let field_value = this.value;

                    let measured_date = $('#date_measured_reweigh').val();
                    form_data.date_measured = measured_date;

                    let birthdate = $('#birthdate_reweigh').val();
                    form_data.birthdate = birthdate;

                    if (measured_date === '')
                    {
                        swalAlert('warning', 'Date Measured cannot be empty.');
                    }
                    else
                    {
                        console.log("form_data.birthdate" + JSON.stringify(form_data.birthdate))

                        form_data.age_in_months = convert_age_in_months(form_data.birthdate, form_data.date_measured);

                        console.log("age_in_months" + JSON.stringify(form_data.age_in_months))

                        // Populate form_data with each form field.
                        form_data[field_name] = field_value;

                        // Calculate age_in_months, weight_for_age_status, and height_length_for_age_status for each form field.
                        if (field_name === 'birthdate')
                        {
                            form_data.weight_for_age_status = calculateWeightForAgeStatus(form_data.age_in_months, form_data.sex, form_data.weight, true);
                            form_data.height_length_for_age_status = calculateHeightLengthForAgeStatus(form_data.age_in_months, form_data.sex, form_data.height, true);
                            form_data.weight_for_length_status = calculateWeightForLengthStatus(form_data.age_in_months, form_data.weight, form_data.sex, true);
                        }

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

                                        storeHistoryOfIndividualRecord(data);
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
                                        } else
                                        {
                                            $.each(error.responseJSON.errors, function(key, value)
                                            {
                                                swalAlert('warning', value);
                                            });
                                        }
                                    }
                                });
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
                    }
                });

            })
            // End of Script for Update Function for Reweigh

            // Script for Complementary Feeding Function:
            $(document).on('click', '.btnFeeding', function()
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

                        $('.btnUpdateFeeding').attr('id', data.id)
                        $('#child_last_name_feeding').val(data.child_last_name)
                        $('#child_first_name_feeding').val(data.child_first_name)
                        $('#sex_feeding').val(data.sex)
                        $('#birthdate_feeding').val(data.birthdate)

                        let ageInMonths = convert_age_in_months(data.birthdate, moment().format('YYYY-MM-DD'));
                        $('#age_in_months_feeding').val(ageInMonths);
                        
                        $('#feedingModal').modal('show');
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
            // End of Script for Complementary Feeding Function

            // Script for Update Function for Complementary Feeding:
            $(document).on('click', '.btnUpdateFeeding', function()
            {
                let id = this.id;
                console.log(id)
                let form_url = BASE_API + '/' + id;

                // Form Data:
                let form = $("#feedingForm").serializeArray();
                let form_data = {}

                $.each(form, function()
                {
                    form_data[[this.name.slice(0, -5)]] = this.value;
                })

                // Update feeding_candidate to 'Yes':
                form_data['feeding_candidate'] = 'Yes';

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
                            // comment this becuase no need to add to history of individual records table 
                            // when adding records on complementary feeding
                            // storeHistoryOfIndividualRecord(data);
                            notification('info', "{{ Str::singular($page_title) }}");
                            refresh();
                            $('#feedingModal').modal('hide');
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
            // End of Script for Update Function for Complementary Feeding

            // Script for Micronutrient Function:
            $(document).on('click', '.btnNutrient', function()
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

                        $('.btnUpdateNutrient').attr('id', data.id)
                        $('#child_last_name_nutrient').val(data.child_last_name)
                        $('#child_first_name_nutrient').val(data.child_first_name)
                        $('#sex_nutrient').val(data.sex)
                        $('#birthdate_nutrient').val(data.birthdate)

                        let ageInMonths = convert_age_in_months(data.birthdate, moment().format('YYYY-MM-DD'));
                        $('#age_in_months_nutrient').val(ageInMonths);

                        $('#micronutrient_nutrient').val(data.micronutrient)
                        $('#nutrient_given_date_nutrient').val(data.nutrient_given_date)
                        
                        $('#nutrientModal').modal('show');
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
            // End of Script for Micronutrient Function

            // Script for Update Function for Micronutrient Function:
            $(document).on('click', '.btnUpdateNutrient', function()
            {
                let id = this.id;
                console.log(id)
                let form_url = BASE_API + '/' + id;

                // Form Data:
                let form = $("#nutrientForm").serializeArray();
                let form_data = {}

                let micronutrient_nutrient = $('#micronutrient_nutrient').val();
                let nutrient_given_date_nutrient = $('#nutrient_given_date_nutrient').val();

                if (micronutrient_nutrient !== 'No' && nutrient_given_date_nutrient === '')
                {
                    swalAlert('warning', 'Please provide a date when the Micronutrient was given.');
                    return false;
                }

                $.each(form, function()
                {
                    form_data[[this.name.slice(0, -5)]] = this.value;
                })

                form_data.micronutrient = $('#micronutrient_nutrient').val();
                form_data.nutrient_given_date = $('#nutrient_given_date_nutrient').val();


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

                            storeHistoryOfIndividualRecord(data);
                            notification('info', "{{ Str::singular($page_title) }}");
                            refresh();
                            $('#nutrientModal').modal('hide');
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
            // End of Script for Update Function for Micronutrient Function

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