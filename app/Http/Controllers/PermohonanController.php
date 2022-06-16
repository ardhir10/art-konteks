<?php

namespace App\Http\Controllers;

use App\PermohonanPTPengerukan;
use App\PermohonanPTReklamasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'PERMOHONAN';


        if((Auth::user()->role->name ?? '') == 'Pemohon'){
            $PTPengerukan = PermohonanPTPengerukan::select('*')
            ->where('pemohon_id',Auth::user()->id)
            ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
            ->where('pemohon_id',Auth::user()->id)
            ->get();

            $result = collect($PTPengerukan)->merge($PTReklamasi);
            $data['permohonan'] = $result;
            return view('permohonan.pemohon-index', $data);
        }else{
            $PTPengerukan = PermohonanPTPengerukan::select('*')
            ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
            ->get();

            $result = collect($PTPengerukan)->merge($PTReklamasi);
            $data['permohonan'] = $result;

            return view('permohonan.admin-index', $data);
        }
    }

    public function pertimbanganTeknis(Request $request){
        $type = $request->type;
        if($type=='pengerukan'){
            $data['page_title'] = 'PERMOHONAN KEGIATAN PENGERUKAN';
            return view('permohonan.pertimbangan-teknis.pengerukan.form-permohonan', $data);

        }elseif($type == 'reklamasi' ){
            $data['page_title'] = 'PERMOHONAN KEGIATAN REKLAMASI';
            return view('permohonan.pertimbangan-teknis.reklamasi.form-permohonan', $data);
        } elseif ($type == 'pembangunan-pengoprasian-tersus') {
            $data['page_title'] = 'PERMOHONAN PEMBANGUNAN & PENGOPRASIAN TERSUS';
            return view('permohonan.pertimbangan-teknis.terminal-khusus.form-permohonan', $data);
        }
        else{
            dd('Not Available !');
        }
    }
}