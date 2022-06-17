<?php

namespace App\Http\Controllers;

use App\PermohonanPTTerminal;
use App\RencanaSbnp;
use App\TitikKordinat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PertekTerminalTuksController extends Controller
{
    public function show(Request $request, $id)
    {
        $data['page_title'] = 'KEGIATAN TERMINAL TUKS';
        $data['data'] = PermohonanPTTerminal::findOrFail($id);
        return view('permohonan.pertimbangan-teknis.tuks.show', $data);
    }

    public function store(Request $request)
    {

        // --- BAGIAN VALIDASI
        $messages = [

            'dokp_nama_instansi.required' => 'This field is required !',
            'dokp_tanggal_dokumen.required' => 'This field is required !',
            'dokp_berlaku_hingga.required' => 'This field is required !',
            'dokp_file_dokumen.required' => 'This field is required !',

        ];
        $request->validate([
            'perihal' => 'required',
            'lokasi_terminal_khusus' => 'required',
            'lokasi_rencana_alur_pelayaran' => 'required',
            'lokasi_rencana_kolam_pelabuhan' => 'required',
            'lokasi_rencana_area_labuh' => 'required',


            'dokp_nama_instansi' => 'required',
            'dokp_tanggal_dokumen' => 'required',
            'dokp_berlaku_hingga' => 'required',
            'dokp_file_dokumen' => 'required|mimes:pdf,jpg,jpeg,png',


            'rencana_kunjungan_kapal' => 'required|mimes:pdf,jpg,jpeg,png',
            'peta_laut' => 'required|mimes:pdf,jpg,jpeg,png',
            'jadwal_kegiatan_dari' => 'required',
            'jadwal_kegiatan_hingga' => 'required',
            'surat_permohonan' => 'required|mimes:pdf,jpg,jpeg,png',
        ], $messages);

        $dataPermohonan['no_permohonan'] = $this->generateNoPermohonan();

        $dataPermohonan['perihal'] = $request->perihal;
        $dataPermohonan['lokasi_terminal_khusus'] = $request->lokasi_terminal_khusus;

        $dataPermohonan['lokasi_rencana_alur_pelayaran'] = $request->lokasi_rencana_alur_pelayaran;
        $dataPermohonan['lokasi_rencana_alur_pelayaran'] = $request->lokasi_rencana_alur_pelayaran;
        $dataPermohonan['lokasi_rencana_kolam_pelabuhan'] = $request->lokasi_rencana_kolam_pelabuhan;
        $dataPermohonan['lokasi_rencana_area_labuh'] = $request->lokasi_rencana_area_labuh;




        $dataPermohonan['dokp_nama_instansi'] = $request->dokp_nama_instansi;
        $dataPermohonan['dokp_tanggal_dokumen'] = $request->dokp_tanggal_dokumen;
        $dataPermohonan['dokp_berlaku_hingga'] = $request->dokp_berlaku_hingga;
        $dataPermohonan['dokp_berlaku_hingga_tanggal'] = $request->dokp_berlaku_hingga_tanggal;
        $dataPermohonan['dokp_file_dokumen'] = null;


        $dataPermohonan['rencana_kunjungan_kapal'] = null;
        $dataPermohonan['peta_laut'] = null;
        $dataPermohonan['jadwal_kegiatan_dari'] = $request->jadwal_kegiatan_dari;
        $dataPermohonan['jadwal_kegiatan_hingga'] = $request->jadwal_kegiatan_hingga;
        $dataPermohonan['peralatan_yang_digunakan'] = $request->peralatan_yang_digunakan;
        $dataPermohonan['keterangan_tambahan'] = $request->keterangan_tambahan;
        $dataPermohonan['surat_permohonan'] = null;
        $dataPermohonan['type'] = 'TUKS';

        $dataPermohonan['pemohon_id'] = Auth::user()->id;





        try {
            DB::beginTransaction();



            // --- UPLOAD DOKUMEN PERSETUJUAN
            if ($request->hasFile('dokp_file_dokumen')) {
                $file = $request->file('dokp_file_dokumen');
                $name = Auth::user()->id . '_' . 'DOKP_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-permohonan/permohonan-teknis/terminal/dokp/');
                $file->move($destinationPath, $name);
                $dataPermohonan['dokp_file_dokumen'] = $name;
            }

            // --- UPLOAD DOKUMEN PERSETUJUAN
            if ($request->hasFile('rencana_kunjungan_kapal')) {
                $file = $request->file('rencana_kunjungan_kapal');
                $name = Auth::user()->id . '_' . 'RKK_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-permohonan/permohonan-teknis/terminal/rkk/');
                $file->move($destinationPath, $name);
                $dataPermohonan['rencana_kunjungan_kapal'] = $name;
            }



            // --- UPLOAD PETA LAUT
            if ($request->hasFile('peta_laut')) {
                $file = $request->file('peta_laut');
                $name = Auth::user()->id . '_' . 'PL_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-permohonan/permohonan-teknis/terminal/pl/');
                $file->move($destinationPath, $name);
                $dataPermohonan['peta_laut'] = $name;
            }

            // --- UPLOAD SURAT PERMOHONAN
            if ($request->hasFile('surat_permohonan')) {
                $file = $request->file('surat_permohonan');
                $name = Auth::user()->id . '_' . 'SP_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('dokumen-permohonan/permohonan-teknis/terminal/sp/');
                $file->move($destinationPath, $name);
                $dataPermohonan['surat_permohonan'] = $name;
            }

            $insert = PermohonanPTTerminal::create($dataPermohonan);

            // --- LOKASI TERSUS
            $orderTd = 1;
            foreach ($request->kt_long_degrees as $key => $koordinat) {
                $longDecimal = $request->kt_long_degrees[$key] . "° " . $request->kt_long_minutes[$key] . "' " . $request->kt_long_second[$key] . "\" " . $request->kt_long_direction[$key];
                $latDecimal = $request->kt_lat_degrees[$key] . "° " . $request->kt_lat_minutes[$key] . "' " . $request->kt_lat_second[$key] . "\" " . $request->kt_lat_direction[$key];

                $longDecimal = $this->convertDMSToDecimal($longDecimal);
                $latDecimal = $this->convertDMSToDecimal($latDecimal);

                TitikKordinat::create([
                    'permohonan_id' => $insert->id,
                    'table' => 'permohonan_pt_terminal',
                    'type' => 'lokasi_terminal_khusus',
                    'long_degrees' => $request->kt_long_degrees[$key],
                    'long_minutes' => $request->kt_long_minutes[$key],
                    'long_second' => $request->kt_long_second[$key],
                    'long_direction' => $request->kt_long_direction[$key],
                    'lat_degrees' => $request->kt_lat_degrees[$key],
                    'lat_minutes' => $request->kt_lat_minutes[$key],
                    'lat_second' => $request->kt_lat_second[$key],
                    'lat_direction' => $request->kt_lat_direction[$key],
                    'long_dec' => $longDecimal,
                    'lat_dec' => $latDecimal,
                    'order' => $orderTd++,
                ]);
            }

            // --- LOKASI RENCANA ALUR PELAYARAN
            $orderTd = 1;

            foreach ($request->krcap_long_degrees as $key => $koordinat) {
                $longDecimal = $request->krcap_long_degrees[$key] . "° " . $request->krcap_long_minutes[$key] . "' " . $request->krcap_long_second[$key] . "\" " . $request->krcap_long_direction[$key];
                $latDecimal = $request->krcap_lat_degrees[$key] . "° " . $request->krcap_lat_minutes[$key] . "' " . $request->krcap_lat_second[$key] . "\" " . $request->krcap_lat_direction[$key];

                $longDecimal = $this->convertDMSToDecimal($longDecimal);
                $latDecimal = $this->convertDMSToDecimal($latDecimal);

                TitikKordinat::create([
                    'permohonan_id' => $insert->id,
                    'table' => 'permohonan_pt_terminal',
                    'type' => 'lokasi_rencana_alur_pelayaran',
                    'long_degrees' => $request->krcap_long_degrees[$key],
                    'long_minutes' => $request->krcap_long_minutes[$key],
                    'long_second' => $request->krcap_long_second[$key],
                    'long_direction' => $request->krcap_long_direction[$key],
                    'lat_degrees' => $request->krcap_lat_degrees[$key],
                    'lat_minutes' => $request->krcap_lat_minutes[$key],
                    'lat_second' => $request->krcap_lat_second[$key],
                    'lat_direction' => $request->krcap_lat_direction[$key],
                    'long_dec' => $longDecimal,
                    'lat_dec' => $latDecimal,
                    'order' => $orderTd++,
                ]);
            }

            // --- LOKASI RENCANA KOLAM PELABUHAN
            $orderTd = 1;
            foreach ($request->krkp_long_degrees as $key => $koordinat) {
                $longDecimal = $request->krkp_long_degrees[$key] . "° " . $request->krkp_long_minutes[$key] . "' " . $request->krkp_long_second[$key] . "\" " . $request->krkp_long_direction[$key];
                $latDecimal = $request->krkp_lat_degrees[$key] . "° " . $request->krkp_lat_minutes[$key] . "' " . $request->krkp_lat_second[$key] . "\" " . $request->krkp_lat_direction[$key];

                $longDecimal = $this->convertDMSToDecimal($longDecimal);
                $latDecimal = $this->convertDMSToDecimal($latDecimal);

                TitikKordinat::create([
                    'permohonan_id' => $insert->id,
                    'table' => 'permohonan_pt_terminal',
                    'type' => 'lokasi_rencana_kolam_pelabuhan',
                    'long_degrees' => $request->krkp_long_degrees[$key],
                    'long_minutes' => $request->krkp_long_minutes[$key],
                    'long_second' => $request->krkp_long_second[$key],
                    'long_direction' => $request->krkp_long_direction[$key],
                    'lat_degrees' => $request->krkp_lat_degrees[$key],
                    'lat_minutes' => $request->krkp_lat_minutes[$key],
                    'lat_second' => $request->krkp_lat_second[$key],
                    'lat_direction' => $request->krkp_lat_direction[$key],
                    'long_dec' => $longDecimal,
                    'lat_dec' => $latDecimal,
                    'order' => $orderTd++,
                ]);
            }


            // --- LOKASI RENCANA AREA LABUH
            $orderTd = 1;
            foreach ($request->kral_long_degrees as $key => $koordinat) {
                $longDecimal = $request->kral_long_degrees[$key] . "° " . $request->kral_long_minutes[$key] . "' " . $request->kral_long_second[$key] . "\" " . $request->kral_long_direction[$key];
                $latDecimal = $request->kral_lat_degrees[$key] . "° " . $request->kral_lat_minutes[$key] . "' " . $request->kral_lat_second[$key] . "\" " . $request->kral_lat_direction[$key];

                $longDecimal = $this->convertDMSToDecimal($longDecimal);
                $latDecimal = $this->convertDMSToDecimal($latDecimal);

                TitikKordinat::create([
                    'permohonan_id' => $insert->id,
                    'table' => 'permohonan_pt_terminal',
                    'type' => 'lokasi_rencana_area_labuh',
                    'long_degrees' => $request->kral_long_degrees[$key],
                    'long_minutes' => $request->kral_long_minutes[$key],
                    'long_second' => $request->kral_long_second[$key],
                    'long_direction' => $request->kral_long_direction[$key],
                    'lat_degrees' => $request->kral_lat_degrees[$key],
                    'lat_minutes' => $request->kral_lat_minutes[$key],
                    'lat_second' => $request->kral_lat_second[$key],
                    'lat_direction' => $request->kral_lat_direction[$key],
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
                    'table' => 'permohonan_pt_terminal',
                    'type' => 'rencana_sbnp_terminal_khusus',
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
            return redirect()->route('permohonan.pertimbangan-teknis.terminal-tuks.show', ['id' => $insert->id])->with(['success' => 'Data berhasil dibuat !']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('permohonan')->with(['failed' => $th->getMessage()]);
        }
    }


    private function generateNoPermohonan()
    {
        $type = 'Pertek/TerminalUntukKepentinganSendiri';
        $bulanRomawi = $this->getRomawi(date('m'));
        $year_now = date('Y');

        $obj = DB::table('permohonan_pt_terminal')
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
