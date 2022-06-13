


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
            <div class="card-body row">
                <div class="col-12">
                    @include('components.flash-message')
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <img src="{{asset('images/logo_perusahaan/'.$data->logo_perusahaan)}}" alt="">
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-2">
                                <label for="" class="text-danger">Nama Perusahaan</label>
                                <span class="d-block">{{$data->nama_perusahaan}}</span>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-danger">Alamat Perusahaan</label>
                                <span class="d-block">{{$data->alamat_perusahaan}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <div class="form-group mb-2">
                                <label for="" class="text-danger">Jenis Badan usaha</label>
                                <span class="d-block">{{$data->jenisBadanUsaha->nama ?? ''}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="" class="text-danger">Nomor NPWP</label>
                                <span class="d-block">{{$data->nomor_npwp}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="" class="text-danger">Nomor Telepon Perusahaan</label>
                                <span class="d-block">{{$data->nomor_telepon_perusahaan}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="" class="text-danger">Email Perusahaan</label>
                                <span class="d-block">{{$data->alamat_email_perusahaan}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <div class="form-group mb-2">
                                <label for="" class="text-danger">Nama Pengurus</label>
                                <span class="d-block">{{$data->nama_pengurus ?? ''}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="" class="text-danger">Jabatan Pengurus</label>
                                <span class="d-block">{{$data->jenisPengurus->nama ?? ''}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="" class="text-danger">Nomor Telepon Pengurus</label>
                                <span class="d-block">{{$data->nomor_telepon_pengurus ?? ''}}</span>
                            </div>
                        </div>
                        @if ($data->status_approve == 2)
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="" class="text-danger d-block"> Alasan Penolakan</label>
                                    <span class="badge bg-danger">(DITOLAK)</span>
                                    <span class="d-block">{{$data->alasan_penolakan ?? ''}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="form-group mb-2">
                                <label for="" class="text-danger d-block fw-bolder">NPWP</label>
                                <div class="d-flex">
                                    <div>
                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{asset('images/file_npwp/'.$data->file_npwp)}}"  target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="text-danger d-block fw-bolder">SIUP</label>
                                <div class="d-flex">
                                    <div>
                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{asset('images/file_siup/'.$data->file_siup)}}" target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="text-danger d-block fw-bolder">NIB</label>
                                <div class="d-flex">
                                    <div>
                                        <img height="65" src="{{asset('assets/images/icon/file.png')}}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{asset('images/file_nib/'.$data->file_nib)}}" target="_blank">
                                            <button class="btn btn-sm btn-success">Download</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#formTolak">TOLAK</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formTerima">TERIMA REGISTRASI</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end row -->

</div> <!-- container-fluid -->
</div>
@endsection

@push('modals')

@push('modals')
<!-- sample modal content -->
<div id="formTolak" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tolak Permohonan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form action="{{route('permohonan-registrasi-tolak',$data->id)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Alasan Penolakan</label>
                        <textarea name="alasan_penolakan" id=""  cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success" id="simpanBeritaTambahan">OK</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="formTerima" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Terima Permohonan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form action="{{route('permohonan-registrasi-terima',$data->id)}}" method="post">
                @csrf

                <div class="modal-body">
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-success" id="simpanBeritaTambahan">OK</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endpush()

@push('scripts')
<script>
    $('#data-table').DataTable({
        //   "pageLength": 3

    });

</script>
@endpush
