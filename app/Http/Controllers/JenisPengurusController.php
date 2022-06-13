<?php

namespace App\Http\Controllers;

use App\JenisPengurus;
use Illuminate\Http\Request;

class JenisPengurusController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Data Jenis Pengurus";
        $data['data'] = JenisPengurus::orderby('id', 'desc')->get();
        return view('master-data.jenis-pengurus.index', $data);
    }

    public function create()
    {

        $data['page_title'] = "Tambah Jenis Pengurus";
        return view('master-data.jenis-pengurus.create', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = "Edit Jenis Pengurus";

        $data['data'] = JenisPengurus::find($id);

        return view('master-data.jenis-pengurus.edit', $data);
    }

    public function store(Request $request)
    {

        // --- BAGIAN VALIDASI
        $messages = [
            'nama.required' => 'Nama jenis pengurus wajib diisi !',
        ];
        $request->validate([
            'nama' => 'required',
        ], $messages);


        // --- HANDLE PROCESS
        try {
            JenisPengurus::create(
                [
                    'nama' => $request->nama,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('master-data.jenis-pengurus.index')->with(['success' => 'Data berhasil dibuat !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-pengurus.index')->with(['failed' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        // --- BAGIAN VALIDASI
        $messages = [
            'nama.required' => 'Nama Jenis Pengurus wajib diisi !',
        ];
        $request->validate([
            'nama' => 'required',
        ], $messages);



        // --- HANDLE PROCESS
        try {
            JenisPengurus::where('id', $id)->update(
                [
                    'nama' => $request->nama,
                    'keterangan' => $request->keterangan,
                ]
            );
            return redirect()->route('master-data.jenis-pengurus.index')->with(['success' => 'Data berhasil diupdate !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-pengurus.index')->with(['failed' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {

        try {
            JenisPengurus::destroy($id);
            return redirect()->route('master-data.jenis-pengurus.index')->with(['failed' => 'Data berhasil dihapus !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.jenis-pengurus.index')->with(['failed' => $th->getMessage()]);
        }
    }
}
