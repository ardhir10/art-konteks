<div class="card">
    <div class="card-body">
        <h3 class="fw-bolder etxt">Proses Tindak Lanjut</h3>
        <div class="row">
            @foreach ($tindak_lanjut as $tindakLanjut)
                <div class="col-lg-12">
                    <div class="card" style="border: 1px solid;;">
                        <div class="card-body p-4">
                            <p class=" mb-0">
                                {{date('d F Y',strtotime($tindakLanjut->created_at))}} ||
                                {{date('H:i',strtotime($tindakLanjut->created_at))}}</p>
                                <span class="text-bold">{{$tindakLanjut->keterangan}}</span>

                                <div class=" row mt-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-0" for="">Tanggal Terbit Dokumen</label>
                                            <span class="fw-bolder d-block">{{$tindakLanjut->tanggal_terbit}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-0" for="">Penerbit Dokumen</label>
                                            <span class="fw-bolder d-block">{{$tindakLanjut->penerbit ?? null}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <h5 class="">Izin Pembangunan Kantor Pusat :</h5>
                                        <table class="table  table-sm table-bordered">
                                            <tr>
                                                <th>No</th>
                                                <th>Original File Name</th>
                                                <th>File Name</th>
                                                <th>Download</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>{{$tindakLanjut->id}}</td>
                                                <td>{{$tindakLanjut->file_name}}</td>
                                                <td>
                                                    <a href="{{asset('dokumen-rekom-pertek/izin-pembangunan-kantor-pusat/'.$tindakLanjut->file_name)}}"  target="_blank">
                                                            <button class="btn btn-sm btn-success">Download</button>
                                                        </a>
                                                </td>

                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <h5 class="">File Pendukung :</h5>
                                        <table class="table  table-sm table-bordered">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Dokumen</th>
                                                <th>Tanggal Terbit</th>
                                                <th>Instansi Penerbit</th>
                                                <th>Download</th>
                                            </tr>
                                            @foreach ($tindakLanjut->approval->filePembangunanPelaksanaan as $fpp)
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{$fpp->file_name}}</td>
                                                    <td>{{$fpp->datetime}}</td>
                                                    <td>{{$fpp->penerbit}}</td>
                                                    <td>
                                                        <a href="{{asset('dokumen-approval/izin-pembangunan-kantor-pusat/'.$fpp->file_name)}}"  target="_blank">
                                                                <button class="btn btn-sm btn-success">Download</button>
                                                            </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


