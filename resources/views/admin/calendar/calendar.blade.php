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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="container">
        <h1>Activities Calendar</h1>
        <div id='calendar'></div>
    </div>
@endsection


{{-- SCRIPTS --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            let activities = [];
            // GLOBAL VARIABLE
            var APP_URL = "{{ env('APP_URL') }}"
            var API_URL = "{{ env('API_URL') }}"
            var API_TOKEN = localStorage.getItem("API_TOKEN")
            var BASE_API = API_URL + '/feeding_programs'

            var form_url = BASE_API + '/'

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
                        for (var i = 0; i < data.length; i++) {
                            const dateTime = data[i].date_of_program + ' ' + data[i].time_of_program

                            activities.push({
                                "title": data[i].title,
                                "start": dateTime,
                                "end": dateTime,
                            })
                        }

                        $('#calendar').fullCalendar({
                            height: 777,
                            header:{
                                left:'prev,next today',
                                center:'title',
                                right:'month,agendaWeek,agendaDay'
                            },
                            events: activities,
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
        })
    </script>
@endsection
