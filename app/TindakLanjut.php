<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TindakLanjut extends Model
{
    protected $table = 'tindak_lanjut';
    protected $guarded = [];


    public function dataPenerbit()
    {
        return $this->belongsTo(Ksop::class, 'penerbit_id', 'id');
    }

    public function pembangunanPelaksanaan()
    {
        return $this->hasMany(PembangunanPelaksanaan::class, 'permohonan_id', 'permohonan_id')->where('from_table', $this->from_table);
    }

}
