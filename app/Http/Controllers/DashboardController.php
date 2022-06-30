<?php

namespace App\Http\Controllers;

use App\BarangKeluar;
use App\BarangMasuk;
use App\BarangPersediaan;
use App\LaporanPengawasan;
use App\MenaraSuar;
use App\PelampungSuar;
use App\Perairan;
use App\PermohonanPTPekerjaanBawahAir;
use App\PermohonanPTPembangunanBangunanPerairan;
use App\PermohonanPTPengerukan;
use App\PermohonanPTReklamasi;
use App\PermohonanPTTerminal;
use App\PermohonanRTPenyelenggaraAlurPelayaran;
use App\PermohonanRTPpSbnp;
use App\PermohonanRTZonasiPerairan;
use App\RambuSuar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        /*
            0/1/null :dalam proses
            2:dokumen terbit
            3:selesai
        */

        $data['page_title'] = "Dashboard";


            $data['total_pertek'] = $this->totalPertek(2);
            $data['total_rekom'] = $this->totalRekom(2);
            $data['pretek_on_progress'] = $this->pertekOnProgres(1);
            $data['rekom_on_progress'] = $this->rekomOnProgress(1);


        return view('dashboard.index', $data);

    }

    private  function totalPertek($status){
        if (Auth::user()->role->name == 'Pemohon') {
            $permohonan = PermohonanPTPengerukan::select('*')
            ->where('status', $status)
            ->where('pemohon_id', Auth::user()->id)
                ->get()->count();


            $permohonan += PermohonanPTReklamasi::select('*')
            ->where('status', $status)
            ->where('pemohon_id', Auth::user()->id)
                ->get()->count();

            $permohonan += PermohonanPTTerminal::select('*')
            ->where('status', $status)
            ->where('pemohon_id', Auth::user()->id)
                ->get()->count();

            $permohonan += PermohonanPTPekerjaanBawahAir::select('*')
            ->where('status', $status)
            ->where('pemohon_id', Auth::user()->id)
                ->get()->count();

            $permohonan += PermohonanPTPembangunanBangunanPerairan::select('*')
            ->where('status', $status)
            ->where('pemohon_id', Auth::user()->id)
                ->get()->count();
        }else{
            $permohonan = PermohonanPTPengerukan::select('*')
            ->where('status', $status)
            ->get()->count();


            $permohonan += PermohonanPTReklamasi::select('*')
            ->where('status', $status)
            // ->orWhere('status',null)
            ->get()->count();

            $permohonan += PermohonanPTTerminal::select('*')
            ->where('status', $status)
            // ->orWhere('status',null)
            ->get()->count();

            $permohonan += PermohonanPTPekerjaanBawahAir::select('*')
            ->where('status', $status)
            // ->orWhere('status',null)
            ->get()->count();

            $permohonan += PermohonanPTPembangunanBangunanPerairan::select('*')
            ->where('status', $status)
            // ->orWhere('status',null)
            ->get()->count();
        }

        return $permohonan;
    }

     private  function totalRekom($status){
        if (Auth::user()->role->name == 'Pemohon') {
            $permohonan = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
                ->where('status', $status)
                 ->where('pemohon_id', Auth::user()->id)
                // ->orWhere('status',null)
                ->get()->count();
            $permohonan += PermohonanRTPpSbnp::select('*')
                ->where('status', $status)
                 ->where('pemohon_id', Auth::user()->id)
                // ->orWhere('status',null)
                ->get()->count();

            $permohonan += PermohonanRTZonasiPerairan::select('*')
                ->where('status', $status)
                 ->where('pemohon_id', Auth::user()->id)
                // ->orWhere('status',null)
                ->get()->count();
        }else{

            $permohonan = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
                ->where('status', $status)
                // ->orWhere('status',null)
                ->get()->count();
            $permohonan += PermohonanRTPpSbnp::select('*')
                ->where('status', $status)
                // ->orWhere('status',null)
                ->get()->count();

            $permohonan += PermohonanRTZonasiPerairan::select('*')
                ->where('status', $status)
                // ->orWhere('status',null)
                ->get()->count();
        }

        return $permohonan;
     }

    private function pertekOnProgres($status){
        if (Auth::user()->role->name == 'Pemohon') {
            $permohonan = PermohonanPTPengerukan::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id', Auth::user()->id)
                ->get()->count();


            $permohonan += PermohonanPTReklamasi::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id', Auth::user()->id)
                ->get()->count();

            $permohonan += PermohonanPTTerminal::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id', Auth::user()->id)
                ->get()->count();

            $permohonan += PermohonanPTPekerjaanBawahAir::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id', Auth::user()->id)
                ->get()->count();

            $permohonan += PermohonanPTPembangunanBangunanPerairan::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id', Auth::user()->id)
                ->get()->count();
        }else{
            $permohonan = PermohonanPTPengerukan::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();


            $permohonan += PermohonanPTReklamasi::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();

            $permohonan += PermohonanPTTerminal::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();

            $permohonan += PermohonanPTPekerjaanBawahAir::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();

            $permohonan += PermohonanPTPembangunanBangunanPerairan::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();
        }



        return $permohonan;

    }

    private function rekomOnProgress($status){

        if (Auth::user()->role->name == 'Pemohon') {
            $permohonan = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id',Auth::user()->id)
                ->get()->count();
            $permohonan += PermohonanRTPpSbnp::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id',Auth::user()->id)
                ->get()->count();

            $permohonan += PermohonanRTZonasiPerairan::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->where('pemohon_id',Auth::user()->id)
                ->get()->count();
        }else{
            $permohonan = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();
            $permohonan += PermohonanRTPpSbnp::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();

            $permohonan += PermohonanRTZonasiPerairan::select('*')
                ->where(function($q)use ($status){
                    $q->where('status', $status)
                    ->orWhereNull('status');
                })
                ->get()->count();
        }


        return $permohonan;
    }





    private function filterReport($model, $request,$typeSbnp)
    {
        if ($request->penyelenggara != '') {
            $model = $model->where('adm_type_penyelenggara', $request->penyelenggara);
        }

        if ($request->perairan != '') {
            $model = $model->where('adm_perairan_id', $request->perairan);
        }

        if($request->sbnp != ''){
            if ($request->sbnp == $typeSbnp) {
                return $model = $model->get();
            } else {
                $model= $model->where('id', 0);
                return $model = $model->get();
            }
        }else{
            return $model = $model->get();
        }
    }


}
