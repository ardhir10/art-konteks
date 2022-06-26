<?php

namespace App\Http\Controllers;

use App\Ksop;
use Illuminate\Http\Request;

class KsopController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Data KSOP";
        $data['data'] = Ksop::orderby('id', 'desc')->get();
        return view('master-data.ksop.index', $data);
    }

    public function create()
    {

        $data['page_title'] = "Tambah KSOP";
        return view('master-data.ksop.create', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = "Edit KSOP";

        $data['data'] = Ksop::find($id);

        return view('master-data.ksop.edit', $data);
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
            Ksop::create(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                ]
            );
            return redirect()->route('master-data.ksop.index')->with(['success' => 'Data berhasil dibuat !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.ksop.index')->with(['failed' => $th->getMessage()]);
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
            Ksop::where('id', $id)->update(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                ]
            );
            return redirect()->route('master-data.ksop.index')->with(['success' => 'Data berhasil diupdate !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.ksop.index')->with(['failed' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {

        try {
            Ksop::destroy($id);
            return redirect()->route('master-data.ksop.index')->with(['failed' => 'Data berhasil dihapus !']);
        } catch (\Throwable $th) {
            return redirect()->route('master-data.ksop.index')->with(['failed' => $th->getMessage()]);
        }
    }
}
