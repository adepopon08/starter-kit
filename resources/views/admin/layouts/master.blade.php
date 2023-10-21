<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/assets/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->

    <link href="{{ asset('template/assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/libs/prismjs/themes/prism-okaidia.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/theme.min.css') }}">
    <title>Homepage | Dash Ui - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body class="bg-light">
    <div id="db-wrapper">
        <!-- sidebar -->
        @include('admin.layouts.sidebar')
        <!-- end sidebar -->
        <!-- Page content -->
        <div id="page-content">
            <div class="header @@classList">
                <!-- navbar -->
                @include('admin.layouts.navbar')
                <!-- end navbar -->
            </div>
            <!-- Container fluid -->
            @yield('content')

        </div>
    </div>



    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('template/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('template/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}">
    </script>
    <!-- Theme JS -->
    <script src="{{ asset('template/assets/js/theme.min.js') }}"></script>



</body>

</html>
