<?php

namespace App\Http\Controllers;

use App\ApprovalProcess;
use App\DocumentLibrary;
use App\DraftRekomPertek;
use App\FileRekomPertek;
use App\Ksop;
use App\LaporanRapat;
use App\LaporanSurvey;
use App\PermohonanPTPekerjaanBawahAir;
use App\PermohonanPTPembangunanBangunanPerairan;
use App\PermohonanPTPengerukan;
use App\PermohonanPTReklamasi;
use App\PermohonanPTTerminal;
use App\PermohonanRTPenyelenggaraAlurPelayaran;
use App\PermohonanRTPpSbnp;
use App\PermohonanRTZonasiPerairan;
use App\TindakLanjut;
use App\UndanganRapat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApprovalSurveyController extends Controller
{
    public function index(){

        $data['page_title'] = 'Approval dan Survey';

        if ((Auth::user()->role->name ?? '') == 'Pemohon') {
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
        }


        $data['permohonan'] = $result;

        return view('approval-survey.admin-index', $data);

    }

    public function tindakLanjutDokumen()
    {

        $data['page_title'] = 'Tindak Lanjut Dokumen';

        if ((Auth::user()->role->name ?? '') == 'Pemohon') {
            $PTPengerukan = PermohonanPTPengerukan::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $PTRTerminal = PermohonanPTTerminal::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $PTRPba = PermohonanPTPekerjaanBawahAir::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $PTRPbp = PermohonanPTPembangunanBangunanPerairan::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();

            $RTPap = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();
            $RTPpSbnp = PermohonanRTPpSbnp::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();
            $RTPzp = PermohonanRTZonasiPerairan::select('*')
            ->where(function($q){
                $q->where('status', 2)
                ->orWhere('status',3);
            })
            ->where('pemohon_id', Auth::user()->id)
            ->get();
        }else{
            $PTPengerukan = PermohonanPTPengerukan::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();

            $PTReklamasi = PermohonanPTReklamasi::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();

            $PTRTerminal = PermohonanPTTerminal::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();

            $PTRPba = PermohonanPTPekerjaanBawahAir::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();

            $PTRPbp = PermohonanPTPembangunanBangunanPerairan::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();

            $RTPap = PermohonanRTPenyelenggaraAlurPelayaran::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();
            $RTPpSbnp = PermohonanRTPpSbnp::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();
            $RTPzp = PermohonanRTZonasiPerairan::select('*')
            ->where('status', 2)
            ->orWhere('status', 3)
            ->get();
        }



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
        }elseif (Auth::user()->role->name == 'Pemohon'){
            $data['ksop'] = Ksop::all();
            $data['tindak_lanjut'] = TindakLanjut::where('permohonan_id',$id)
                ->where('from_table', $data['data']->getTable())
                ->get();


            return view('approval-survey.tindak-lanjut-pemohon',$data);
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
                } else if ($request->isi_disposisi == 'Draft Rekom/Pertek') {
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
            }elseif($tindakLanjut == 'Rapat Internal'){
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = $tindakLanjut;
                $dataApproval['type'] = 'APPROVAL';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kabag TU';
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 0;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
            } elseif ($tindakLanjut == 'Rapat Dengan Pemohon') {
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = $tindakLanjut;
                $dataApproval['type'] = 'APPROVAL';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kabag TU';
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 1;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
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

        $tindakLanjut = $request->tindak_lanjut;
        if ($tindakLanjut == 'Laporan Survey') {
            // -- VALIDASI FILE
            $request->validate([
                'file_pendukung.*' => 'mimes:pdf',
            ]);
        }else{
            // -- VALIDASI FILE
            $request->validate([
                'file_pendukung.*' => 'mimes:pdf,jpg,jpeg,png',
            ]);
        }


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
            }elseif($tindakLanjut == 'Laporan Survey'){
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = $tindakLanjut;
                $dataApproval['type'] = 'APPROVAL';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kadisnav';
                $dataApproval['notify_to_id'] = null;
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 1;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
                $approvalProcess = ApprovalProcess::create($dataApproval);


                $dataSurvey['tanggal_survey_dari'] = $request->tanggal_survey_dari;
                $dataSurvey['tanggal_survey_sampai'] = $request->tanggal_survey_sampai;
                $dataSurvey['approval_process_id'] = $approvalProcess->id;
                $dataSurvey['permohonan_id'] = $id;
                $dataSurvey['from_table'] = $request->permohonan_type;
                $dataSurvey['keterangan'] = $request->keterangan;
                $dataSurvey['created_by_id'] = Auth::user()->id;
                LaporanSurvey::create($dataSurvey);
            } elseif ($tindakLanjut == 'Draft Rekom/Pertek') {
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = $tindakLanjut;
                $dataApproval['type'] = 'APPROVAL';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kakel Pengla';
                $dataApproval['notify_to_id'] = null;
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 1;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
                $approvalProcess = ApprovalProcess::create($dataApproval);
            }






            if ($request->file_pendukung) {

                $last_file_ident = '_FILEPENDUKUNG';

                if ($tindakLanjut == 'Laporan Survey') {
                    $last_file_ident = '_LAPORANSURVEY';
                }
                foreach ($request->file_pendukung as $key => $filePendukung) {
                    // --- UPLOAD FILE
                    $file = $filePendukung;
                    // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                    $formatFilePendukung = $key.'_'.Auth::user()->id .'_'. $approvalProcess->id . '_' . time() . '_' . $id.'_'. bin2hex(random_bytes(5)) .$last_file_ident ;
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

    public function tindakLanjutDraftRekomPertek(Request $request, $id)
    {

        $tindakLanjut = 'Draft Rekom/Pertek';
        // -- VALIDASI FILE
        $request->validate([
            'file_draft' => 'required|mimes:pdf',
        ]);


        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            if (Auth::user()->role->name == 'Kakel Pengla') {
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = $tindakLanjut;
                $dataApproval['type'] = 'APPROVAL';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kabid OPS';
                $dataApproval['status'] = 'DRAFT REKOM PERTEK ';
                $dataApproval['visible'] = 0;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
            } elseif (Auth::user()->role->name == 'Kabid OPS') {
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = $tindakLanjut;
                $dataApproval['type'] = 'APPROVAL';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kabag TU';
                $dataApproval['status'] = 'DRAFT REKOM PERTEK ';
                $dataApproval['visible'] = 0;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
            } elseif (Auth::user()->role->name == 'Kabag TU') {
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = $tindakLanjut;
                $dataApproval['type'] = 'APPROVAL';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kadisnav';
                $dataApproval['status'] = 'DRAFT REKOM PERTEK ';
                $dataApproval['visible'] = 0;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
            }
            $approvalProcess = ApprovalProcess::create($dataApproval);

            $dataDraftRekomPertek['no_rekom'] = null;
            $dataDraftRekomPertek['datetime'] = date('Y-m-d H:i:s');
            $dataDraftRekomPertek['approval_id'] = $approvalProcess->id;
            $dataDraftRekomPertek['permohonan_id'] =$id;
            $dataDraftRekomPertek['from_table'] =$request->permohonan_type;
            $dataDraftRekomPertek['hingga_tanggal'] = $request->hingga_Tanggal;
            $dataDraftRekomPertek['range_waktu'] = $request->range_waktu;
            $dataDraftRekomPertek['durasi'] = $request->durasi;
            $dataDraftRekomPertek['keterangan'] = $request->keterangan;
            $dataDraftRekomPertek['created_by_id'] = Auth::user()->id;
            $dataDraftRekomPertek['created_by_role'] = Auth::user()->role->name ?? '';
            $draftRekom= DraftRekomPertek::create($dataDraftRekomPertek);


            if ($request->file_draft) {

                $last_file_ident = '_FILEDRAFT';
                $file = $request->file_draft;
                // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                $formatFilePendukung = Auth::user()->id . '_' . $approvalProcess->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-rekom-pertek/');
                $file->move($destinationPath, $name);
                $dataFileDraft['file_name'] = $name;

                // --- INSERT FILE
                $dataFileDraft['original_file_name'] = $file->getClientOriginalName();
                $dataFileDraft['approval_id'] = $approvalProcess->id;
                $dataFileDraft['permohonan_id'] = $id;
                $dataFileDraft['draft_rekom_pertek_id'] = $draftRekom->id;
                $dataFileDraft['created_by_id'] = Auth::user()->id;
                $dataFileDraft['created_by_role'] = Auth::user()->role->name ?? '';
                $dataFileDraft['datetime'] = date('Y-m-d H:i:s');
                $dataFileDraft['permohonan_type'] = $request->permohonan_type;
                $dataFileDraft['keterangan'] = $request->keterangan;

                $fileRekom = FileRekomPertek::create($dataFileDraft);

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

    public function tindakLanjutRilisDraftRekomPertek(Request $request, $id)
    {
        $tindakLanjut = 'Draft Rekom/Pertek';
        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = $tindakLanjut;
            $dataApproval['type'] = 'APPROVAL';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = 'Staff Tata Usaha';
            $dataApproval['status'] = 'DOKUMEN TERBIT';
            $dataApproval['visible'] = 0;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;

            $approvalProcess = ApprovalProcess::create($dataApproval);

            $dataDraftRekomPertek['no_rekom'] = '001';
            $dataDraftRekomPertek['datetime'] = date('Y-m-d H:i:s');
            $dataDraftRekomPertek['approval_id'] = $approvalProcess->id;
            $dataDraftRekomPertek['permohonan_id'] =$id;
            $dataDraftRekomPertek['from_table'] =$request->permohonan_type;

            $dataDraftRekomPertek['hingga_tanggal'] = $request->tanggal_rilis;
            $dataDraftRekomPertek['range_waktu'] = $request->range_waktu;
            $dataDraftRekomPertek['durasi'] = $request->durasi;
            $dataDraftRekomPertek['keterangan'] = $request->keterangan;
            $dataDraftRekomPertek['created_by_id'] = Auth::user()->id;
            $dataDraftRekomPertek['created_by_role'] = Auth::user()->role->name ?? '';
            $dataDraftRekomPertek['tanggal_rilis'] = $request->tanggal_rilis;

            $draftRekom= DraftRekomPertek::create($dataDraftRekomPertek);



            // --- CARI FILE FINAL DARI KABAG TU
            $fileFinal = FileRekomPertek::where('permohonan_id',$id)
                ->where('permohonan_type', $request->permohonan_type)
                ->where('created_by_role', 'Kabag TU')
                ->orderBy('id','desc')
                ->first();



            // --- INSERT FILE RILIS
            $dataFileDraft['file_name'] = $fileFinal->file_name;
            $dataFileDraft['original_file_name'] = $fileFinal->original_file_name;
            $dataFileDraft['approval_id'] = $approvalProcess->id;
            $dataFileDraft['permohonan_id'] = $id;
            $dataFileDraft['draft_rekom_pertek_id'] = $fileFinal->draft_rekom_pertek_id;

            $dataFileDraft['created_by_id'] = Auth::user()->id;
            $dataFileDraft['created_by_role'] = 'Kadisnav' ?? '';
            $dataFileDraft['datetime'] = date('Y-m-d H:i:s');
            $dataFileDraft['permohonan_type'] = $request->permohonan_type;
            $dataFileDraft['keterangan'] = $request->keterangan;

            $fileRekom = FileRekomPertek::create($dataFileDraft);



            $modelPermohonan::where('id', $id)
                ->update(['status' => 2]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil di Release !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }

    public function tindakLanjutPenomoran(Request $request, $id)
    {
        $tindakLanjut = 'Draft Rekom/Pertek';
        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = $tindakLanjut;
            $dataApproval['type'] = 'APPROVAL';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = 'Pemohon';
            $dataApproval['notify_to_id'] = $modelPermohonan::first()->pemohon_id;
            $dataApproval['status'] = 'DOKUMEN TERBIT';
            $dataApproval['visible'] = 1;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;
            $approvalProcess = ApprovalProcess::create($dataApproval);

            $dataDraftRekomPertek['no_rekom'] = '001';
            $dataDraftRekomPertek['datetime'] = date('Y-m-d H:i:s');
            $dataDraftRekomPertek['approval_id'] = $approvalProcess->id;
            $dataDraftRekomPertek['permohonan_id'] = $id;
            $dataDraftRekomPertek['from_table'] = $request->permohonan_type;

            $dataDraftRekomPertek['hingga_tanggal'] = $request->tanggal_rilis;
            $dataDraftRekomPertek['range_waktu'] = $request->range_waktu;
            $dataDraftRekomPertek['durasi'] = $request->durasi;
            $dataDraftRekomPertek['keterangan'] = $request->keterangan;
            $dataDraftRekomPertek['created_by_id'] = Auth::user()->id;
            $dataDraftRekomPertek['created_by_role'] = Auth::user()->role->name ?? '';
            $dataDraftRekomPertek['tanggal_rilis'] = $request->tanggal_rilis;
            $draftRekom = DraftRekomPertek::create($dataDraftRekomPertek);



            // --- Upload File Dengan Penomoran
            if ($request->file_draft) {
                $last_file_ident = '_FILEDRAFT';
                $file = $request->file_draft;
                // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                $formatFilePendukung = Auth::user()->id . '_' . $approvalProcess->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-rekom-pertek/');
                $file->move($destinationPath, $name);
                $dataFileDraft['file_name'] = $name;

                // --- INSERT FILE
                $dataFileDraft['original_file_name'] = $file->getClientOriginalName();
                $dataFileDraft['approval_id'] = $approvalProcess->id;
                $dataFileDraft['permohonan_id'] = $id;
                $dataFileDraft['draft_rekom_pertek_id'] = $draftRekom->id;
                $dataFileDraft['created_by_id'] = Auth::user()->id;
                $dataFileDraft['created_by_role'] = Auth::user()->role->name ?? '';
                $dataFileDraft['datetime'] = date('Y-m-d H:i:s');
                $dataFileDraft['permohonan_type'] = $request->permohonan_type;
                $dataFileDraft['keterangan'] = $request->keterangan;

                $fileRekom = FileRekomPertek::create($dataFileDraft);
            }



            $modelPermohonan::where('id', $id)
                ->update(['status' => 2]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil di Release !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }



    private function filterModel($table){
        if($table == 'permohonan_pt_pengerukan'){
            return PermohonanPTPengerukan::class;
        }elseif($table== 'permohonan_pt_reklamasi'){
            return PermohonanPTReklamasi::class;
        } elseif ($table == 'permohonan_pt_pba') {
            return PermohonanPTPekerjaanBawahAir::class;
        } elseif ($table == 'permohonan_pt_pbp') {
            return PermohonanPTPembangunanBangunanPerairan::class;
        } elseif ($table == 'permohonan_pt_terminal') {
            return PermohonanPTTerminal::class;
        } elseif ($table == 'permohonan_rt_pap') {
            return PermohonanRTPenyelenggaraAlurPelayaran::class;
        } elseif ($table == 'permohonan_rt_ppsbnp') {
            return PermohonanRTPpSbnp::class;
        } elseif ($table == 'permohonan_rt_zonasi_perairan') {
            return PermohonanRTZonasiPerairan::class;
        }
    }

    public function kabagTULanjutkan(Request $request, $id)
    {
        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();

            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = 'Rapat Internal';
            $dataApproval['type'] = 'APPROVAL';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = 'Staff Tata Usaha';
            $dataApproval['status'] = 'DALAM PROSES';
            $dataApproval['visible'] = 0;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;


            ApprovalProcess::create($dataApproval);
            $modelPermohonan::where('id', $id)
            ->update(['status' => 1]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }

    public function kabagTULanjutkanPemohon(Request $request, $id)
    {
        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();

            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = 'Rapat Dengan Pemohon';
            $dataApproval['type'] = 'APPROVAL';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = 'Staff Tata Usaha';
            $dataApproval['status'] = 'DALAM PROSES';
            $dataApproval['visible'] = 1;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;


            ApprovalProcess::create($dataApproval);
            $modelPermohonan::where('id', $id)
            ->update(['status' => 1]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }


    public function staffTuCreateUndangan(Request $request, $id)
    {

        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();

            if ($request->rapat_for == 'pemohon') {



                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = 'Rapat Dengan Pemohon';
                $dataApproval['type'] = 'UNDANGAN RAPAT';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Staff Tata Usaha';
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 1;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
                $approvalProcess = ApprovalProcess::create($dataApproval);

                // -- DATA UNDANGAN RAPAT
                $undanganRapat['tanggal_rapat'] = $request->tanggal_rapat;
                $undanganRapat['perihal_rapat'] = $request->perihal_rapat;
                $undanganRapat['jam_rapat'] = $request->jam_rapat;
                $undanganRapat['durasi_rapat'] = $request->durasi_rapat;
                $undanganRapat['type'] = 'UNDANGAN RAPAT PEMOHON';
                $undanganRapat['approval_process_id'] = $approvalProcess->id;
                $undanganRapat['permohonan_id'] = $id;
                $undanganRapat['from_table'] = $request->permohonan_type;
                $undanganRapat['keterangan'] = $request->keterangan;
                $undanganRapat['created_by_id'] = Auth::user()->id;
            }else{
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = 'Rapat Internal';
                $dataApproval['type'] = 'UNDANGAN RAPAT';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Staff Tata Usaha';
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 0;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
                $approvalProcess = ApprovalProcess::create($dataApproval);



                // -- DATA UNDANGAN RAPAT
                $undanganRapat['tanggal_rapat'] = $request->tanggal_rapat;
                $undanganRapat['perihal_rapat'] = $request->perihal_rapat;
                $undanganRapat['jam_rapat'] = $request->jam_rapat;
                $undanganRapat['durasi_rapat'] = $request->durasi_rapat;
                $undanganRapat['type'] = 'UNDANGAN RAPAT INTERNAL';
                $undanganRapat['approval_process_id'] = $approvalProcess->id;
                $undanganRapat['permohonan_id'] = $id;
                $undanganRapat['from_table'] = $request->permohonan_type;
                $undanganRapat['keterangan'] = $request->keterangan;
                $undanganRapat['created_by_id'] = Auth::user()->id;
            }


            if ($request->file_udangan_rapat) {

                $last_file_ident = '_UNDANGANRAPAT';
                $file = $request->file_udangan_rapat;
                // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                $formatFilePendukung = Auth::user()->id . '_' . $approvalProcess->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-rekom-pertek/undangan-rapat/');
                $file->move($destinationPath, $name);
                $undanganRapat['file_name'] = $name;
                $undanganRapat['original_file_name'] = $file->getClientOriginalName();

            }
            UndanganRapat::create($undanganRapat);

            $modelPermohonan::where('id', $id)
            ->update(['status' => 1]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }
    public function staffTuLaporanUndangan(Request $request, $id)
    {

        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();

            if ($request->rapat_for == 'pemohon') {
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = 'Rapat Dengan Pemohon';
                $dataApproval['type'] = 'LAPORAN RAPAT';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kadisnav';
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 1;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
                $approvalProcess = ApprovalProcess::create($dataApproval);



                // -- DATA LAPORAN RAPAT
                //  $modelPermohonan::where('id', $id)
                // dd($modelPermohonan::wherefirst());

                $laporanRapat['ringkasan_rapat'] = $request->ringkasan_rapat;
                $laporanRapat['original_file_name'] = $request->original_file_name;
                $laporanRapat['file_name'] = $request->file_name;
                $laporanRapat['undangan_rapat_id'] = null;
                $laporanRapat['approval_process_id'] = $approvalProcess->id;
                $laporanRapat['permohonan_id'] = $id;
                $laporanRapat['type'] = 'UNDANGAN DENGAN PEMOHON';
                $laporanRapat['from_table'] = $request->permohonan_type;
                $laporanRapat['keterangan'] = $request->keterangan;
                $laporanRapat['created_by_id'] = Auth::user()->id;
            }else{
                $dataApproval['timestamp'] = date('Y-m-d H:i:s');
                $dataApproval['permohonan_id'] = $id;
                $dataApproval['keterangan'] = $request->keterangan;
                $dataApproval['tindak_lanjut'] = 'Rapat Internal';
                $dataApproval['type'] = 'LAPORAN RAPAT';
                $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
                $dataApproval['notify_to_role'] = 'Kadisnav';
                $dataApproval['status'] = 'DALAM PROSES';
                $dataApproval['visible'] = 0;
                $dataApproval['from_table'] = $request->permohonan_type;
                $dataApproval['created_by_id'] = Auth::user()->id;
                $dataApproval['updated_by_id'] = null;
                $approvalProcess = ApprovalProcess::create($dataApproval);



                // -- DATA LAPORAN RAPAT
                //  $modelPermohonan::where('id', $id)
                // dd($modelPermohonan::wherefirst());

                $laporanRapat['ringkasan_rapat'] = $request->ringkasan_rapat;
                $laporanRapat['original_file_name'] = $request->original_file_name;
                $laporanRapat['file_name'] = $request->file_name;
                $laporanRapat['undangan_rapat_id'] = null;
                $laporanRapat['approval_process_id'] = $approvalProcess->id;
                $laporanRapat['permohonan_id'] = $id;
                $laporanRapat['type'] = 'UNDANGAN RAPAT INTERNAL';
                $laporanRapat['from_table'] = $request->permohonan_type;
                $laporanRapat['keterangan'] = $request->keterangan;
                $laporanRapat['created_by_id'] = Auth::user()->id;

            }






            if ($request->file_laporan_rapat) {

                $last_file_ident = '_laporan_rapat';
                $file = $request->file_laporan_rapat;
                // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                $formatFilePendukung = Auth::user()->id . '_' . $approvalProcess->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-rekom-pertek/laporan-rapat/');
                $file->move($destinationPath, $name);
                $laporanRapat['file_name'] = $name;
                $laporanRapat['original_file_name'] = $file->getClientOriginalName();

            }

            LaporanRapat::create($laporanRapat);

            $modelPermohonan::where('id', $id)
            ->update(['status' => 1]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
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
            $row = PermohonanPTReklamasi::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = 'PERMOHONAN REKLAMASI';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/reklamasi/sp/', $row->surat_permohonan);
        }
        elseif ($type == 'TERMINALUMUM') {
            $row = PermohonanPTTerminal::where('id', $id)
            ->with(['prosesPermohonan' => function ($q) {
                $q->orderBy('id', 'asc');
            }])
                ->first();
            $data['page_title'] = 'PERMOHONAN TERMINAL UMUM';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/terminal/sp/', $row->surat_permohonan);
        }
        elseif ($type == 'TERMINALKHUSUS') {
            $row = PermohonanPTTerminal::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = 'PERMOHONAN TERMINAL KHUSUS';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/terminal/sp/', $row->surat_permohonan);
        }
        elseif ($type == 'TERMINALUKS') {
            $row = PermohonanPTTerminal::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = 'PERMOHONAN TERMINAL UKS';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/terminal/sp/', $row->surat_permohonan);
        }
        elseif ($type == 'PEKERJAANBAWAHAIR') {
            $row = PermohonanPTPekerjaanBawahAir::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = $row->jenis_pekerjaan;
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/pba/sp/', $row->surat_permohonan);
        }
        elseif ($type == 'PEMBANGUNANBANGUNANPERAIRAN') {
            $row = PermohonanPTPembangunanBangunanPerairan::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = 'PEMBANGUNAN BANGUNAN PERAIRAN';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/pbp/sp/', $row->surat_permohonan);
        }
        elseif ($type == 'PENYELENGGARAALURPELAYARAN') {
            $row = PermohonanRTPenyelenggaraAlurPelayaran::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = 'PENYELENGGARA ALUR PELAYARAN';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/pap/sp/', $row->surat_permohonan);
        }
        elseif ($type == 'PEMBANGUNANSBNP') {
            $row = PermohonanRTPpSbnp::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = 'PEMBANGUNAN SBNP';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/ppsbnp/sp/', $row->surat_permohonan);
        }elseif ($type == 'ZONASIPERAIRAN') {
            $row = PermohonanRTZonasiPerairan::where('id', $id)
                ->with(['prosesPermohonan' => function ($q) {
                    $q->orderBy('id', 'asc');
                }])
                ->first();
            $data['page_title'] = 'ZONASI PERAIRAN';
            $data['data'] = $row;
            $data['surat_permohonan_file'] = asset('dokumen-permohonan/permohonan-teknis/not-avilabelsp/', $row->surat_permohonan);
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
