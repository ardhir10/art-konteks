<?php

namespace App\Http\Controllers;

use App\Mail\KonteksMail;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Illuminate\Support\Facades\Mail;


class RegistrasiPemohonController extends Controller
{
    public function index(){
        $data['page_title'] = 'Permohonan Registrasi';

        $dataUserPemohon = User::where('type','Eksternal')
            ->get();

        $data['data']= $dataUserPemohon;
        return view('registrasi-pemohon.index',$data);
    }

    public function detail($id)
    {
        $data['page_title'] = 'Permohonan Registrasi';

        $dataUserPemohon = User::where('id', $id)
        ->first();

        $data['data'] = $dataUserPemohon;
        return view('registrasi-pemohon.detail', $data);
    }

    public function terima(Request $request,$id)
    {

        $rules = [
            'username'                => 'required|unique:users,username,' . $id,
            'password'                => 'required',
        ];


        $messages = [
            'username.required'     => 'User ID Wajib Diisi',
            'username.unique'     => 'Username Sudah Terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        // --- HANDLE PROCESS
        $dataUserPemohon = User::where('id', $id)->first();
        try {
            Mail::to($dataUserPemohon->email)->send(new KonteksMail(['username' => $request->username ,'password'=>$request->password, 'type' => 'terima']));
            $dataUserPemohon = User::where('id', $id)
                ->update([
                    'status_approve' => 1,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                ]);
            return redirect()->route('permohonan-registrasi')->with(['success' => 'Permohonan Berhasil ']);
        } catch (\Throwable $th) {
            return redirect()->route('permohonan-registrasi')->with(['failed' => $th->getMessage()]);
        }

    }
    public function tolak(Request $request,$id)
    {
        $dataUserPemohon = User::where('id', $id)->first();
        // --- HANDLE PROCESS
        try {
            Mail::to($dataUserPemohon->email)->send(new KonteksMail(['alasan_penolakan'=> $request->alasan_penolakan,'type'=>'penolakan']));
            // -- KIRIM EMAIL
            User::where('id', $id)
                ->update([
                    'status_approve' => 2,
                    'alasan_penolakan' => $request->alasan_penolakan,
                ]);
            return redirect()->route('permohonan-registrasi')->with(['success' => 'Permohonan Ditolak !']);
        } catch (\Throwable $th) {
            return redirect()->route('permohonan-registrasi')->with(['failed' => $th->getMessage()]);
        }

    }
}
