<!-- FORM DETAIL PERMOHONAN -->
<div id="formDetailPermohonan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
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
                                <span
                                    class="fs-6 fw-bolder  d-block">{{$data->pemohon->nama_perusahaan ?? 'N/A'}}</span>
                                <button class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#formDetailPerusahaan">
                                    <i class="fa fa-eye"></i> Informasi Detail Perusahaan</button>
                            </div>
                            <div class="col-6">
                                <label for="" class="text-danger d-block ">Surat Permohonan</label>
                                <div class="d-flex">
                                    <div>
                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}" alt="">
                                    </div>
                                    <div>
                                        <a href="{{asset('/dokumen-permohonan/permohonan-teknis/terminal/sp/'.$data->surat_permohonan)}}"
                                            target="_blank">
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
                                    <span class="text-danger fw-bolder fs-6" for="">{{$data->totalDayKegiatan()}}
                                        Hari</span>
                                </div>
                            </div>
                        </div>

                        {{-- LOKASI TUKS  --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block mb-2">Lokasi TUKS</span>
                            <div class="row">
                                <div class="col-4">
                                    <span class="text-danger" for="">Nama Lokasi TUKS</span>
                                    <span class="fs-6 fw-bolder d-block">{{$data->lokasi_terminal_khusus}}</span>
                                </div>
                                <div class="col-4">
                                    <span class="text-danger" for="">Titik Koordinat</span>
                                    @foreach ($data->lokasiTerminalKhusus as $item)
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
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#polygonMaps"
                                        onclick='showPolygon(@json($data->lokasiTerminalKhusus),"polygonMaps","Lokasi TUKS")'>LIHAT
                                        PETA</button>
                                </div>
                            </div>
                        </div>



                        {{-- LOKASI RENCANA ALUR PELAYARAN  --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block mb-2">Kordinat Rencana Alur Pelayaran</span>
                            <div class="row">
                                <div class="col-4">
                                    <span class="text-danger" for="">Nama Lokasi Rencana Alur Pelayaran</span>
                                    <span class="fs-6 fw-bolder d-block">{{$data->lokasi_rencana_alur_pelayaran}}</span>
                                </div>
                                <div class="col-4">
                                    <span class="text-danger" for="">Titik Koordinat</span>
                                    @foreach ($data->lokasiTerminalRencanaAlurPelayaran as $item)
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
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#polygonMaps"
                                        onclick='showPolygon(@json($data->lokasiTerminalRencanaAlurPelayaran),"polygonMaps","Lokasi Rencana Alur Pelayaran")'>LIHAT
                                        PETA</button>
                                </div>
                            </div>
                        </div>

                        {{-- LOKASI KOLAM PELABUHAN  --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block mb-2">Kordinat Rencana Kolam Pelabuhan</span>
                            <div class="row">
                                <div class="col-4">
                                    <span class="text-danger" for="">Nama Lokasi Kordinat Rencana Kolam Pelabuhan</span>
                                    <span
                                        class="fs-6 fw-bolder d-block">{{$data->lokasi_rencana_kolam_pelabuhan}}</span>
                                </div>
                                <div class="col-4">
                                    <span class="text-danger" for="">Titik Koordinat</span>
                                    @foreach ($data->lokasiTerminalKhususRencanaKolamPelabuhan as $item)
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
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#polygonMaps"
                                        onclick='showPolygon(@json($data->lokasiTerminalKhususRencanaKolamPelabuhan),"polygonMaps","Lokasi Rencana Kolam Pelabuhan")'>LIHAT
                                        PETA</button>
                                </div>
                            </div>
                        </div>

                        {{-- LOKASI AREA LABUH  --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block mb-2">Kordinat Rencana Area Labuh</span>
                            <div class="row">
                                <div class="col-4">
                                    <span class="text-danger" for="">Nama Lokasi Kordinat Rencana Area Labuh</span>
                                    <span class="fs-6 fw-bolder d-block">{{$data->lokasi_rencana_area_labuh}}</span>
                                </div>
                                <div class="col-4">
                                    <span class="text-danger" for="">Titik Koordinat</span>
                                    @foreach ($data->lokasiTerminalKhususRencanaAreaLabuh as $item)
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
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#polygonMaps"
                                        onclick='showPolygon(@json($data->lokasiTerminalKhususRencanaAreaLabuh),"polygonMaps","Lokasi Rencana Area Lab")'>LIHAT
                                        PETA</button>
                                </div>
                            </div>
                        </div>


                        {{-- RENCANA PENEMPATAN SBNP  --}}
                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block mb-2">Rencana Penempatan SBNP</span>
                            @foreach ($data->rencanaSbnp as $rsbnp)
                            <div class="row">
                                <div class="col-3">
                                    <span class="text-danger" for="">SBNP</span>
                                    <span class="fs-6 fw-bolder d-block">{{$rsbnp->jenis_sbnp}}</span>
                                </div>
                                <div class="col-3">
                                    <span class="text-danger" for="">Titik Koordinat</span>
                                    <span class="fs-6 fw-bolder d-block">
                                        {{$rsbnp->long_degrees}}°
                                        {{$rsbnp->long_minutes}}'
                                        {{$rsbnp->long_second}}"
                                        {{$rsbnp->long_direction}}
                                        -
                                        {{$rsbnp->lat_degrees}}°
                                        {{$rsbnp->lat_minutes}}'
                                        {{$rsbnp->lat_second}}"
                                        {{$rsbnp->lat_direction}}
                                    </span>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#sbnpMaps"
                                        onclick='showSbnp(@json([$rsbnp->lat_dec,$rsbnp->long_dec]),"sbnpMaps",@json($rsbnp->jenis_sbnp))'>LIHAT
                                        PETA</button>
                                </div>
                                <div class="col-3">
                                    <span class="text-danger" for="">Spesifikasi SBNP</span>
                                    <span class="fs-6 fw-bolder d-block">{{$rsbnp->keterangan_rencana}}</span>

                                </div>
                            </div>
                            @endforeach
                        </div>





                        <div class="form-group mb-3">
                            <span class="fs-5 fw-bolder d-block mb-2">Lain - Lain</span>
                            <div class="row">
                                <div class="col-12">
                                    <span class="text-danger" for="">Peralatan Yang Digunakan</span>
                                    <span class="fs-6 fw-bolder d-block">{{$data->peralatan_yang_digunakan}}</span>
                                </div>
                                <div class="col-4">
                                    <span class="text-danger" for="">Keterangan Tambahan</span>
                                    <span class="fs-6 fw-bolder d-block">{{$data->keterangan_tambahan}}</span>
                                </div>
                                <div class="col-3">
                                    <span class="text-danger" for="">Peta Laut</span>
                                    <div class="d-flex">
                                        <div>
                                            <img height="65" src="{{asset('assets/images/icon/file.png')}}" alt="">
                                        </div>
                                        <div>
                                            <a href="{{asset('/dokumen-permohonan/permohonan-teknis/terminal/pl/'.$data->peta_laut)}}"
                                                target="_blank">
                                                <button class="btn btn-sm btn-success">Download</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <span class="text-danger" for="">Rencana Kunjungan Kapal</span>
                                    <div class="d-flex">
                                        <div>
                                            <img height="65" src="{{asset('assets/images/icon/file.png')}}" alt="">
                                        </div>
                                        <div>
                                            <a href="{{asset('/dokumen-permohonan/permohonan-teknis/terminal/rkk/'.$data->rencana_kunjungan_kapal)}}"
                                                target="_blank">
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
