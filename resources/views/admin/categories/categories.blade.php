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
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- DATATABLE --}}
    <div class="d-flex justify-content-center align-items-center">
            <h2 class="fw-semibold">CHILD GROWTH STANDARDS</h2>
        </div>
    <div class="card">
        <div class="card-body pt-16">
            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Weight (kg) for Length (cm) of Boys 0-23 Months</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/weight-for-length-boy.jpg')}}" alt="weight_for_length_boy" height="1000" width="800">
                </div>
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Weight (kg) for Length (cm) of Girls 0-23 Months</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/weight-for-length-girl.jpg')}}" alt="weight_for_length_girl" height="1000" width="800">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body pt-16">
            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Weight (kg) for Height (cm) of Boys 24-59 Months</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/weight-for-height-boy.jpg')}}" alt="weight_for_height_boy" height="1000" width="800">
                </div>
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Weight (kg) for Height (cm) of Girls 24-59 Months</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/weight-for-height-girl.jpg')}}" alt="weight_for_height_girl" height="1000" width="800">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body pt-16">
            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Length/Height (cm) for Age for Boys</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/length-height-for-boy.jpg')}}" alt="weight_for_height_boy" height="900" width="800">
                </div>
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Length/Height (cm) for Age for Girls</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/length-height-for-girl.jpg')}}" alt="weight_for_height_girl" height="900" width="800">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body pt-16">
            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Weight (kg) for Age for Boys</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/weight-for-age-boy.jpg')}}" alt="weight_for_height_boy" height="850" width="800">
                </div>
                <div class="d-flex flex-column align-items-center">
                    <h4>TABLE Weight (kg) for Age for Girls</h4>
                    <img class="image-item img-fluid" src="{{URL::asset('/img/weight-for-age-girl.jpg')}}" alt="weight_for_height_girl" height="850" width="800">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-lg" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="ti ti-x"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <img class="modal-img img-fluid" src="{{URL::asset('/img/weight-for-age-girl.jpg')}}" alt="modal_img" height="850" width="800">
        </div>
        </div>
    </div>
    </div>
@endsection


{{-- SCRIPTS --}}
@section('scripts')
    <script>
        
    </script>
@endsection
