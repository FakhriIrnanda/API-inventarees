<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return response()->json(['data' => $barang]);
    }

    public function store(Request $request)
    {
        // Validasi data dari formulir
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_user' => 'required|integer',
            'id_kategori' => 'required|integer',
            'Jumlah_barang' => 'required|string|max:255',
            'kondisi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        // Simpan data ke dalam database
        $barang = new Barang;
        $barang->nama_barang = $request->input('nama_barang');
        $barang->id_user = $request->input('id_user');
        $barang->id_kategori = $request->input('id_kategori');
        $barang->Jumlah_barang = $request->input('Jumlah_barang');
        $barang->kondisi = $request->input('kondisi');
        $barang->keterangan = $request->input('keterangan');
        $barang->spesifikasi = $request->input('spesifikasi');
        $barang->tanggal = $request->input('tanggal');
        $barang->save();

        // Redirect ke halaman atau tampilkan respons sukses
        return response()->json(['message' => 'Barang berhasil ditambahkan'], 201);
    }
    //get barang by id kategori
    public function getBarangByIdKategori($id_kategori)
    {
        $barang = Barang::where('id_kategori', $id_kategori)->get();
        return response()->json(['data' => $barang]);
    }
}
