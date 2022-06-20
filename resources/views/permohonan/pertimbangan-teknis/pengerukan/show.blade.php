


@extends('main')


@push('styles')

<style>

.item{
    background: #A11C4B;
    color: white;
    border-radius: 10px;
    padding: 15px;
}

.clickable-row-2{
    cursor: pointer;
}
.clickable-row-2:hover{
    background: #670427 !important;
}
.item-text{
    font-size:15px;
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.item-text-1{
    width: 100%;
    padding: 0px 15px;position:relative;
}

.index-remove {
    background: #F34E4E;
    border-radius: 10px;
    margin-left: 6px;
    text-align: center;
    color: white;
    font-size: 19px;
    font-weight: bolder;
}

.item-kordinat {
    width: 100%;
    display: block;
    padding: 13px;
    border: 1px solid #cdcdcd;
    border-radius: 10px;
}
</style>

@endpush
@section('content')
<div class="page-content">

<!-- end page title -->
<div class="row animate__animated  animate__fadeIn">
    <div class="col-lg-10">
        <div class="card shadow-lg">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">{{$page_title}}</h4>
            </div>
            @include('components.flash-message')
            <div class="card-body row">
                <div class="col-12">
                    <div class="form-group mb-2">
                        <span class="fs-5 fw-bolder text-danger d-block">{{$data->no_permohonan}}</span>
                    </div>
                    {{-- DATA PERUSAHAAN DAN SURAT PERMOHONAN --}}
                    <div class="form-group mb-2 row">
                        <div class="col-6">
                            <span class="text-danger">Perusahaan</span>
                            <span class="fs-6 fw-bolder  d-block">{{$data->pemohon->nama_perusahaan ?? 'N/A'}}</span>
                            <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#formDetailPerusahaan">
                                <i class="fa fa-eye"></i>   Informasi Detail Perusahaan</button>
                        </div>
                        <div class="col-6">
                            <label for="" class="text-danger d-block ">Surat Permohonan</label>
                            <div class="d-flex">
                                <div>
                                    <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                        alt="">
                                </div>
                                <div>
                                    <a href="{{asset('/dokumen-permohonan/permohonan-teknis/pengerukan/sp/'.$data->surat_permohonan)}}"  target="_blank">
                                        <button class="btn btn-sm btn-success">Download</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- DETAIL PERMOHONAN --}}
                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Detail Permohonan</span>
                        <div class="">
                            <span class="text-danger" for="">Perihal</span>
                            <span class="fs-6 fw-bolder d-block">{{$data->perihal}}</span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Jadwal Kegiatan</span>
                        <div class="row">
                            <div class="col-4">
                                <span class="text-danger" for="">Dari</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->jadwal_kegiatan_dari}}</span>
                            </div>
                            <div class="col-4">
                                <span class="text-danger" for="">Hingga</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->jadwal_kegiatan_hingga}}</span>
                            </div>
                            <div class="col-4">
                                <span class="text-danger fw-bolder fs-6" for="">{{$data->totalDayKegiatan()}} Hari</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Lokasi Pengerukan</span>
                        <div class="row">
                            <div class="col-4">
                                <span class="text-danger" for="">Nama Lokasi Pengerukan</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->lokasi_pengerukan}}</span>
                            </div>
                            <div class="col-4">
                                <span class="text-danger" for="">Titik Koordinat</span>
                                    @foreach ($data->lokasiPengerukan as $item)
                                    <span class="fs-6 fw-bolder d-block">
                                        {{$item->long_degrees}}°
                                        {{$item->long_minutes}}'
                                        {{$item->long_second}}"
                                        {{$item->long_direction}}
                                        -
                                        {{$item->lat_degrees}}°
                                        {{$item->lat_minutes}}'
                                        {{$item->lat_second}}"
                                        {{$item->lat_direction}}
                                    </span>
                                    @endforeach
                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#polygonMaps" onclick='showPolygon(@json($data->lokasiPengerukan),"polygonMaps","Lokasi Pengerukan")'>LIHAT PETA</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Lokasi Dumping di Laut</span>
                        <div class="row">
                            <div class="col-4">
                                <span class="text-danger" for="">Nama Lokasi Dumping di Laut</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->lokasi_dumping_laut}}</span>
                            </div>
                            <div class="col-4">
                                <span class="text-danger" for="">Titik Koordinat</span>
                                    @foreach ($data->lokasiDumping as $item)
                                    <span class="fs-6 fw-bolder d-block">
                                        {{$item->long_degrees}}°
                                        {{$item->long_minutes}}'
                                        {{$item->long_second}}"
                                        {{$item->long_direction}}
                                        -
                                        {{$item->lat_degrees}}°
                                        {{$item->lat_minutes}}'
                                        {{$item->lat_second}}"
                                        {{$item->lat_direction}}
                                    </span>
                                    @endforeach
                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#polygonMaps" onclick='showPolygon(@json($data->lokasiDumping),"polygonMaps","Lokasi Dumping")'>LIHAT PETA</button>
                                <span class="text-danger fw-bolder fs-6" for=""></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Dokumen Lingkungan/AMDAL</span>
                        <div class="row">
                            <div class="col-3">
                                <span class="text-danger" for="">Instansi Penerbit</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->amdal_nama_instansi}}</span>
                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">Tanggal Dokumen</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->amdal_tanggal_dokumen}}</span>


                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">Berlaku Hingga</span>
                                @if ($data->amdal_berlaku_hingga == 'Yes')
                                    <span class="fs-6 fw-bolder d-block">{{$data->amdal_berlaku_hingga_tanggal}}</span>
                                @else
                                    <span class="fs-6 fw-bolder d-block">Selamanya</span>
                                @endif


                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">File</span>
                                <div class="d-flex">
                                    <div>
                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/pengerukan/amdal/'.$data->amdal_file_dokumen)}}"  target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Dokumen Persetujuan Usaha Pertambangan</span>
                        <div class="row">
                            <div class="col-3">
                                <span class="text-danger" for="">Instansi Penerbit</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->dokp_nama_instansi}}</span>
                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">Tanggal Dokumen</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->dokp_tanggal_dokumen}}</span>


                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">Berlaku Hingga</span>
                                @if ($data->amdal_berlaku_hingga == 'Yes')
                                    <span class="fs-6 fw-bolder d-block">{{$data->dokp_berlaku_hingga_tanggal}}</span>
                                @else
                                    <span class="fs-6 fw-bolder d-block">Selamanya</span>
                                @endif


                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">File</span>
                                <div class="d-flex">
                                    <div>
                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/pengerukan/dokp/'.$data->dokp_file_dokumen)}}"  target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Lain - Lain</span>
                        <div class="row">
                            <div class="col-12">
                                <span class="text-danger" for="">Peralatan Yang Digunakan</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->peralatan_yang_digunakan}}</span>
                            </div>
                            <div class="col-6">
                                <span class="text-danger" for="">Keterangan Tambahan</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->keterangan_tambahan}}</span>


                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">Peta Laut</span>
                                <div class="d-flex">
                                    <div>
                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/pengerukan/pl/'.$data->peta_laut)}}"  target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
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
    <!-- FORM CONFIRM -->
    <div id="formDetailPerusahaan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Detail Perusahaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                <div class="card-body row">
                        <div class="col-12">
                            @include('components.flash-message')
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <img src="{{asset('images/logo_perusahaan/'.$data->pemohon->logo_perusahaan ?? '')}}" alt="">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <label for="" class="text-danger">Nama Perusahaan</label>
                                        <span class="d-block">{{$data->pemohon->nama_perusahaan}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-danger">Alamat Perusahaan</label>
                                        <span class="d-block">{{$data->pemohon->alamat_perusahaan}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <div class="form-group mb-2">
                                        <label for="" class="text-danger">Jenis Badan usaha</label>
                                        <span class="d-block">{{$data->pemohon->jenisBadanUsaha->nama ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="" class="text-danger">Nomor NPWP</label>
                                        <span class="d-block">{{$data->pemohon->nomor_npwp}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="" class="text-danger">Nomor Telepon Perusahaan</label>
                                        <span class="d-block">{{$data->pemohon->nomor_telepon_perusahaan}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="" class="text-danger">Email Perusahaan</label>
                                        <span class="d-block">{{$data->pemohon->alamat_email_perusahaan}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <div class="form-group mb-2">
                                        <label for="" class="text-danger">Nama Pengurus</label>
                                        <span class="d-block">{{$data->pemohon->nama_pengurus ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="" class="text-danger">Jabatan Pengurus</label>
                                        <span class="d-block">{{$data->pemohon->jenisPengurus->nama ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="" class="text-danger">Nomor Telepon Pengurus</label>
                                        <span class="d-block">{{$data->pemohon->nomor_telepon_pengurus ?? ''}}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <div class="form-group mb-2">
                                        <label for="" class="text-danger d-block fw-bolder">NPWP</label>
                                        <div class="d-flex">
                                            <div>
                                                <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                                    alt="">
                                            </div>
                                            <div>
                                                <a href="{{asset('images/file_npwp/'.$data->pemohon->file_npwp)}}"  target="_blank">
                                                    <button class="btn btn-sm btn-success">Download</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-danger d-block fw-bolder">SIUP</label>
                                        <div class="d-flex">
                                            <div>
                                                <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                                    alt="">
                                            </div>
                                            <div>
                                                <a href="{{asset('images/file_siup/'.$data->pemohon->file_siup)}}" target="_blank">
                                                    <button class="btn btn-sm btn-success">Download</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-danger d-block fw-bolder">NIB</label>
                                        <div class="d-flex">
                                            <div>
                                                <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                                    alt="">
                                            </div>
                                            <div>
                                                <a href="{{asset('images/file_nib/'.$data->pemohon->file_nib)}}" target="_blank">
                                                    <button class="btn btn-sm btn-success">Download</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TUTUP</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @include('modal-view-map.maps-polygon')
@endpush

@push('scripts')

<script>
    $('#data-table').DataTable({
        //   "pageLength": 3

    });
    $(".clickable-row-2").on("click",  function(){
        window.location = $(this).data("href");
    });


    function removeBtn(e){
        e.parentNode.parentNode.remove()
    }
    // --- KORDINAT PENGERUKKAN
    $('#tambahTitikPengerukan').on('click',function(){
        var itemKordinat = `
        <div class="item-kordinat shadow-lg d-flex mb-2 animate__animated  animate__fadeIn">
            <div class="" style="width: 95%">
                <div class="">
                    <span for="" class="d-block"><strong>LONGITUDE </strong></span>
                    <div class="row mb-2">
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="long_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="long_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="long_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select" name="long_direction[]">
                                <option value="">DIRECTION</option>
                                <option>N</option>
                                <option>S</option>
                            </select>
                        </div>
                    </div>
                    <span for="" class="d-block"><strong>LATITUDE </strong></span>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="lat_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="lat_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="lat_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select" name="lat_direction[]">
                                <option value="">DIRECTION</option>
                                <option>E</option>
                                <option>W</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="" style="width: 5%">
                <button class="btn btn-sm btn-outline-danger ms-1 float-end remove-btn" onclick="removeBtn(this)" type="button">X</button>
            </div>
        </div>`;
        $('.list-kordinat-pengerukan').append(itemKordinat);
    });

    $('#tambahTitikDumping').on('click',function(){
        var itemKordinat = `
        <div class="item-kordinat shadow-lg d-flex mb-2 animate__animated  animate__fadeIn">
            <div class="" style="width: 95%">
                <div class="">
                    <span for="" class="d-block"><strong>LONGITUDE </strong></span>
                    <div class="row mb-2">
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="long_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="long_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="long_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select" name="long_direction[]">
                                <option value="">DIRECTION</option>
                                <option>N</option>
                                <option>S</option>
                            </select>
                        </div>
                    </div>
                    <span for="" class="d-block"><strong>LATITUDE </strong></span>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="lat_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="lat_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="lat_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select" name="lat_direction[]">
                                <option value="">DIRECTION</option>
                                <option>E</option>
                                <option>W</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="" style="width: 5%">
                <button class="btn btn-sm btn-outline-danger ms-1 float-end remove-btn" onclick="removeBtn(this)" type="button">X</button>
            </div>
        </div>`;
        $('.list-kordinat-dumping').append(itemKordinat);
    });

    // --- AMDAL BERLAKU HINGGA
    $('#amdalTanggal').on('click',function(){
        $('#amdalTanggalPick').removeClass('d-none');
    })
    $('#amdalBs').on('click',function(){
        $('#amdalTanggalPick').addClass('d-none');
    })

    // --- DOKUMEN PERSETUJUAN
    $('#dokumenPersetujuanTanggal').on('click',function(){
        $('#dokumenPersetujuanTanggalPick').removeClass('d-none');
    })
    $('#dokumenPersetujuanBs').on('click',function(){
        $('#dokumenPersetujuanTanggalPick').addClass('d-none');
    })

    // if (!$("input[name='amdal_berlaku_hingga']").is(':checked')) {
    //     alert('Nothing is checked!');
    // }
    // else {
    //  alert('One of the radio buttons is checked!');
    // }








</script>
@endpush
