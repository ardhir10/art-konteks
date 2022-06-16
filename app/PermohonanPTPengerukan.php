<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class PermohonanPTPengerukan extends Model
{
    protected $table = 'permohonan_pt_pengerukan';
    protected $guarded = [];

    public function pemohon(){
        return $this->belongsTo(User::class,'pemohon_id','id');
    }

    public function totalDayKegiatan()
    {
        $dari = new DateTime($this->jadwal_kegiatan_dari);
        $hingga = new DateTime($this->jadwal_kegiatan_hingga);
        $total  = $dari->diff($hingga)->format('%a');
        return $total;
    }

    public function lokasiPengerukan()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_pengerukan')
            ->where('type', 'lokasi_pengerukan')
            ;
    }

    public function lokasiDumping()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_pengerukan')
            ->where('type', 'titik_dumping');
    }


}
