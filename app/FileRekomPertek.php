<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileRekomPertek extends Model
{
    protected $table = 'file_rekom_pertek';
    protected $guarded = [];


    public function approvalProcess(){
        return $this->belongsTo(ApprovalProcess::class,'approval_id','id');
    }
    public function permohonan(){

        $table = $this->permohonan_type;
        switch ($table) {
            case 'permohonan_pt_pba':
                return $this->belongsTo(PermohonanPTPekerjaanBawahAir::class,'permohonan_id','id');
                break;
            case 'permohonan_pt_pbp':
                return $this->belongsTo(PermohonanPTPembangunanBangunanPerairan::class,'permohonan_id','id');
                break;

            case 'permohonan_pt_pengerukan':
                return $this->belongsTo(PermohonanPTPengerukan::class,'permohonan_id','id');
                break;
            case 'permohonan_pt_reklamasi':
                return $this->belongsTo(PermohonanPTReklamasi::class,'permohonan_id','id');
                break;
            case 'permohonan_pt_terminal':
                return $this->belongsTo(PermohonanPTTerminal::class,'permohonan_id','id');
                break;

            case 'permohonan_rt_pap':
                return $this->belongsTo(PermohonanRTPenyelenggaraAlurPelayaran::class,'permohonan_id','id');
                break;
            case 'permohonan_rt_ppsbnp':
                return $this->belongsTo(PermohonanRTPpSbnp::class,'permohonan_id','id');
                break;
            case 'permohonan_rt_zonasi_perairan':
                return $this->belongsTo(PermohonanRTZonasiPerairan::class,'permohonan_id','id');
                break;

            default:
                dd($table);
                break;
        }

    }

}
