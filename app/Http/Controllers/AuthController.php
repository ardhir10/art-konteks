<?php

namespace App\Http\Controllers;

use App\JenisBadanUsaha;
use App\JenisPengurus;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            Auth::logout(); // menghapus session yang aktif
            return redirect()->route('login');
        }
        return view('auth.login-page');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $request->email,
            'password' => $request->password
        ];



        Auth::attempt($data);
        // dd(Auth::attempt($data));
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        $data['jenis_badan_usaha'] = JenisBadanUsaha::get();
        $data['jenis_pengurus'] = JenisPengurus::get();
        return view('auth.register-page', $data);
    }

    public function register(Request $request)
    {
        $rules = [
            'username'                => 'required|unique:users,username',
            'password'                => 'required|confirmed',
            'nama'                    => 'required',
            'nip'                     => '',
            'nomor_telepon'           => '',
            'email'                   => 'required|email|unique:users,email',
            'fs_avatar'               => 'mimes:jpeg,png',
        ];


        $messages = [
            'nama.required'         => 'Nama Lengkap wajib diisi',
            'nama.min'              => 'Nama lengkap minimal 3 karakter',
            'nama.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',

            'username.required'     => 'User ID Wajib Diisi',

            'password.required'     => 'Password wajib diisi',
            'password.confirmed'  => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request->hasFile('fs_avatar')) {
            $avatar = $request->file('fs_avatar');
            $name = time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = public_path('images/avatar/');
            $avatar->move($destinationPath, $name);
            $fileName = $name;
        }
        $dataUserReadyInsert = [
            'name'=> $request->nama,
            'email'=> $request->email,
            'username'=> $request->username,
            'role_id'=> $request->role_id,
            'password'=> Hash::make($request->password),
            'fs_avatar'=> $fileName,
            'nip' => $request->nip,
            'nomor_telepon' => $request->nomor_telepon,
            // 'kapal_negara_id' => $request->kapal_negara_id,
            // 'stasiun_vts_id' => $request->stasiun_vts_id,
            // 'srop_id' => $request->srop_id,
            'type'=>'Internal',
            'keterangan' => $request->keterangan,
            'email_verified_at' => \Carbon\Carbon::now(),
        ];


        $user = User::create($dataUserReadyInsert);


        $user->syncRoles($request->role_id);
        if ($user) {
            Session::flash('success', 'Pembuatan berhasil ! Silahkan login untuk mengakses data');
            return redirect()->route('user.index');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('user.create');
        }
    }

    public function registerEksternal(Request $request)
    {
        $rules = [
            'nama_perusahaan'           => 'required',
            'alamat_email_perusahaan'                   => 'required|email|unique:users,email',
            'alamat_perusahaan'           => 'required',
            'jenis_badan_usaha_id'           => 'required',
            'nomor_npwp'           => 'required',
            'file_npwp'           => 'required|mimes:pdf,jpg,jpeg,png',
            'file_siup'           => 'required|mimes:pdf,jpg,jpeg,png',
            'file_nib'           => 'required|mimes:pdf,jpg,jpeg,png',
            'nomor_telepon_perusahaan'  => 'required',
            'nama_pengurus'           => 'required',
            'jenis_pengurus_id'           => 'required',
            'logo_perusahaan'           => 'required|mimes:pdf,jpg,jpeg,png',
        ];

        // $messages = [
        //     'nama.required'         => 'Nama Lengkap wajib diisi',
        //     'nama.min'              => 'Nama lengkap minimal 3 karakter',
        //     'nama.max'              => 'Nama lengkap maksimal 35 karakter',
        //     'email.required'        => 'Email wajib diisi',
        //     'email.email'           => 'Email tidak valid',
        //     'email.unique'          => 'Email sudah terdaftar',
        //     'username.required'     => 'User ID Wajib Diisi',
        //     'password.required'     => 'Password wajib diisi',
        //     'password.confirmed'  => 'Password tidak sama dengan konfirmasi password'
        // ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // UPLOAD NPWP
        $fileNpwp = '';
        if ($request->hasFile('file_npwp')) {
            $avatar = $request->file('file_npwp');
            $name = 'file_npwp'.'-'.time(). '.' . $avatar->getClientOriginalExtension();
            $destinationPath = public_path('images/file_npwp/');
            $avatar->move($destinationPath, $name);
            $fileNpwp = $name;
        }

        // UPLOAD SIUP
        $fileSiup = '';
        if ($request->hasFile('file_siup')) {
            $avatar = $request->file('file_siup');
            $name = 'file_siup' . '-' . time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = public_path('images/file_siup/');
            $avatar->move($destinationPath, $name);
            $fileSiup = $name;
        }

        // UPLOAD NIB
        $fileNib = '';
        if ($request->hasFile('file_nib')) {
            $avatar = $request->file('file_nib');
            $name = 'file_nib' . '-' . time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = public_path('images/file_nib/');
            $avatar->move($destinationPath, $name);
            $fileNib = $name;
        }

        // UPLOAD LOGO PERUSAHAAN
        $fileLogo = '';
        if ($request->hasFile('logo_perusahaan')) {
            $avatar = $request->file('logo_perusahaan');
            $name = 'logo_perusahaan' . '-' . time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = public_path('images/logo_perusahaan/');
            $avatar->move($destinationPath, $name);
            $fileLogo = $name;
        }


        $dataUserReadyInsert = [
            'name' => $request->nama_perusahaan,
            'email' => $request->alamat_email_perusahaan,
            'username' => $request->alamat_email_perusahaan,

            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'jenis_badan_usaha_id' => $request->jenis_badan_usaha_id,
            'nomor_npwp' => $request->nomor_npwp,
            'nomor_telepon_perusahaan' => $request->nomor_telepon_perusahaan,
            'alamat_email_perusahaan' => $request->alamat_email_perusahaan,
            'nama_pengurus' => $request->nama_pengurus,
            'jenis_pengurus_id' => $request->jenis_pengurus_id,
            'nomor_telepon_pengurus' => $request->nomor_telepon_pengurus,
            'file_npwp' => $fileNpwp,
            'file_siup' => $fileSiup,
            'file_nib' => $fileNib,
            'logo_perusahaan' => $fileLogo,

            'role_id' => 62,
            'password' => Hash::make($request->password),
            'fs_avatar' => $fileLogo,
            'nomor_telepon' => $request->nomor_telepon_pengurus,
            'type' => 'Eksternal',
            'email_verified_at' => \Carbon\Carbon::now(),
        ];

        // dd($dataUserReadyInsert);
        $user = User::create($dataUserReadyInsert);


        $user->syncRoles(62);
        if ($user) {
            Session::flash('success', 'Pendaftaran Akun Sistem Aplikasi KONTEKS telah kami terima. Permohonan Pendaftaran
            Anda akan kami verifikasi terlebih dahulu, dan jika disetujui, username dan password akan
            dikirimkan melalui alamat email yang Anda daftarkan melalui form registrasi ini. Terima
            Kasih.');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
