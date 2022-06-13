@extends('main')


@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.easy-pie-chart/1.0.1/jquery.easy-pie-chart.css">

<style>
    .card-1 {
        --animate-duration: 0.5s;
    }

    .card-2 {
        --animate-duration: 0.8s;
    }

    .card-3 {
        --animate-duration: 1.1s;
    }


    .card-11 {
        --animate-duration: 0.5s;
    }

    .card-21 {
        --animate-duration: 0.8s;
    }

    .card-31 {
        --animate-duration: 1.1s;
    }

    .card-1 {
        background-image: linear-gradient(109.6deg, rgba(45, 116, 213, 1) 11.2%, rgba(121, 137, 212, 1) 91.2%);
        /* min-height: 150px !important; */
        color: white !important;
        border: 0px solid black !important;
        border-radius: 25px !important;
        box-shadow: 1px 3px 28px -7px rgb(0 0 0 / 71%);
        -webkit-box-shadow: 1px 3px 16px -7px rgb(0 0 0 / 71%);
        -moz-box-shadow: 1px 3px 28px -7px rgba(0, 0, 0, 0.71);

    }

    .card-2 {
        background-image: radial-gradient(circle 610px at 5.2% 51.6%, rgba(5, 8, 114, 1) 0%, rgba(7, 3, 53, 1) 97.5%);
        /* min-height: 150px !important; */
        color: white !important;
        border: 0px solid black !important;
        border-radius: 25px !important;
        box-shadow: 1px 3px 28px -7px rgb(0 0 0 / 71%);
        -webkit-box-shadow: 1px 3px 16px -7px rgb(0 0 0 / 71%);
        -moz-box-shadow: 1px 3px 28px -7px rgba(0, 0, 0, 0.71);

    }

    .card-3 {
        background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(0, 152, 155, 1) 0.1%, rgba(0, 94, 120, 1) 94.2%);
        /* min-height: 150px !important; */
        color: white !important;
        border: 0px solid black !important;
        border-radius: 25px !important;
        box-shadow: 1px 3px 28px -7px rgb(0 0 0 / 71%);
        -webkit-box-shadow: 1px 3px 16px -7px rgb(0 0 0 / 71%);
        -moz-box-shadow: 1px 3px 28px -7px rgba(0, 0, 0, 0.71);

    }

    .text-card-d1 {
        font-size: 20px;
        font-weight: 500;
    }

    .text-card-d2 {
        display: block;
        font-size: 57px !important;
        font-weight: bolder;
        color: white;
        vertical-align: top;
    }

    #countParentLocation {
        display: block;
        font-size: 20px;
    }

    .detailSbnp {
        border-radius: 10px;
        border: solid 1px black;
        /* height: 200px; */
    }

    .nav-tabs-custom .nav-item {
        position: relative;
        border-radius: -2px;
        color: #343a40;
        border: solid 0.5px;
    }

    .tab-pane {
        min-height: 45vh !important;
    }


    .global-chart {
        font-size: 28px;
        font-weight: bold !important;
    }

    .global-chart-detail {
        font-size: 18px;
        font-weight: bold !important;
    }

    .nav-tabs-custom .nav-item .nav-link.active {
        color: white;
        background: #038edc !important;
    }
    .nav-tabs .nav-link {
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }
    .nav-tabs-custom .nav-item .nav-link::after {
        display: none;

    }

    .bg-card-dashboard{
        background: #C0F4DE !important;
    }

    .text-dashboard{
        color: #0D6749 !important;
    }
</style>


@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid p-0">
    </div>
</div>
@endsection

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.easy-pie-chart/1.0.1/jquery.easy-pie-chart.js"></script>
    <script src="{{ asset('/assets') }}/libs/echart/echarts.min.js"></script>
    <script src="{{ asset('/assets') }}/libs/axios/axios.min.js"></script>
    @endpush
