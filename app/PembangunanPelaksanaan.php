<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembangunanPelaksanaan extends Model
{
    protected $table = 'pembangunan_pelaksanaan';
    protected $guarded = [];

    public function filePp()
    {
        return $this->hasMany(FilePembangunanPelaksanaan::class, 'pembangunan_pelaksaan_id', 'id');
    }
}
