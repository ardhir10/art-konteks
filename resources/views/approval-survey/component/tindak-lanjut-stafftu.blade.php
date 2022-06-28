
@if ($data->prosesPermohonan->last()->tindak_lanjut == 'Rapat Internal')
    @if ($data->prosesPermohonan->last()->type == 'UNDANGAN RAPAT')
        <div>
            <!-- sample modal content -->
            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Hasil Laporan Rapat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="card-body row">
                            <div class="col-12">
                                <form action="{{route('approval-survey.tindak-lanjut.stafftu-laporan-undangan',$data->id)}}" method="POST" enctype="multipart/form-data">
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

                                    <div class="form-group mb-3">
                                        <label for="">Ringkasan Rapat</label>
                                        <textarea class="form-control" name="ringkasan_rapat" id="" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="form-group  mb-3">
                                        <label for="">
                                            <span class="text-danger">*</span>
                                            Upload Laporan Rapat</label>
                                        <input type="file" class="form-control" name="file_laporan_rapat"  accept=".pdf" required>
                                        <small>*PDF</small>
                                    </div>
                                    <div class="form-group row ">
                                        <button class="btn btn-success "> BUAT LAPORAN RAPAT</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

    @else
        <div>
            <!-- sample modal content -->
            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Undangan Rapat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="card-body row">
                            <div class="col-12">
                                <form action="{{route('approval-survey.tindak-lanjut.stafftu-create-undangan',$data->id)}}" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-group  mb-2">
                                        <label for="">Perihal Rapat</label>
                                        <input type="text" class="form-control" name="perihal_rapat">
                                    </div>

                                    <div class="form-group  mb-2">
                                        <label for="">Tanggal Rapat</label>
                                        <input type="date" class="form-select" name="tanggal_rapat">
                                    </div>

                                    <div class="form-group  mb-2">
                                        <label for="">Jam Rapat</label>
                                        <input type="time" class="form-select" name="jam_rapat">
                                    </div>
                                    <div class="form-group  mb-2">
                                        <label for="">Durasi Rapat</label>
                                        <select name="durasi_rapat" class="form-select" id="">
                                            <option value="1">1 Jam</option>
                                            <option value="2">2 Jam</option>
                                            <option value="3">3 Jam</option>
                                            <option value="4">4 Jam</option>
                                            <option value="5">5 Jam</option>
                                            <option value="6">6 Jam</option>
                                            <option value="7">7 Jam</option>
                                            <option value="8">8 Jam</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="form-group  mb-3">
                                        <label for="">
                                            <span class="text-danger">*</span>
                                            Upload Undangan</label>
                                        <input type="file" class="form-control" name="file_udangan_rapat"  accept=".pdf" required>
                                        <small>*PDF</small>
                                    </div>
                                    <div class="form-group row ">
                                        <button class="btn btn-success "> BUAT UNDANGAN</button>
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
                    <h5 class="modal-title" id="myModalLabel">Tindak Lanjut</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                <div class="card-body row">
                    <div class="col-12">
                        <form action="{{route('approval-survey.tindak-lanjut.penomoran-draft-rekom-pertek',$data->id)}}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group row mb-2">
                                <div class="col-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="hinggaTanggal" value="Hingga Tanggal" required
                                        name="range_waktu">
                                        <label class="form-check-label" for="hinggaTanggal">Hingga Tanggal :</label>
                                    </div>
                                </div>
                                <div class="col-6 ">
                                    <input type="date" class="form-control" name="hingga_Tanggal" value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="durasi" value="Durasi" required
                                        name="range_waktu">
                                        <label class="form-check-label" for="durasi">Durasi :</label>
                                    </div>
                                </div>
                                <div class="col-6 ">
                                    <select name="durasi" class="form-select" id="">
                                        <option value="01">01 Bulan</option>
                                        <option value="02">2 Bulan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="durasiWaktu" value="Berlaku Selamanya" required
                                        name="range_waktu">
                                        <label class="form-check-label" for="durasiWaktu">Berlaku Selamanya</label>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group row mb-3">
                                <label for="">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="">
                                    <span class="text-danger">*</span>
                                    Upload Dokumen dengan Penomoran</label>
                                <input type="file" class="form-control" name="file_draft"  accept=".pdf" required>
                                <small>*PDF</small>
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


