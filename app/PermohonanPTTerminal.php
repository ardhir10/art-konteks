<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PermohonanPTTerminal extends Model
{
    protected $table = 'permohonan_pt_terminal';
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

    public function lokasiTerminalKhusus()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_terminal')
            ->where('type', 'lokasi_terminal_khusus');
    }
    public function lokasiTerminalRencanaAlurPelayaran()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_terminal')
            ->where('type', 'lokasi_rencana_alur_pelayaran');
    }
    public function lokasiTerminalKhususRencanaKolamPelabuhan()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_terminal')
            ->where('type', 'lokasi_rencana_kolam_pelabuhan');
    }
    public function lokasiTerminalKhususRencanaAreaLabuh()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_terminal')
            ->where('type', 'lokasi_rencana_area_labuh');
    }
    public function rencanaSbnp()
    {
        return $this->hasMany(RencanaSbnp::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_pt_terminal')
            ->where('type', 'rencana_sbnp_terminal_khusus');
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
