<!doctype html>
<html lang="en">



<head>

    <meta charset="utf-8" />
    <title>KONTEKS | REGISTRASI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/icon/konteks-logo-dark.png')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('/assets')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/assets')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
<link href="{{asset('/assets')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        body{
             font-family: "Poppins" !important;
        }
        .overlay-body {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .pos-absolute {
            position: absolute;
        }

        .wd-100p {
            width: 100% !important;
        }


        .overlay-right {
            position: fixed; /* Sit on top of the page content */
            /* display: none;  */
            width: 50%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
        }
    </style>
</head>


<body style="overflow: hidden">
    {{-- <img src="{{asset('images/logo-disnav.png')}}" style="right: 20px;position: fixed;z-index: 3;top: 20px;" alt=""> --}}
    <!-- <body data-layout="horizontal"> -->

    <div class="" style="font-family: 'Poppins'">
        <div class="row">

            <div class="col-lg-6 pe-0 d-none d-sm-block  bg-konteks">
                {{-- <div class=" d-sm-none d-md-block  d-none d-sm-block d-none .d-sm-block"></div> --}}
                <img src="{{asset('images/background/image-login.png')}}" width="100%" alt="">
            </div>
             <div class="col-lg-6 bg-konteks">
                <br>
                <div class="">
                    <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                        <div class="row justify-content-center my-auto">
                            <h1 class="mt-1 text-center text-white">HALAMAN REGISTRASI</h1>
                            <div class="col-md-12 col-lg-6 col-xl-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div>
                                    <form action="{{ route('registrasi-eksternal') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Nama Perusahaan</label>
                                                    <input type="text" class="form-control form-control-sm" name="nama_perusahaan" value="{{old('nama_perusahaan')}}" required>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Alamat Perusahaan</label>
                                                    <textarea class="form-control form-control-sm" name="alamat_perusahaan" value="{{old('alamat_perusahaan')}}" id="" cols="30" rows="3" required></textarea>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Jenis Badan Usaha</label>
                                                    <select class="form-select form-control-sm" id="" name="jenis_badan_usaha_id" required>
                                                        <option value="">--</option>
                                                        @foreach ($jenis_badan_usaha as $item)
                                                            <option value="{{$item->id}}" {{$item->id == old('jenis_badan_usaha_id') ? 'selected=selected':''}}>{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" >Nomor NPWP</label>
                                                    <input type="text" class="form-control form-control-sm" id="nomorNpwp" name="nomor_npwp" value="{{old('nomor_npwp')}}" required>
                                                    <small class="text-warning"><i>*Tidak perlu pakai tanda .-</i></small>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="">Upload NPWP</label>
                                                    <input type="file" class="form-control form-control-sm" id="" name="file_npwp" required>
                                                    <small class="text-warning"><i>*PDF/JPG/PNG</i></small>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="">Upload SIUP</label>
                                                    <input type="file" class="form-control form-control-sm" id="" name="file_siup" required>
                                                    <small class="text-warning"><i>*PDF/JPG/PNG</i></small>
                                                </div>



                                            </div>
                                            <div class="col-lg-6">

                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Nomor Telepon Perusahaan</label>
                                                    <input type="text" class="form-control form-control-sm" name="nomor_telepon_perusahaan" value="{{old('nomor_telepon_perusahaan')}}" required>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Alamat Email Perusahaan</label>
                                                    <input type="text" class="form-control form-control-sm" name="alamat_email_perusahaan" value="{{old('alamat_email_perusahaan')}}" required>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Nama Pengurus</label>
                                                    <input type="text" class="form-control form-control-sm" name="nama_pengurus" value="{{old('nama_pengurus')}}"  required>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Jabatan Pengurus</label>
                                                    <select  class="form-select form-control-sm" id="" name="jenis_pengurus_id" required>
                                                        <option value="">--</option>
                                                        @foreach ($jenis_pengurus as $item)
                                                            <option value="{{$item->id}}" {{$item->id == old('jenis_pengurus_id') ? 'selected=selected':''}}>{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="" cla>Nomor Telepon Pengurus</label>
                                                    <input type="number" class="form-control form-control-sm" name="nomor_telepon_pengurus"  value="{{old('nomor_telepon_pengurus')}}"required>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="">Upload NIB</label>
                                                    <input type="file" class="form-control form-control-sm" id="" name="file_nib" required>
                                                    <small class="text-warning"><i>*PDF/JPG/PNG</i></small>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="text-white" for="">Upload Logo Perusahaan</label>
                                                    <input type="file" class="form-control form-control-sm"  name="logo_perusahaan" required>
                                                    <small class="text-warning"><i>*PDF/JPG/PNG</i></small>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn mt-2  btn-success">REGISTRASI</button>
                                    </form><!-- end form -->
                                    <div class="mt-5 text-center text-white">
                                        <p>Already have account ?  <a href="{{route('login')}}" class="fw-medium "> Log In </a></p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div><!-- end row -->


                    </div>
                </div><!-- end container -->
            </div>

        </div>
        <div class=" "></div>

    </div>
    <!-- end authentication section -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('/assets')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/assets')}}/libs/metismenujs/metismenujs.min.js"></script>
    <script src="{{asset('/assets')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('/assets')}}/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('/assets')}}/libs/feather-icons/feather.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>

        $('#nomorNpwp').on('keyup',function(){
            let noNpwp = formatNpwp($(this).val());
            $(this).val(noNpwp);
        });

        function formatNpwp(value) {
            if (typeof value === 'string') {
                return value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/, '$1.$2.$3.$4-$5.$6');
            }
        }
    </script>

</body>

<!-- Mirrored from preview.pichforest.com/dashonic/layouts/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Sep 2021 15:57:37 GMT -->

</html>
