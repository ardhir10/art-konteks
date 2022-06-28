<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class ApprovalProcess extends Model
{
    protected $table = 'approval_process';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(DocumentLibrary::class, 'approval_process_id', 'id');

    }
    public function fileRekomPertek()
    {
        return $this->hasMany(FileRekomPertek::class, 'approval_id', 'id');
    }
    public function filePembangunanPelaksanaan()
    {
        return $this->hasMany(FilePembangunanPelaksanaan::class, 'approval_process_id', 'id');
    }
    public function undanganRapat()
    {
        return $this->hasMany(UndanganRapat::class, 'approval_process_id', 'id');
    }
    public function laporanRapat()
    {
        return $this->hasMany(LaporanRapat::class, 'approval_process_id', 'id');
    }
    public function tindakLanjut()
    {
        return $this->hasMany(TindakLanjut::class, 'permohonan_id', 'permohonan_id')->where('from_table',$this->from_table);
    }
    public function laporanPp()
    {
        return $this->hasMany(PembangunanPelaksanaan::class, 'permohonan_id', 'permohonan_id')->where('from_table',$this->from_table)->where('type', 'PEMBANGUNAN PELAKSANAAN');
    }
    public function laporanPpp()
    {
        return $this->hasMany(PembangunanPelaksanaan::class, 'permohonan_id', 'permohonan_id')->where('from_table',$this->from_table)->where('type', 'PEMBANGUNAN PENYELESAIAN');
    }

    public function draftRekom()
    {
        return $this->hasOne(DraftRekomPertek::class, 'approval_id', 'id');
    }

    public function tanggalTerbit()
    {
        $draftRekomPertek = DraftRekomPertek::where('created_by_role', 'Kadisnav')
        // ->where('tanggal_rilis', '!=', null)
            ->where('from_table', $this->from_table)
            ->where('permohonan_id', $this->permohonan_id)
            ->first();
        return $draftRekomPertek->tanggal_rilis ?? null;
    }

    public function laporanSurvey()
    {
        return $this->hasOne(LaporanSurvey::class, 'approval_process_id', 'id');
    }

    public function typePermohonan(){
        if (str_contains($this->from_table,'_pt_')) {
            return 'PERTIMBANGAN TEKNIS';
        }else{
            return 'REKOMENDASI TEKNIS';
        }
    }


}
