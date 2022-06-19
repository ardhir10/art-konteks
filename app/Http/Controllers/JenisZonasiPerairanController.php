<?php

namespace App\Http\Controllers;

use App\JenisZonasiPerairan;
use Illuminate\Http\Request;

class JenisZonasiPerairanController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Data Jenis Zonasi Perairan";
        $data['data'] = JenisZonasiPerairan::orderby('id', 'desc')->get();
        return view('master-data.jenis-zonasi-perairan.index', $data);
    }

    public function create()
    {

        $data['page_title'] = "Tambah Jenis Zonasi Perairan";
        return view('master-data.jenis-zonasi-perairan.create', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = "Edit Jenis Zonasi Perairan";

        $data['data'] = JenisZonasiPerairan::find($id);

        return view('master-data.jenis-zonasi-perairan.edit', $data);
    }

    public function store(Request $request)
    {

        // --- BAGIAN VALIDASI
        $messages = [
            'nama.required' => 'Nama Jenis Zonasi wajib diisi !',
        ];
        $request->validate([
            'nama' => 'required',
        ], $messages);


        // --- HANDLE PROCESS
        try {
            JenisZonasiPerairan::create(
                [
                    'nama' => $request->nama,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('master-data.jenis-zonasi-perairan.index')->with(['success' => 'Data berhasil dibuat !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-zonasi-perairan.index')->with(['failed' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        // --- BAGIAN VALIDASI
        $messages = [
            'nama.required' => 'Nama Jenis Zonasi wajib diisi !',
        ];
        $request->validate([
            'nama' => 'required',
        ], $messages);



        // --- HANDLE PROCESS
        try {
            JenisZonasiPerairan::where('id', $id)->update(
                [
                    'nama' => $request->nama,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('master-data.jenis-zonasi-perairan.index')->with(['success' => 'Data berhasil diupdate !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-zonasi-perairan.index')->with(['failed' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {

        try {
            JenisZonasiPerairan::destroy($id);
            return redirect()->route('master-data.jenis-zonasi-perairan.index')->with(['failed' => 'Data berhasil dihapus !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-zonasi-perairan.index')->with(['failed' => $th->getMessage()]);
        }
    }
}
