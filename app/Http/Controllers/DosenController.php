<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    // tampilkan daftar dosen
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    // tampilkan form tambah
    public function create()
    {
        return view('dosen.create');
    }

    // simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'nama_dosen' => 'required',
            'jenkel_dosen' => 'required',
            'alamat_dosen' => 'required',
        ]);

        Dosen::create($request->all());

        return redirect('/dosen')->with('success', 'Berhasil menambah data');
    }

    // tampilkan form edit
    public function edit($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        return view('dosen.edit', compact('dosen'));
    }

    // update data
    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nama_dosen' => 'required',
            'jenkel_dosen' => 'required',
            'alamat_dosen' => 'required',
        ]);

        $dosen = Dosen::findOrFail($nidn);
        $dosen->update($request->all());

        return redirect('/dosen')->with('success', 'Berhasil mengubah data');
    }

    // hapus data
    public function destroy($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();

        return redirect('/dosen')->with('success', 'Berhasil menghapus data');
    }
}

