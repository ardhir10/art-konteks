


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
    <div class="col-lg-12">
        <div class="card shadow-lg">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">{{$page_title}}</h4>
            </div>
            @include('components.flash-message')
            <form id="formPermohonan" action="{{route('permohonan.pertimbangan-teknis.reklamasi.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body row">
                    <div class="col-6">
                        {{-- PERIHAL --}}
                        <div class="form-group mb-2">
                            <span class="fs-5 fw-bolder d-block">Perihal</span>
                            <div class="ms-3">
                                <input type="text" class="form-control mb-2 {{ $errors->has('perihal') ? 'is-invalid' : ''}}" name="perihal"  value="{{old('perihal')}}">
                                @if ($errors->has('perihal'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('perihal') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- LOKASI REKLAMASI --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Lokasi Reklamasi</span>
                            <div class="ms-3">
                                <label class="" for="">Nama Lokasi Reklamasi</label>
                                <input type="text" class="form-control mb-2 {{ $errors->has('lokasi_reklamasi') ? 'is-invalid' : ''}}"
                                name="lokasi_reklamasi"
                                value="{{old('lokasi_reklamasi')}}">
                                @if ($errors->has('lokasi_reklamasi'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('lokasi_reklamasi') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="ms-3">
                                <label for="" class="d-block">Kordinat Lokasi Reklamasi </label>
                                <button class="btn btn-sm btn-primary d-block mb-3 btn-rounded" type="button" id="tambahTitikReklamasi">Tambah Titik</button>
                                <div class="list-kordinat-reklamasi d-block">
                                    <div class="item-kordinat shadow-lg d-flex mb-2">
                                        <div class="" style="width: 95%">
                                            <div class="">
                                                <span for="" class="d-block">LONGITUDE </span>
                                                <div class="row mb-2">
                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <input type="number" name="kr_long_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                                            <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <input type="number" name="kr_long_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                                            <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <input type="number" name="kr_long_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                                            <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <select class="form-select" name="kr_long_direction[]">
                                                            <option value="">DIRECTION</option>
                                                            <option>N</option>
                                                            <option>S</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <span for="" class="d-block">LATITUDE </span>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <input type="number" name="kr_lat_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                                            <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <input type="number" name="kr_lat_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                                            <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <input type="number" name="kr_lat_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                                            <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <select class="form-select" name="kr_lat_direction[]">
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
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- DOKUMEN LINGKUNGAN AMDAL --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Dokumen Lingkungan / AMDAL</span>
                            <div class="ms-3">
                                <label class="" for="">Nama Instansi Penerbit Dokumen</label>
                                <input type="text" class="form-control mb-2 {{ $errors->has('amdal_nama_instansi') ? 'is-invalid' : ''}}"
                                    name="amdal_nama_instansi"
                                    value="{{old('amdal_nama_instansi')}}">
                                @if ($errors->has('amdal_nama_instansi'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('amdal_nama_instansi') }}</div>
                                @endif

                                <label class="" for="">Tanggal Dokumen</label>
                                <input type="date" class="form-control mb-2 {{ $errors->has('amdal_tanggal_dokumen') ? 'is-invalid' : ''}}"
                                    name="amdal_tanggal_dokumen"
                                    value="{{old('amdal_tanggal_dokumen')}}">
                                @if ($errors->has('amdal_tanggal_dokumen'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('amdal_tanggal_dokumen') }}</div>
                                @endif

                                <label class="" for="">Berlaku Hingga</label>
                                <div class="row ms-1 w-100">
                                    <div class="col-2">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input " type="radio" id="amdalTanggal" value="Yes"
                                                {{ (old('amdal_berlaku_hingga')=="Yes")? "checked" : "" }} name="amdal_berlaku_hingga">
                                            <label class="form-check-label" for="amdalTanggal">Tanggal</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" id="amdalBs" value="No"
                                                {{ (old('amdal_berlaku_hingga')=="No")? "checked" : "" }} name="amdal_berlaku_hingga">
                                            <label class="form-check-label" for="amdalBs">Berlaku Selamanya</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none" id="amdalTanggalPick">
                                        <input type="date" name="amdal_berlaku_hingga_tanggal" class="form-control" value="{{old('amdal_berlaku_hingga_tanggal') ?? date('Y-m-d')}}">
                                    </div>
                                </div>
                                @if ($errors->has('amdal_berlaku_hingga'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('amdal_berlaku_hingga') }}</div>
                                @endif

                                <label class="" for="">Upload Dokumen</label>
                                <input type="file"  class="form-control mb-2 {{ $errors->has('amdal_file_dokumen') ? 'is-invalid' : ''}}"
                                    name="amdal_file_dokumen"
                                    value="{{old('amdal_file_dokumen')}}">
                                    <small>Upload file JPG/PNG/PDF</small>
                                @if ($errors->has('amdal_file_dokumen'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('amdal_file_dokumen') }}</div>
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="col-6">


                        {{-- Dokumen Persetujuan  --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Dokumen Surat Persetujuan Lokasi Reklamasi dari Instansi Berwenang</span>
                            <div class="ms-3">
                                <label class="" for="">Nama Instansi Penerbit Dokumen</label>
                                <input type="text" class="form-control mb-2 {{ $errors->has('dokp_nama_instansi') ? 'is-invalid' : ''}}"
                                    name="dokp_nama_instansi"
                                    value="{{old('dokp_nama_instansi')}}">
                                @if ($errors->has('dokp_nama_instansi'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokp_nama_instansi') }}</div>
                                @endif

                                <label class="" for="">Tanggal Dokumen</label>
                                <input type="date" class="form-control mb-2 {{ $errors->has('dokp_tanggal_dokumen') ? 'is-invalid' : ''}}"
                                    name="dokp_tanggal_dokumen"
                                    value="{{old('dokp_tanggal_dokumen')}}">

                                @if ($errors->has('dokp_tanggal_dokumen'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokp_tanggal_dokumen') }}</div>
                                @endif

                                <label class="" for="">Berlaku Hingga</label>
                                <div class="row ms-1 w-100">
                                    <div class="col-2">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" id="dokumenPersetujuanTanggal" value="Yes"
                                                {{ (old('crType')=="Yes")? "checked" : "" }} name="dokp_berlaku_hingga">
                                            <label class="form-check-label" for="dokumenPersetujuanTanggal">Tanggal</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" id="dokumenPersetujuanBs" value="No"
                                                {{ (old('crType')=="No")? "checked" : "" }} name="dokp_berlaku_hingga">
                                            <label class="form-check-label" for="dokumenPersetujuanBs">Berlaku Selamanya</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none" id="dokumenPersetujuanTanggalPick">
                                        <input type="date" class="form-control" name="dokp_berlaku_hingga_tanggal" value="{{old('dokp_berlaku_hingga_tanggal') ?? date('Y-m-d')}}">
                                    </div>
                                </div>
                                @if ($errors->has('dokp_berlaku_hingga'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokp_berlaku_hingga') }}</div>
                                @endif

                                <label class="" for="">Upload Dokumen</label>
                                <input type="file"  class="form-control mb-2 {{ $errors->has('dokp_file_dokumen') ? 'is-invalid' : ''}}"
                                    name="dokp_file_dokumen"
                                    value="{{old('dokp_file_dokumen')}}">
                                    <small>Upload file JPG/PNG/PDF</small>
                                @if ($errors->has('dokp_file_dokumen'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokp_file_dokumen') }}</div>
                                @endif
                            </div>
                        </div>


                        {{-- DOKUMEN PERTIMBANGAN  --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Dokumen Pertimbangan dari Penyelenggara Pelabuhan terhadap Kesesuaian Rencana Induk Pelabuhan (RIP)</span>
                            <div class="ms-3">
                                <label class="" for="">Nama Instansi Penerbit Dokumen</label>
                                <input type="text" class="form-control mb-2 {{ $errors->has('dokper_nama_instansi') ? 'is-invalid' : ''}}"
                                    name="dokper_nama_instansi"
                                    value="{{old('dokper_nama_instansi')}}">
                                @if ($errors->has('dokper_nama_instansi'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokper_nama_instansi') }}</div>
                                @endif

                                <label class="" for="">Tanggal Dokumen</label>
                                <input type="date" class="form-control mb-2 {{ $errors->has('dokper_tanggal_dokumen') ? 'is-invalid' : ''}}"
                                    name="dokper_tanggal_dokumen"
                                    value="{{old('dokper_tanggal_dokumen')}}">

                                @if ($errors->has('dokper_tanggal_dokumen'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokper_tanggal_dokumen') }}</div>
                                @endif

                                <label class="" for="">Berlaku Hingga</label>
                                <div class="row ms-1 w-100">
                                    <div class="col-2">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" id="dokumenPertimbanganTanggal" value="Yes"
                                                {{ (old('crType')=="Yes")? "checked" : "" }} name="dokper_berlaku_hingga">
                                            <label class="form-check-label" for="dokumenPertimbanganTanggal">Tanggal</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" id="dokumenPertimbanganBs" value="No"
                                                {{ (old('crType')=="No")? "checked" : "" }} name="dokper_berlaku_hingga">
                                            <label class="form-check-label" for="dokumenPertimbanganBs">Berlaku Selamanya</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none" id="dokumenPertimbanganTanggalPick">
                                        <input type="date" class="form-control" name="dokper_berlaku_hingga_tanggal" value="{{old('dokper_berlaku_hingga_tanggal') ?? date('Y-m-d')}}">
                                    </div>
                                </div>
                                @if ($errors->has('dokper_berlaku_hingga'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokper_berlaku_hingga') }}</div>
                                @endif

                                <label class="" for="">Upload Dokumen</label>
                                <input type="file"  class="form-control mb-2 {{ $errors->has('dokper_file_dokumen') ? 'is-invalid' : ''}}"
                                    name="dokper_file_dokumen"
                                    value="{{old('dokper_file_dokumen')}}">
                                    <small>Upload file JPG/PNG/PDF</small>
                                @if ($errors->has('dokper_file_dokumen'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('dokper_file_dokumen') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- PETA LAUT --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Peta Laut (Batimetri) </span>
                            <div class="ms-3">
                                <input type="file"  class="form-control mb-2 {{ $errors->has('peta_laut') ? 'is-invalid' : ''}}"
                                    name="peta_laut"
                                    value="{{old('peta_laut')}}">
                                <small>Upload file JPG/PNG/PDF</small>
                                @if ($errors->has('peta_laut'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('peta_laut') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- JADWAL KEGIATAN --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Jadwal Kegiatan </span>
                            <div class="ms-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Dari :</label>
                                        <input type="date"  class="form-control mb-2 {{ $errors->has('jadwal_kegiatan_dari') ? 'is-invalid' : ''}}"
                                            name="jadwal_kegiatan_dari"
                                            value="{{old('jadwal_kegiatan_dari')}}">
                                        @if ($errors->has('jadwal_kegiatan_dari'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('jadwal_kegiatan_dari') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="">Hingga :</label>
                                        <input type="date"  class="form-control mb-2 {{ $errors->has('jadwal_kegiatan_hingga') ? 'is-invalid' : ''}}"
                                            name="jadwal_kegiatan_hingga"
                                            value="{{old('jadwal_kegiatan_hingga')}}">
                                        @if ($errors->has('jadwal_kegiatan_hingga'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('jadwal_kegiatan_hingga') }}</div>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>

                        {{-- PERALATAN --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Peralatan Yang digunakan  </span>
                            <div class="ms-3">
                                <textarea name="peralatan_yang_digunakan" class="form-control
                                {{ $errors->has('peralatan_yang_digunakan') ? 'is-invalid' : ''}}" id="" cols="30" rows="3">{{old('peralatan_yang_digunakan')}}</textarea>
                                @if ($errors->has('peralatan_yang_digunakan'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('peralatan_yang_digunakan') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- KETERANGAN TAMBAHAN --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Keterangan Tambahan  </span>
                            <div class="ms-3">
                               <textarea name="keterangan_tambahan" class="form-control
                                {{ $errors->has('keterangan_tambahan') ? 'is-invalid' : ''}}" id="" cols="30" rows="3">{{old('keterangan_tambahan')}}</textarea>
                                @if ($errors->has('keterangan_tambahan'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('keterangan_tambahan') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- SURAT PERMOHONAN --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block">Surat Permohonan </span>
                            <div class="ms-3">
                                <input type="file"  class="form-control mb-2 {{$errors->has('surat_permohonan') ? 'is-invalid':''}}" name="surat_permohonan" value="{{old('surat_permohonan')}}">
                                <small>Upload file JPG/PNG/PDF</small>
                                @if ($errors->has('surat_permohonan'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('surat_permohonan') }}</div>
                                @endif
                            </div>
                        </div>



                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#formConfirm">AJUKAN PERMOHONAN</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end row -->

</div> <!-- container-fluid -->
</div>
@endsection

@push('modals')
<!-- FORM CONFIRM -->
<div id="formConfirm" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <span>Permohonan Pertimbangan Teknis Kegiatan Reklamasi telah diajukan kepada Distrik
                Navigasi Kelas I Tanjung Priok. Harap menunggu tindak lanjut dari Distrik Navigasi Kelas I
                Tanjung Priok pada aplikasi ini.
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BATAL</button>
                <button type="button" class="btn btn-success" id="submitPermohonan">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endpush
@push('scripts')
<script>

    $('#submitPermohonan').on('click',function(){

        $("#formPermohonan").submit();
        $("#formConfirm").modal('toggle');
    })

    $('#data-table').DataTable({
        //   "pageLength": 3

    });
    $(".clickable-row-2").on("click",  function(){
        window.location = $(this).data("href");
    });


    function removeBtn(e){
        e.parentNode.parentNode.remove()
    }
    // --- KORDINAT REKLAMASI
    $('#tambahTitikReklamasi').on('click',function(){
        var itemKordinat = `
        <div class="item-kordinat shadow-lg d-flex mb-2 animate__animated  animate__fadeIn">
            <div class="" style="width: 95%">
                <div class="">
                    <span for="" class="d-block"><strong>LONGITUDE </strong></span>
                    <div class="row mb-2">
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="kr_long_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="kr_long_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="kr_long_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select" name="kr_long_direction[]">
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
                                <input type="number" name="kr_lat_degrees[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="degrees">
                                <div class="input-group-text"><span class="fw-bolder" >°</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="kr_lat_minutes[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="minutes">
                                <div class="input-group-text"><span class="fw-bolder" >'</span></div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" name="kr_lat_second[]" class="form-control" id="specificSizeInputGroupUsername" step="0.1"" placeholder="second">
                                <div class="input-group-text"><span class="fw-bolder" >"</span></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select" name="kr_lat_direction[]">
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
        $('.list-kordinat-reklamasi').append(itemKordinat);
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

    // --- DOKUMEN PERTIMBANGAN
    $('#dokumenPertimbanganTanggal').on('click',function(){
        $('#dokumenPertimbanganTanggalPick').removeClass('d-none');
    })
    $('#dokumenPertimbanganBs').on('click',function(){
        $('#dokumenPertimbanganTanggalPick').addClass('d-none');
    })

    // if (!$("input[name='amdal_berlaku_hingga']").is(':checked')) {
    //     alert('Nothing is checked!');
    // }
    // else {
    //  alert('One of the radio buttons is checked!');
    // }

</script>
@endpush
