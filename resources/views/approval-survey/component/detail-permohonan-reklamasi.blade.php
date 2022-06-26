<!-- FORM DETAIL PERMOHONAN -->
<div id="formDetailPermohonan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Detail Permohonan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
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

                        </div>
                        <div class="col-6">
                            <label for="" class="text-danger d-block ">Surat Permohonan</label>
                            <div class="d-flex">
                                <div>
                                    <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                        alt="">
                                </div>
                                <div>
                                    <a href="{{asset('/dokumen-permohonan/permohonan-teknis/reklamasi/sp/'.$data->surat_permohonan)}}"  target="_blank">
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
                        <span class="fs-5 fw-bolder d-block mb-2">Lokasi Reklamasi</span>
                        <div class="row">
                            <div class="col-4">
                                <span class="text-danger" for="">Nama Lokasi Reklamasi</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->lokasi_reklamasi}}</span>
                            </div>
                            <div class="col-4">
                                <span class="text-danger" for="">Titik Koordinat</span>
                                    @foreach ($data->lokasiReklamasi as $item)
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
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#polygonMaps" onclick='showPolygon(@json($data->lokasiReklamasi),"polygonMaps","Lokasi Reklamasi")'>LIHAT PETA</button>
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
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/reklamasi/amdal/'.$data->amdal_file_dokumen)}}"  target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Dokumen Persetujuan Lokasi Reklamasi</span>
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
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/reklamasi/dokp/'.$data->dokp_file_dokumen)}}"  target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <span class="fs-5 fw-bolder d-block mb-2">Dokumen Pertimbangan Penyelenggara Pelabuhan</span>
                        <div class="row">
                            <div class="col-3">
                                <span class="text-danger" for="">Instansi Penerbit</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->dokper_nama_instansi}}</span>
                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">Tanggal Dokumen</span>
                                <span class="fs-6 fw-bolder d-block">{{$data->dokper_tanggal_dokumen}}</span>


                            </div>
                            <div class="col-3">
                                <span class="text-danger" for="">Berlaku Hingga</span>
                                @if ($data->amdal_berlaku_hingga == 'Yes')
                                    <span class="fs-6 fw-bolder d-block">{{$data->dokper_berlaku_hingga_tanggal}}</span>
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
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/reklamasi/dokper/'.$data->dokper_file_dokumen)}}"  target="_blank">
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
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/reklamasi/pl/'.$data->peta_laut)}}"  target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
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
