<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    public function index(){
        $data['page_title'] = "Master Data";
        return view('master-data.index',$data);
    }
}
