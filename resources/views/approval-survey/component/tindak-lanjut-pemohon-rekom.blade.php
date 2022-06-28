
{{-- JIKA SUDAH ADA TINDAK LANJUT --}}
@if (count($data->prosesPermohonan->last()->tindakLanjut ?? []))
    @if (count($data->prosesPermohonan->last()->tindakLanjut->last()->pembangunanPelaksanaan ?? []))
        {{-- JIKA SUDAH ADA PEMBANGUNAN PELAKSANAAN MAKA DILANJUTKAN PENYELESAIIAN --}}
        <div>
            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">LAPORAN PENYELESAIAN PEMBANGUNAN/PELAKSANAA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="card-body row">
                            <div class="col-12">
                                <form action="{{route('approval-survey.tindak-lanjut.pemohon-pembangunan-penyelesaian',$data->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(session('errors'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="hidden" value="{{$data->getTable()}}" name="permohonan_type">
                                    <div class="form-group mb-2">
                                        <label>Tanggal Selesai Pembangunan/Pelaksanaan </label>
                                        <input type="date" class="form-control" name="tanggal_mulai_pembangunan" value="{{$data->prosesPermohonan->last()->tanggalTerbit()}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">
                                            <span class="text-danger">*</span>
                                            Upload Laporan Pembangunan/Pelaksanaan</label>
                                        <input type="file" class="form-control" name="laporan_pembangunan_pelaksanaan[]" multiple  accept=".pdf" required>
                                        <small>*PDF</small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
                                    </div>

                                    <div class="form-group row ">
                                        <button class="btn btn-success "> LANJUTKAN</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    @else
        {{-- JIKA BELUMA ADA PENYELESAIIAN MAKA LAPORAN PEMBANGUHNAN /PELAKSANAAN --}}
        <!-- sample modal content -->
        <div>
            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">LAPORAN PEMBANGUNAN/PELAKSANAAN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="card-body row">
                            <div class="col-12">
                                <form action="{{route('approval-survey.tindak-lanjut.pemohon-pembangunan-pelaksanaan',$data->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(session('errors'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="hidden" value="{{$data->getTable()}}" name="permohonan_type">
                                    <div class="form-group mb-2">
                                        <label>Tanggal Terbit Dokumen Izin Pembangunan</label>
                                        <input type="date" class="form-control" name="tanggal_mulai_pembangunan" value="{{$data->prosesPermohonan->last()->tanggalTerbit()}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">
                                            <span class="text-danger">*</span>
                                            Upload Dokumen</label>
                                        <input type="file" class="form-control" name="laporan_pembangunan_pelaksanaan[]" multiple  accept=".pdf" required>
                                        <small>*PDF</small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
                                    </div>

                                    <div class="form-group row ">
                                        <button class="btn btn-success "> LANJUTKAN</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    @endif


@else
    <div>
        <!-- sample modal content -->
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">SURAT REKOMENDASI KSOP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card-body row">
                        <div class="col-12">
                            <form action="{{route('approval-survey.tindak-lanjut.pemohon-izin-pembangunan-kantor-pusat',$data->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(session('errors'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" value="{{$data->getTable()}}" name="permohonan_type">
                                <div class="form-group mb-2">
                                    <label>Tanggal Terbit Dokumen</label>
                                    <input type="date" class="form-control" name="tanggal_terbit" value="{{$data->prosesPermohonan->last()->tanggalTerbit()}}">
                                </div>
                                <div class="form-group mb-2">
                                    <label>Instansi Penerbit Dokumen</label>
                                     <input type="text" class="form-control" name="penerbit">
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">
                                        <span class="text-danger">*</span>
                                        Upload Izin Pembangunan</label>
                                    <input type="file" class="form-control" name="file_draft"  accept=".pdf" required>
                                    <small>*PDF</small>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="">
                                        <label for="" class="d-block">Dokumen Pendukung Lainnya</label>
                                        <button class="btn btn-sm btn-primary d-block mb-3 btn-rounded" type="button" id="tambahDokumen">Tambah </button>
                                        <div class="list-dokumen d-block">
                                            <div class="item-dokumen shadow-lg d-flex mb-3">
                                                <div class="" style="width: 95%">
                                                    <div class="p-1">
                                                        <div class="row mb-2 mt-2 ">
                                                            <div class="col-lg-12 mb-1">
                                                                <span for="" class="d-block">Nama Dokumen </span>
                                                                <div class="input-group">
                                                                    <input type="text" name="nama_dokumen[]" class="form-control form-control-sm" id=""  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <span for="" class="d-block">Tangal Terbit </span>
                                                                <div class="input-group">
                                                                    <input type="date" name="tanggal_terbit_pendukung[]" class="form-control form-control-sm" id=""  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <span for="" class="d-block nowrap">Instansi Penerbit </span>
                                                                <div class="input-group">
                                                                    <input type="text" name="instansi_penerbit[]" class="form-control form-control-sm" id=""  placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <span for="" class="d-block">File </span>
                                                                <div class="input-group">
                                                                    <input type="file" name="file_pendukung[]" class="form-control form-control-sm" id=""  placeholder="">
                                                                </div>
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
                                <div class="form-group row ">
                                    <button class="btn btn-success "> LANJUTKAN</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
@endif

