<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>

    {{-- CSS INCLUDES --}}
    @include('layouts.css-includes')
    <!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>

</head>


<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        {{-- YIELD OF SIDEBAR --}}
        @yield('sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">

            {{-- YIELD OF HEADER --}}
            @yield('header')

            <div class="container-fluid">


                {{-- YIELD OF CONTENT --}}
                @yield('content')

            </div>
        </div>
    </div>

    {{-- SCRIPTS INCLUDES --}}
    @include('layouts.scripts-includes')

    {{-- GLOBAL SCRIPTS --}}
    @include('layouts.global-scripts-includes')

    {{-- YIELD OF SCRIPTS --}}
    @yield('scripts')

</body>

</html>
