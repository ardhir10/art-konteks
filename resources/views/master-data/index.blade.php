@extends('main')


@push('styles')
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

    .card-4 {
        --animate-duration: 1.4s;
    }

    .card-4 {
        --animate-duration: 1.7s;
    }

    a {
        color: inherit;
    }

    a:hover {
        color: inherit;
        text-decoration: none;
        cursor: pointer;
    }

    .card__one {
        transition: transform .5s;
        cursor: pointer;
    }

    .card__one::after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition: opacity 2s cubic-bezier(.165, .84, .44, 1);
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, .2), 0 6px 20px 0 rgba(0, 0, 0, .15);
        content: '';
        opacity: 0;
        z-index: -1;
    }

    .card__one:hover,
    .card__one:focus {
        transform: scale3d(1.036, 1.036, 1);
        -webkit-box-shadow: -1px -1px 16px -4px rgba(0, 0, 0, 0.53);
        -moz-box-shadow: -1px -1px 16px -4px rgba(0, 0, 0, 0.53);
        box-shadow: -1px -1px 16px -4px rgba(0, 0, 0, 0.53);


    }

    .text-grey {
        font-size: 14px;
        color: #858585;
    }

</style>



@endpush

@section('content')
<div class="page-content" style="">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-3">
                <a href="{{route('user.index')}}">
                    <div class="card shadow-lg card__one animate__animated  animate__fadeInUp card-2">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="" height="50" src="{{asset('assets/images/icon/users.png')}}" alt="">
                                <div class="ms-2 mt-1">
                                    <span class="fw-bold fs-6  d-block ">User Management</span>
                                    <span class="d-block text-grey">
                                        Master data user
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="{{route('role.index')}}">
                    <div class="card shadow-lg card__one animate__animated  animate__fadeInUp card-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="" height="50" src="{{asset('assets/images/icon/role.png')}}" alt="">
                                <div class="ms-2 mt-1">
                                    <span class="fw-bold fs-6  d-block ">List Role</span>
                                    <span class="d-block text-grey">
                                        List data role for user
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div> <!-- end row-->
        <hr>
        <div class="row ">
            <div class="col-lg-3">
                <a href="{{route('master-data.jenis-badan-usaha.index')}}">
                    <div class="card shadow-lg card__one animate__animated  animate__fadeInUp card-4">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="" height="50" src="{{asset('images/icon/kemenhub.png')}}" alt="">
                                <div class="ms-2 mt-1">
                                    <span class="fw-bold fs-6  d-block ">Master Jenis Badan Usaha</span>
                                    <span class="d-block text-grey">
                                        Data jenis badan usaha
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="{{route('master-data.jenis-pengurus.index')}}">
                    <div class="card shadow-lg card__one animate__animated  animate__fadeInUp card-4">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="" height="50" src="{{asset('images/icon/kemenhub.png')}}" alt="">
                                <div class="ms-2 mt-1">
                                    <span class="fw-bold fs-6  d-block ">Master Jenis Pengurus</span>
                                    <span class="d-block text-grey">
                                        Data jenis pengurus
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="{{route('master-data.jenis-zonasi-perairan.index')}}">
                    <div class="card shadow-lg card__one animate__animated  animate__fadeInUp card-4">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="" height="50" src="{{asset('images/icon/kemenhub.png')}}" alt="">
                                <div class="ms-2 mt-1">
                                    <span class="fw-bold fs-6  d-block ">Master Jenis Zonasi Perairan</span>
                                    <span class="d-block text-grey">
                                        Data jenis zonasi perairan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="{{route('master-data.ksop.index')}}">
                    <div class="card shadow-lg card__one animate__animated  animate__fadeInUp card-4">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="" height="50" src="{{asset('images/icon/kemenhub.png')}}" alt="">
                                <div class="ms-2 mt-1">
                                    <span class="fw-bold fs-6  d-block ">Master KSOP</span>
                                    <span class="d-block text-grey">
                                        Data Master KSOP
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div> <!-- end row-->

        <hr>






    </div>
    <!-- container-fluid -->
</div>
@endsection
