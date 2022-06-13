


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
                <a href="{{route('master-data.jenis-badan-usaha.create')}}" class="btn btn-outline btn-outline-success  btn-rounded"> Tambah Data
                    <i class="fa fa-plus align-middle"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="col-12">
                    @include('components.flash-message')
                </div>
                <table class="table-striped datatables" id="data-table" style="font-size: 16px">
                    <thead>
                        <tr class="tr-head">
                            <th class="td-head" width="1%">No</th>
                            <th class="td-head" width="20%">Nama Jenis Badan Usaha</th>
                            <th class="td-head" width="20%">Keterangan</th>
                            <th class="td-head" width="1%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis_badan_usaha as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('master-data.jenis-badan-usaha.edit',$item->id)}}" data-toggle="tooltip" title="Edit Data"
                                        class="btn btn rounded-3 btn-outline btn-outline-success me-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn rounded-3 btn-outline btn-outline-danger" data-toggle="tooltip" title="Hapus Data" onclick="return confirmDelete('{{route('master-data.jenis-badan-usaha.delete',$item->id)}}')">
                                        <i class="fa fa-trash"></i></button>
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

</script>
@endpush