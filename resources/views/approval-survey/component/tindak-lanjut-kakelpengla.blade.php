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
                            <input type="hidden" value="{{$data->getTable()}}" name="permohonan_type">
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="disposisi_kepada" value="Disposisi Kepada" required onchange="tindakLanjut('Disposisi Kepada')"
                                           name="tindak_lanjut">
                                        <label class="form-check-label" for="disposisi_kepada">Disposisi Kepada :</label>
                                    </div>
                                </div>
                                <div class="col-6 disposisi-kepada">
                                   <select name="disposisi_kepada_role" class="form-select form-control-sm" id="">
                                        @if ($data->prosesPermohonan->last()->tindak_lanjut == 'Harap Menjelaskan')
                                            <option value="Kadisnav">Kepala Distrik Navigasi </option>
                                        @else
                                            @foreach ($surveyor_pengla as $surveyor)
                                                <option value="{{$surveyor->id}}">{{$surveyor->name}} </option>
                                            @endforeach
                                        @endif

                                   </select>
                                </div>
                            </div>


                            <div class="form-group row mb-3">
                                <label for="">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="">Upload File Pendukung</label>
                                <input type="file" class="form-control" name="file_pendukung[]" multiple  accept=".pdf,.jpg,.jpgeg,.png">
                                <small>*PDF/JPG/PNG</small>
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
