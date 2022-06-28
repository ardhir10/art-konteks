

@extends('main')


@push('styles')
<!-- swiper css -->
<link rel="stylesheet" href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}">
<style>
    .item-dokumen{
        border: 1px solid;
        padding: 5px;
        border-radius: 10px;
    }

    .nowrap{
        white-space: nowrap !important;
    }
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
                                    @if ($data->isNotify($data->id,$data->getTable(),Auth::user()->role->name ?? null))
                                        <span class="noti-dotnya bg-danger"> ! </span>
                                    @endif
                                </h5>

                            </div>
                            <div class="col-lg-4 offset-lg-2">
                                <div class="text-end">
                                    @if ($data->isNotify($data->id,$data->getTable(),Auth::user()->role->name ?? null))
                                            <button class="btn btn-lg btn-danger w-100 " data-bs-toggle="modal" data-bs-target="#myModal">TINDAK LANJUT</button>
                                            <span class="d-block">Untuk melanjutkan proses terhadap permohonan ini Anda harus menekan button TINDAK LANJUT di atas.</span>
                                    @else
                                        @if ($data->status == 2)
                                            <p class="text-success fs-4">DOKUMEN TERBIT</p>
                                        @elseif ($data->status == 3)
                                            <p class="text-dark fs-4">SELESAI</p>
                                        @else
                                            <p class="text-warning fs-4">DALAM PROSES</p>
                                        @endif
                                        <p></p>
                                    @endif


                                </div>
                            </div>

                        </div>

                        {{-- TIMELINE PROGRESS --}}
                        @include('approval-survey.component.timeline')

                        {{-- DETAIL PERMOHONAN --}}
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
                                    @if (optional($data->prosesPermohonan->last())->typePermohonan() ?? null == 'PERTIMBANGAN TEKNIS')
                                        <div class="col-lg-3">
                                            <div class="form-group mb-2">
                                                <label for="" class="text-danger d-block fw-bolder">{{optional($data->prosesPermohonan->last())->typePermohonan() ?? null}}</label>
                                                <div class="d-flex">
                                                    <div>
                                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <a href="{{asset('dokumen-rekom-pertek/'.optional(
                                                                                                        optional(
                                                                                                            optional(
                                                                                                                $data->prosesPermohonan->last()
                                                                                                                )
                                                                                                            ->fileRekomPertek
                                                                                                        )->last()
                                                                                                    )->file_name ?? null)}}"
                                                            target="_blank">
                                                            <button class="btn btn-sm btn-success">Download</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

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
                                    <div class="col-lg-4">
                                        <button class="btn btn-dark btn-lg w-100" data-bs-toggle="modal" data-bs-target="#formProsesPermohonan">
                                        <i class="fa fa-eye"></i>  Proses Permohonan</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if (count($data->prosesPermohonan))
                            @if (count($data->prosesPermohonan->last()->tindakLanjut))
                                {{-- DETAIL TINDAK LANJUT --}}
                                @if ($data->prosesPermohonan->last()->typePermohonan() == 'PERTIMBANGAN TEKNIS')
                                    @include('approval-survey.component.proses-tindak-lanjut')
                                @else
                                    @include('approval-survey.component.proses-tindak-lanjut-rekom')
                                @endif
                            @endif

                            @if (count($data->prosesPermohonan->last()->laporanPp))
                                {{-- DETAIL LAPORAN PP --}}
                                @include('approval-survey.component.proses-tindak-laporan-pp')
                            @endif
                            @if (count($data->prosesPermohonan->last()->laporanPpp))
                                {{-- DETAIL LAPORAN PPP --}}
                                @include('approval-survey.component.proses-tindak-laporan-ppp')
                            @endif

                        @endif






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
    @if (Auth::user()->role->name == 'Kadisnav')
        @include('approval-survey.component.tindak-lanjut-kadisnav')
    @elseif (Auth::user()->role->name == 'Kabid OPS')
        @include('approval-survey.component.tindak-lanjut-kabidops')
    @elseif (Auth::user()->role->name == 'Kakel Pengla')
        @include('approval-survey.component.tindak-lanjut-kakelpengla')
    @elseif (Auth::user()->role->name == 'Surveyor Pengla')
        @include('approval-survey.component.tindak-lanjut-surveyorpengla')
    @elseif (Auth::user()->role->name == 'Kabag TU')
        @include('approval-survey.component.tindak-lanjut-kabagtu')
    @elseif (Auth::user()->role->name == 'Staff Tata Usaha')
        @include('approval-survey.component.tindak-lanjut-stafftu')
    @elseif (Auth::user()->role->name == 'Pemohon')
        @if (count($data->prosesPermohonan))
            @if (str_contains($data->getTable(),'_pt_'))
                @include('approval-survey.component.tindak-lanjut-pemohon-pertek')
            @else
                @include('approval-survey.component.tindak-lanjut-pemohon-rekom')
            @endif
        @endif

    @endif

    @include('approval-survey.component.detail-perusahaan')



   @if (Request::get('type') == 'REKLAMASI')
        @include('approval-survey.component.detail-permohonan-reklamasi')
    @elseif (Request::get('type') == 'PENGERUKAN')
        @include('approval-survey.component.detail-permohonan-pengerukan')
    @elseif (Request::get('type') == 'PEMBANGUNANBANGUNANPERAIRAN')
        @include('approval-survey.component.detail-permohonan-pbp')
    @elseif(Request::get('type')=='TERMINALUMUM')
        @include('approval-survey.component.detail-permohonan-terminal-umum')
        @elseif(Request::get('type')=='TERMINALKHUSUS')
        @include('approval-survey.component.detail-permohonan-terminal-khusus')
    @elseif(Request::get('type')=='TERMINALUKS')
        @include('approval-survey.component.detail-permohonan-tuks')
    @elseif(Request::get('type')=='PEKERJAANBAWAHAIR')
        @include('approval-survey.component.detail-permohonan-pba')
    @elseif(Request::get('type')=='PENYELENGGARAALURPELAYARAN')
        @include('approval-survey.component.detail-permohonan-pap')
    @elseif(Request::get('type')=='PEMBANGUNANSBNP')
        @include('approval-survey.component.detail-permohonan-sbnp')
    @elseif(Request::get('type')=='ZONASIPERAIRAN')
        @include('approval-survey.component.detail-permohonan-zona-perairan')
    @endif

    {{-- MODAL PROSES PERMOHONAN --}}
    @include('approval-survey.component.proses-permohonan-modal')
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

    function tindakLanjut(val){
        if(val =='Disposisi Kepada'){
            $('.disposisi-kepada').removeClass('d-none');
        }else{
            $('.disposisi-kepada').addClass('d-none');
        }
    }
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });

    function removeBtn(e){
        e.parentNode.parentNode.remove()
    }
    $('#tambahDokumen').on('click',function(){
        var itemKordinat = `
        <div class="item-dokumen shadow-lg d-flex mb-3">
            <div class="" style="width: 95%">
                <div class="p-1">
                    <div class="row mb-2 mt-2 ">
                        <div class="col-lg-12 mb-1">
                            <span for="" class="d-block">Nama Dokumen </span>
                            <div class="input-group">
                                <input type="text" name="nama_dokumen[]" class="form-control form-control-sm" id=""  placeholder="Nama Dokumen">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <span for="" class="d-block">Tangal Terbit </span>
                            <div class="input-group">
                                <input type="date" name="tanggal_terbit_pendukung[]" class="form-control form-control-sm" id=""  placeholder="" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <span for="" class="d-block nowrap">Instansi Penerbit </span>
                            <div class="input-group">
                                <input type="text" name="instansi_penerbit[]" class="form-control form-control-sm" id=""  placeholder="" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <span for="" class="d-block">File </span>
                            <div class="input-group">
                                <input type="file" name="file_pendukung[]" class="form-control form-control-sm" id=""  placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="width: 5%">
                <button class="btn btn-sm btn-outline-danger ms-1 float-end remove-btn" onclick="removeBtn(this)" type="button">X</button>
            </div>
        </div>`;
        $('.list-dokumen').append(itemKordinat);
    });


</script>
@endpush
