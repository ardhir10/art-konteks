


@extends('main')


@push('styles')

<style>
.item{
    background: #A11C4B;
    color: white;
    border-radius: 10px;
    padding: 15px;
}

.clickable-row-2{
    cursor: pointer;
}
.clickable-row-2:hover{
    background: #670427 !important;
}
.item-text{
    font-size:15px;
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.item-text-1{
    width: 100%;
    padding: 0px 15px;position:relative;
}
</style>

@endpush
@section('content')
<div class="page-content">

<!-- end page title -->
<div class="row animate__animated  animate__fadeIn">
    <div class="col-lg-12">
        <div class="card shadow-lg">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">{{$page_title}}</h4>
            </div>
            <div class="card-body row">
                <div class="col-12">
                    <hr>
                    @include('components.flash-message')
                    <div class="row mb-3">
                         <div class="col-lg-12 mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Bulan</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">Januari</option>
                                            <option value="">Februari</option>
                                            <option value="">Maret</option>
                                            <option value="">April</option>
                                            <option value="">Mei</option>
                                            <option value="">Juni</option>
                                            <option value="">Juli</option>
                                            <option value="">Agustus</option>
                                            <option value="">September</option>
                                            <option value="">Oktober</option>
                                            <option value="">November</option>
                                            <option value="">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Tahun</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">2022</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Jenis Permohonan</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">Pertimbangan Teknis</option>
                                            <option value="">Rekomendasi Teknis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">Dalam Proses</option>
                                            <option value="">Disetujui</option>
                                            <option value="">Ditolak</option>
                                            <option value="">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="">Filter</label>
                                        <button class="btn btn-primary w-100">FILTER</button>

                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>
                <div class="col-lg-12">
                    <table class="table-striped datatables" id="data-table" style="font-size: 16px">
                        <thead>
                            <tr class="tr-head">
                                <th class="td-head" width="1%">No</th>
                                <th class="td-head" width="20%">Nomor Permohonan</th>
                                <th class="td-head" width="20%">Tanggal</th>
                                <th class="td-head" width="20%">Perusahaan</th>
                                <th class="td-head" width="20%">Jenis Permohonan</th>
                                <th class="td-head" width="1%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($data as $item)
                                @if (Auth::user()->role->name == 'Pemohon')
                                    @if (Auth::user()->id == $item->permohonan->pemohon_id)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->permohonan->no_permohonan}}</td>
                                            <td>{{$item->datetime}}</td>
                                            <td>{{$item->permohonan->pemohon->name}}</td>
                                            <td>{{$item->approvalProcess->typePermohonan()}}</td>
                                            <td>
                                                <a href="{{asset('dokumen-rekom-pertek/'.$item->file_name)}}">Download</a>
                                            </td>
                                        </tr>
                                    @endif

                                @else

                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->permohonan->no_permohonan}}</td>
                                        <td>{{$item->datetime}}</td>
                                        <td>{{$item->permohonan->pemohon->name}}</td>
                                        <td>{{$item->approvalProcess->typePermohonan()}}</td>
                                        <td>
                                            <a href="{{asset('dokumen-rekom-pertek/'.$item->file_name)}}">Download</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- end row -->

</div> <!-- container-fluid -->
</div>
@endsection

@push('scripts')
<script>
    $('#data-table').DataTable({
        //   "pageLength": 3

    });
    $(".clickable-row-2").on("click",  function(){
        window.location = $(this).data("href");
    });

</script>
@endpush
