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
                        <form action="{{route('approval-survey.tindak-lanjut',$data->id)}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$data->getTable()}}" name="permohonan_type">
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="disposisi_kepada" value="Disposisi Kepada" onchange="tindakLanjut('Disposisi Kepada')"
                                           name="tindak_lanjut">
                                        <label class="form-check-label" for="disposisi_kepada">Disposisi Kepada :</label>
                                    </div>
                                </div>
                                <div class="col-6 disposisi-kepada">
                                   <select name="disposisi_kepada_role" class="form-select form-control-sm" id="">
                                        <option value="Kabid OPS">Kepala Bidang Operasi</option>
                                        <option value="Kakel Pengla">Kakel Pengla</option>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row ps-5 disposisi-kepada">
                                <div class="col-12">
                                    <label for="">Isi Disposisi</label>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" id="harapMenjelaskan" value="Harap Menjelaskan"
                                          name="isi_disposisi">
                                        <label class="form-check-label" for="harapMenjelaskan">Harap Menjelaskan</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" id="lakukanSurveyLapangan" value="Lakukan Survey Lapangan"
                                          name="isi_disposisi">
                                        <label class="form-check-label" for="lakukanSurveyLapangan">Lakukan Survey Lapangan</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" id="draftRekomPertek" value="Draft Rekom/Pertek"
                                          name="isi_disposisi">
                                        <label class="form-check-label" for="draftRekomPertek">Draft Rekom/Pertek</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="rapatInternal" value="Rapat Internal" onchange="tindakLanjut('Rapat Internal')"
                                          name="tindak_lanjut">
                                        <label class="form-check-label" for="rapatInternal">Rapat Internal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="rapatDenganPemohon" value="Rapat Dengan Pemohon" onchange="tindakLanjut('Rapat Dengan Pemohon')"
                                          name="tindak_lanjut">
                                        <label class="form-check-label" for="rapatDenganPemohon">Rapat Dengan Pemohon</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
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
