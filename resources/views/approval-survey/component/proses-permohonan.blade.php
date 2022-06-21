<div class="card">
    <div class="card-body">
        <h3 class="fw-bolder etxt">Proses Permohonan</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border: 1px solid">
                    <div class="card-body p-4">
                        <p class="text-danger mb-0">
                            {{date('d F T',strtotime($data->created_at))}} ||
                            {{date('H:i',strtotime($data->created_at))}}</p>

                            <span class="d-block fw-bold ">Permohonan Diajukan oleh Pemohon</span>

                    </div>
                </div>
            </div>

            @foreach ($data->prosesPermohonan as $proses_permohonan)
                @if ($proses_permohonan->visible == 0)
                    <div class="col-lg-12">
                        <div class="card" style="border: 1px solid;background:#A11C4B;color:white;">
                            <div class="card-body p-4">
                                <p class="text-white mb-0">
                                    {{date('d F T',strtotime($proses_permohonan->created_at))}} ||
                                    {{date('H:i',strtotime($proses_permohonan->created_at))}}</p>
                                    @if (
                                        $proses_permohonan->tindak_lanjut == 'Harap Menjelaskan' ||
                                        $proses_permohonan->tindak_lanjut== 'Lakukan Survey Lapangan' ||
                                        $proses_permohonan->tindak_lanjut== 'Draft Rekom/Pertek'
                                        )
                                        <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Disposisi kepada {{$proses_permohonan->notify_to_role}}</span>
                                    @elseif($proses_permohonan->tindak_lanjut =='Disposisi Kepada')
                                        <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Penjelasan kepada {{$proses_permohonan->notify_to_role}}</span>
                                    @else

                                    @endif
                                    <span class="d-block fw-bold mb-2">{{$proses_permohonan->tindak_lanjut}}</span>
                                    <span class="d-block ">Keterangan :</span>
                                    <span class="d-block fw-bold ">{{$proses_permohonan->keterangan}}</span>

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

                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <div class="card" style="border: 1px solid;">
                            <div class="card-body p-4">
                                <p class=" mb-0">
                                    {{date('d F T',strtotime($proses_permohonan->created_at))}} ||
                                    {{date('H:i',strtotime($proses_permohonan->created_at))}}</p>
                                    @if (
                                        $proses_permohonan->tindak_lanjut == 'Harap Menjelaskan' ||
                                        $proses_permohonan->tindak_lanjut== 'Lakukan Survey Lapangan' ||
                                        $proses_permohonan->tindak_lanjut== 'Draft Rekom/Pertek'
                                        )
                                        <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Disposisi kepada {{$proses_permohonan->notify_to_role}}</span>
                                    @elseif($proses_permohonan->tindak_lanjut =='Disposisi Kepada')
                                        <span class="d-block">{{$proses_permohonan->notify_from_role}} memberikan Penjelasan kepada {{$proses_permohonan->notify_to_role}}</span>
                                    @else

                                    @endif
                                    <span class="d-block fw-bold mb-2">{{$proses_permohonan->tindak_lanjut}}</span>
                                    <span class="d-block ">Keterangan :</span>
                                    <span class="d-block fw-bold ">{{$proses_permohonan->keterangan}}</span>

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

                            </div>
                        </div>
                    </div>
                @endif

            @endforeach


        </div>
    </div>
</div>
