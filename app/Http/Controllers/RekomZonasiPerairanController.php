<?php

namespace App\Http\Controllers;

use App\PermohonanRTZonasiPerairan;
use App\RencanaSbnp;
use App\TitikKordinat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RekomZonasiPerairanController extends Controller
{
    public function show(Request $request, $id)
    {
        $data['page_title'] = 'PENETAPAN ZONASI PERAIRAN';
        $data['data'] = PermohonanRTZonasiPerairan::findOrFail($id);
        return view('permohonan.rekomendasi-teknis.penetapan-zonasi.show', $data);
    }

    public function store(Request $request)
    {

        // --- BAGIAN VALIDASI

        $request->validate([
            'perihal' => 'required',
            'lokasi_zonasi_perairan' => 'required',
            'jenis_zonasi_perairan_id' => 'required',


            'peta_laut' => 'required|mimes:pdf,jpg,jpeg,png',
            'jadwal_kegiatan_dari' => 'required',
            'jadwal_kegiatan_hingga' => 'required',
            'surat_permohonan' => 'required|mimes:pdf,jpg,jpeg,png',
        ], );

        $dataPermohonan['no_permohonan'] = $this->generateNoPermohonan();

        $dataPermohonan['perihal'] = $request->perihal;

        $dataPermohonan['lokasi_zonasi_perairan'] = $request->lokasi_zonasi_perairan;
        $dataPermohonan['jenis_zonasi_perairan_id'] = $request->jenis_zonasi_perairan_id;


        $dataPermohonan['peta_laut'] = null;
        $dataPermohonan['jadwal_kegiatan_dari'] = $request->jadwal_kegiatan_dari;
        $dataPermohonan['jadwal_kegiatan_hingga'] = $request->jadwal_kegiatan_hingga;
        $dataPermohonan['keterangan_tambahan'] = $request->keterangan_tambahan;
        $dataPermohonan['surat_permohonan'] = null;
        $dataPermohonan['type'] = 'PENETAPAN_ZONASI_PERAIRAN';

        $dataPermohonan['pemohon_id'] = Auth::user()->id;




        try {
            DB::beginTransaction();







            // --- UPLOAD PETA LAUT
            if ($request->hasFile('peta_laut')) {
                $file = $request->file('peta_laut');
                $name = Auth::user()->id . '_' . 'PL_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-permohonan/rekomendasi-teknis/zonasi-perairan/pl/');
                $file->move($destinationPath, $name);
                $dataPermohonan['peta_laut'] = $name;
            }

            // --- UPLOAD SURAT PERMOHONAN
            if ($request->hasFile('surat_permohonan')) {
                $file = $request->file('surat_permohonan');
                $name = Auth::user()->id . '_' . 'SP_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-permohonan/rekomendasi-teknis/zonasi-perairan/sp/');
                $file->move($destinationPath, $name);
                $dataPermohonan['surat_permohonan'] = $name;
            }

            $insert = PermohonanRTZonasiPerairan::create($dataPermohonan);

            // --- LOKASI ZONASI PERAIRAN
            $orderTd = 1;
            foreach ($request->kzp_long_degrees as $key => $koordinat) {
                $longDecimal = $request->kzp_long_degrees[$key] . "° " . $request->kzp_long_minutes[$key] . "' " . $request->kzp_long_second[$key] . "\" " . $request->kzp_long_direction[$key];
                $latDecimal = $request->kzp_lat_degrees[$key] . "° " . $request->kzp_lat_minutes[$key] . "' " . $request->kzp_lat_second[$key] . "\" " . $request->kzp_lat_direction[$key];

                $longDecimal = $this->convertDMSToDecimal($longDecimal);
                $latDecimal = $this->convertDMSToDecimal($latDecimal);

                TitikKordinat::create([
                    'permohonan_id' => $insert->id,
                    'table' => 'permohonan_rt_zonasi_perairan',
                    'type' => 'lokasi_zonasi_perairan',
                    'long_degrees' => $request->kzp_long_degrees[$key],
                    'long_minutes' => $request->kzp_long_minutes[$key],
                    'long_second' => $request->kzp_long_second[$key],
                    'long_direction' => $request->kzp_long_direction[$key],
                    'lat_degrees' => $request->kzp_lat_degrees[$key],
                    'lat_minutes' => $request->kzp_lat_minutes[$key],
                    'lat_second' => $request->kzp_lat_second[$key],
                    'lat_direction' => $request->kzp_lat_direction[$key],
                    'long_dec' => $longDecimal,
                    'lat_dec' => $latDecimal,
                    'order' => $orderTd++,
                ]);
            }




            // --- RENCANA SBNP
            $orderTd = 1;
            foreach ($request->rpsbnp_jenis_sbnp as $key => $koordinat) {
                $longDecimal = $request->rpsbnp_long_degrees[$key] . "° " . $request->rpsbnp_long_minutes[$key] . "' " . $request->rpsbnp_long_second[$key] . "\" " . $request->rpsbnp_long_direction[$key];
                $latDecimal = $request->rpsbnp_lat_degrees[$key] . "° " . $request->rpsbnp_lat_minutes[$key] . "' " . $request->rpsbnp_lat_second[$key] . "\" " . $request->rpsbnp_lat_direction[$key];

                $longDecimal = $this->convertDMSToDecimal($longDecimal);
                $latDecimal = $this->convertDMSToDecimal($latDecimal);

                RencanaSbnp::create([
                    'permohonan_id' => $insert->id,
                    'table' => 'permohonan_rt_zonasi_perairan',
                    'type' => 'rencana_sbnp_rt_zonasi_perairan',
                    'jenis_sbnp' => $request->rpsbnp_jenis_sbnp[$key],
                    'keterangan_rencana' => $request->rpsbnp_keterangan_rencana[$key],
                    'long_degrees' => $request->rpsbnp_long_degrees[$key],
                    'long_minutes' => $request->rpsbnp_long_minutes[$key],
                    'long_second' => $request->rpsbnp_long_second[$key],
                    'long_direction' => $request->rpsbnp_long_direction[$key],
                    'lat_degrees' => $request->rpsbnp_lat_degrees[$key],
                    'lat_minutes' => $request->rpsbnp_lat_minutes[$key],
                    'lat_second' => $request->rpsbnp_lat_second[$key],
                    'lat_direction' => $request->rpsbnp_lat_direction[$key],
                    'long_dec' => $longDecimal,
                    'lat_dec' => $latDecimal,
                    'order' => $orderTd++,
                ]);
            }


            DB::commit();
            return redirect()->route('permohonan.rekomendasi-teknis.zonasi-perairan.show', ['id' => $insert->id])->with(['success' => 'Data berhasil dibuat !']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('permohonan')->with(['failed' => $th->getMessage()]);
        }
    }


    private function generateNoPermohonan()
    {
        $type = 'Rekom/PenetapanZonasiPerairan';
        $bulanRomawi = $this->getRomawi(date('m'));
        $year_now = date('Y');

        $obj = DB::table('permohonan_rt_zonasi_perairan')
        ->select('no_permohonan')
        ->latest('id')
            ->where('no_permohonan', 'ilike', '%' . $type . '/' . $bulanRomawi . '/' . $year_now . '%')
            ->first();
        if ($obj) {
            $increment = explode('/', $obj->no_permohonan);
            $increment = explode('/', $increment[0]);
            // $removed1char = substr($increment[0], 2);
            // dd($increment, $increment[0]);
            $generateOrder_nr = str_pad($increment[0] + 1, 3, "0", STR_PAD_LEFT) . '/' . $type . '/' . $bulanRomawi . '/' . $year_now;
        } else {
            $generateOrder_nr = str_pad(1, 3, "0", STR_PAD_LEFT) . '/' . $type . '/' . $bulanRomawi . '/' . $year_now;
        }
        return $generateOrder_nr;
    }

    private function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
    private function convertDMSToDecimal($latlng)
    {
        $valid = false;
        $decimal_degrees = 0;
        $degrees = 0;
        $minutes = 0;
        $seconds = 0;
        $direction = 1;
        // Determine if there are extra periods in the input string
        $num_periods = substr_count($latlng, '.');
        if ($num_periods > 1) {
            $temp = preg_replace('/\./', ' ', $latlng, $num_periods - 1); // replace all but last period with delimiter
            $temp = trim(preg_replace('/[a-zA-Z]/', '', $temp)); // when counting chunks we only want numbers
            $chunk_count = count(explode(" ", $temp));
            if ($chunk_count > 2) {
                $latlng = $temp; // remove last period
            } else {
                $latlng = str_replace(".", " ", $latlng); // remove all periods, not enough chunks left by keeping last one
            }
        }


        // Remove unneeded characters
        $latlng = trim($latlng);
        $latlng = str_replace("°", "", $latlng);
        $latlng = str_replace("'", "", $latlng);
        $latlng = str_replace("\"", "", $latlng);
        $latlng = substr($latlng, 0, 1) . str_replace('-', ' ', substr($latlng, 1)); // remove all but first dash

        if ($latlng != "") {
            // DMS with the direction at the start of the string
            if (preg_match("/^([nsewNSEW]?)\s*(\d{1,3})\s+(\d{1,3})\s+(\d+\.?\d*)$/", $latlng, $matches)) {
                $valid = true;
                $degrees = intval($matches[2]);
                $minutes = intval($matches[3]);
                $seconds = floatval($matches[4]);
                if (strtoupper($matches[1]) == "S" || strtoupper($matches[1]) == "W")
                    $direction = -1;
            }

            // DMS with the direction at the end of the string
            if (preg_match("/^(-?\d{1,3})\s+(\d{1,3})\s+(\d+(?:\.\d+)?)\s*([nsewNSEW]?)$/", $latlng, $matches)) {
                $valid = true;
                $degrees = intval($matches[1]);
                $minutes = intval($matches[2]);
                $seconds = floatval($matches[3]);
                if (strtoupper($matches[4]) == "S" || strtoupper($matches[4]) == "W" || $degrees < 0) {
                    $direction = -1;
                    $degrees = abs($degrees);
                }
            }

            if ($valid) {
                // A match was found, do the calculation
                $decimal_degrees = ($degrees + ($minutes / 60) + ($seconds / 3600)) * $direction;
            } else {
                // Decimal degrees with a direction at the start of the string
                if (preg_match("/^(-?\d+(?:\.\d+)?)\s*([nsewNSEW]?)$/", $latlng, $matches)) {
                    $valid = true;
                    if (strtoupper($matches[2]) == "S" || strtoupper($matches[2]) == "W" || $degrees < 0) {
                        $direction = -1;
                        $degrees = abs($degrees);
                    }
                    $decimal_degrees = $matches[1] * $direction;
                }
                // Decimal degrees with a direction at the end of the string
                if (preg_match("/^([nsewNSEW]?)\s*(\d+(?:\.\d+)?)$/", $latlng, $matches)) {
                    $valid = true;
                    if (strtoupper($matches[1]) == "S" || strtoupper($matches[1]) == "W")
                        $direction = -1;
                    $decimal_degrees = $matches[2] * $direction;
                }
            }
        }
        if ($valid) {
            return $decimal_degrees;
        } else {
            return false;
        }
    }
}
