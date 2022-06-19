<?php

namespace App\Http\Controllers;

use App\PermohonanPTPekerjaanBawahAir;
use App\PermohonanPTPembangunanBangunanPerairan;
use App\PermohonanPTPengerukan;
use App\PermohonanPTReklamasi;
use App\PermohonanPTTerminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'PERMOHONAN';


        if((Auth::user()->role->name ?? '') == 'Pemohon'){
            $PTPengerukan = PermohonanPTPengerukan::select('*')
            ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
            ->get();

            $PTRTerminal = PermohonanPTTerminal::select('*')
                ->where('pemohon_id', Auth::user()->id)
                ->get();

            $PTRPba = PermohonanPTPekerjaanBawahAir::select('*')
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $PTRPbp = PermohonanPTPembangunanBangunanPerairan::select('*')
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $result = collect($PTPengerukan)
                ->merge($PTReklamasi)
                ->merge($PTRTerminal)
                ->merge($PTRPba)
                ->merge($PTRPbp);
            $data['permohonan'] = $result;
            return view('permohonan.pemohon-index', $data);
        }else{
            $PTPengerukan = PermohonanPTPengerukan::select('*')
            ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
            ->get();

            $PTRTerminal = PermohonanPTTerminal::select('*')
                ->where('pemohon_id', Auth::user()->id)
                ->get();

            $PTRPba = PermohonanPTPekerjaanBawahAir::select('*')
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $PTRPbp = PermohonanPTPembangunanBangunanPerairan::select('*')
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $result = collect($PTPengerukan)
                ->merge($PTReklamasi)
                ->merge($PTRTerminal)
                ->merge($PTRPba)
                ->merge($PTRPbp);
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
        } elseif ($type == 'pembangunan-pengoprasian-tuks') {
            $data['page_title'] = 'PERMOHONAN PEMBANGUNAN & PENGOPRASIAN TUKS';
            return view('permohonan.pertimbangan-teknis.tuks.form-permohonan', $data);
        } elseif ($type == 'pembangunan-pengoprasian-tum') {
            $data['page_title'] = 'PERMOHONAN PEMBANGUNAN & PENGOPRASIAN TERMINAL UMUM';
            return view('permohonan.pertimbangan-teknis.terminal-umum.form-permohonan', $data);
        } elseif ($type == 'pekerjaan-bawah-air') {
            $data['page_title'] = 'PEKERJAAN BAWAH AIR';
            return view('permohonan.pertimbangan-teknis.pekerjaan-bawah-air.form-permohonan', $data);
        } elseif ($type == 'pembangunan-bangunan-perairan') {
            $data['page_title'] = 'PEMBANGUNAN BANGUNAN DI PERAIRAN';
            return view('permohonan.pertimbangan-teknis.pembangunan-bangunan-perairan.form-permohonan', $data);
        }
        else{
            dd('Not Available !');
        }
    }
}
