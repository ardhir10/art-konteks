<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanPTPengerukan extends Model
{
    protected $table = 'permohonan_pt_pengerukan';
    protected $guarded = [];

    public function pemohon(){
        return $this->belongsTo(User::class,'pemohon_id','id');
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
