

@extends('main')


@push('styles')
<!-- swiper css -->
<link rel="stylesheet" href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}">
<style>
    .bg-ditolak {
        background: #ED1F24 !important;
    }

    .bg-diproses {
        background: #F3EC17 !important;
    }

    .bg-disetujui {
        background: #70BF44 !important;
    }

    .bg-selesai {
        background: #050505 !important;
    }

    .avatar-sm {
        height: 1.2rem !important;
        width: 1.2rem !important;
    }

    .clickable-row {
        cursor: pointer;
    }

    .clickable-row:hover {
        background: #0bb9795b !important;
    }

    .hori-timeline .event-list::before {
        background-color: #70BF44 !important;
    }

    .hori-timeline .event-list:after {
        width: 30px !important;
        height: 30px !important;
        background-color: #0BB97A !important;
        border: 5px solid #fff;
        border-radius: 50%;
        top: -7px !important;
        left: 11% !important;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        display: block;
    }

    .font-size-14 {
        font-size: 11px !important;
    }

</style>

@endpush
@section('content')
<div class="page-content">

    <!-- end page title -->
    <div class="row animate__animated  animate__fadeIn">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="col-12">
                        @include('components.flash-message')
                    </div>
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <h4>{{$page_title}}</h4>
                                <h5 class="text-danger">{{$data->no_permohonan}}
                                    @if ($data->isNotify())
                                        <span class="noti-dotnya bg-danger"> ! </span>
                                    @endif
                                </h5>

                            </div>
                            <div class="col-lg-4 offset-lg-2">
                                <div class="text-end">
                                     @if ($data->isNotify())
                                        <button class="btn btn-lg btn-danger w-100 " data-bs-toggle="modal" data-bs-target="#myModal">TINDAK LANJUT</button>
                                        <span class="d-block">Untuk melanjutkan proses terhadap permohonan ini Anda harus menekan button TINDAK LANJUT di atas.</span>
                                    @endif


                                </div>
                            </div>

                        </div>

                        {{-- TIMELINE PROGRESS --}}
                        @include('approval-survey.component.timeline')

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <span class="text-danger" for="">Perusahaan</span>
                                        <span class="fs-6 fw-bolder d-block">{{$data->pemohon->nama_perusahaan}}</span>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-2">
                                            <label for="" class="text-danger d-block fw-bolder">Surat Permohonan</label>
                                            <div class="d-flex">
                                                <div>
                                                    <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                                        alt="">
                                                </div>
                                                <div>
                                                    <a href="{{$surat_permohonan_file}}"  target="_blank">
                                                        <button class="btn btn-sm btn-success">Download</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <button class="btn btn-dark btn-lg w-100" data-bs-toggle="modal" data-bs-target="#formDetailPerusahaan">
                                        <i class="fa fa-eye"></i>   Informasi Detail Perusahaan</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-dark btn-lg w-100" data-bs-toggle="modal" data-bs-target="#formDetailPermohonan">
                                        <i class="fa fa-eye"></i>   Informasi Detail Permohonan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- PROSES PERMOHONAN --}}
                        <div class="card">
                            <div class="card-body">
                                <h3 class="fw-bolder etxt">Proses Permohonan</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card" style="border: 1px solid">
                                            <div class="card-body p-4">
                                                <p class="text-danger mb-0">
                                                    {{date('d F T',strtotime($data->created_at))}} ||
                                                    {{date('H:i',strtotime($data->created_at))}}</p>

                                                    <span class="d-block fw-bold ">Permohonan Diajukan oleh Pemohon</span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card" style="border: 1px solid;background:#A11C4B;color:white;">
                                            <div class="card-body p-4">
                                                <p class="text-white mb-0">
                                                    {{date('d F T',strtotime($data->created_at))}} ||
                                                    {{date('H:i',strtotime($data->created_at))}}</p>
                                                    <span class="d-block">Kepala Distrik Navigasi memberikan Disposisi Kepada Kepala Bidang Operasi</span>
                                                    <span class="d-block fw-bold mb-2">HARAP MENJELASKAN</span>
                                                    <span class="d-block ">Keterangan :</span>
                                                    <span class="d-block fw-bold ">Pak Kabid Ops tolong Jelaskan maksud dari permohonan ini , saya kurang jelas apa maksud dari pemohon</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->
</div>
@endsection


@push('modals')
    @include('approval-survey.component.tindak-lanjut-kadisnav')
    @include('approval-survey.component.detail-perusahaan')
    @include('approval-survey.component.detail-permohonan-pengerukan')
@endpush

@push('scripts')

<!-- swiper js -->
<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>
<!-- timeline init -->
<script src="{{asset('assets/js/pages/timeline.init.js')}}"></script>

<script>
    $('#data-table').DataTable({
        //   "pageLength": 3
        paging: false

    });

    $('#tidakLanjut').on('change',function(){
        if(this.value =='UPDATE'){
            $('#updateJumlahBarang').removeClass('d-none');
        }else{
            $('#updateJumlahBarang').addClass('d-none');
        }
        if(this.value =='DISPOSISI'){
            $('#disposisiKe').removeClass('d-none');
        }else{
            $('#disposisiKe').addClass('d-none');
        }
    })
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });


    $('input[type=radio][name=tindak_lanjut]').change(function() {
       alert(this.value);
    });
</script>
@endpush
