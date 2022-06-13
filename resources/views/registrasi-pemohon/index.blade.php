


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
                <div class="col-12">
                    @include('components.flash-message')
                    <table>
                        <tr>
                            <td>
                                <div class="d-flex pb-1 ps-4">
                                    <div class="avatar-sm me-1">
                                        <div class="avatar-title bg-warning rounded-circle ">
                                        </div>
                                    </div>
                                    <span class="mt-1 ">Belum Disetujui</span>
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
                        </tr>
                    </table>
                    <hr>
                </div>
                <table class="table-striped datatables" id="data-table" style="font-size: 16px">
                    <thead>
                        <tr class="tr-head">
                            <th class="td-head" width="1%">No</th>
                            <th class="td-head" width="20%">Nama Perusahaan</th>
                            <th class="td-head" width="20%">Jenis Badan Perusahaan</th>
                            <th class="td-head" width="20%">Email</th>
                            <th class="td-head" width="20%">Nomor Telepon</th>
                            <th class="td-head" width="1%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr class='clickable-row' data-href='{{route('permohonan-registrasi-detail',$item->id)}}'>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_perusahaan}}
                                    @if ($item->status_approve == null)
                                        <span class="noti-dotnya bg-danger"> ! </span>
                                    @else

                                    @endif

                                </td>
                                <td>{{$item->jenisBadanUsaha->nama ?? ''}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->nomor_telepon_pengurus}}</td>
                                <td>
                                    @if ($item->status_approve == null || $item->status_approve == 0 )
                                        {{-- BELUM DISETUJUI --}}
                                        <div class="avatar-sm ">
                                            <div class="avatar-title bg-warning rounded-circle font-size-12">

                                            </div>
                                        </div>
                                    @elseif ($item->status_approve == 1)
                                        {{-- DISEATUJUI --}}
                                        <div class="avatar-sm ">
                                            <div class="avatar-title bg-success rounded-circle font-size-12">

                                            </div>
                                        </div>
                                     @else
                                        {{-- DITOLAK --}}
                                        <div class="avatar-sm ">
                                            <div class="avatar-title bg-danger rounded-circle font-size-12">

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
