<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PermohonanRTPenyelenggaraAlurPelayaran extends Model
{
    protected $table = 'permohonan_rt_pap';
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

    public function lokasiAlurPelayaran()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_rt_pap')
            ->where('type', 'lokasi_alur_pelayaran');
    }
    public function lokasiRencanaAlurPelayaran()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_rt_pap')
            ->where('type', 'lokasi_rencana_alur_pelayaran');
    }

    public function lokasiRencanaKolamPutar()
    {
        return $this->hasMany(TitikKordinat::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_rt_pap')
            ->where('type', 'lokasi_rencana_kolam_putar');
    }

    public function rencanaSbnp()
    {
        return $this->hasMany(RencanaSbnp::class, 'permohonan_id', 'id')
            ->where('table', 'permohonan_rt_pap')
            ->where('type', 'rencana_sbnp_rt_pap');
    }

     // ---IS NOTIFY
    public function isNotify($id, $tablePermohonan, $roleName = null)
    {
        $lastApproval = ApprovalProcess::where('from_table', $tablePermohonan)
            ->where('permohonan_id', $id)
            ->orderBy('id','desc')
            ->first();

        if (($this->status == null) && (Auth::user()->role->name == 'Kadisnav')) {
            return true;
        } elseif ($lastApproval->notify_to_role ?? null == $roleName) {
            return true;
        } else {
            return false;
        }
    }
}
