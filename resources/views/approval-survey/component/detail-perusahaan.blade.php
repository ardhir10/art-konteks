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
