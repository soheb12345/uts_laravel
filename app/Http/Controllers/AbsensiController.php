<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // Mengambil semua data absensi
    public function index()
    {
        return Absensi::all();
    }

    // Menambah data absensi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Tidak Hadir',
        ]);

        $absensi = Absensi::create($request->all());

        return response()->json($absensi, 201); // Mengembalikan data yang baru dibuat
    }

    // Mengambil data absensi berdasarkan ID
    public function show($id)
    {
        return Absensi::findOrFail($id);
    }

    // Memperbarui data absensi yang ada
    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $request->validate([
            'nama_siswa' => 'string|max:255',
            'tanggal' => 'date',
            'status' => 'in:Hadir,Tidak Hadir',
        ]);

        $absensi->update($request->all());

        return response()->json($absensi, 200); // Mengembalikan data yang diperbarui
    }

    // Menghapus data absensi berdasarkan ID
    public function destroy($id)
    {
        Absensi::destroy($id);
        return response()->json(null, 204); // Mengembalikan status 204 (No Content)
    }
}
