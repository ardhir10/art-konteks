<?php

namespace App\Http\Controllers;

use App\PermohonanPTPengerukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'PERMOHONAN';


        if((Auth::user()->role->name ?? '') == 'Pemohon'){
            $data['permohonan'] = PermohonanPTPengerukan::where('pemohon_id',Auth::user()->id)->get();
            return view('permohonan.pemohon-index', $data);
        }else{
            $data['permohonan'] = PermohonanPTPengerukan::get();
            return view('permohonan.admin-index', $data);
        }
    }

    public function pertimbanganTeknis(Request $request){
        if($request->type=='pengerukan'){
            $data['page_title'] = 'PERMOHONAN KEGIATAN PENGERUKAN';
            return view('permohonan.pertimbangan-teknis.pengerukan.form-permohonan', $data);

        }
    }
}
