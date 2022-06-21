<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PermohonanPTReklamasi extends Model
{
    protected $table = 'permohonan_pt_reklamasi';
    protected $guarded = [];

    public function pemohon()
    {
        return $this->belongsTo(User::class, 'pemohon_id', 'id');
    }


    public function totalDayKegiatan(){
        $dari = new DateTime($this->jadwal_kegiatan_dari);
        $hingga = new DateTime($this->jadwal_kegiatan_hingga);
        $total  = $dari->diff($hingga)->format('%a');
        return $total;
    }

    public function lokasiReklamasi()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_reklamasi')
            ->where('type', 'lokasi_reklamasi');
    }

    // ---IS NOTIFY
    public function isNotify($roleName = null)
    {
        if ($roleName == null) {
            if (($this->status == null) && (Auth::user()->role->name == 'Kadisnav')) {
                return true;
            }
        }
        return false;
    }

}
