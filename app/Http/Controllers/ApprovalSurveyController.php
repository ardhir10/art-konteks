<?php

namespace App\Http\Controllers;

use App\ApprovalProcess;
use App\DocumentLibrary;
use App\PermohonanPTPekerjaanBawahAir;
use App\PermohonanPTPembangunanBangunanPerairan;
use App\PermohonanPTPengerukan;
use App\PermohonanPTReklamasi;
use App\PermohonanPTTerminal;
use App\PermohonanRTPenyelenggaraAlurPelayaran;
use App\PermohonanRTPpSbnp;
use App\PermohonanRTZonasiPerairan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            return view('approval-survey.review-internal',$data);

        }elseif (Auth::user()->role->name == 'Kakel Pengla'){
            $data['surveyor_pengla'] = User::whereHas('role',function($q){
                $q->where('name','Surveyor Pengla');
            })
            ->get();
            return view('approval-survey.review-internal',$data);
        }else{
            return view('approval-survey.review-internal',$data);
        }
    }

    public function tindakLanjut(Request $request,$id){
        $tindakLanjut = $request->tindak_lanjut;
        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            if ($tindakLanjut == 'Disposisi Kepada') {
                if($request->isi_disposisi == 'Harap Menjelaskan'){
                    $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                    $dataApproval['permohonan_id'] = $id;
                    $dataApproval['keterangan'] = $request->keterangan;
                    $dataApproval['tindak_lanjut'] = $request->isi_disposisi;
                    $dataApproval['type'] = 'APPROVAL';
                    $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                    $dataApproval['notify_to_role'] = $request->disposisi_kepada_role;
                    $dataApproval['status'] = 'DALAM PROSES';
                    $dataApproval['visible'] = 0;
                    $dataApproval['from_table'] = $request->permohonan_type;
                    $dataApproval['created_by_id'] = Auth::user()->id;
                    $dataApproval['updated_by_id'] = null;
                } else if ($request->isi_disposisi == 'Lakukan Survey Lapangan') {
                    $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                    $dataApproval['permohonan_id'] = $id;
                    $dataApproval['keterangan'] = $request->keterangan;
                    $dataApproval['tindak_lanjut'] = $request->isi_disposisi;
                    $dataApproval['type'] = 'APPROVAL';
                    $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                    $dataApproval['notify_to_role'] = $request->disposisi_kepada_role;
                    $dataApproval['status'] = 'DALAM PROSES';
                    $dataApproval['visible'] = 1;
                    $dataApproval['from_table'] = $request->permohonan_type;
                    $dataApproval['created_by_id'] = Auth::user()->id;
                    $dataApproval['updated_by_id'] = null;
                }


            }
            ApprovalProcess::create($dataApproval);
            $modelPermohonan::where('id',$id)
                ->update(['status'=>1]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }

    public function tindakLanjutDisposisi(Request $request, $id)
    {
        // -- VALIDASI FILE
        $request->validate([
            'data_dukung.*' => 'mimes:pdf,jpg,jpeg,png',
        ]);

        $tindakLanjut = $request->tindak_lanjut;
        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            if ($tindakLanjut == 'Disposisi Kepada') {

                if ($request->disposisi_kepada_role == 'Kadisnav') {
                    $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                    $dataApproval['permohonan_id'] = $id;
                    $dataApproval['keterangan'] = $request->keterangan;
                    $dataApproval['tindak_lanjut'] = $tindakLanjut;
                    $dataApproval['type'] = 'APPROVAL';
                    $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                    $dataApproval['notify_to_role'] = $request->disposisi_kepada_role;
                    $dataApproval['status'] = 'DALAM PROSES';
                    $dataApproval['visible'] = 0;
                    $dataApproval['from_table'] = $request->permohonan_type;
                    $dataApproval['created_by_id'] = Auth::user()->id;
                    $dataApproval['updated_by_id'] = null;
                    $approvalProcess =ApprovalProcess::create($dataApproval);
                } else if ($request->disposisi_kepada_role == 'Kakel Pengla') {
                    $tindakLanjut = 'Lakukan Survey Lapangan';
                    $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                    $dataApproval['permohonan_id'] = $id;
                    $dataApproval['keterangan'] = $request->keterangan;
                    $dataApproval['tindak_lanjut'] = $tindakLanjut;
                    $dataApproval['type'] = 'APPROVAL';
                    $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                    $dataApproval['notify_to_role'] = $request->disposisi_kepada_role;
                    $dataApproval['status'] = 'DALAM PROSES';
                    $dataApproval['visible'] = 1;
                    $dataApproval['from_table'] = $request->permohonan_type;
                    $dataApproval['created_by_id'] = Auth::user()->id;
                    $dataApproval['updated_by_id'] = null;
                    $approvalProcess =ApprovalProcess::create($dataApproval);
                }else{
                    // --- JIKA TIDAK ADA ROLE MAKA DIPASTIKA ITU ADALAH DATA SURVEYOR
                    $tindakLanjut = 'Lakukan Survey Lapangan';
                    $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                    $dataApproval['permohonan_id'] = $id;
                    $dataApproval['keterangan'] = $request->keterangan;
                    $dataApproval['tindak_lanjut'] = $tindakLanjut;
                    $dataApproval['type'] = 'APPROVAL';
                    $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                    $dataApproval['notify_to_role'] = 'Surveyor Pengla';
                    $dataApproval['notify_to_id'] = $request->disposisi_kepada_role;
                    $dataApproval['status'] = 'DALAM PROSES';
                    $dataApproval['visible'] = 1;
                    $dataApproval['from_table'] = $request->permohonan_type;
                    $dataApproval['created_by_id'] = Auth::user()->id;
                    $dataApproval['updated_by_id'] = null;
                    $approvalProcess =ApprovalProcess::create($dataApproval);

                }

            }





            if ($request->file_pendukung) {
                foreach ($request->file_pendukung as $key => $filePendukung) {
                    // --- UPLOAD FILE
                    $file = $filePendukung;
                    // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                    $formatFilePendukung = $key.'_'.Auth::user()->id .'_'. $approvalProcess->id . '_' . time() . '_' . $id.'_'. bin2hex(random_bytes(5)) .'_FILEPENDUKUNG' ;
                    // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                    $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('dokumen-approval/file-pendukung/');
                    $file->move($destinationPath, $name);
                    $dataFilePendukung['file_name'] = $name;

                    // --- INSERT FILE
                    $dataFilePendukung['original_file_name'] = $file->getClientOriginalName();
                    $dataFilePendukung['approval_process_id'] = $approvalProcess->id;
                    $dataFilePendukung['permohonan_id'] = $id;
                    $dataFilePendukung['created_by_id'] = Auth::user()->id;
                    $dataFilePendukung['datetime'] =date('Y-m-d H:i:s');
                    $dataFilePendukung['type'] = 'DISPOSISI';
                    $dataFilePendukung['from_table'] = $request->permohonan_type;
                    $dataFilePendukung['keterangan'] = $request->keterangan;
                    $dataFilePendukung['tindak_lanjut'] = $tindakLanjut;
                    $dataFilePendukung['type'] = 'APPROVAL';

                    DocumentLibrary::create($dataFilePendukung);
                }
            }

            $modelPermohonan::where('id', $id)
            ->update(['status' => 1]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }



    private function filterModel($table){
        if($table == 'permohonan_pt_pengerukan'){
            return PermohonanPTPengerukan::class;
        }
    }

    private function filteringPermohonan($type,$id){
        if($type == 'PENGERUKAN'){
            $row = PermohonanPTPengerukan::where('id',$id)
            ->with(['prosesPermohonan'=>function($q){
                $q->orderBy('id','asc');
            }])
            ->first();
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

    private function base64url_encode($plainText)
    {
        return strtr(base64_encode($plainText), '+/=', '-_,');
    }

    private function base64url_decode($b64Text)
    {
        return base64_decode(strtr($b64Text, '-_,' ,'+/='));
    }

}
