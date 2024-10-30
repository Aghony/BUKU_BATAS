<?php

namespace App\Http\Controllers;

use App\Models\AbsenSiswa;
use App\Models\Siswa;
use App\Models\BukuBatas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukubatas = BukuBatas::orderBy('created_at', 'desc')->first();
        $siswa = Siswa::where('kelas', $bukubatas->kelas)->where('jurusan_id', $bukubatas->jurusan_id)->where('sub_kelas', $bukubatas->sub_kelas)->get();
        // dd($siswa);
        $keteranganOptions = ['Hadir', 'Izin', 'Sakit', 'Alfa'];
        return view('absensiswa.absenSiswa', compact('siswa', 'bukubatas', 'keteranganOptions'), ['title' => 'uiguruhal1', 'role' => Auth::user()->roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, )
    {
        $keterangan = $request->input('keterangan'); // Ini adalah array ID siswa dan keterangan mereka

        foreach ($keterangan as $siswaId => $keteranganValue) {
            AbsenSiswa::create([
                'siswas_id' => $siswaId, // ID siswa yang benar
                'bukubatas_id' => BukuBatas::orderBy('created_at', 'desc')->first()->id, // ID siswa yang benar
                'keterangan' => $keteranganValue // Keterangan untuk siswa tersebut
            ]);
        }

        return redirect()->route('batasmapel.index')->with('success', 'Siswa berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
