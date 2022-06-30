<div class="card">
    <div class="card-body">
        <h3 class="fw-bolder etxt">Proses Permohonan</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border: 1px solid">
                    <div class="card-body p-4">
                        <p class="text-danger mb-0">
                            {{date('d F Y',strtotime($data->created_at))}} ||
                            {{date('H:i',strtotime($data->created_at))}}</p>

                            <span class="d-block fw-bold ">Permohonan Diajukan oleh Pemohon</span>

                    </div>
                </div>
            </div>

            @foreach ($data->prosesPermohonan as $proses_permohonan)
                @if ($proses_permohonan->type != 'TINDAK LANJUT')
                    @if ($proses_permohonan->visible == 0)
                        <div class="col-lg-12">
                            <div class="card" style="border: 1px solid;background:#A11C4B;color:white;">
                                <div class="card-body p-4">
                                    <p class=" mb-0">
                                        {{date('d F Y',strtotime($proses_permohonan->created_at))}} ||
                                        {{date('H:i',strtotime($proses_permohonan->created_at))}}</p>
                                        @if (
                                            $proses_permohonan->tindak_lanjut == 'Harap Menjelaskan' ||
                                            $proses_permohonan->tindak_lanjut== 'Lakukan Survey Lapangan'
                                            )
                                            <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Disposisi kepada {{$proses_permohonan->notify_to_role}}</span>
                                        @elseif($proses_permohonan->tindak_lanjut =='Disposisi Kepada')
                                            <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Penjelasan kepada {{$proses_permohonan->notify_to_role}}</span>
                                        @elseif($proses_permohonan->tindak_lanjut =='Draft Rekom/Pertek')
                                            @if ($proses_permohonan->notify_to_role == 'Kadisnav')
                                                <span class="d-block">{{$proses_permohonan->notify_from_role}} Menyetujui Draf Rekomendasi/Pertimbangan , {{$proses_permohonan->notify_to_role}} bisa melakukan rilis dokumen.</span>
                                            @elseif($proses_permohonan->status == 'DOKUMEN TERBIT')
                                                <span class="d-block">{{$proses_permohonan->notify_from_role}} telah merilis Dokumen Rekomendasi/Pertimbangan Teknis pada <b>{{$proses_permohonan->draftRekom->tanggal_rilis}}</b></span>
                                            @endif
                                        @elseif($proses_permohonan->tindak_lanjut == 'Rapat Internal')
                                            @if ($proses_permohonan->notify_from_role == 'Kadisnav')
                                                <span class="d-block">{{$proses_permohonan->notify_from_role}} meminta rapat internal {{$proses_permohonan->notify_to_role}}</span>
                                            @endif

                                            @if ($proses_permohonan->type == 'UNDANGAN RAPAT')
                                                <span class="d-block">UNDANGAN RAPAT</span>
                                            @endif
                                            @if ($proses_permohonan->type == 'LAPORAN RAPAT')
                                                <span class="d-block">LAPORAN RAPAT</span>
                                            @endif
                                        @endif

                                        @if ($proses_permohonan->status != 'DOKUMEN TERBIT')

                                            @if ($proses_permohonan->type == 'LAPORAN RAPAT')
                                                 <div class="mb-2">
                                                    <span class="d-block fw-bold mb-2">{{$proses_permohonan->tindak_lanjut}}</span>
                                                    <span class="d-block ">Laporan Rapat :</span>
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->laporanRapat->last()->ringkasan_rapat}}</span>
                                                </div>
                                            @else
                                                <div class="mb-2">
                                                    <span class="d-block fw-bold mb-2">{{$proses_permohonan->tindak_lanjut}}</span>
                                                    <span class="d-block ">Keterangan :</span>
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->keterangan}}</span>
                                                </div>
                                            @endif



                                            @if ($proses_permohonan->draftRekom )
                                                <span class="d-block ">Tanggal Berlaku :</span>
                                                @if ($proses_permohonan->draftRekom->range_waktu =='Berlaku Selamanya')
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->draftRekom->range_waktu}}</span>
                                                @elseif($proses_permohonan->draftRekom->range_waktu =='Hingga Tanggal')
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->draftRekom->hingga_tanggal}}</span>
                                                @else
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->draftRekom->durasi}} Bulan</span>
                                                @endif
                                            @endif
                                        @endif

                                        @if ($proses_permohonan->type == 'UNDANGAN RAPAT')
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="text-white">UNDANGAN RAPAT :</h5>
                                                    <table class="table text-white table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Perihal</th>
                                                            <th>Tanggal Rapat</th>
                                                            <th>Jam Rapat</th>
                                                            <th>Durasi</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->undanganRapat as $undanganRapat)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$undanganRapat->perihal_rapat}}</td>
                                                            <td>{{$undanganRapat->tanggal_rapat}}</td>
                                                            <td>{{$undanganRapat->jam_rapat}}</td>
                                                            <td>{{$undanganRapat->durasi_rapat}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-rekom-pertek/undangan-rapat/'.$undanganRapat->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($proses_permohonan->type == 'LAPORAN RAPAT')
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="text-white">HASIL LAPORAN RAPAT :</h5>
                                                    <table class="table text-white table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Ringkasan Hasil Rapat</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->laporanRapat as $laporanRapat)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$laporanRapat->ringkasan_rapat}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-rekom-pertek/laporan-rapat/'.$laporanRapat->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif

                                        @if (count($proses_permohonan->documents))
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="text-white">File Pendukung :</h5>
                                                    <table class="table text-white table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Original File Name</th>
                                                            <th>File Name</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->documents as $document)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$document->original_file_name}}</td>
                                                            <td>{{$document->file_name}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-approval/file-pendukung/'.$document->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif

                                        @if (count($proses_permohonan->fileRekomPertek))
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="text-white">File Rekom/Pertek :</h5>
                                                    <table class="table text-white table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Datetime</th>
                                                            <th>Original File Name</th>
                                                            <th>File Name</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->fileRekomPertek as $document2)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$document2->datetime}}</td>
                                                            <td>{{$document2->original_file_name}}</td>
                                                            <td>{{$document2->file_name}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-rekom-pertek/'.$document2->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <div class="card" style="border: 1px solid;">
                                <div class="card-body p-4">
                                    <p class=" mb-0">
                                        {{date('d F Y',strtotime($proses_permohonan->created_at))}} ||
                                        {{date('H:i',strtotime($proses_permohonan->created_at))}}</p>
                                    @if (
                                            $proses_permohonan->tindak_lanjut == 'Harap Menjelaskan' ||
                                            $proses_permohonan->tindak_lanjut== 'Lakukan Survey Lapangan'
                                            )
                                            <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Disposisi kepada {{$proses_permohonan->notify_to_role}}</span>
                                        @elseif($proses_permohonan->tindak_lanjut =='Disposisi Kepada')
                                            <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Penjelasan kepada {{$proses_permohonan->notify_to_role}}</span>
                                        @elseif($proses_permohonan->tindak_lanjut =='Draft Rekom/Pertek')
                                            @if ($proses_permohonan->notify_to_role == 'Kadisnav')
                                                <span class="d-block">{{$proses_permohonan->notify_from_role}} Menyetujui Draf Rekomendasi/Pertimbangan , {{$proses_permohonan->notify_to_role}} bisa melakukan rilis dokumen.</span>
                                            @elseif($proses_permohonan->status == 'DOKUMEN TERBIT')
                                                <span class="d-block">{{$proses_permohonan->notify_from_role}} telah merilis Dokumen Rekomendasi/Pertimbangan Teknis pada <b>{{$proses_permohonan->draftRekom->tanggal_rilis}}</b></span>
                                            @endif
                                        @elseif($proses_permohonan->tindak_lanjut == 'Rapat Dengan Pemohon')
                                            @if ($proses_permohonan->notify_from_role == 'Kadisnav')
                                                <span class="d-block">{{$proses_permohonan->notify_from_role}} meminta rapat {{$proses_permohonan->notify_to_role}}</span>
                                            @endif

                                            @if ($proses_permohonan->type == 'UNDANGAN RAPAT')
                                                <span class="d-block">UNDANGAN RAPAT</span>
                                            @endif
                                            @if ($proses_permohonan->type == 'LAPORAN RAPAT')
                                                <span class="d-block">LAPORAN RAPAT</span>
                                            @endif
                                        @endif

                                        @if ($proses_permohonan->status != 'DOKUMEN TERBIT')
                                            <div class="mb-2">
                                                <span class="d-block fw-bold mb-2">{{$proses_permohonan->tindak_lanjut}}</span>
                                                <span class="d-block ">Keterangan :</span>
                                                <span class="d-block fw-bold ">{{$proses_permohonan->keterangan}}</span>
                                            </div>

                                            @if ($proses_permohonan->draftRekom )
                                                <span class="d-block ">Tanggal Berlaku :</span>
                                                @if ($proses_permohonan->draftRekom->range_waktu =='Berlaku Selamanya')
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->draftRekom->range_waktu}}</span>
                                                @elseif($proses_permohonan->draftRekom->range_waktu =='Hingga Tanggal')
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->draftRekom->hingga_tanggal}}</span>
                                                @else
                                                    <span class="d-block fw-bold ">{{$proses_permohonan->draftRekom->durasi}} Bulan</span>
                                                @endif
                                            @endif
                                        @endif

                                        @if ($proses_permohonan->type == 'UNDANGAN RAPAT')
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="">UNDANGAN RAPAT :</h5>
                                                    <table class="table  table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Perihal</th>
                                                            <th>Tanggal Rapat</th>
                                                            <th>Jam Rapat</th>
                                                            <th>Durasi</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->undanganRapat as $undanganRapat)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$undanganRapat->perihal_rapat}}</td>
                                                            <td>{{$undanganRapat->tanggal_rapat}}</td>
                                                            <td>{{$undanganRapat->jam_rapat}}</td>
                                                            <td>{{$undanganRapat->durasi_rapat}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-rekom-pertek/undangan-rapat/'.$undanganRapat->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($proses_permohonan->type == 'LAPORAN RAPAT')
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="">HASIL LAPORAN RAPAT :</h5>
                                                    <table class="table  table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Ringkasan Hasil Rapat</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->laporanRapat as $laporanRapat)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$laporanRapat->ringkasan_rapat}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-rekom-pertek/laporan-rapat/'.$laporanRapat->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif


                                        @if (count($proses_permohonan->documents))
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="">File Pendukung :</h5>
                                                    <table class="table  table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Original File Name</th>
                                                            <th>File Name</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->documents as $document)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$document->original_file_name}}</td>
                                                            <td>{{$document->file_name}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-approval/file-pendukung/'.$document->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                        @if (count($proses_permohonan->fileRekomPertek))
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <h5 class="">File Rekom/Pertek :</h5>
                                                    <table class="table  table-sm table-bordered">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Datetime</th>
                                                            <th>Original File Name</th>
                                                            <th>File Name</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        @foreach ($proses_permohonan->fileRekomPertek as $document2)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$document2->datetime}}</td>
                                                            <td>{{$document2->original_file_name}}</td>
                                                            <td>{{$document2->file_name}}</td>
                                                            <td>
                                                                <a href="{{asset('dokumen-rekom-pertek/'.$document2->file_name)}}"  target="_blank">
                                                                        <button class="btn btn-sm btn-success">Download</button>
                                                                    </a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif

                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach


        </div>
    </div>
</div>
