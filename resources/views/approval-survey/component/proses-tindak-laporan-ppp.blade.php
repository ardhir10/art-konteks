<div class="card">
    <div class="card-body">
        <h3 class="fw-bolder etxt">Laporan Penyelesaian Pembangunan/Pelaksanaan</h3>
        <div class="row">
            @foreach ($data->prosesPermohonan->last()->laporanPpp as $laporanPPP)
                <div class="col-lg-12">
                    <div class="card" style="border: 1px solid;;">
                        <div class="card-body p-4">
                            <p class=" mb-0">
                                {{date('d F Y',strtotime($laporanPPP->created_at))}} ||
                                {{date('H:i',strtotime($laporanPPP->created_at))}}</p>
                                <span class="text-bold">{{$laporanPPP->keterangan}}</span>

                                <div class=" row mt-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-0" for="">Tanggal Pembangunan Pelaksanaan</label>
                                            <span class="fw-bolder d-block">{{$laporanPPP->tanggal}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <h5 class="">File Laporan Pembangunan/Pelaksanaan :</h5>
                                        <table class="table  table-sm table-bordered">
                                            <tr>
                                                <th>No</th>
                                                <th>Original File Name</th>
                                                <th>File Name</th>
                                                <th>Download</th>
                                            </tr>
                                                @foreach ($laporanPPP->filePp as $filePp)
                                                    <tr>
                                                        <td>{{$filePp->iteration}}</td>
                                                        <td>{{$filePp->original_file_name}}</td>
                                                        <td>{{$filePp->file_name}}</td>
                                                        <td>
                                                            <a href="{{asset('dokumen-approval/laporan-pembangunan-pelaksanaan/'.$filePp->file_name)}}"  target="_blank">
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


