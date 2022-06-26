<div>
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Laporan Survey</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                <div class="card-body row">
                    <div class="col-12">
                        <form action="{{route('approval-survey.tindak-lanjut.disposisi',$data->id)}}" method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" value="Laporan Survey" name="tindak_lanjut">
                            <input type="hidden" value="{{$data->getTable()}}" name="permohonan_type">
                            <div class="form-group  mb-3">
                                <label for="">Tanggal Survey</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Dari :</label>
                                        <input type="date" class="form-control" value="" name="tanggal_survey_dari" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Sampai :</label>
                                        <input type="date" class="form-control" value="" name="tanggal_survey_sampai" required>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group  mb-3">
                                <label for="">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group  mb-3">
                                <label for="">Upload Laporan Survey</label>
                                <input type="file" class="form-control" name="file_pendukung[]" multiple  accept=".pdf">
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
