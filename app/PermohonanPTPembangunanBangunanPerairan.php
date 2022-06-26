<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PermohonanPTPembangunanBangunanPerairan extends Model
{
    protected $table = 'permohonan_pt_pbp';
    protected $guarded = [];

    public function pemohon()
    {
        return $this->belongsTo(User::class, 'pemohon_id', 'id');
    }

    public function totalDayKegiatan()
    {
        $dari = new DateTime($this->jadwal_kegiatan_dari);
        $hingga = new DateTime($this->jadwal_kegiatan_hingga);
        $total  = $dari->diff($hingga)->format('%a');
        return $total;
    }

    public function lokasiPekerjaan()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_pbp')
            ->where('type', 'lokasi_pembangunan_bangunan_perairan');
    }

    // ---IS NOTIFY
    public function isNotify($id, $tablePermohonan, $roleName = null)
    {
        $lastApproval = ApprovalProcess::where('from_table', $tablePermohonan)
            ->where('permohonan_id', $id)
            ->orderBy('id', 'desc')
            ->first();
        if ($this->status == null && Auth::user()->role->name == 'Kadisnav') {
            return true;
        } elseif (($lastApproval->notify_to_role ?? null) == $roleName) {
            // --- JIKA SURVEYOR PENGLA CHECK BY ID
            if (($lastApproval->notify_to_role ?? null) == 'Surveyor Pengla') {
                if (($lastApproval->notify_to_id ?? null) == Auth::user()->id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    // --- PROSES PERMOHONAN
    public function prosesPermohonan()
    {

        if (Auth::user()->type == 'Internal') {
            return $this->hasMany(ApprovalProcess::class, 'permohonan_id', 'id')
                ->where('from_table', 'permohonan_pt_pbp');
        } else {
            return $this->hasMany(ApprovalProcess::class, 'permohonan_id', 'id')
                ->where('from_table', 'permohonan_pt_pbp')
                ->where('visible', 1);
        }
    }


}
