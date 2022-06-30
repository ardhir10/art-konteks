<?php

namespace App\Http\Controllers;

use App\JenisZonasiPerairan;
use App\PermohonanPTPekerjaanBawahAir;
use App\PermohonanPTPembangunanBangunanPerairan;
use App\PermohonanPTPengerukan;
use App\PermohonanPTReklamasi;
use App\PermohonanPTTerminal;
use App\PermohonanRTPenyelenggaraAlurPelayaran;
use App\PermohonanRTPpSbnp;
use App\PermohonanRTZonasiPerairan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'PERMOHONAN';


        if((Auth::user()->role->name ?? '') == 'Pemohon'){
            $PTPengerukan = PermohonanPTPengerukan::select('*')
                ->where('pemohon_id', Auth::user()->id)
                ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
                ->where('pemohon_id', Auth::user()->id)
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

            $RTPap = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
                ->where('pemohon_id', Auth::user()->id)
                ->get();
            $RTPpSbnp = PermohonanRTPpSbnp::select('*')
                ->where('pemohon_id', Auth::user()->id)
                ->get();
            $RTPzp = PermohonanRTZonasiPerairan::select('*')
                ->where('pemohon_id', Auth::user()->id)
                ->get();


            $result = collect($PTPengerukan)
                ->merge($PTReklamasi)
                ->merge($PTRTerminal)
                ->merge($PTRPba)
                ->merge($PTRPbp)
                ->merge($RTPap)
                ->merge($RTPpSbnp)
                ->merge($RTPzp);
            $data['permohonan'] = $result;
            return view('permohonan.pemohon-index', $data);
        }else{
            $PTPengerukan = PermohonanPTPengerukan::select('*')
            ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
            ->get();

            $PTRTerminal = PermohonanPTTerminal::select('*')
                ->get();

            $PTRPba = PermohonanPTPekerjaanBawahAir::select('*')
            ->get();

            $PTRPbp = PermohonanPTPembangunanBangunanPerairan::select('*')
            ->get();

            $RTPap = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
            ->get();
            $RTPpSbnp = PermohonanRTPpSbnp::select('*')
            ->get();
            $RTPzp = PermohonanRTZonasiPerairan::select('*')
            ->get();


            $result = collect($PTPengerukan)
                ->merge($PTReklamasi)
                ->merge($PTRTerminal)
                ->merge($PTRPba)
                ->merge($PTRPbp)
                ->merge($RTPap)
                ->merge($RTPpSbnp)
                ->merge($RTPzp);
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

    public function rekomendasiTeknis(Request $request)
    {
        $type = $request->type;
        if ($type == 'penyelenggara-alur-pelayaran') {
            $data['page_title'] = 'PERMOHONAN PENYELENGGARA ALUR PELAYARAN';
            return view('permohonan.rekomendasi-teknis.penyelenggara-alur-pelayaran.form-permohonan', $data);
        } elseif ($type == 'pp-sbnp') {
            $data['page_title'] = 'PERMOHONAN PEMBANGUNAN/PEMASANGAN SBNP';
            return view('permohonan.rekomendasi-teknis.pp-sbnp.form-permohonan', $data);
        } elseif ($type == 'penetapan-zonasi') {
            $data['page_title'] = 'PENETAPAN ZONASI PERAIRAN ';
            $data['data_zonasi_perairan'] = JenisZonasiPerairan::get();

            return view('permohonan.rekomendasi-teknis.penetapan-zonasi.form-permohonan', $data);
        }  else{
            dd('Not Available !');
        }
    }
}
