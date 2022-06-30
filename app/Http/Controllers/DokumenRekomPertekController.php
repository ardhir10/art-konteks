<?php

namespace App\Http\Controllers;

use App\FileRekomPertek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenRekomPertekController extends Controller
{
    public function index(){
        $data['page_title'] = 'Dokumen Rekom Pertek';

        if (Auth::user()->role->name == 'Pemohon') {
            # code...permohonan
            $data['data'] = FileRekomPertek::where('created_by_role', 'Staff Tata Usaha')
            // ->with('permohonan')
            ->get();
        }else{

            $data['data'] = FileRekomPertek::where('created_by_role', 'Staff Tata Usaha')
            ->get();
        }

        return view('dokumen-rekom-pertek.index', $data);
    }
}
