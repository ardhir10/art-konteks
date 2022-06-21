<?php

namespace App\Http\Controllers;

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

class ApprovalSurveyController extends Controller
{
    public function index(){

        $data['page_title'] = 'Approval dan Survey';
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

        return view('approval-survey.admin-index', $data);

    }

    public function review(Request $request,$id){
        $data =$this->filteringPermohonan($request->type,$id);
        if(Auth::user()->role->name == 'Kadisnav'){
            // return view('approval-survey.kadisnav.review',$data);
            return view('approval-survey.review',$data);
        }else{
            return view('approval-survey.review',$data);

        }
    }

    private function filteringPermohonan($type,$id){
        if($type == 'PENGERUKAN'){
            $row = PermohonanPTPengerukan::where('id',$id)->first();
            $data['page_title'] = 'PERMOHONAN PENGERUKAN';
            $data['data'] = $row;
            $data['surat_permohonan_file'] =asset('dokumen-permohonan/permohonan-teknis/pengerukan/sp/', $row->surat_permohonan);

        }elseif ($type == 'REKLAMASI') {
            # code...
        }
        elseif ($type == 'TERMINALUMUM') {
            # code...
        }
        elseif ($type == 'TERMINALKHUSUS') {
            # code...
        }
        elseif ($type == 'TERMINALUKS') {
            # code...
        }
        elseif ($type == 'PEKERJAANBAWAHAIR') {
            # code...
        }
        elseif ($type == 'PERMBANGUNANBANGUNANPERAIRAN') {
            # code...
        }
        elseif ($type == 'PENYELENGGARAALURPELAYARAN') {
            # code...
        }
        elseif ($type == 'PEMBANGUNANSBNP') {
            # code...
        }
        elseif ($type == 'ZONASIPERAIRAN') {
            # code...
        }


        return $data;






    }

}
