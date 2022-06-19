<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class PermohonanPTPekerjaanBawahAir extends Model
{
    protected $table = 'permohonan_pt_pba';
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
            ->where('table', 'permohonan_pt_pba')
            ->where('type', 'lokasi_pekerjaan_bawah_air');
    }
}