@extends('main')


@push('styles')

<style>


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
                    <form action="">
                        <div class="row mb-3">
                            <div class="col-lg-12 mb-3">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Bulan</label>
                                            <select name="bulan" id="" class="form-select">
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Tahun</label>
                                            <select name="tahun" id="" class="form-select">
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Jenis Permohonan</label>
                                            <select name="jenis" id="" class="form-select">
                                                <option value="">All</option>
                                                <option value="Pertimbangan Teknis">Pertimbangan Teknis</option>
                                                <option value="Rekomendasi Teknis">Rekomendasi Teknis</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" id="" class="form-select">
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
                            <div class="col-lg-12">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="d-flex pb-1 ps-0">
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
                                                <span class="mt-1 ">Dokumen Terbit</span>
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
                                                <span class="mt-1 ">Selesai Tindak Lanjut</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </form>


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
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.pertimbangan-teknis.pengerukan.show',['id'=>$item->id])}}'>
                                @elseif ($item->getTable() == 'permohonan_pt_reklamasi')
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.pertimbangan-teknis.reklamasi.show',['id'=>$item->id])}}'>
                                @elseif ($item->getTable() == 'permohonan_pt_terminal')
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.pertimbangan-teknis.terminal-tuks.show',['id'=>$item->id])}}'>

                                @elseif ($item->getTable() == 'permohonan_pt_pba')
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.pertimbangan-teknis.pekerjaan-bawah-air.show',['id'=>$item->id])}}'>
                                @elseif ($item->getTable() == 'permohonan_pt_pbp')
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.pertimbangan-teknis.pembangunan-bangunan-perairan.show',['id'=>$item->id])}}'>
                                @elseif ($item->getTable() == 'permohonan_rt_pap')
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.rekomendasi-teknis.penyelenggara-alur-pelayaran.show',['id'=>$item->id])}}'>
                                @elseif ($item->getTable() == 'permohonan_rt_ppsbnp')
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.rekomendasi-teknis.pp-sbnp.show',['id'=>$item->id])}}'>
                                @elseif ($item->getTable() == 'permohonan_rt_zonasi_perairan')
                            <tr class='clickable-row'
                                data-href='{{route('permohonan.rekomendasi-teknis.zonasi-perairan.show',['id'=>$item->id])}}'>
                                @else
                                @endif
                                <td>{{$loop->iteration}} </td>
                                <td>{{$item->no_permohonan}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->pemohon->nama_perusahaan ?? ''}}</td>
                                @if (
                                ($item->getTable() == 'permohonan_rt_zonasi_perairan') ||
                                ($item->getTable() == 'permohonan_rt_ppsbnp') ||
                                ($item->getTable() == 'permohonan_rt_pap')
                                )
                                <td>{{'Rekomendasi Teknis'}}</td>
                                @else
                                <td>{{'Pertimbangan Teknis'}}</td>
                                @endif
                                <td>
                                    @if ($item->status == 2)
                                    <div class="avatar-sm me-1">
                                        <div class="avatar-title bg-success rounded-circle ">
                                        </div>
                                    </div>
                                    @elseif ($item->status == 3)
                                    <div class="avatar-sm me-1">
                                        <div class="avatar-title bg-dark rounded-circle ">
                                        </div>
                                    </div>
                                    @else
                                    <div class="avatar-sm me-1">
                                        <div class="avatar-title bg-warning rounded-circle ">
                                        </div>
                                    </div>
                                    @endif
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

</script>
@endpush
