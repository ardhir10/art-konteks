<?php

namespace App\Http\Controllers;

use App\BarangKeluar;
use App\BarangMasuk;
use App\BarangPersediaan;
use App\LaporanPengawasan;
use App\MenaraSuar;
use App\PelampungSuar;
use App\Perairan;
use App\RambuSuar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {




        return view('dashboard.index');

    }





    private function filterReport($model, $request,$typeSbnp)
    {
        if ($request->penyelenggara != '') {
            $model = $model->where('adm_type_penyelenggara', $request->penyelenggara);
        }

        if ($request->perairan != '') {
            $model = $model->where('adm_perairan_id', $request->perairan);
        }

        if($request->sbnp != ''){
            if ($request->sbnp == $typeSbnp) {
                return $model = $model->get();
            } else {
                $model= $model->where('id', 0);
                return $model = $model->get();
            }
        }else{
            return $model = $model->get();
        }

    }


}
