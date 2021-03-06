<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>KONTEKS - {{$page_title ?? ''}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">


    <!-- plugin css -->
    <link href="{{asset('/assets')}}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('/assets')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/assets')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/assets')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{asset('/assets')}}/libs/datatables.net-dt/css/jquery.dataTables.min.css" id="app-style"
        rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- alertifyjs Css -->
    <link href="{{asset('/assets')}}/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{asset('/assets')}}/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css" rel="stylesheet">

    <link href="{{asset('/assets')}}/libs/flatpickr/flatpickr.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/assets')}}/libs/%40simonwep/pickr/themes/classic.min.css" />
    <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{asset('/assets')}}/libs/%40simonwep/pickr/themes/monolith.min.css" />
    <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{asset('/assets')}}/libs/%40simonwep/pickr/themes/nano.min.css" />
    <!-- 'nano' theme -->

    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/libs/select2/select2.min.css')}}" />
    @stack('styles')
    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            float: left;
            padding-right: .5rem;
            color: #74788d;
            content: '/' !important;
        }

        element.style {}
/*
        .form-control {
            border-color: #a5a5a5 !important;
        }

        .form-select {
            border-color: #a5a5a5 !important;
        } */

        .table-striped tr:nth-child(even) {
            background-color: #b5d3e754;
        }


        #sidebar-menu ul li a {
            color: white;
        }

        #sidebar-menu ul li a:hover {
            background-color: #7a7a7a73 !important;
            color: #ffffff !important;
            border-radius: 14px !important;
            --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                var(--tw-ring-shadow, 0 0 #0000),
                var(--tw-shadow);
        }

        #sidebar-menu ul li a .nav-icon {
            color: white;
        }

        #sidebar-menu ul li a:hover .nav-icon {
            color: #bdbdbd;
        }

        .menu-title {
            color: white;
        }

        body {
            font-family: 'Poppins', sans-serif !important;
        }


        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #495057;
            font-weight: 500;
            font-family: 'Poppins', sans-serif !important;
        }

        .card-body {

            padding: 1rem 1rem;
        }

        .alertify .ajs-dialog {
            border-radius: 16px !important;
            background: #a11c4b !important;
        }


        .alertify .ajs-header {
            color: #000;
            font-weight: 700;
            background: transparent !important;
            border-bottom: none !important;
            border-radius: 2px 2px 0 0;
            text-align: center;
        }

        .alertify .ajs-body .ajs-content {
            text-align: center !important;
            color: white !important;
            font-size: 20px !important;
            padding: 0px !important;
        }

        .alertify .ajs-dialog .ajs-footer,
        .alertify .ajs-dialog .ajs-header {
            background: transparent !important;
            border-top: none !important;
        }

        .alertify .ajs-footer {
            padding: 18px;
        }

        .alertify .ajs-footer .ajs-buttons {
            text-align: center !important;
            display: flex;

        }


        .alertify .ajs-footer .ajs-buttons .ajs-button.ajs-ok {
            background: #DC2626 !important;
            width: 50%;
            color: white !important;
            padding: 14px;
            border-radius: 14px;
        }

        .alertify .ajs-footer .ajs-buttons .ajs-button.ajs-cancel {
            background: #9CA3AF !important;
            width: 50%;
            color: white !important;
            padding: 14px;
            border-radius: 14px;
        }

        .alertify-notifier .ajs-message.ajs-error {
            border-radius: 14px;
        }

        /* DATATABLE */
        table.dataTable.no-footer{
            border-bottom:1px solid #eff0f2;
        }
        .datatables{
            font-size:16px !important;
        }
        .tr-head {
            background: #a11c4b;
            color: white;
        }

        .tr-head th {
            border-bottom: 0px !important;
        }

        .dataTables_length select {
            border: 1px solid #8b8b8b;
            border-radius: 8px;
            padding: 6px 15px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #8b8b8b;
            border-radius: 8px;
            padding: 6px 15px;
        }

        .datatables thead {
            border-radius: 0.5rem;
        }

        .card-title {
            font-size: 20px;
            font-weight: bolder;
            margin-bottom: 0;
        }

        .card {
            border-radius: 20px !important;
        }

        .card-header {
            background-color: #fff0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: white !important;
            background: #a11c4b;
            border-radius: 28px;
            animation: none;
            font-size: 14px;
            font-weight: bold;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            background: #a11c4b;
            border-radius: 28px;
            animation: none;
            font-size: 14px;
            font-weight: bold;
        }

        .select2-container .select2-selection--single{
            height: 35px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #e2e5e8;
        }

        #sidebar-menu ul li ul.sub-menu {
            margin: 2px 12px !important;
            background: rgb(136, 175, 234) !important;
            border-radius: 20px !important;
        }

        #sidebar-menu ul li ul.sub-menu li a{
             /* color: white !important; */
        }
        #sidebar-menu ul li ul.sub-menu li a:before{
            color: white !important;
        }

        /* DATATABLE CUSTOM BY PATERN */
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #a11c4b !important;
            border-radius: 8px;
            padding: 6px 15px;
        }
        .dataTables_length select {
            border: 1px solid #a11c4b !important;
            border-radius: 8px;
            padding: 6px 15px;
        }

        .datatables thead {
           border-radius: 10px !important;
        }

        .datatables thead tr {
           background: #a11c4b !important;
        }


        .datatables thead tr th:first-child {
            border-top-left-radius:  10px !important;
            border-bottom-left-radius:  10px !important;
        }
        .datatables thead tr th:first-child {
            border-top-left-radius:  10px !important;
            border-bottom-left-radius:  10px !important;
        }
        .datatables thead tr th:last-child {
            border-top-right-radius:  10px !important;
            border-bottom-right-radius:  10px !important;
        }

        .noti-dotnya {
            text-align: center;
            position: absolute;
            height: 20px;
            margin: auto;
            color: white;
            line-height: 20px;
            width: 20px;
            border-radius: 10px;
        }

        .clickable-row{
            cursor: pointer;
        }
        .clickable-row:hover{
            background: #0bb9795b !important;
        }

        .noti-dotnya {
            text-align: center;
            position: absolute;
            height: 20px;
            margin: auto;
            color: white;
            line-height: 20px;
            width: 20px;
            border-radius: 10px;
        }

        .clickable-row{
            cursor: pointer;
        }
        .clickable-row:hover{
            background: #0bb9795b !important;
        }

        /* STYLE MAPS VIE */
        #mapPolygon { height: 500px; }
        #mapSbnp { height: 500px; }


    </style>

</head>


<body style="background: #F3F4F6;" data-sidebar-size="lg" class="sidebar-enable">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.partials.header')
        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.partials.menu')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')
            <!-- End Page-content -->
            <footer class="footer" style="background: white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-center " style="font-weight: bold;">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; KONTEKS
                        </div>
                        {{-- <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Copyright by Solvus
                            </div>
                        </div> --}}
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @stack('modals')
    @include('modal-view-map.maps-polygon')
    @include('modal-view-map.maps-sbnp')

    <!-- Right Sidebar -->
    @include('layouts.partials.right-bar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT -->
    <script src="{{asset('/assets')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/assets')}}/libs/metismenujs/metismenujs.min.js"></script>
    <script src="{{asset('/assets')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('/assets')}}/libs/feather-icons/feather.min.js"></script>

    <!-- apexcharts -->

    <!-- Vector map-->

    {{-- <script src="{{asset('/assets')}}/js/pages/dashboard-sales.init.js"></script> --}}
    <script>
        var baseUrl = @json(asset('/assets'));
        document.body.setAttribute('data-sidebar-size', 'lg')

    </script>
    <script src="{{asset('/assets')}}/js/app.js"></script>
    <script src="{{asset('/assets')}}/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/assets')}}/libs/alertifyjs/build/alertify.min.js"></script>
    <script src="{{asset('assets/js/jspdf.min.js')}}"></script>
    <script src="{{asset('assets/js/html2canvas.js')}}"></script>
    <script src="{{asset('assets/js/FileSaver.min.js')}}"></script>

    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/js/resize.js')}}"></script>

    <script src="{{asset('/assets')}}/libs/%40simonwep/pickr/pickr.min.js"></script>
    <script src="{{asset('/assets/libs/select2/select2.min.js')}}"></script>


    <script src="{{asset('assets/libs/axios/axios.min.js')}}"></script>

    {{-- MAPS REQUIREMENT --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>

    <link rel="stylesheet" href="{{asset('assets/css/maps.css')}}">


    @stack('scripts')
    <script>
        $('.ada').val();

        flatpickr(".datepicker-basic", {
            dateFormat: "d-m-Y"
        });

        // --- FUNCTION DELETE
        function confirmDelete(urlDelete) {
            alertify.confirm("APAKAH ANDA YAKIN HAPUS DATA ?", function () {
                window.location = urlDelete;
            }, function () {
                alertify.error("Cancel")
            }).set('labels', {
                ok: 'IYA',
                cancel: 'TIDAK',
            }).set({
                title: `<img height="60px" src="{{asset('assets/images/logo.png')}}">`
            })
        }

          // --- FUNCTION SAVE
        function confirmSave(formId) {
            alertify.confirm("APAKAH ANDA YAKIN DATA SUDAH BENAR ?", function () {
                var formNya =  $('#'+formId);
                formNya.submit();
            }, function () {
                alertify.error("Cancel")
            }).set('labels', {
                ok: 'IYA',
                cancel: 'TIDAK',
            }).set({
                title: `<img height="60px" src="{{asset('assets/images/logo.png')}}">`
            })
        }

        function resizeChart(divId) {
            var chart = echarts.init(document.getElementById(divId));
            new ResizeSensor(jQuery('#' + divId), function () {
                chart.resize();
            })
        }
        $(".select2").select2();

        $("#data-table").on("click", ".clickable-row", function(){
            window.location = $(this).data("href");
        });

        // --- MAPS VIEW SCRIPTS
        function showPolygon(params,idModal,title) {
            $('#mapPolygonTitle').text(title)
            let latLong = params.map(getLatLong)
            let latLongView = latLong[0];
            // -- DEFINE MAPS
            let map = L.map('mapPolygon', {
                center: latLongView,
                zoom: 11
            });
            // -- MAPS STYLE
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            // -- DEFINE PLYGON
            var polygon = L.polygon(latLong,{
                fillColor:'red',
                color:'red'
            }).addTo(map);
            // -- MAKE MAPS PROPER ON MODAL
            $('#'+idModal).on('shown.bs.modal', function () {
                map.invalidateSize();
            })
            // -- DESTROY MAPS ON MODAL
            $('#'+idModal).on('hidden.bs.modal', function () {
                $("#map-box-polygon").html("");
                $("#map-box-polygon").html('<div id="mapPolygon"></div>');
            })
        }

        function showSbnp(params,idModal,title) {
            $('#mapSbnpTitle').text(title)
            let latLongView = params;
            // -- DEFINE MAPS
            let map = L.map('mapSbnp', {
                center: latLongView,
                zoom: 11
            });
            // -- MAPS STYLE
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            // -- DEFINE MARKER
            L.marker(params).addTo(map)
                // .bindPopup(title)
                // .openPopup()
                ;
            // -- MAKE MAPS PROPER ON MODAL
            $('#'+idModal).on('shown.bs.modal', function () {
                map.invalidateSize();
            })
            // -- DESTROY MAPS ON MODAL
            $('#'+idModal).on('hidden.bs.modal', function () {
                $("#map-box-sbnp").html("");
                $("#map-box-sbnp").html('<div id="mapSbnp"></div>');
            })
        }

        function getLatLong(ldmp) {
            return [ldmp.long_dec,ldmp.lat_dec];
        }

    </script>

</body>


</html>
