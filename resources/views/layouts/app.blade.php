<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KMS</title>

    {{-- CSS INCLUDES --}}
    @include('layouts.css-includes')

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
