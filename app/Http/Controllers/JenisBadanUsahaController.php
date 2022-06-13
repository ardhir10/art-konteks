<?php

namespace App\Http\Controllers;

use App\JenisBadanUsaha;
use Illuminate\Http\Request;

class JenisBadanUsahaController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Data Jenis Badan Usaha";
        $data['jenis_badan_usaha'] = JenisBadanUsaha::orderby('id', 'desc')->get();
        return view('master-data.jenis-badan-usaha.index', $data);
    }

    public function create()
    {

        $data['page_title'] = "Tambah Jenis Badan Usaha";
        return view('master-data.jenis-badan-usaha.create', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = "Edit Jenis Badan Usaha";

        $data['data'] = JenisBadanUsaha::find($id);

        return view('master-data.jenis-badan-usaha.edit', $data);
    }

    public function store(Request $request)
    {

        // --- BAGIAN VALIDASI
        $messages = [
            'nama.required' => 'Nama jenis badan usaha wajib diisi !',
        ];
        $request->validate([
            'nama' => 'required',
        ], $messages);


        // --- HANDLE PROCESS
        try {
            JenisBadanUsaha::create(
                [
                    'nama' => $request->nama,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('master-data.jenis-badan-usaha.index')->with(['success' => 'Data berhasil dibuat !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-badan-usaha.index')->with(['failed' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        // --- BAGIAN VALIDASI
        $messages = [
            'nama.required' => 'Nama Jenis Badan Usaha wajib diisi !',
        ];
        $request->validate([
            'nama' => 'required',
        ], $messages);



        // --- HANDLE PROCESS
        try {
            JenisBadanUsaha::where('id', $id)->update(
                [
                    'nama' => $request->nama,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('master-data.jenis-badan-usaha.index')->with(['success' => 'Data berhasil diupdate !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-badan-usaha.index')->with(['failed' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {

        try {
            JenisBadanUsaha::destroy($id);
            return redirect()->route('master-data.jenis-badan-usaha.index')->with(['failed' => 'Data berhasil dihapus !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-badan-usaha.index')->with(['failed' => $th->getMessage()]);
        }
    }
}
