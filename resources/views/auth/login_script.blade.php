<script>
    $(document).ready(function() {
        // GLOBAL VARIABLE
        const APP_URL = "{{ env('APP_URL') }}"
        const API_URL = "{{ env('API_URL') }}"
        const API_TOKEN = localStorage.getItem("API_TOKEN")
        const IS_LOGGED_IN = "{{ Auth::check() }}"


        // Login function
        $('#loginForm').on('submit', function(e) {
            e.preventDefault()

            // VARIABLES
            let form_url = API_URL + '/login'

            // FORM DATA
            let form = $("#loginForm").serializeArray();
            let form_data = {}
            $.each(form, function() {
                form_data[[this.name]] = this.value;
            })
            console.log(form_data)

            $.ajax({
                url: API_URL + '/user/search/' + form_data.username,
                method: "GET",
                dataType: "JSON",
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                    "Authorization": API_TOKEN,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    userData = data[0];
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
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function(data) {
                            console.log(data)
                            localStorage.setItem('API_TOKEN', data
                                .token);
                            localStorage.setItem('USER_DATA', JSON
                                .stringify(data.user));

                            if (data.user.roles.title == 'User') {
                                notification('custom', 'Login Success')
                                setInterval(function() {
                                    window.location.href =
                                        APP_URL + "/user/dashboard"
                                }, 1500)
                            } else if (data.user.roles.title == 'Admin') {
                                notification('custom',
                                    'Login as Admin Success')
                                setInterval(function() {
                                    window.location.href =
                                        APP_URL +
                                        "/admin/dashboard"
                                }, 1500)
                            }
                        },
                        error: function(error) {
                            console.log(error)
                            if (error.responseJSON.errors == null) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: error.responseJSON
                                        .message_title,
                                    text: error.responseJSON
                                        .message,
                                })
                            } else {
                                $.each(error.responseJSON.errors, function(
                                    key, value) {
                                    swalAlert('warning', value)
                                });
                            }
                        }
                        // ajax closing tag
                    })
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
        // login closing tag

        $("#loading_cover").fadeOut();
    });
</script>
