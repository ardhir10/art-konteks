


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
            <div class="card-body">
                <div class="col-lg-12 mb-5">
                    <h5 class="fw-bolder">Pertimbangan Teknis</h5>
                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href='{{route('permohonan.pertimbangan-teknis',['type'=>'pengerukan'])}}'>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/01 pengerukan@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Kegiatan Pengerukan</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href='{{route('permohonan.pertimbangan-teknis',['type'=>'reklamasi'])}}'>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/02 Reklamasi@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Kegiatan Reklamasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href='{{route('permohonan.pertimbangan-teknis',['type'=>'pembangunan-pengoprasian-tersus'])}}'>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/03 Tersus@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Pembangunan & Pengoprasian Tersus
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href=''>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/04 TUKS@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Pembangunan & Pengoprasian TUKS
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href=''>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/05 Terminal Umum@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Pembangunan & Pengoprasian Terminal Umum</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href=''>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/pekbawahair@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Pekerjaan Bawah Air</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href=''>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/bangunanperairan@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Pembangunan Bangunan di Perairan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <h5 class="fw-bolder">Rekomendasi Teknis</h5>
                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href=''>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/alur pelayaran@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Penyelenggaraan Alur Pelayaran</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href=''>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/SBNP@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Pembangunan/ Pemasangan SBNP</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex  clickable-row-2" data-href=''>
                                <div>
                                    <img src="{{asset('images/icon-permohonan/zonasi@2x.png')}}" height="70px" alt="">
                                </div>
                                <div class="item-text-1">
                                    <span class="item-text" >
                                        Penetapan Zonasi Perairan
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12">
                    <hr>
                    @include('components.flash-message')
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <table>
                                <tr>
                                    <td>
                                        <div class="d-flex pb-1 ps-4">
                                            <div class="avatar-sm me-1">
                                                <div class="avatar-title bg-warning rounded-circle ">
                                                </div>
                                            </div>
                                            <span class="mt-1 ">Dalam Proses</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex pb-1 ps-4">
                                            <div class="avatar-sm me-1">
                                                <div class="avatar-title bg-success rounded-circle ">
                                                </div>
                                            </div>
                                            <span class="mt-1 ">Disetujui</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex pb-1 ps-4">
                                            <div class="avatar-sm me-1">
                                                <div class="avatar-title bg-danger rounded-circle ">
                                                </div>
                                            </div>
                                            <span class="mt-1 ">Ditolak</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex pb-1 ps-4">
                                            <div class="avatar-sm me-1">
                                                <div class="avatar-title bg-dark rounded-circle ">
                                                </div>
                                            </div>
                                            <span class="mt-1 ">Selesai</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6">
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
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Jenis Permohonan</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">Pertimbangan Teknis</option>
                                            <option value="">Rekomendasi Teknis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
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

                            </div>

                        </div>
                    </div>
                </div>
                <table class="table-striped datatables" id="data-table" style="font-size: 16px">
                    <thead>
                        <tr class="tr-head">
                            <th class="td-head" width="1%">No</th>
                            <th class="td-head" width="20%">Nomor Permohonan</th>
                            <th class="td-head" width="20%">Tanggal</th>
                            <th class="td-head" width="20%">Perusahaan</th>
                            <th class="td-head" width="20%">Jenis Permohonan</th>
                            <th class="td-head" width="1%">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($permohonan as $item)
                            @if ($item->getTable() == 'permohonan_pt_pengerukan')
                                <tr class='clickable-row' data-href='{{route('permohonan.pertimbangan-teknis.pengerukan.show',['id'=>$item->id])}}'>
                            @elseif ($item->getTable() == 'permohonan_pt_reklamasi')
                                <tr class='clickable-row' data-href='{{route('permohonan.pertimbangan-teknis.reklamasi.show',['id'=>$item->id])}}'>
                            @else

                            @endif
                                <td>{{$loop->iteration}} </td>
                                <td>{{$item->no_permohonan}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->pemohon->nama_perusahaan ?? ''}}</td>
                                <td>{{'Pengerukan'}}</td>
                                <td>
                                    <div class="avatar-sm me-1">
                                        <div class="avatar-title bg-warning rounded-circle ">
                                        </div>
                                    </div>
                                </td>

                        </tr>

                        @endforeach





                    </tbody>

                </table>
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
