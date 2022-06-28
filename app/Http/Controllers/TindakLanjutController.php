<?php

namespace App\Http\Controllers;

use App\ApprovalProcess;
use App\FilePembangunanPelaksanaan;
use App\PembangunanPelaksanaan;
use App\PermohonanPTPekerjaanBawahAir;
use App\PermohonanPTPembangunanBangunanPerairan;
use App\PermohonanPTPengerukan;
use App\PermohonanPTReklamasi;
use App\PermohonanPTTerminal;
use App\PermohonanRTPenyelenggaraAlurPelayaran;
use App\PermohonanRTPpSbnp;
use App\PermohonanRTZonasiPerairan;
use App\TindakLanjut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TindakLanjutController extends Controller
{
    public function rekomendasiKsop(Request $request, $id)
    {
        // dd($request->all());
        // $tindakLanjut = $request->tindak_lanjut;
        // $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = null;
            $dataApproval['type'] = 'TINDAK LANJUT';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = 'Pemohon';
            $dataApproval['status'] = 'TINDAK LANJUT';
            $dataApproval['visible'] = 1;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['notify_to_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;
            $approval = ApprovalProcess::create($dataApproval);

            // --- TINDAK LANJUT
            $dataTindakLanjut['tanggal_terbit'] = $request->tanggal_terbit;
            $dataTindakLanjut['type_permohonan'] = 'PERTIMBANGAN TEKNIS';
            $dataTindakLanjut['penerbit_id'] = $request->penerbit_id;
            $dataTindakLanjut['penerbit'] = null;
            $dataTindakLanjut['original_file_name'] = null;
            $dataTindakLanjut['file_name'] = null;
            $dataTindakLanjut['approval_process_id'] = $approval->id;
            $dataTindakLanjut['permohonan_id'] = $id;
            $dataTindakLanjut['from_table'] = $request->permohonan_type;
            $dataTindakLanjut['keterangan'] = $request->keterangan;
            $dataTindakLanjut['created_by_id'] = Auth::user()->id;
            if ($request->file_draft) {

                $last_file_ident = '_REKOMKSOP';
                $file = $request->file_draft;
                // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                $formatFilePendukung = Auth::user()->id . '_' . $approval->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-rekom-pertek/rekomendasi-ksop/');
                $file->move($destinationPath, $name);
                $dataTindakLanjut['file_name'] = $name;

                // --- INSERT FILE
                $dataTindakLanjut['original_file_name'] = $file->getClientOriginalName();

            }
            TindakLanjut::create($dataTindakLanjut);



            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }


    public function izinPembangunanKantorPusat(Request $request, $id)
    {
        // dd($request->all());
        // $tindakLanjut = $request->tindak_lanjut;
        // $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = null;
            $dataApproval['type'] = 'TINDAK LANJUT';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = 'Pemohon';
            $dataApproval['status'] = 'TINDAK LANJUT';
            $dataApproval['visible'] = 1;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['notify_to_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;
            $approval = ApprovalProcess::create($dataApproval);

            // --- TINDAK LANJUT
            $dataTindakLanjut['tanggal_terbit'] = $request->tanggal_terbit;
            $dataTindakLanjut['type_permohonan'] = 'REKOMENDASI TEKNIS';
            $dataTindakLanjut['penerbit_id'] = null;
            $dataTindakLanjut['penerbit'] = $request->penerbit;
            $dataTindakLanjut['original_file_name'] = null;
            $dataTindakLanjut['file_name'] = null;
            $dataTindakLanjut['approval_process_id'] = $approval->id;
            $dataTindakLanjut['permohonan_id'] = $id;
            $dataTindakLanjut['from_table'] = $request->permohonan_type;
            $dataTindakLanjut['keterangan'] = $request->keterangan;
            $dataTindakLanjut['created_by_id'] = Auth::user()->id;

            if ($request->file_draft) {

                $last_file_ident = '_IZINPEMBANGUNANKANTORPUSAT';
                $file = $request->file_draft;
                // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                $formatFilePendukung = Auth::user()->id . '_' . $approval->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-rekom-pertek/izin-pembangunan-kantor-pusat/');
                $file->move($destinationPath, $name);
                $dataTindakLanjut['file_name'] = $name;

                // --- INSERT FILE
                $dataTindakLanjut['original_file_name'] = $file->getClientOriginalName();

            }
            TindakLanjut::create($dataTindakLanjut);


            // --- DOKUMEN PENDUKUNG
            $last_file_ident = '_FILEPENDUKUNG';
            foreach ($request->file_pendukung as $key => $filePendukung) {
                // --- UPLOAD FILE
                $file = $filePendukung;
                // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                $formatFilePendukung = $key . '_' . Auth::user()->id . '_' . $approval->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-approval/izin-pembangunan-kantor-pusat/');
                $file->move($destinationPath, $name);


                $dataLaporanPembangunanPelaksanaan['original_file_name'] = $file->getClientOriginalName();
                $dataLaporanPembangunanPelaksanaan['file_name'] = $name;
                $dataLaporanPembangunanPelaksanaan['approval_process_id'] = $approval->id;
                $dataLaporanPembangunanPelaksanaan['pembangunan_pelaksaan_id'] = null;
                $dataLaporanPembangunanPelaksanaan['permohonan_id'] = $id;
                $dataLaporanPembangunanPelaksanaan['created_by_id'] = Auth::user()->id;
                $dataLaporanPembangunanPelaksanaan['datetime'] = $request->tanggal_terbit_pendukung[$key];
                $dataLaporanPembangunanPelaksanaan['type'] = 'FILE PENDUKUNG IZIN KANTOR PUSAT';
                $dataLaporanPembangunanPelaksanaan['from_table'] = $request->permohonan_type;
                $dataLaporanPembangunanPelaksanaan['keterangan'] = $request->instansi_penerbit[$key];
                $dataLaporanPembangunanPelaksanaan['penerbit'] = $request->instansi_penerbit[$key];
                $dataLaporanPembangunanPelaksanaan['tindak_lanjut'] = 'FILE PENDUKUNG IZIN KANTOR PUSAT';

                FilePembangunanPelaksanaan::create($dataLaporanPembangunanPelaksanaan);
            }



            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }
    }

    public function pembangunanPelaksanaan(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = null;
            $dataApproval['type'] = 'TINDAK LANJUT';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = 'Pemohon';
            $dataApproval['status'] = 'TINDAK LANJUT';
            $dataApproval['visible'] = 1;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['notify_to_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;
            $approval = ApprovalProcess::create($dataApproval);

            // --- PEMBANGUNAN PELAKSAAN
            $dataPembangunanPelaksanaan['tanggal'] = $request->tanggal_mulai_pembangunan;
            $dataPembangunanPelaksanaan['type_permohonan'] = 'PEMBANGUNAN PELAKSANAAN';
            $dataPembangunanPelaksanaan['type'] = 'PEMBANGUNAN PELAKSANAAN';
            $dataPembangunanPelaksanaan['approval_process_id'] = $approval->id;
            $dataPembangunanPelaksanaan['permohonan_id'] = $id;
            $dataPembangunanPelaksanaan['from_table'] = $request->permohonan_type;
            $dataPembangunanPelaksanaan['keterangan'] = $request->keterangan;
            $dataPembangunanPelaksanaan['created_by_id'] = Auth::user()->id;
            $pembangunanPelaksanaan  = PembangunanPelaksanaan::create($dataPembangunanPelaksanaan);

            if ($request->laporan_pembangunan_pelaksanaan) {

                $last_file_ident = '_LAPORANPEMBANGUNANPELAKSANAAN';


                foreach ($request->laporan_pembangunan_pelaksanaan as $key => $filePendukung) {
                    // --- UPLOAD FILE
                    $file = $filePendukung;
                    // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                    $formatFilePendukung = $key . '_' . Auth::user()->id . '_' . $approval->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                    // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                    $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('dokumen-approval/laporan-pembangunan-pelaksanaan/');
                    $file->move($destinationPath, $name);

                    $dataLaporanPembangunanPelaksanaan['original_file_name'] = $file->getClientOriginalName();
                    $dataLaporanPembangunanPelaksanaan['file_name'] =$name;
                    $dataLaporanPembangunanPelaksanaan['approval_process_id'] =$approval->id;
                    $dataLaporanPembangunanPelaksanaan['pembangunan_pelaksaan_id'] =$pembangunanPelaksanaan->id;
                    $dataLaporanPembangunanPelaksanaan['permohonan_id'] = $id;
                    $dataLaporanPembangunanPelaksanaan['created_by_id'] = Auth::user()->id;
                    $dataLaporanPembangunanPelaksanaan['datetime'] = date('Y-m-d H:i:s');
                    $dataLaporanPembangunanPelaksanaan['type'] = 'LAPORAN PEMBANGUNAN PELAKSANAAN';
                    $dataLaporanPembangunanPelaksanaan['from_table'] =$request->permohonan_type;
                    $dataLaporanPembangunanPelaksanaan['keterangan'] =$request->keterangan;
                    $dataLaporanPembangunanPelaksanaan['tindak_lanjut'] = 'LAPORAN PEMBANGUNAN PELAKSANAAN';

                    FilePembangunanPelaksanaan::create($dataLaporanPembangunanPelaksanaan);
                }
            }





            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }

    }
    public function pembangunanPenyelesaian(Request $request, $id)
    {
        $modelPermohonan = $this->filterModel($request->permohonan_type);
        try {
            DB::beginTransaction();
            $dataApproval['timestamp'] = date('Y-m-d H:i:s');
            $dataApproval['permohonan_id'] = $id;
            $dataApproval['keterangan'] = $request->keterangan;
            $dataApproval['tindak_lanjut'] = null;
            $dataApproval['type'] = 'SELESAI';
            $dataApproval['notify_from_role'] = Auth::user()->role->name ?? '';
            $dataApproval['notify_to_role'] = null;
            $dataApproval['status'] = 'SELESAI';
            $dataApproval['visible'] = 1;
            $dataApproval['from_table'] = $request->permohonan_type;
            $dataApproval['created_by_id'] = Auth::user()->id;
            $dataApproval['notify_to_id'] = Auth::user()->id;
            $dataApproval['updated_by_id'] = null;
            $approval = ApprovalProcess::create($dataApproval);

            // --- PEMBANGUNAN PELAKSAAN
            $dataPembangunanPelaksanaan['tanggal'] = $request->tanggal_mulai_pembangunan;
            $dataPembangunanPelaksanaan['type_permohonan'] = 'PEMBANGUNAN PENYELESAIAN';
            $dataPembangunanPelaksanaan['type'] = 'PEMBANGUNAN PENYELESAIAN';
            $dataPembangunanPelaksanaan['approval_process_id'] = $approval->id;
            $dataPembangunanPelaksanaan['permohonan_id'] = $id;
            $dataPembangunanPelaksanaan['from_table'] = $request->permohonan_type;
            $dataPembangunanPelaksanaan['keterangan'] = $request->keterangan;
            $dataPembangunanPelaksanaan['created_by_id'] = Auth::user()->id;
            $pembangunanPelaksanaan  = PembangunanPelaksanaan::create($dataPembangunanPelaksanaan);

            if ($request->laporan_pembangunan_pelaksanaan) {

                $last_file_ident = '_LAPORANPEMBANGUNANPENYELESAIAN';


                foreach ($request->laporan_pembangunan_pelaksanaan as $key => $filePendukung) {
                    // --- UPLOAD FILE
                    $file = $filePendukung;
                    // INDEX,USERID,APPROVALID,TIME,PERMOHONAN_ID
                    $formatFilePendukung = $key . '_' . Auth::user()->id . '_' . $approval->id . '_' . time() . '_' . $id . '_' . bin2hex(random_bytes(5)) . $last_file_ident;
                    // $formatFilePendukung = $this->base64url_encode($formatFilePendukung);
                    $name = $formatFilePendukung . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('dokumen-approval/laporan-pembangunan-pelaksanaan/');
                    $file->move($destinationPath, $name);

                    $dataLaporanPembangunanPelaksanaan['original_file_name'] = $file->getClientOriginalName();
                    $dataLaporanPembangunanPelaksanaan['file_name'] =$name;
                    $dataLaporanPembangunanPelaksanaan['approval_process_id'] =$approval->id;
                    $dataLaporanPembangunanPelaksanaan['pembangunan_pelaksaan_id'] =$pembangunanPelaksanaan->id;
                    $dataLaporanPembangunanPelaksanaan['permohonan_id'] = $id;
                    $dataLaporanPembangunanPelaksanaan['created_by_id'] = Auth::user()->id;
                    $dataLaporanPembangunanPelaksanaan['datetime'] = date('Y-m-d H:i:s');
                    $dataLaporanPembangunanPelaksanaan['type'] = 'LAPORAN PEMBANGUNAN PENYELESAIAN';
                    $dataLaporanPembangunanPelaksanaan['from_table'] =$request->permohonan_type;
                    $dataLaporanPembangunanPelaksanaan['keterangan'] =$request->keterangan;
                    $dataLaporanPembangunanPelaksanaan['tindak_lanjut'] = 'LAPORAN PEMBANGUNAN PENYELESAIAN';

                    FilePembangunanPelaksanaan::create($dataLaporanPembangunanPelaksanaan);
                }
            }


            // STATUS SELESAI
            $modelPermohonan::where('id', $id)
                ->update(['status' => 3]);

            DB::commit();
            return redirect()->back()->with(['success' => 'Data berhasil ditindak lanjut !']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with(['failed' => $th->getMessage()]);
            DB::rollBack();
        }

    }
    private function filterModel($table)
    {
        if ($table == 'permohonan_pt_pengerukan') {
            return PermohonanPTPengerukan::class;
        } elseif ($table == 'permohonan_pt_reklamasi') {
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
}
