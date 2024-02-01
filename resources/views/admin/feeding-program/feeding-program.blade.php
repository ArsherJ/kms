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
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
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
                <h5 class="card-title fw-semibold">List of Activities/s</h5>
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#create_card"
                    aria-expanded="false" aria-controls="create_card">Add
                    Activities <span><i class="ti ti-plus"></i></span></button>
            </div>
            <table class="table table-hover table-borderless" id="dataTable" style="width:100%">
                <thead>
                    <tr class="text-dark">
                        <th class="not-export-column">ID</th>
                        <th class="not-export-column">Created at</th>
                        <th>Title</th>
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
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- UPLOAD MODAL -->
    <div id="uploadModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white" style="border-radius: 0.5rem 0.5rem 0 0;">
                    <h5 class="modal-title" style="color: white;">Upload Images</h5>
                </div>
                <div class="modal-body">
                    <form id="uploadForm">
                        <div class="form-group">
                            <label for="imageUpload" class="required-input">Select Images</label>
                            <input type="file" class="form-control-file" id="imageUpload" name="images[]" multiple accept="image/*">
                        </div>
                    </form>
                    <!-- Display selected images -->
                    <div id="selectedImagesContainer" class="d-flex flex-wrap mb-3"></div>
                    <!-- Image preview -->
                    <div id="imagePreviewContainer" class="d-flex flex-wrap"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnUploadFile">Upload</button>
                </div>
            </div>
        </div>
    </div>

 
<!-- JATTT  -->
<div id="imageDisplaySection">
    <h5 class="card-title fw-semibold mb-4 text-black">Activity Images</h5>
    <div id="activityImagesContainer" class="d-flex flex-wrap mb-3"></div>
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
                $('#dataTable tfoot th').each(function(i) {
                    let title = $('#dataTable thead th').eq($(this).index()).text();
                    $(this).html('<input size="15" class="form-control" type="text" placeholder="' + title +
                        '" data-index="' + i + '" />');
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
                            data: "deleted_at",
                            render: function(data, type, row) {
                                console.log(data)
                                if (data == null) {
                                    return `<div>
                                        <button id="${row.id}" type="button" class="btn btn-sm btn-info btnView">View</button>
                                        <button id="${row.id}" type="button" class="btn btn-sm btn-warning btnEdit">Edit</button>
                                        <button id="${row.id}" type="button" class="btn btn-sm btn-danger btnDelete">Delete</button>
                                        <button id="${row.id}" type="button" class="btn btn-sm btn-info btnUpload" data-id="${row.id}">Upload</button>

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




async function convertImageToFormDataAndInsert(file, uploadButtonId) {
    return new Promise((resolve, reject) => {
        // Convert the image to base64
        const reader = new FileReader();
        reader.onloadend = () => {
            const base64Image = reader.result.split(',')[1]; // Extract the base64 part
            var formData = new FormData();
            formData.append('image', base64Image);
            formData.append('activity_id', uploadButtonId);

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
              'height': '100'
          });

          // Append the img element to the container
          selectedImagesContainer.append(imgElement);
      }
  });

  $(document).on("click", "#btnUploadFile", async function() {
      // Get the selected image files
      var files = $('#imageUpload')[0].files;
      var uploadButtonId = $('#uploadModal').data('uploadButtonId');
      console.log('Clicked Upload button ID:', uploadButtonId);

      // Convert and upload each image sequentially
      for (var i = 0; i < files.length; i++) {
          try {
              await convertImageToFormDataAndInsert(files[i], uploadButtonId);
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


// ----------------------------------------------------------------

// Assuming you have an element with the ID 'activityImagesContainer' to display the images
var activityImagesContainer = $('#activityImagesContainer');

// Function to fetch and display images for a specific activity
function fetchAndDisplayImages(activityId) {
    $.ajax({
        url: '/upload/retrieve_blob.php?activity_id=' + activityId,
        type: 'GET',
        success: function (data) {
            console.log("BASE64 IMAGE");

            // Check if data is null
            if (data === null) {
                console.error('Image data is null.');
                return;
            }

            var imgElement = $('<img>').attr({
                'src': 'data:image/jpeg;base64,' + data,
                'class': 'img-fluid m-1',
                'width': '100',
                'height': '100'
            });

            // Append the img element to the container
            activityImagesContainer.append(imgElement);
        },
        error: function (error) {
            console.error('Error fetching images:', error);
        }
    });
}

fetchAndDisplayImages(1);
// ----------------------------------------------------------------

            // FUNCTION CALLING
            dataTable();
        })
        // END OF SCRIPT TAG    
    </script>
@endsection